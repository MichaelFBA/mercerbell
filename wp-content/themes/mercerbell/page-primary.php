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

<section class="sidenav zi1">
	<div class="bg-color7 absolute backgroundNav element1 zi4"></div>
	<div class="bg-color1 absolute backgroundNav element2 zi3"></div>
	<div class="bg-color4 absolute backgroundNav element3 zi2"></div>
	<div class="bg-color6 absolute backgroundNav element4 zi1"></div>
	<ul class="nav nav-list txtC pas front relative">
	  <li><a class="circles bat color1 scroll" href="#work"></a></li>
	  <li><a class="circles bat color1 scroll" href="#about"></a></li>
	  <li><a class="circles bat color1 scroll" href="#press"></a></li>
	  <li><a class="circles bat color1 scroll" href="#contact"></a></li>
	  <li><a class="color1 socialIcons" href="https://www.facebook.com/mercerbell‎" target="_blank"><i class="icon-facebook"></i></a></li>
	  <li><a class="color1 socialIcons" href="https://twitter.com/MercerBell‎" target="_blank"><i class="icon-twitter mrt"></i></a></li>
	  <li><a class="color1 socialIcons" href="#"><i class="icon-pinterest mrt"></i></a></li>
	</ul>
</section>	 

	<div class="container ofh">
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
          <!-- Carousel Controls 
          <a class="left carousel-control" href="#primaryCarousel" data-slide="prev">‹</a>
          <a class="right carousel-control" href="#primaryCarousel" data-slide="next">›</a> -->
        </div>
			</div>
		</section> 
		
<!-- 	Work Section  -->
		
		<section class="row" id="work">
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h5 class="uppercase lsm df-regular">Work</h5>
			</div>
			
			<!-- Work items -->
			<div class="span4 bg-color1 transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/work1.jpg" alt=""/>
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
					<hr>
					<p class="fss man">digital campaign, print</p>
				</div>
			</div>
			
			<div class="span4 bg-color1 transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/work1.jpg" alt=""/>
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
					<hr>
					<p class="fss man">digital campaign, print</p>
				</div>
			</div>
			
			<div class="span4 bg-color1 transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/work1.jpg" alt=""/>
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man">lazy ad - fairfax</h5>
					<hr>
					<p class="fss man">digital campaign, print</p>
				</div>
			</div>
			
			<div class="span12 txtC mvl">
				<h5 class="fwNormal uppercase">View All</h5>
				<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
			</div>
		</section>
		
	</div><!-- close container -->
	
	<div class="bg-color3" id="about">
		<div class="container">	
					<!-- About use -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h5 class="uppercase lsm df-regular color1">About</h5>
				</div>
			</section>
			<section class="row">
				<div class="span8 offset2">
					<h2 class="df-light fwNormal color1">MercerBell is an independent marketing and communications agency of passionate, creative people working together to build committed relationships between brands and customers for our clients. </h2>
				</div>
					
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<h5 class="fwNormal color1 uppercase">Back to top</h5>
					<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
				</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->


<!-- 	Press Section  -->
	<div class="container">
				
		
		<section class="row txtC" id="press">
			<!--	Logo -->
			<div class="span12 mvl">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pressIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h5 class="uppercase lsm df-regular color4">Hot off the press</h5>
			</div>
			
			<!-- Work items -->
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase fwNormal mtm fsl phm">WORK FROM HOME ISN’T THE ONLY OPTION FOR FLEXIBILITY<br/><span class=" capitalize fwNormal df-light">Mar 20, 2013</span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read Jule's Article</p>
			</div>
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase fwNormal mtm fsl phm">WORK FROM HOME ISN’T THE ONLY OPTION FOR FLEXIBILITY<br/><span class=" capitalize fwNormal df-light">Mar 20, 2013</span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read Jule's Article</p>
			</div>
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase fwNormal mtm fsl phm">WORK FROM HOME ISN’T THE ONLY OPTION FOR FLEXIBILITY<br/><span class=" capitalize fwNormal df-light">Mar 20, 2013</span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read Jule's Article</p>
			</div>
			
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<h5 class="fwNormal uppercase">View All</h5>
				<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
			</div>
		</section>
		
	</div><!-- close container -->
	
	
	<!-- Include shared contact-->
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/contact' ) ); ?>
	

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>