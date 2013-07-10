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
				  	
					 <div class="flashContainer">
					 	<div class="progressBar"><div class="elapsed"></div></div>
					 	<div class="controlDiv play"></div>
					 	<div id="player"></div>
					 </div>
					 
					  <script>
			      // 2. This code loads the IFrame Player API code asynchronously.
			      var tag = document.createElement('script');
			
			      tag.src = "https://www.youtube.com/iframe_api";
			      var firstScriptTag = document.getElementsByTagName('script')[0];
			      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
			
			      // 3. This function creates an <iframe> (and YouTube player)
			      //    after the API code downloads.
			      var player;
			      function onYouTubeIframeAPIReady() {
			        player = new YT.Player('player', {
			          height: '658',
			          width: '1170',
			          videoId: '<?php the_field('mb_youtube') ?>',
			          playerVars: { 'autoplay': 0, 'controls': 0,'showinfo':0,'modestbranding':1,'origin':'http://mercerbell.com.au/' },
			          events: {
			            'onReady': onPlayerReady,
			            'onStateChange': onPlayerStateChange
			          }
			        });
			      }
			
			      // 4. The API will call this function when the video player is ready.
			      function onPlayerReady(event) {
			        //event.target.playVideo();
			      }
			      
			      //Play pause buttons
			      $('.controlDiv').on('click',function(){
							if( $(this).hasClass('play') ){
								
								// If the video is not currently playing, start it:
								$(this).removeClass('play replay').addClass('pause');
								$(this).parent().addClass('playing');
			     		  player.playVideo();
								
								interval = window.setInterval(function(){
										$('.elapsed').width( player.getCurrentTime()/player.getDuration() * 100 +'%' )
										
									},1000);
								}else {
								
								// If the video is currently playing, pause it:
								$(this).removeClass('pause').addClass('play');
								$(this).parent().removeClass('playing');
								player.pauseVideo();
								
								window.clearInterval(interval);
								}
								
							})
							
					//Seek buttons
					$('.progressBar').on('click',function(e){
						$('.controlDiv').removeClass('play replay').addClass('pause');
						$('.controlDiv').parent().addClass('playing');
						
						var ratio = (e.pageX-$(this).offset().left)/$(this).outerWidth();
						
						$('.elapsed').width(ratio*100+'%');
						player.seekTo(Math.round(player.getDuration()*ratio), true);
						player.playVideo();
					})


			      function onPlayerStateChange(event) {

						};
						
			      
			      
			      
			      
			    </script>

				  </div>
				  <?php endif; ?>
				  
				  <?php
				  $rows = get_field('mbwork_items');
					$count = 0;
					if($rows):
						foreach($rows as $row){ ?>
							<div class="item <?php if($first == true){echo 'active';$first = false;} ?>">
								<?php echo wp_get_attachment_image( $row['mb_single_images'], 'work-large' ); ?>
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
	
	<div class="row mtl">
		<div class="span6 mvl">
			<h4 class="uppercase fwNormal uppercase man df-regular mbm"><?php the_title(); ?> / <span class="fss man df-light uppercase"><?php echo mercerBellTerms(strtolower(get_post_type( get_the_id() ) ) ); #outputs categories ?></span></h4>
			
			<?php #Repeater field to echo out a list of awards if any
			$rows = get_field('mb_awards');
			if($rows): ?>
				<ul class="unstyled inline"> <?php
				foreach($rows as $row){ ?>
					<li><img src="<?php echo $row['mb_award_images'] ?>" alt="awards"/></li>
				<?php } ?>
				</ul>
			<?php endif; ?>
			
			

		</div>
		<div class="span6 mbm">
			<?php the_content(); ?>
			<p class="uppercase fss">
				<a href="<?php print $_SERVER['HTTP_REFERER'];?>" target="_parent">Back <i class="icon-angle-right txtM"></i></a>
				<span class="pull-right">Share: 
					<a href="http://www.facebook.com/share.php?u=<?php print(urlencode( the_permalink() )) ?>&title=<?php print(urlencode(the_title())); ?>" target="_blank"><i class=" mlt prt icon-facebook color6"></i></a>
					<a href="http://twitter.com/home?status=<?php  print(urlencode( the_permalink() )) ?>+<?php print(urlencode(the_title())); ?>" target="_blank"><i class="icon-twitter mrt color6"></i></a>
					<a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php print($Imageurl[0])  ?>&url=<?php  print(urlencode( the_permalink() )) ?>&is_video=false&description=<?php print(urlencode(the_title())); ?>
" target="_blank"><i class="icon-pinterest mrt color6"></i></a>

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
	<!-- 	Use WP-Query as the main loop, its better than get-posts etc -->
		<?php
			$queryHome = new WP_Query(array(
				'post__not_in'	 => array(get_the_id()), //exclude current post  
	    	'posts_per_page' => 3, // only 3 related posts
	    	'order'					 => 'DESC', //sort ascending
	    	'orderby'				 => 'date', //sort via date
	    	'post_type'  => 'work', //find posts related to this cat 
	    	'post_status'		 => 'publish' //only published
	       ) 
	    );

			while ( $queryHome->have_posts() ) : $queryHome->the_post();
			?>
			<a href="<?php the_permalink(); ?>" target="_parent">
				<div class="span4 bg-color1 transition element mbm">
					<?php $Imageurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-large'); ?>
	        <span class="patternOverlay block"><img class="transition" src="<?php echo $Imageurl[0]; ?>" /></span>
					<div class="pam">
						<h4 class="uppercase df-regular uppercase man"><?php the_title(); ?></h4>
						<hr>
						<p class="fss man uppercase"><?php echo mercerBellTerms('work'); #outputs categories ?></p>
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