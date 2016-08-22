<?php get_header(); ?>

	<!-- Tag Template
	================================================== -->
	<div class="container">
		<div class="twelve columns">
			<?php the_post(); ?>
			<h1 class="page-title"><?php _e( 'Tag Archives:', 'ribs' ) ?> <span><?php single_tag_title() ?></span></h1>
			<?php rewind_posts(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><?php the_title();?></h2>
				<div class="entry-content">
					<?php the_content();?>
				</div>
			</div>
		</div>
		<div class="four columns">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- End Tag Template -->

<?php get_footer(); ?>

