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
			$searchQuery = new WP_Query(array(
	    	'posts_per_page' => -1,
	    	'post_type'			 => array('work','news','jobs','people'),
	    	'order'					 => 'DESC',
	    	'orderby'				 => 'date',
	    	'post_status'		 => 'publish',
	    	's'							 => get_search_query()
	       ) 
	    );
			$count = 0;
			if ( $searchQuery->have_posts() ):
			while ( $searchQuery->have_posts() ) : $searchQuery->the_post();
			?>

			<!-- add array classes so they can be filtered in menu -->
			<a href="<?php the_permalink(); ?>" target="_parent">
				<div class="bg-color1 transition element mbm span4">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'span4' ); ?>
	        <span class="patternOverlay block"><img class="transition" src="<?php echo $Imageurl[0]; ?>" /></span>
					<div class="pam">
						<h4 class="uppercase df-regular uppercase man"><?php the_title(); ?></h4>
						<hr>
						<p class="fss man uppercase"><?php echo mercerBellTerms( strtolower(get_post_type( get_the_id() ) ) ); #outputs categories ?></p>
					</div>
				</div>
			</a>
			<?
			$count++;
			if($count >= 7){$count = 0;}
			endwhile;
		?>
	<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
			</div>
		</div>
	</div>
	<?php endif; ?>
<!--

<?php if ( have_posts() ): ?>
<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_content(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
<?php endif; ?>
-->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>