<?php get_header(); ?>
	<?php
	$bg_pattern = wp_get_attachment_url( get_post_thumbnail_id() );		
	?>


	<!-- Pages
	================================================== -->
	<div id="main-content-container" class="work" style="background-image:url(<?php echo $bg_pattern;?>);">

		<div class="hero-wrapper">
			<div class="hero">
				<?php the_title();?>
			</div>
		</div>

		<div class="slide-wrapper">

		<?php if( have_rows('slides') ): ?>
		
			<div class="cycle-slideshow"
			    data-cycle-fx="fade"
			    data-cycle-pause-on-hover="true"
				data-cycle-slides="> .slide"
			    data-cycle-speed="1"
			    data-cycle-timeout="0"
				data-cycle-prev="#previous"
				data-cycle-next="#next"
	        	>				
		
				<?php while( have_rows('slides') ): the_row(); 
			
					// vars
					$image = get_sub_field('image');
					$description = get_sub_field('description');
			
					?>
					<div class="slide">
						<div class="slide-color">
							<div class="slide-image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
							</div>
						</div>
						<div class="slide-description">
							<?php echo $description;?>
						</div>
					</div>
	
				<?php endwhile; ?>

			</div>
		
		<?php endif; ?>


			<div class="slide-navigation">
				<div id="previous">
					<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow_left.png" /></a>
				</div>
				<div id="next">
					<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow_right.png" /></a>
				</div>
			</div>
		</div>


	</div>
<?php get_footer(); ?>

