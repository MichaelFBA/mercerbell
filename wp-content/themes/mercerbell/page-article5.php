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

<div class="container">
	
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
			<h5 class="fwNormal uppercase mtl">Back to top</h5>
			<i class="icon-angle-up"></i> <i class="icon-angle-right"></i>
		</div>
	</div>

</div>


<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>