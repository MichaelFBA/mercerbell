<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<?php
			$jobsID = get_ID_by_slug('jobs'); # need to exclude jobs page
			$searchQuery = new WP_Query(array(
	    	'posts_per_page' => -1,
	    	'post_type'			 => array('work','news','jobs','people','page'),
	    	'order'					 => 'DESC',
	    	'post_status'		 => 'publish',
	    	's'							 => get_search_query(),
	    	'cat'						 => -14,
	    	'post__not_in'	 => array('-'.$jobsID )
	       ) 
	    );
			$colCount = 1;
			$news = true;
			$jobs = true;
			$people = true;
			$work = true;
			$pageVar = true;
/* 			print_r($searchQuery); */
			if ( $searchQuery->have_posts() ): ?>
			
			<div class="container">
				<div class="row">
			<?php 
			while ( $searchQuery->have_posts() ) : $searchQuery->the_post();
			$postType = get_post_type( get_the_id() );
			
			#detect post type so we can add header
			if($postType == 'news' && $news == true){ ?>
				<div class="span12 mvl txtC">
				<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/pressIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h4 class="uppercase lsm df-regular color4 mtm">Hot off the press</h4>
			</div>
			<?php	$news =false;
			}elseif($postType == 'jobs' && $jobs == true){ ?>
				<div class="span12 txtC mvl">
					<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/contactIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm df-regular color6">Join Us</h4>
				</div>
			<?php	$jobs =false;
			}elseif($postType == 'people' && $people == true){ ?>
				<div class="span12 txtC mvl">
				<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bellIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h4 class="uppercase lsm df-regular">About</h4>
			</div>
			<?php	$people =false;
			}elseif($postType == 'work' && $work == true){ ?>
				<div class="span12 txtC mvl">
				<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
				<h4 class="uppercase lsm df-regular mtm">Work</h4>
			</div>
			<?php	$work =false;
			}elseif($postType == 'page' && $pageVar == true){ ?>
				<div class="span12 txtC mvl">
					<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/contactIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm df-regular color6 mtm">Pages</h4>
				</div>
			<?php	$pageVar = false;
			}
			
			
			?>

			<!-- add array classes so they can be filtered in menu -->
			<a href="<?php the_permalink(); ?>" target="_parent">
				<div class="bg-color1 transition element mbm span4">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'span4' ); ?>
	        <span class="patternOverlay block"><img class="transition" src="<?php echo $Imageurl[0]; ?>" /></span>
					<div class="pam">
						<h4 class="uppercase df-regular uppercase man"><?php the_title(); ?></h4>
					</div>
				</div>
			</a>
		
		<?php
			endwhile;
		?>
		
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
</div>
		
	<?php else: ?>
	<div class="bg-color3" id="about">
		<div class="container">	
				<!-- About us -->
			<section class="row pbh">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img class="rotate"  src="<?php echo get_stylesheet_directory_uri(); ?>/img/searchIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm df-regular color1 mtm"><?php echo get_search_query(); ?> - Not found </h4>
				</div>
				<div class="span8 offset2 txtC">
					<h2 class="df-light fwNormal color1">Hint: Try searching for a keyword like digital or tv</h2>
					<form class=" mtm" action="<?php echo home_url( '/' ); ?>" method="get">
					  <input type="text" class="df-light uppercase fsh pam" placeholder="Search" name="s" id="search" value="<?php echo trim( get_search_query() ); ?>"> 
					</form>
					
				</div>
			</section>
		</div>
	</div>
	<?php endif; ?>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>