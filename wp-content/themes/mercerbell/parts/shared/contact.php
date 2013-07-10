<div class="bg-color5">
		<div class="container" id="contact">	
					<!-- About use -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/contactIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm df-regular color6 mtm">Contact</h4>
				</div>
			</section>
			
			<section class="row color6 txtC">
				<div class="span4 ">
					 <?php if ( !function_exists('Contact Left') || !dynamic_sidebar(X) ) : endif; ?>
					<h4 class="fsl uppercase df-regular color6">GENERAL INQUIRIES</h4>
					<p>Just want to say "hi"? Drop us a line. <a class="color6" href="mailto:mercerbell@mercerbell.com.au" target="_parent" >mercerbell@mercerbell.com.au</a></p>
				</div>
				<div class="span4">
					<a class="color6" href="<?php echo get_home_url() ?>/jobs">
					<h4 class="fsl uppercase df-regular color6">Work for us</h4>
					<p>We are always looking for talented, creative, ambitious individuals to join our team <i class="icon-angle-right txtT"></i></p>
					</a>
				</div>
				<div class="span4">
					<h4 class="fsl uppercase df-regular color6">Follow us</h4>
					<p>Stay in the loop 
					<a class="mrt mls color6" href="<?php the_field('mb_facebook','options') ?>" target="_blank"><i class="icon-facebook"></i></a>
					<a class="color6" href="<?php the_field('mb_twitter','options') ?>" target="_blank"> <i class="icon-twitter mrt"></i></a>
					<a class="color6" href="<?php the_field('mb_pinterest','options') ?>" target="_blank"><i class="icon-pinterest mrt"></i></a>
					<a class="color6" href="<?php the_field('mb_instagram','options') ?>" target="_blank"><i class="icon-instagram"></i></a>
					</p>
				</div>
				
				<div class="span12 bts bc-color6 mtm">
					<p class="mvl"><?php the_field('mb_address','options') ?></p>
				</div>
				
				
				<!--	Google Maps -->
				<div class="span12 desaturate patternOverlay block">
					<div id="map-canvas"></div>
				</div>
					
				<!--	back to top -->
				<div class="span12 txtC mvl">
					<h4 class="df-regular uppercase color6 man">Back to top</h4>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah color6" href="#primaryCarousel"><h4 class="ico-arrowUp pas man color6"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah color6" href="<?php echo get_home_url() ?>/contact"><h4 class="ico-arrowRight pas man color6"></h4></a></li>
					</ul>
				</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->