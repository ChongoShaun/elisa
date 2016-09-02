<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>
	<?php
	$bg_pattern = wp_get_attachment_url( get_post_thumbnail_id() );		
	?>

	<!-- Elisa Home
	================================================== -->
	<div id="main-content-container" class="home" style="background-image:url(<?php echo $bg_pattern;?>);">

		<div class="hero-wrapper">
			<div class="hero">
				ELISA KEANE
			</div>
			
		</div>
		
		<div class="work-nav-wrapper">
		
		<?php
		$args = array(
		'title_li'     => '',
		'exclude' => '5,7,9',
		'sort_order'	=> 'DESC',
		'sort_column'	=> 'menu_order'
		);
		
		$pages = get_pages( $args );
		
		$output = '';
		
		foreach($pages as $value){
			$image = get_field('home_page_thumb_image',$value->ID);
			if( !empty($image) ): 
				$thumb = get_field('home_page_thumb_image', $value->ID);
			else:
				$thumb['url'] = wp_get_attachment_url( get_post_thumbnail_id($value->ID) );
			endif;
			
			$output .= "<div class='block' style='background-image:url(".$thumb['url'].");'>";
			$output .= "<a href='" . $value->post_name . "' ><span>" .  $value->post_title . "</span></a>";
			$output .= "</div>";
			$thumb = "";
		} 
		
		echo $output;
		?>
	
	
		</div>

	</div>
<?php get_footer(); ?>

