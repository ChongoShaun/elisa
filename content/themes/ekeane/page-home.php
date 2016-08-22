<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

	<!-- Setty Home
	================================================== -->
	<div id="main-content-container" class="home">

	<div class="hero-wrapper">
		<div class="hero">
			ELISA KEANE
		</div>
		
	</div>
	
	<div class="work-nav-wrapper">
	
	<?php
	//get current page ID
	
	$args = array(
	'title_li'     => '',
	'exclude' => '5,7,9',
	'sort_order'	=> 'DESC',
	'sort_column'	=> 'menu_order'
	);
	
	$pages = get_pages( $args );
	
	$output = '';
	
	foreach($pages as $value){
	
		$thumb = wp_get_attachment_url( get_post_thumbnail_id($value->ID) );
		$output .= "<div class='block' style='background-image:url(".$thumb.");'>";
		$output .= "<a href='" . $value->post_name . "' ><span>" .  $value->post_title . "</span></a>";
		$output .= "</div>";
	} 
	
	echo $output;
	?>


	</div>

<!--
		<section>
			<div id="hero-wrapper">
				<div class="cycle-slideshow"
				    data-cycle-fx="fade"
				    data-cycle-pause-on-hover="true"
					data-cycle-slides="> .hero-slide"
				    data-cycle-speed="1000"
				    >				
	
					<?php if( have_rows('hero_slider') ): ?>
					
						<?php while( have_rows('hero_slider') ): the_row(); 
					
							$image = get_sub_field('image');
							$headline = get_sub_field('headline');
							$message = get_sub_field('message');
					
							?>
					
							<div class="hero-slide" style="background-image:url(<?php echo $image['url'];?>);">
								<div class="width-wrapper">
									<div class="hero-message">
										<h1><?php echo $headline;?></h1>
										<?php echo $message;?>
									</div>
								</div>
							</div>
					
						<?php endwhile; ?>
							
				<?php endif; ?>

				</div>

			</div>
		</section>
-->

	</div>
<?php get_footer(); ?>

