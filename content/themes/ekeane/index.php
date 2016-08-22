<?php get_header(); ?>

	<!-- Index
	================================================== -->

	<div id="primary" class="content-area">
	
			<?php while ( have_posts() ) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemType="http://schema.org/WebPage">
				<header class="entry-header">
			
					<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
			
				</header><!-- .entry-header -->
			
				<div class="entry-content" itemprop="mainContentOfPage">
			
				<?php the_content(); ?>
			
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
	
	
			<?php endwhile; // end of the loop. ?>
	
	</div><!-- #primary -->

	<!-- End Index Template -->

<?php get_footer(); ?>

