<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>

	<!-- Pages
	================================================== -->
	<div id="main-content-container" class="contact">
	
		<div class="border-column">&nbsp;</div>

		<div class="content">
			<h1><span><?php the_field('header');?></span></h1>			
			<div class="phone">
				<p><?php the_field('phone');?></p>
			</div>

			<div class="floral-box">
				<h2><?php the_field('floral_box_text');?></h2>				
			</div>

			<div class="form">
				<?php the_field('form');?>
			</div>

		</div>
		
		<div class="border-column">&nbsp;</div>

	</div>
<?php get_footer(); ?>
