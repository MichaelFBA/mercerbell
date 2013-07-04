<?php
/**
 *Template Name: Secondary 1
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
<section class="container" id="top">
	<div class="row">
		<div class="span3">
			
			<ul id="filters" class="unstyled uppercase">
			  <li><a href="#" class="null df-regular" data-taxonomy=""><i class="icon-minus color7"></i> all</a></li>
			  <li><a href="#" class="null" data-taxonomy="digital"><i class="icon-minus"></i> digital</a></li>
			  <li><a href="#" class="null" data-taxonomy="campaign"><i class="icon-minus"></i> campaign</a></li>
			  <li><a href="#" class="null" data-taxonomy="social-media"><i class="icon-minus"></i> Social media</a></li>
			  <li><a href="#" class="null" data-taxonomy="direct"><i class="icon-minus"></i> direct</a></li>
			</ul>			
		
		</div>
		<div class="span6 txtC mvl">
			<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h5 class="uppercase lsm df-regular">Work</h5>
		</div>
	</div><!-- close row -->

	
	<div class="row" id="appendAjaxContent">
	
		<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$queryHome = new WP_Query(array(
	    	'posts_per_page' => 7,
	    	'post_type'			 => 'work',
	    	'order'					 => 'DESC',
	    	'orderby'				 => 'date',
	    	'post_status'		 => 'publish'
	       ) 
	    );
			$sizeArray = array('span8','span4','span7','span5','span4','span4','span4');
			$count = 0;
			while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>

			<!-- add array classes so they can be filtered in menu -->
			<a href="<?php the_permalink(); ?>" target="_parent">
				<div class="bg-color1 transition element mbm <?php echo $sizeArray[$count]; ?>">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), $sizeArray[$count] ); ?>
	        <img src="<?php echo $Imageurl[0]; ?>" />
					<div class="pam">
						<h5 class="uppercase df-regular uppercase man"><?php the_title(); ?></h5>
						<hr>
						<p class="fss man uppercase"><?php the_terms( get_the_id(), 'work', '', ', ', '' );?></p>
					</div>
				</div>
			</a>
			<?
			$count++;
			if($count >= 7){$count = 0;}
			endwhile;
		?>
	</div>
	
	<div class="row">
		<div class="span12 txtC mvl">
			<a id="moreViaAjax" href="#" class="null" data-postType="<?php echo get_post_type( get_the_id() ); ?>"><h5 class="df-regular man uppercase">More Work</h5></a>
			<ul class="unstyled inline">
				<li class="pan"><a class="scroll block transition arrowBorder brah" href="#top"><h4 class="ico-arrowUp pas man"></h4></a></li>
				<li class="pan"><a class="block transition arrowBorder brah" href="<?php echo get_home_url() ?>/about"><h4 class="ico-arrowRight pas man"></h4></a></li>
			</ul>
		</div>
	</div>
	
	
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>