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

<section class="sidenav zi1 hidden-phone">
	<div class="bg-color7 absolute backgroundNav element1 zi4"></div>
	<div class="bg-color1 absolute backgroundNav element2 zi3"></div>
	<div class="bg-color4 absolute backgroundNav element3 zi2"></div>
	<div class="bg-color6 absolute backgroundNav element4 zi1"></div>
	<ul class="nav nav-list txtC pas front relative">
	  <li><a class="circles bat color1 scroll" href="#work"></a></li>
	  <li><a class="circles bat color1 scroll" href="#about"></a></li>
	  <li><a class="circles bat color1 scroll" href="#press"></a></li>
	  <li><a class="circles bat color1 scroll" href="#contact"></a></li>
	  <li><a class="color1 socialIcons" href="<?php the_field('mb_facebook','options') ?>‎" target="_blank"><i class="icon-facebook"></i></a></li>
	  <li><a class="color1 socialIcons" href="<?php the_field('mb_twitter','options') ?>‎" target="_blank"><i class="icon-twitter mrt"></i></a></li>
	  <li><a class="color1 socialIcons" href="<?php the_field('mb_pinterest','options') ?>"><i class="icon-pinterest mrt"></i></a></li>
	</ul>
</section>
	 
 <?php
	$queryHome = new WP_Query(array(
  	'posts_per_page' => 6,
  	'category_name'	 => 'home-page-slider',
  	'order'					 => 'DESC',
  	'orderby'				 => 'date',
  	'post_status'		 => 'publish'
     ) 
  );
  $count = 0; // count for carousel markers
  $active = true; // so we can append an active class
	?>
	<div class="container ofh">
		<!-- 	Carousel -->
		<section class="row">
			<div class="span12">
				<div id="primaryCarousel" class="carousel loose slide">
          <ol class="carousel-indicators">
          	<?php while ( $queryHome->have_posts() ) : $queryHome->the_post();?>
	            <li data-target="#primaryCarousel" data-slide-to="<?php echo $count; $count++; ?>" class="<?php if($active == true){echo 'active'; $active = false;} ?>"></li>
            <?php endwhile; ?>
          </ol>
          <div class="carousel-inner bbt bcDark">
	         <?php 
	         $active = true;
	         $youtubeID;
				    while ( $queryHome->have_posts() ) : $queryHome->the_post();
						?>
							<div class="item <?php if($active == true){echo ' active'; $active = false;} ?>">
								<?php 
									if( get_field('mb_youtube') ){ ?>
									  <a href="#myModal" role="button" data-toggle="modal">
										  <div class="imageWrap">
										  	<div class="controlPlay play"></div>
										  	<?php echo wp_get_attachment_image( get_field('youtube_poster_image') ,'large'); $youtubeID = get_field('mb_youtube'); ?>
										  </div>
									  </a>
									<?php
									}else{ ?>
										<h1 class="fwNormal uppercase color1 absolute span6 offset3 veryTight bbm df-regular"><?php the_title(); ?>
											<i class="bas brah icon-caret-right pas txtC largeArrow"></i>
										</h1>
										<div class="imageWrap"><?php the_post_thumbnail('large'); ?></div>
									<?php 
									} 
								?>
	              
	              <div class="primary-caption">
	                <p class="pvs df-light man prh"><?php echo get_the_content(); ?></p>
	              </div>
	            </div>
						<?php
						endwhile;
						?>
          </div>
          <!-- Carousel Controls 
          <a class="left carousel-control" href="#primaryCarousel" data-slide="prev">‹</a>
          <a class="right carousel-control" href="#primaryCarousel" data-slide="next">›</a> -->
        </div>
			</div>
		</section> 
		
		
<!-- Modal -->
	<div id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<button type="button" class="close color1 absolute" data-dismiss="modal" aria-hidden="true">&times;</button>
	 <div class="flashContainer ">
	 	<div class="transparent"></div>
	 	<div class="progressBar hidden-phone"><div class="elapsed"></div></div>
	 	<div class="controlDiv play hidden-phone"></div>
	 	<div id="player" data-youtube="<?php echo $youtubeID; ?>"></div>
	 </div>
	</div>
 

		
<!-- 	Work Section  -->
		
		<section class="row" id="work">
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
	    ?>
	    
	    <!--	Logo -->
			<div class="span12 txtC mvl">
				<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h4 class="uppercase lsm df-regular mtm">Work</h4>
			</div>
	    
	    <?php
	    while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
			<a href="<?php the_permalink(); ?>" target="_parent">
			<div class="span4 bg-color1 transition mbm element">
				<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	      <span class="patternOverlay block"><img class="transition" src="<?php echo $Imageurl[0]; ?>" /></span>
				<div class="pam">
					<h4 class="uppercase df-regular uppercase man"><?php the_title(); ?></h4>
					<hr>
					<p class="fss man uppercase"><?php echo mercerBellTerms(strtolower(get_post_type( get_the_id() ) ) ); #outputs categories ?></p>
				</div>
			</div>
			</a>
			<?php
			endwhile;
			?>

			
			<div class="span12 txtC mvl">
				<a href="<?php echo get_home_url() ?>/work" target="_parent"><h4 class="df-regular man uppercase">View All</h4></a>
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
					<h4 class="uppercase lsm df-regular color1 mtm">About</h4>
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
					<h4 class="df-regular man color1 uppercase">Back to top</h4>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah color1" href="#primaryCarousel"><h4 class="ico-arrowUp pas man color1"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah color1" href="<?php echo get_home_url() ?>about/we-create-committed-customer-relationships/"><h4 class="ico-arrowRight pas man color1"></h4></a></li>
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
				<h4 class="uppercase lsm df-regular color4 mtm">Hot off the press</h4>
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
			<a href="<?php the_permalink(); ?>" target="_parent">
				<div class="span4 pbm transition mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
		      <img src="<?php echo $Imageurl[0]; ?>" />
					<h4 class="uppercase df-regular mtm phm"><?php the_title(); ?><br/><span class=" capitalize fwNormal df-light"><?php echo get_the_date(); ?></span></h4>
					<hr class="smallhr">
					<p class="fst man uppercase">Read <?php the_author(); ?> Article</p>
				</div>
			</a>
			<?php
			endwhile;
			?>
			
			<!--	Logo -->
			<div class="span12 txtC mvl">
				<a href="<?php echo get_home_url() ?>/news" target="_blank"><h4 class="df-regular man uppercase color4">View All</h4></a>
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