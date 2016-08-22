<?php get_header(); ?>

	<!-- News
	================================================== -->

	<section>
		<div id="news-intro-section" class="big-container">
			<div class="section-container news">
				<div id="box-text" class="color-grid">
					<?php
						$color = $color_array = array(
							'2d9497','a8206b','eb1b4a','f16a44','2e3092','00964f','ff22c8','62afb1','bd5890','f05378','f58f72','6264ad','3fb07b','ff5ad6','2d9497','a8206b','eb1b4a','f16a44','2e3092','00964f','ff22c8','62afb1','bd5890','f05378','f58f72','6264ad','3fb07b','ff5ad6'
							);	
						for ( $i = 1; $i <= 100; $i++ ):
							if ( empty($color_array) ):
								$color_array = $color;
							endif;
							$key = array_rand($color_array, 1);
							$rand = rand(1,100);
							$selected = $color_array[$key];
							//unset($color_array[$key]);
							?>
							<div class="color-box lazyesq fadeIn" data-wow-delay="0.<?php echo $rand ?>s" style="background-color:#<?php echo $selected;?>"></div>
							<?php
						endfor;
					?>
					<h1 class="lazyesq fadeIn" data-wow-delay="0.1s">News</h1>
				</div>
			</div>
		</div>
	</section>
	
		<!-- Posts
	================================================== -->

	<section>

		<div id="single-article-container" class="single-post">
	
	
			<?php
			// The Loop
			if ( have_posts() ) :
			
				while ( have_posts() ) :
					the_post();
				
					$post_type = get_post_type(get_the_ID());
					
					if($post_type == "instagram"):
					?>
						
						<article class="post instagram">
							<div class="content">
								<div class="post-image-header">
									<?php the_content();?>
								</div>
								<h1 class="post-title">
									<?php
									the_title();
									?>
								</h1>
								<div class="post-date">
									POSTED <?php the_date();?>
								</div>
							</div>
						</article>					
					
					<?php
					else:
					?>
						<article class="post news">
							<div class="content">
							<?php
								if ( has_post_thumbnail() ):
									?>
									<div class="post-image-header">
										<?php
										the_post_thumbnail();
										?>
									</div>
									<?php
								endif; 
		
								?>
								<div class="post-content-container">
									<h1 class="post-title">
										<?php the_title();?>
									</h1>
									<div class="post-meta author">
										By <?php the_author_meta ('nickname');?>
									</div>
									<div class="squig">
										<svg id="intro-squig" data-name="intro-squig" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 73.34 2">
										  <defs>
										    <clipPath id="clip-path1" transform="translate(0.18 0)">
										      <rect width="72.97" height="2" fill="none"/>
										    </clipPath>
										  </defs>
										  <title>rule_squig</title>
										  <g clip-path="url(#clip-path1)">
										    <path d="M0,1A3.17,3.17,0,0,1,4.05,1,3.17,3.17,0,0,0,8.11,1a3.17,3.17,0,0,1,4.05,0,3.17,3.17,0,0,0,4.05,0,3.17,3.17,0,0,1,4.05,0,3.17,3.17,0,0,0,4.05,0,3.17,3.17,0,0,1,4.05,0,3.17,3.17,0,0,0,4.05,0,3.17,3.17,0,0,1,4.05,0,3.17,3.17,0,0,0,4.05,0A3.17,3.17,0,0,1,44.6,1a3.17,3.17,0,0,0,4.05,0A3.17,3.17,0,0,1,52.7,1a3.17,3.17,0,0,0,4.05,0,3.17,3.17,0,0,1,4.05,0,3.17,3.17,0,0,0,4.05,0,3.17,3.17,0,0,1,4.05,0A3.17,3.17,0,0,0,73,1" transform="translate(0.18 0)" fill="none" stroke="#fff" stroke-width="0.53"/>
										  </g>
										</svg>
									</div>
									<div class="post-content">
										<?php the_content();?>
									</div>
								</div>
							</div>
						</article>					
					<?php
					endif;
	
				$post_type = '';
				endwhile;
	
			else:
	
			endif;
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</div>
	</section>

<?php get_footer(); ?>

