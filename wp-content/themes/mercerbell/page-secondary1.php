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
<section class="container">
	<div class="row">
		<div class="span2">
			
			<ul id="filters" class="unstyled uppercase">
			  <li><a href="#" data-filter="*"><i class="icon-minus"></i> all</a></li>
			  <li><a href="#" data-filter=".Digital"><i class="icon-minus"></i> digital</a></li>
			  <li><a href="#" data-filter=".Campaign"><i class="icon-minus"></i> campaign</a></li>
			  <li><a href="#" data-filter=".Direct"><i class="icon-minus"></i> direct</a></li>
			</ul>			
		
		</div>
		<div class="span8 txtC mvl">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h5 class="uppercase lsm fwNormal">Work</h5>
		</div>
	</div><!-- close row -->

	<!-- isotope rows -->
	<div id="isotope" class="row">
	
		<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$queryHome = new WP_Query(array(
	    	'posts_per_page' => -1,
	    	'order'					 => 'ASC',
	    	'orderby'				 => 'date',
	    	'category_name'  => 'work',
	    	'post_status'		 => 'publish'
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
				<div class="<?php echo $value . ' '; foreach($catArray as $d){ echo $d['name'] ." "; };  ?> bg-color1 transition element mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), $value); ?>
	        <img src="<?php echo $Imageurl[0]; ?>" />
					<div class="pam">
						<h5 class="uppercase fwNormal uppercase man"><?php the_title(); ?></h5>
						<hr>
						<p class="fss man"><?php foreach($catArray as $d){ echo $d['name'] . ", "; }; ?></p>
					</div>
				</div>
			</a>
			<?
			endwhile;
		?>
	</div>
	
	<div class="row">
		<div class="span12 txtC mvl">
			<h5 class="fwNormal uppercase">More work</h5>
			<i class="icon-angle-up"></i> <i class="icon-angle-down"></i> <i class="icon-angle-right"></i>
		</div>
	</div>
	
	
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>