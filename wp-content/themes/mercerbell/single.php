<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php
$post_categories = wp_get_post_categories( get_the_id() );
$catArray = array();
	
foreach($post_categories as $c){
	$cat = get_category( $c );
	$catArray[] = array( 'name' => $cat->name );
}
?>
<div class="container">
	<div class="row">
		<div class="span12">
			<?php $singleImage = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
			<img src="<?php echo $singleImage[0]; ?>" />
		</div>
	</div>
	
	<div class="row mtl">
		<div class="span6 mvm">
			<h4 class="uppercase fwNormal uppercase man df-regular mbm"><?php the_title(); ?> / <span class="fss man df-light capitalize"><?php foreach($catArray as $d){ echo $d['name'] . ", "; }; ?></span></h4>
			<ul class="unstyled inline">
				<li><img src="<?php echo get_stylesheet_directory_uri() ?>/img/awards/aimia.png" alt="aimia" width="53" height="38" /></li>
				<li><img src="<?php echo get_stylesheet_directory_uri() ?>/img/awards/adma.png" alt="adma" width="50" height="14" /></li>
				<li><img src="<?php echo get_stylesheet_directory_uri() ?>/img/awards/one.png" alt="one" width="36" height="29" /></li>
				<li><img src="<?php echo get_stylesheet_directory_uri() ?>/img/awards/webby.png" alt="webby" width="51" height="29" /></li>
			</ul>
			

		</div>
		<div class="span6 mvm">
			<?php the_content(); ?>
			<p class="uppercase fss">
				<a href="<?php print $_SERVER['HTTP_REFERER'];?>" target="_parent">Back <i class="icon-angle-right txtM"></i></a>
				<span class="pull-right">Share: <i class="icon-facebook txtT mlt"></i> <i class="icon-twitter mrt txtT"></i><i class="icon-pinterest mrt txtT"></i><i class="icon-instagram txtT"></i></span>
			</p>
		</div>
	</div>
	
	<div class="row">
		<div class="span12 txtC btt pvl">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h5 class="uppercase lsm fwNormal">Work</h5>
		</div>
	</div>
	
	<!-- Related posts -->
	<div class="row">
	<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$queryHome = new WP_Query(array(
				'post__not_in'	 => array(get_the_id()), //exclude current post  
	    	'posts_per_page' => 3, // only 3 related posts
	    	'order'					 => 'DESC', //sort ascending
	    	'orderby'				 => 'date', //sort via date
	    	'category_name'  => 'work', //find posts related to this cat 
	    	'post_status'		 => 'publish' //only published
	       ) 
	    );

			while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
			<!-- 	Get Value of advanced custom fields -->
			<?php $value = get_field('image_size'); ?>
			<!-- Get all categories associated with post and adds them to an array so we can use then later -->
			<?php
				$post_categories = wp_get_post_categories( get_the_id() );
				$catArray = array();
					
				foreach($post_categories as $c){
					$cat = get_category( $c );
					$catArray[] = array( 'name' => $cat->name );
				}
			?>
			<!-- add array classes so they can be filtered in menu -->
			<a href="<?php the_permalink(); ?>" target="_parent">
				<div class="span4 bg-color1 transition element mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	        <img src="<?php echo $Imageurl[0]; ?>" />
					<div class="pam">
						<h5 class="uppercase df-regular uppercase man"><?php the_title(); ?></h5>
						<hr>
						<p class="fss man"><?php foreach($catArray as $d){ echo $d['name'] . ", "; }; ?></p>
					</div>
				</div>
			</a>
			<?
			endwhile;
		?>
	
	</div>
	
	
	
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>