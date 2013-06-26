<?php
/**
 *Template Name: Primary
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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="primaryCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#primaryCarousel" data-slide-to="0" class=""></li>
            <li data-target="#primaryCarousel" data-slide-to="1" class="active"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/demo/Bridge-Nature.jpg" alt="">
              <div class="primary-caption absolute">
                <p class="pvm">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </div>
            </div>
            <div class="item active">
              <img src="http://as1.wdpromedia.com/media/abd/europe/3-night-barcelona-vacations/474064785_Montserrat_1260x540.jpg" alt="">
              <div class="primary-caption absolute bbt bcDark">
                <p class="pvm">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#primaryCarousel" data-slide="prev">‹</a>
          <a class="right carousel-control" href="#primaryCarousel" data-slide="next">›</a>
        </div>
			</div>
		</div>
	</div>


	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>