<?php
/**
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

<div class="bg-color3" id="about">
		<div class="container">	
				<!-- About us -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img class="rotate"  src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm df-regular color1 mtm"><?php the_title(); ?></h4>
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
						<li class="pan"><a class="scroll block transition arrowBorder brah color1" href="#about"><h4 class="ico-arrowUp pas man color1"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah color1" href="<?php echo get_home_url() ?>/about/we-create-committed-customer-relationships/"><h4 class="ico-arrowRight pas man color1"></h4></a></li>
					</ul>
				</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>