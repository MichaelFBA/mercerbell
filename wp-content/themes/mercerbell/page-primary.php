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
				<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h5 class="uppercase lsm df-regular">Work</h5>
			</div>
			
			
			<!-- Work items -->
			<?php
			$queryHome = new WP_Query(array(
	    	'posts_per_page' => 3,
	    	'post_type'			 => 'work',
	    	'order'					 => 'DESC',
	    	'orderby'				 => 'date',
	    	'post_status'		 => 'publish'
	       ) 
	    );
	    
	    while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
			<div class="span4 bg-color1 transition">
				<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	      <img src="<?php echo $Imageurl[0]; ?>" />
				<div class="pam">
					<h5 class="uppercase fwNormal uppercase man"><?php the_title(); ?></h5>
					<hr>
					<p class="fss man"><?php the_terms( get_the_id(), 'work', '', ', ', '' );?></p>
				</div>
			</div>
			<?php
			endwhile;
			?>

			
			<div class="span12 txtC mvl">
				<a href="<?php echo get_home_url() ?>/work" target="_parent"><h5 class="df-regular man uppercase">View All</h5></a>
				<ul class="unstyled inline">
					<li class="pan"><a class="scroll block transition arrowBorder brah" href="#primaryCarousel"><h4 class="ico-arrowUp pas man"></h4></a></li>
					<li class="pan"><a class="block transition arrowBorder brah" href="<?php echo get_home_url() ?>/work"><h4 class="ico-arrowRight pas man"></h4></a></li>
				</ul>
			</div>
		</section>
		
	</div><!-- close container -->
	
	<div class="bg-color3" id="about">
		<div class="container">	
				<!-- About us -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img class="rotate"  src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h5 class="uppercase lsm df-regular color1">About</h5>
				</div>
			</section>
			<section class="row">
				<div class="span8 offset2">
					<?php
					$queryHome = new WP_Query(array('pagename' => 'about') );
			    
			    while ( $queryHome->have_posts() ) : $queryHome->the_post();
					?>
						<h2 class="df-light fwNormal color1"><?php echo get_the_content(); ?></h2>
					<?php
					endwhile;
					?>
				</div>
					
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<h5 class="df-regular man color1 uppercase">Back to top</h5>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah color1" href="#primaryCarousel"><h4 class="ico-arrowUp pas man color1"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah color1" href="<?php echo get_home_url() ?>/about"><h4 class="ico-arrowRight pas man color1"></h4></a></li>
					</ul>
				</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->


<!-- 	Press Section  -->
	<div class="container">
				
		
		<section class="row txtC" id="press">
			<!--	Logo -->
			<div class="span12 mvl">
				<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/pressIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h5 class="uppercase lsm df-regular color4">Hot off the press</h5>
			</div>
			
			<!-- Work items -->
			<?php
			$queryHome = new WP_Query(array(
	    	'posts_per_page' => 3,
	    	'post_type'			 => 'news',
	    	'order'					 => 'DESC',
	    	'orderby'				 => 'date',
	    	'post_status'		 => 'publish'
	       ) 
	    );
	    
	    while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
			<div class="span4 pbm transition">
				<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	      <img src="<?php echo $Imageurl[0]; ?>" />
				<h4 class="uppercase df-regular mtm fsl phm"><?php the_title(); ?><br/><span class=" capitalize fwNormal df-light"><?php echo get_the_date(); ?></span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read <?php the_author(); ?> Article</p>
			</div>
			<?php
			endwhile;
			?>
			
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<a href="<?php echo get_home_url() ?>/news" target="_blank"><h5 class="df-regular man uppercase color4">View All</h5></a>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah color4" href="#primaryCarousel"><h4 class="ico-arrowUp pas man color4"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah color4" href="<?php echo get_home_url() ?>/news"><h4 class="ico-arrowRight pas man color4"></h4></a></li>
					</ul>
		</section>
		
	</div><!-- close container -->
	
	
	<!-- Include shared contact-->
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/contact' ) ); ?>
	

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>