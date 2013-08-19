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
			<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'people-large' ); ?>
	    <img src="<?php echo $Imageurl[0]; ?>" />
	    <h4 class="uppercase df-regular uppercase mtm"><?php the_title(); ?></h4>
			<hr>
			<p class="fsl"><?php echo the_content(); ?></p>
			<hr class="mbm mtl">
			<?php the_field('footer_information'); ?>
			<span class="pull-right fsm">Follow: 
					<a class="noUnderline" href="http://www.facebook.com/share.php?u=<?php print(urlencode( the_permalink() )) ?>&title=<?php print(urlencode(the_title())); ?>" target="_blank"><i class="txtT mlt prt icon-facebook"></i></a>
					<a class="noUnderline" href="http://twitter.com/home?status=<?php  print(urlencode( the_permalink() )) ?>+<?php print(urlencode(the_title())); ?>" target="_blank"><i class="txtT icon-twitter mrt"></i></a>
					<a class="noUnderline" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php print($Imageurl[0])  ?>&url=<?php  print(urlencode( the_permalink() )) ?>&is_video=false&description=<?php print(urlencode(the_title())); ?>
" target="_blank"><i class=" txtT icon-pinterest mrt"></i></a>

				</span>
		</div>
			
			<div class="span12 txtC mvl">
				<a class="noUnderline" href="<?php echo get_home_url() ?>/work" target="_parent"><h4 class="df-regular man uppercase">Load More</h4></a>
				<ul class="unstyled inline">
					<li class="pan"><a class="noUnderline scroll block transition arrowBorder brah" href="#top"><h4 class="ico-arrowUp pas man"></h4></a></li>
					<li class="pan"><a class="noUnderline block transition arrowBorder brah" href="<?php $nextPost=get_next_post(); echo $nextPost->guid; ?>"><h4 class="ico-arrowRight pas man"></h4></a></li>
					
				</ul>
			</div>
			
	</div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>