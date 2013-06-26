<?php
/**
 *Template Name: Primary
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="container">
	
		<!-- 	Carousel -->
	
		<section class="row">
			<div class="span12">
				<div id="primaryCarousel" class="carousel loose slide">
          <ol class="carousel-indicators">
            <li data-target="#primaryCarousel" data-slide-to="0" class=""></li>
            <li data-target="#primaryCarousel" data-slide-to="1" class="active"></li>
          </ol>
          <div class="carousel-inner bbt bcDark">
            <div class="item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/Bridge-Nature.jpg" alt="">
              <div class="primary-caption">
                <p class="pvs df-light man">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </div>
            </div>
            <div class="item active">
              <img src="http://as1.wdpromedia.com/media/abd/europe/3-night-barcelona-vacations/474064785_Montserrat_1260x540.jpg" alt="">
              <div class="primary-caption">
                <p class="pvs df-light man">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#primaryCarousel" data-slide="prev">‹</a>
          <a class="right carousel-control" href="#primaryCarousel" data-slide="next">›</a>
        </div>
			</div>
		</section> 
		
		<!-- 	Work Section  -->
		
		<section class="row">
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h5 class="uppercase lsm fwNormal">Work</h5>
			</div>
			
			<!-- Work items -->
			<div class="span4 bg-color1">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/work1.jpg" alt=""/>
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
					<hr>
					<p class="fss man">digital campaign, print</p>
				</div>
			</div>
			
			<div class="span4 bg-color1">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/work1.jpg" alt=""/>
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
					<hr>
					<p class="fss man">digital campaign, print</p>
				</div>
			</div>
			
			<div class="span4 bg-color1">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/work1.jpg" alt=""/>
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
					<hr>
					<p class="fss man">digital campaign, print</p>
				</div>
			</div>
			
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<h5 class="fwNormal uppercase">View All</h5>
				<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
			</div>
		</section>
		
	</div><!-- close container -->
	
	<div class="bg-color3">
		<div class="container">	
					<!-- About use -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h5 class="uppercase lsm fwNormal color1">About</h5>
				</div>
			</section>
			<section class="row">
				<div class="span8 offset2">
					<h2 class="df-light fwNormal color1">MercerBell is an independent marketing and communications agency of passionate, creative people working together to build committed relationships between brands and customers for our clients. </h5>
				</div>
					
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<h5 class="fwNormal color1 uppercase">Back to top</h5>
					<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
				</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->


	<div class="container">
				<!-- 	Press Section  -->
		
		<section class="row txtC">
			<!--	Logo -->
			<div class="span12 mvl">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pressIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h5 class="uppercase lsm fwNormal color4">Hot off the press</h5>
			</div>
			
			<!-- Work items -->
			<div class="span4">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h5 class="uppercase fwNormal uppercase">WORK FROM HOME ISN’TTHE ONLY OPTION FOR FLEXIBILITY</h5>
				<p class="df-light">Mar 20, 2013</p>
				<hr class="phh">
				<p class="fss man">digital campaign, print</p>
			</div>
			
			<div class="span4">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
				<hr>
				<p class="fss man">digital campaign, print</p>
			</div>
			
			<div class="span4">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
				<hr>
				<p class="fss man">digital campaign, print</p>
			</div>
			
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<h5 class="fwNormal uppercase">View All</h5>
				<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
			</div>
		</section>
		
	</div><!-- close container -->

	<?php the_content(); ?>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>