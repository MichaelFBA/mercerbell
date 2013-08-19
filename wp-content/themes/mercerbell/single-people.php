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

<div class="container" id="top">
	<div class="row">
		<div class="span6 offset3">
			<div class="cycle-slideshow">
				<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'people-large' ); ?>
				<img src="<?php echo $Imageurl[0]; ?>" />
			<?php
					$attachments = get_posts( array(
						'post_type' => 'attachment',
						'posts_per_page' => -1,
						'post_parent' => $post->ID,
						'exclude'     => get_post_thumbnail_id()
					) );
			
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							//print_r($attachment);
			        	$attr = array(
			        		 	'src' => $attachment->guid,
										'class'	=> "",
										'alt'	=> $attachment->post_title,
										'title'	=> $attachment->post_title,
										);
								the_post_thumbnail( 'people-large', $attr );
						}
						
					}
			?>
		
			
			</div>
	    <h4 class="uppercase df-regular uppercase mtm"><?php the_title(); ?></h4>
			<hr>
			<p class="fss man mbm uppercase"><?php the_field('position_held');?></p>
			<p class="fsl"><?php echo the_content(); ?></p>
			<hr class="mbm mtl">
			<?php the_field('footer_information'); ?>
			<p class="pull-right">Follow: 
				<?php if( get_field('facebook') ){ ?><a href="<?php the_field('facebook'); ?>" target="_blank"><i class=" mlt prt icon-facebook"></i></a><?php } ?>
				<?php if( get_field('twitter') ){ ?><a href="<?php the_field('twitter'); ?>" target="_blank"><i class="icon-twitter mrt"></i></a><?php } ?>
				<?php if( get_field('pinterest') ){ ?><a href="<?php the_field('pinterest'); ?>" target="_blank"><i class="icon-pinterest mrt"></i></a><?php } ?>
				<?php if( get_field('instagram') ){ ?><a href="<?php the_field('instagram'); ?>" target="_blank"><i class="icon-instagram"></i></a>	<?php } ?>
			</p>
		</div>
			
			<div class="span12 txtC mvl">
				<a href="<?php echo get_home_url() ?>/work" target="_parent"><h4 class="df-regular man uppercase">Load More</h4></a>
				<ul class="unstyled inline">
					<li class="pan"><a class="scroll block transition arrowBorder brah" href="#top"><h4 class="ico-arrowUp pas man"></h4></a></li>
					<li class="pan"><a class="block transition arrowBorder brah" href="<?php $nextPost=get_next_post(); echo $nextPost->guid; ?>"><h4 class="ico-arrowRight pas man"></h4></a></li>
					
				</ul>
			</div>
			
	</div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>