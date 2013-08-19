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
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contactIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm fwNormal color6">Join Us</h4>
				</div>
			</section>
			
			<section class="row color6">
			<?php the_content(); ?>
			</section>
			<section class="row">
				<!-- Work items -->
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase df-regular mtm fsl">Art director</h4>
				<hr class="bc-color6">
				<p class="fss man uppercase">Creative <i class="icon-angle-down pull-right"></i></p>
				<hr class="bc-color6">
			</div>
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase df-regular mtm fsl">Art director</h4>
				<hr class="bc-color6">
				<p class="fss man uppercase">Creative <i class="icon-angle-down pull-right"></i></p>
				<hr class="bc-color6">
			</div>
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase df-regular mtm fsl">Art director</h4>
				<hr class="bc-color6">
				<p class="fss man uppercase">Creative <i class="icon-angle-down pull-right"></i></p>
				<hr class="bc-color6">
			</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->



<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>