<?php get_header(); ?>
<?php the_post(); ?>

	<!-- Author Template
	================================================== -->
	<div class="container">
		<div class="twelve columns">
			<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'ribs' ), "<span class=\"vcard\"><a class='url fn n' href='$authordata->user_url' title='$authordata->display_name' rel='me'>$authordata->display_name</a></span>" ) ?></h1>
			<?php rewind_posts(); ?>

			<?php while ( have_posts() ) : the_post() ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title();?></h1>
					<div class="entry-content">
						<?php the_content();?>
					</div>
					<div class="entry-meta">
						<span class="meta-prep meta-prep-entry-date"><?php _e('Published', 'ribs'); ?> </span>
						<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
						<?php edit_post_link( __( 'Edit', 'ribs' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
					</div>
				</div>
			<? endwhile;?>
		</div>
		<div class="four columns">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- End Author Template -->

<?php get_footer(); ?>

