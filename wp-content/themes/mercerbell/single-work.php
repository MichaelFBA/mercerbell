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

<div class="container">
	<div class="row">
		<div class="span12">
		
			<div id="workCarousel" class="carousel loose slide">
	      <ol class="carousel-indicators">
	    <?php #Repeater field to echo out a list of awards if any
				$rows = get_field('mbwork_items');
				$first = true;
				$count = 0;
				$youtubeID;
			?>
				<?php if(get_field('mb_youtube')): #Detect YoutubeLink?>
					<li data-target="#workCarousel" data-slide-to="<?php echo $count; $count++; ?>" class="<?php if($first == true){echo 'active'; $first = false;} ?>"></li>
				<?php endif; ?>
				
				<?php # detect work images
				if($rows):
					foreach($rows as $row){ ?>
					<li data-target="#workCarousel" data-slide-to="<?php echo $count; $count++; ?>" class="<?php if($first == true){echo 'active'; $first = false;} ?>"></li>
					<?php } ?>
				<?php endif; ?>
	   
	   
	   
	      </ol>
	      <div class="carousel-inner">
	      <?php $first = true; ?>
	      
	      <?php if(get_field('mb_youtube')): #Detect YoutubeLink?>
				  <div class="item <?php if($first == true){echo 'active';$first = false;} ?>">
				  	<a href="#myModal" role="button" data-toggle="modal">
						  	<div class="controlPlay play"></div>
						  	<span class="hidden-phone"><?php echo wp_get_attachment_image( get_field('youtube_poster_image') ,'large'); $youtubeID = get_field('mb_youtube'); ?></span>	
						  	<span class="hidden-desktop hidden-tablet"><?php echo wp_get_attachment_image( get_field('youtube_poster_image') ,'span5');?></span>
					  </a>
				</div>
				  <?php endif; ?>
				  
				  <?php
				  $rows = get_field('mbwork_items');
					$count = 0;
					if($rows):
						foreach($rows as $row){ ?>
							<div class="item <?php if($first == true){echo 'active';$first = false;} ?>">
								<span class="hidden-phone"><?php echo wp_get_attachment_image( $row['mb_single_images'], 'large' ); ?></span>
								<span class="hidden-desktop hidden-tablet"><?php echo wp_get_attachment_image( $row['mb_single_images'], 'span5' ); ?></span>
							</div>

						<?php } ?>
					<?php endif; ?>
				</div>
	      <!-- Carousel Controls 
	      <a class="left carousel-control" href="#primaryCarousel" data-slide="prev">‹</a>
	      <a class="right carousel-control" href="#primaryCarousel" data-slide="next">›</a> -->
	    </div>
		</div>
	</div>
	
	
	<!-- Modal -->
	<div id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<button type="button" class="close color1 absolute" data-dismiss="modal" aria-hidden="true">&times;</button>
	 <div class="flashContainer ">
	 	<div class="transparent"></div>
	 	<div class="progressBar hidden-phone"><div class="elapsed"></div></div>
	 	<div class="controlDiv play hidden-phone"></div>
	 	<div id="player" data-youtube="<?php echo $youtubeID; ?>"></div>
	 </div>
	</div>
	
	<div class="row mtl">
		<div class="span6 mvl">
			<h4 class="uppercase fwNormal uppercase man df-regular mbm"><?php the_title(); ?> / <span class="fss man df-light uppercase"><?php echo mercerBellTerms(strtolower(get_post_type( get_the_id() ) ) ); #outputs categories ?></span></h4>
			
			<?php #Repeater field to echo out a list of awards if any
			$rows = get_field('mb_awards');
			if($rows): ?>
				<ul class="unstyled inline"> <?php
				foreach($rows as $row){?>
					<?php $Imageurl = wp_get_attachment_image_src($row['mb_award_images'], 'full'); ?>
					<li class="pbs"><img src="<?php echo $Imageurl[0]; ?>" alt="<?php echo get_post( $row['mb_award_images'] )->post_title; ?>" title="<?php echo get_post( $row['mb_award_images'] )->post_title; ?>"/></li>
				<?php } ?>
				</ul>
			<?php endif; ?>
			
			

		</div>
		<div class="span6 mbm">
			<?php the_content(); ?>
			<p class="uppercase fss">
			
			 <?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'people-large' ); ?>
			
				<a href="<?php print $_SERVER['HTTP_REFERER'];?>" target="_parent">Back <i class="icon-angle-right txtM"></i></a>
				<span class="pull-right">Share: 
					<a href="http://www.facebook.com/share.php?u=<?php print(urlencode( the_permalink() )) ?>&title=<?php print(urlencode(the_title())); ?>" target="_blank"><i class="txtT mlt prt icon-facebook color6"></i></a>
					
					<a href="<?php echo "http://twitter.com/intent/tweet?text="; echo urlencode(the_title()); echo "&url="; echo urlencode( the_permalink() );  echo "&hashtags=mercerbell&via=mercerbell"; ?>" target="_blank"><i class="txtT icon-twitter mrt color6"></i></a>
					<a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php print($Imageurl[0])  ?>&url=<?php  print(urlencode( the_permalink() )) ?>&is_video=false&description=<?php print(urlencode(the_title())); ?>
" target="_blank"><i class="fwBold txtT icon-pinterest mrt color6"></i></a>

				</span>
			</p>
		</div>
	</div>
	
	<div class="row">
		<div class="span12 txtC btt pvl">
			<img class="rotate" src="<?php echo get_stylesheet_directory_uri(); ?>/img/workIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
			<h4 class="uppercase lsm df-regular">Work</h4>
		</div>
	</div>
	
	<!-- Related posts -->
	<div class="row">

		<?php 	
			$post_objects = get_field('similar_campaigns');
		 
			if( $post_objects ): ?>
		    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		       <a href="<?php the_permalink(); ?>" target="_parent">
						<div class="span4 bg-color1 transition element mbm">
							
			        <span class="patternOverlay block">
			        	<?php
			        	$attr = array(
										'class'	=> "transition",
										'alt'	=> get_post(get_post_thumbnail_id())->post_title,
										'title'	=> get_post(get_post_thumbnail_id())->post_title,
										);
								?>
								<?php the_post_thumbnail( 'square-large', $attr ); ?>
			        	 
			        </span>
							<div class="pam">
								<h4 class="uppercase df-regular uppercase man"><?php the_title(); ?></h4>
								<hr>
								<p class="fss man uppercase"><?php echo mercerBellTerms('work'); #outputs categories ?></p>
							</div>
						</div>
					</a>
		    <?php endforeach; ?>
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
			
	</div>
	
	
	
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>