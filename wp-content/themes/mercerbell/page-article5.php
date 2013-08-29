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






<div class="container aboutSectionTopMargin page-article5" id="top">
	<div class="row">
		<!--	Logo -->
		<div class="span12 txtC mvl">
			<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h4 class="uppercase lsm df-regular">About</h4>
		</div>
	</div>
	<div class="row">
		<div class="span12 relative element">
		<h1 class=" uppercase color1 absolute span5 offset3 veryTight bbm df-regular fwNormal homeh1 middle"><?php the_field('image_title'); ?>
			<img class="noOpacity" src="<?php echo get_stylesheet_directory_uri() ?>/img/homeArrow.png"/>
		</h1>
		
		<span class="hidden-phone patternOverlay block"><?php the_post_thumbnail('large',array('class'=> 'transition')); ?></span>
		<span class="hidden-desktop hidden-tablet patternOverlay block"><?php the_post_thumbnail('span5',array('class'=> 'transition')); ?></span>
		
		</div>
	</div>
	
	<div class="row mtl phone-padding">
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