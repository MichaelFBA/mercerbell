<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="bg-color3" id="about">
		<div class="container">	
				<!-- About us -->
			<section class="row pbh">
				<!--	Logo -->
				<div class="span12 txtC mvl">
					<img class="rotate"  src="<?php echo get_stylesheet_directory_uri(); ?>/img/searchIcon@2x.png" alt="workIcon@2x" width="60" height="59" />
					<h4 class="uppercase lsm df-regular color1 mtm">Sorry Page not found</h4>
				</div>
				<div class="span8 offset2 txtC">
					<h2 class="df-light fwNormal color1">Are you looking for something in particular? Search below</h2>
					<form class=" mtm" action="<?php echo home_url( '/' ); ?>" method="get">
					  <input type="text" class="df-light uppercase fsh pam" placeholder="Search" name="s" id="search" value="<?php echo trim( get_search_query() ); ?>"> 
					</form>
					
				</div>
			</section>
		</div>
	</div>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>