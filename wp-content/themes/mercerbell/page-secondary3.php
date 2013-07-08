<?php
/**
 *Template Name: Secondary 3
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
<div class="bg-color5">
<section class="container" id="top">
	<div class="row">
		<div class="span12 txtC mvl">
			<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h5 class="uppercase lsm df-regular"><?php the_title(); ?></h5>
		</div>
	</div><!-- close row -->

	<!-- rows -->
	<div class="row transition color6">
		
		
		<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$query = new WP_Query(array(
	    	'posts_per_page' => -1,
	    	'order'					 => 'ASC',
	    	'orderby'				 => 'date',
	    	'post_type'  => 'jobs',
	    	'post_status'		 => 'publish'
	       ) 
	    );
			$colCount = 1;
			while ( $query->have_posts() ) : $query->the_post();
			# Object streaming appends content to a variable at the end. these are the 3 columns we need to start content inside of
			ob_start();
			?>
				<div class="transition mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large');  ?>
	        <a href="<?php the_permalink(); ?>" target="_parent"><img src="<?php echo $Imageurl[0]; ?>" /></a>
					<h4 class="uppercase df-regular mtm fsl color6"><?php the_title(); ?></h4>
					<hr class="bc-color6">
					<p class="man capitalize"><?php echo mercerBellTerms('jobs'); #outputs categories ?><a href="#" class="null toggle color6"><i class="icon-angle-down pull-right"></i></a></p>
					<div class="hide mvm">
						<p><?php $content = get_the_content(); print $content; ?></p>
						<p class="mtm">Share: 
						
						<a href="http://www.facebook.com/share.php?u=<?php print(urlencode( the_permalink() )) ?>&title=<?php print(urlencode(the_title())); ?>" target="_blank"><i class=" mlt prt icon-facebook color6"></i></a>
						<a href="http://twitter.com/home?status=<?php  print(urlencode( the_permalink() )) ?>+<?php print(urlencode(the_title())); ?>" target="_blank"><i class="icon-twitter mrt color6"></i></a>
						<a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php print($Imageurl[0])  ?>&url=<?php  print(urlencode( the_permalink() )) ?>&is_video=false&description=<?php print(urlencode(the_title())); ?>
" target="_blank"><i class="icon-pinterest mrt color6"></i></a>
						<a class="color6" href="<?php the_permalink(); ?>" target="_parent" ><span class="pull-right">Apply Now</span></a>
						</p>
					</div>
					<hr class="bc-color6">
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
		
	</div>
	
	<div class="row color6">
		<div class="span12 txtC mvl">
			<h5 class="df-regular man uppercase color6">Back to top</h5>
					<ul class="unstyled inline">
						<li class="pan"><a class="scroll block transition arrowBorder brah color6" href="#top"><h4 class="ico-arrowUp pas man color6"></h4></a></li>
						<li class="pan"><a class="block transition arrowBorder brah color6" href="<?php echo getNextPrevious(get_queried_object_id()) ?>"><h4 class="ico-arrowRight pas man color6"></h4></a></li>
				</ul>
		</div>
	</div>
	
	
</section>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>