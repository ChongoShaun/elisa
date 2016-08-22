<?php get_header(); ?>

	<!-- Category Template
	================================================== -->
	<div class="container">
		<div class="twelve columns">
			<?php the_post(); ?>
			<h1 class="page-title"><?php _e( 'Category Archives:', 'ribs' ) ?> <span><?php single_cat_title() ?></span></h1>
			<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
			<?php rewind_posts(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			</div>
		</div>
		<div class="four columns">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- End Category Template -->

<?php get_footer(); ?>

