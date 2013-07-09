<?php
/**
 * Template Name: Article 3
 * The template for displaying grid layout
 *
 *
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<div class="container aboutSectionTopMargin" id="clientLogos">
	
	<section class="row" id="top">
	<!--	Logo -->
		<div class="span12 txtC mvl">
			<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h4 class="uppercase lsm df-regular">About</h4>
		</div>
		
	<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$queryHome = new WP_Query(array(
	    	'posts_per_page' => -1,
	    	'order'					 => 'ASC',
	    	'orderby'				 => 'date',
	    	'category_name'  => 'clients',
	    	'post_status'		 => 'publish'
	       ) 
	    );

			while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
				<div class="span3 bg-color1 mbm txtC txtM patternOverlay transition">
					<div class="pas">
						<?php $logoUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
						<img src="<?php echo $logoUrl[0]; ?>" />
					</div>
				</div>
			<?php
			endwhile;	
		?>

	</section>
	
	<div class="row">
		<div class="span12 txtC mvl">
			<h4 class="df-regular man uppercase">Back to top</h4>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah" href="#top"><h4 class="ico-arrowUp pas man"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah" href="<?php echo getNextPrevious(get_queried_object_id()) ?>"><h4 class="ico-arrowRight pas man"></h4></a></li>
				</ul>
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>