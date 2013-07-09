<?php
/**
* Template Name: Article 5
 * The template for displaying all pages.
 *
 *
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>






<div class="container aboutSectionTopMargin" id="top">
	
	<div class="row">
		<div class="span12">
		<h1 class="uppercase color1 absolute span4 offset4 fsh veryTight bbm pth"><?php the_title(); ?></h1>
		<?php $featureImage = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
		<img src="<?php echo $featureImage[0]; ?>" />
		</div>
	</div>
	
	<div class="row mtl">
		<?php $content = split_content(); // function: Split Content   This function takes the_content and splits it into an array when it sees <-- more --> ?>
		<div class="span6"><?php echo $content[0]; ?></div>
		<div class="span6"><?php echo $content[1]; ?></div>
	</div>

	<div class="row">
		<div class="span12 txtC mvl btt">
			<!--	Logo -->
				<div class="span12 txtC mvl">
					<h4 class="df-regular man uppercase">Back to top</h4>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah" href="#top"><h4 class="ico-arrowUp pas man"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah" href="<?php echo getNextPrevious(get_queried_object_id()) ?>"><h4 class="ico-arrowRight pas man"></h4></a></li>
				</ul>
				</div>
		</div>
	</div>

</div>


<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>