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

<?php the_content(); ?>

	<div class="bg-color5">
		<div class="container" id="article4">	
					<!-- About use -->
			<section class="row">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contactIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h5 class="uppercase lsm fwNormal color6">Join Us</h5>
				</div>
			</section>
			
			<section class="row color6">
				<form>
					<div class="span6">
						<input type="text" class="span6 pvm bran fss" placeholder="NAME">
						<input type="text" class="span6 pvm bran" placeholder="EMAIL">
					</div>
					<div class="span6">
						<input type="text" class="span6 pvm bran" placeholder="PHONE">
						<input type="text" class="span5 pvm bran mrm" placeholder="WEBSITE">
					</div>
					<div class="span12 mbl bss bc-color6">
						<textarea rows="6" class="span12 pvm bran" placeholder="MESSAGE"></textarea>
						<label class="checkbox"><input type="checkbox" value=""><i>I would like to receive the MercerBell Sauce eNewsletter.</i></label>
						<i class="icon-circle"></i> <i>Required fields.</i>
						<a href="#" class="pull-right color6">SEND <i class="icon-angle-right"></i></a>
						
					</div>
				</form>
			</section>
			<section class="row">
				<!-- Work items -->
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase fwNormal mtm fsl phm">WORK FROM HOME ISN’T THE ONLY OPTION FOR FLEXIBILITY<br/><span class=" capitalize fwNormal df-light">Mar 20, 2013</span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read Jule's Article</p>
			</div>
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase fwNormal mtm fsl phm">WORK FROM HOME ISN’T THE ONLY OPTION FOR FLEXIBILITY<br/><span class=" capitalize fwNormal df-light">Mar 20, 2013</span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read Jule's Article</p>
			</div>
			<div class="span4 pbm transition">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/press1.jpg" alt=""/>
				<h4 class="uppercase fwNormal mtm fsl phm">WORK FROM HOME ISN’T THE ONLY OPTION FOR FLEXIBILITY<br/><span class=" capitalize fwNormal df-light">Mar 20, 2013</span></h4>
				<hr class="smallhr">
				<p class="fss man uppercase">Read Jule's Article</p>
			</div>
			</section>
			
		</div><!-- close container -->
	</div><!-- close bg-color3 wrap-->



<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>