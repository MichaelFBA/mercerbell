<?php
/**
 *Template Name: Article 4
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


	<div class="bg-color5">
		<div class="container" id="article4">	
					<!-- About use -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/contactIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h5 class="uppercase lsm df-regular color6">Join Us</h5>
				</div>
			</section>
			
			<section class="row color6">
			<?php echo do_shortcode('[contact-form-7 id="125" title="MercerBell Contact Form"]'); ?>
			</section>
			<section class="row">
			
			<?php
			$query = new WP_Query(array(
	    	'posts_per_page' => 3,
	    	'order'					 => 'ASC',
	    	'orderby'				 => 'date',
	    	'post_type'  => 'jobs',
	    	'post_status'		 => 'publish',
	    	'post__not_in' => array(get_the_id())
	       ) 
	    );
			?>
			
			<?php

$colCount = 1;
while ( $query->have_posts() ) : $query->the_post();
			# Object streaming appends content to a variable at the end. these are the 3 columns we need to start content inside of
			ob_start();
			?>
				<div class="transition mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	        <a href="<?php the_permalink(); ?>" target="_parent"><img src="<?php echo $Imageurl[0]; ?>" /></a>
					<h4 class="uppercase df-regular mtm fsl"><?php the_title(); ?></h4>
					<hr>
					<p class="man capitalize"><?php the_field('position_held') ?><a href="#" class="null toggle"><i class="icon-angle-down pull-right"></i></a></p>
					<div class="hide mvm">
						<p><?php $content = get_the_content(); print $content; ?></p>
						<p class="mtm">Share: 
						<?php if( get_field('facebook') ){ ?><a href="<?php the_field('facebook'); ?>" target="_blank"><i class=" mlt prt icon-facebook"></i></a><?php } ?>
						<?php if( get_field('twitter') ){ ?><a href="<?php the_field('twitter'); ?>" target="_blank"><i class="icon-twitter mrt"></i></a><?php } ?>
						<?php if( get_field('pinterest') ){ ?><a href="<?php the_field('pinterest'); ?>" target="_blank"><i class="icon-pinterest mrt"></i></a><?php } ?>
						<?php if( get_field('instagram') ){ ?><a href="<?php the_field('instagram'); ?>" target="_blank"><i class="icon-instagram"></i></a>	<?php } ?>
							<a href="<?php the_permalink(); ?>" target="_parent" ><span class="pull-right">Apply Now</span></a>
						</p>
					</div>
					<hr>
				</div>
			<?php
			# Just loops through 3 numbers to determine which column they should be added to
			if($colCount == 1){
				$data1 .= ob_get_clean();
			}else if($colCount == 2){
				$data2 .= ob_get_clean();
			}else{
				$data3 .= ob_get_clean();
			}		

			$colCount++;
			if($colCount > 3){$colCount = 1;}
			endwhile;
		?>
		
		<?php #These div columns will contain stacked people ?>
		<div class="span4">
			<?php printf($data1);  ?>
		</div>
		<div class="span4">
			<?php printf($data2);  ?>
		</div>
		<div class="span4">
			<?php  printf($data3);  ?>
		</div>

			
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->



<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>