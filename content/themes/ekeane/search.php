<?php get_header(); ?>

	<!-- Search Page Template
	================================================== -->
	<div class="container">
		<div class="twelve columns">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'ribs' ), '<span>' . get_search_query()  . '</span>' ); ?></h1>

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post() ?>
					<h2><?php the_title();?></h2>
					<div class="entry-content">
						<?php the_content();?>
					</div>
					<div class="entry-meta">
						<span class="meta-prep meta-prep-author"><?php _e('By', 'ribs'); ?> </span>
						<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'ribs' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
						<span class="meta-sep"> | </span>
						<span class="meta-prep meta-prep-entry-date"><?php _e('Published', 'ribs'); ?> </span>
						<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
						<?php edit_post_link( __( 'Edit', 'ribs' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
					</div>
				<? endwhile;?>
				<?php else : ?>
					<div id="post-0" class="post no-results not-found">
						<h2 class="entry-title"><?php _e( 'Nothing Found', 'ribs' ) ?></h2>
						<div class="entry-content">
							<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'ribs' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</div>
				<?php endif; ?>
		</div>
		<div class="four columns">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- End Search -->

<?php get_footer(); ?>


