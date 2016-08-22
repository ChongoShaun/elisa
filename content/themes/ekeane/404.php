<?php get_header(); ?>

	<!-- 404
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
					<h1 class="lazyesq fadeIn" data-wow-delay="0.1s">404</h1>
				</div>
			</div>
		</div>
	</section>
	
		<!-- Posts
	================================================== -->

	<section>

		<div id="four-oh-four-container" class="single-post">
	
			<article class="post news">
				<div class="content">
					<div class="post-image-header">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/Image_Bark_404.jpg" alt="404 PAGE NOT FOUND" />
					</div>
					<h1 class="post-title">
						We're sorry, this page can not be found.<br />
					</h1>
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
						<p>Go back to <a href="<?php echo home_url();?>">barkdesignchicago.com &raquo;</a></p>
					</div>
				</div>
			</article>					
		</div>
	</section>

<?php get_footer(); ?>

