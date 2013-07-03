<?php
/**
 *Template Name: Secondary 2
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

<!-- 	Work Section  -->
<section class="container">
	<div class="row">
		<div class="span2">
			
			<ul id="filters" class="unstyled uppercase">
			  <li><a href="#" data-filter="*"><i class="icon-minus"></i> all</a></li>
			  <li><a href="#" data-filter=".Digital"><i class="icon-minus"></i> digital</a></li>
			  <li><a href="#" data-filter=".Campaign"><i class="icon-minus"></i> campaign</a></li>
			  <li><a href="#" data-filter=".Direct"><i class="icon-minus"></i> direct</a></li>
			</ul>			
		
		</div>
		<div class="span8 txtC mvl">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h5 class="uppercase lsm fwNormal">Work</h5>
		</div>
	</div><!-- close row -->

	<!-- isotope rows -->
	<div id="isotope-expand" class="row transition">
	
		<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$queryHome = new WP_Query(array(
	    	'posts_per_page' => -1,
	    	'order'					 => 'ASC',
	    	'orderby'				 => 'date',
	    	'category_name'  => 'about',
	    	'post_status'		 => 'publish'
	       ) 
	    );

			while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
			
				<div class="span4 transition element mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	        <img src="<?php echo $Imageurl[0]; ?>" />
					<h4 class="uppercase df-regular mtm fsl"><?php the_title(); ?></h4>
					<hr>
					<p class="man capitalize"><?php the_field('position_held') ?><a href="#" class="null toggle"><i class="icon-angle-down pull-right"></i></a></p>
					<div class="hide mvm">
						<p><?php $content = get_the_content(); print $content; ?></p>
						<p class="mtm">Follow: <i class="icon-facebook"></i> <i class="icon-twitter mrt"></i><i class="icon-pinterest mrt"></i><i class="icon-instagram"></i> </p>
					</div>
					
					<hr>
				</div>
			<?
			endwhile;
		?>
	</div>
	
	<div class="row">
		<div class="span12 txtC mvl">
			<h5 class="df-regular man uppercase">More Work</h5>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah" href="#top"><h4 class="ico-arrowUp pas man"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah" href="<?php echo getNextPrevious(get_queried_object_id()) ?>"><h4 class="ico-arrowRight pas man"></h4></a></li>
				</ul>
		</div>
	</div>
	
	
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>