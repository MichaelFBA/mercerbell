<?php
/**
 * Starkers functions and definitions
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package 		WordPress
 * @subpackage 	Starkers
 * @since 			False Behaving Animals 1.0
 */

/* ========================================================================================================================

Required external files

======================================================================================================================== */

require_once('external/starkers-utilities.php');

/* ========================================================================================================================

Theme specific settings

Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

======================================================================================================================== */
//Add post thumbnails
add_theme_support('post-thumbnails');
//Add menu Support
add_theme_support('menus');
//Register Sidebar Widget
/*
register_sidebar(array(
  'name' => 'Contact Left',
  'before_widget' => '',
  'after_widget' => ''
));
*/


//Add Custom image size
add_image_size('thumbnail', 50, 50, false);
add_image_size('square-large', 398, 398, true);
add_image_size('people-large', 612, 530, true);
add_image_size('large', 1254, 544, true);

//Image sizes for work page
add_image_size('span4', 398, 300, true);
add_image_size('span5', 505, 300, true);
add_image_size('span7', 719, 300, true);
add_image_size('span8', 826, 300, true);

/* ========================================================================================================================

Actions and Filters

======================================================================================================================== */

add_action('wp_enqueue_scripts', 'starkers_script_enqueuer');

add_filter('body_class', array(
  'Starkers_Utilities',
  'add_slug_to_body_class'
));

/* ========================================================================================================================

Custom Post Types - include custom post types and taxonimies here e.g.

======================================================================================================================== */

require_once('custom-post-types/post-types.php');

/* ========================================================================================================================

Scripts

======================================================================================================================== */

function starkers_script_enqueuer()
{
  /* Javascripts */
  wp_deregister_script('jquery');
  wp_register_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', '', '', false);
  wp_enqueue_script('jQuery');
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', '', '', true);
  wp_enqueue_script('site');
  wp_register_script('bootstrapJS', get_template_directory_uri() . '/js/bootstrap.js', '', '', true);
  wp_enqueue_script('bootstrapJS');
  wp_register_script('form', get_template_directory_uri() . '/js/jquery.form.js', '', '', true);
  wp_enqueue_script('form');
  wp_register_script( 'contactForm', get_template_directory_uri().'/js/scripts.js','','', true );
	wp_enqueue_script( 'contactForm' );
	wp_register_script( 'easing', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js','','', true );
	wp_enqueue_script( 'easing' );
	wp_register_script( 'jsgestures', get_template_directory_uri().'/js/jgestures.min.js','','', true );
	wp_enqueue_script( 'jsgestures' );
	wp_register_script( 'youtube', get_template_directory_uri().'/js/jQuery.tubeplayer.min.js','','', true );
	wp_enqueue_script( 'youtube' );

  
  /* Style Sheets */
  wp_register_style('reset', get_template_directory_uri() . '/css/reset.css', '', '', 'screen');
  wp_enqueue_style('reset');
  wp_register_style('screen', get_template_directory_uri() . '/style.css', '', '', 'screen');
  wp_enqueue_style('screen');
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '', '', 'screen');
  wp_enqueue_style('bootstrap');
  wp_register_style('responsive', get_template_directory_uri() . '/css/bootstrap-responsive.css', '', '', 'screen');
  wp_enqueue_style('responsive');  
  wp_register_style('oo', get_template_directory_uri() . '/css/oo.css', '', '', 'screen');
  wp_enqueue_style('oo');
  wp_register_style('css', get_template_directory_uri() . '/css/site.css', '', '', 'screen');
  wp_enqueue_style('css');
  wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css', '', '', 'screen');
  wp_enqueue_style('fonts');

}


/* ========================================================================================================================

Custom Excerpt Length

======================================================================================================================== */
/**
 * Custom Excerpt length
 * @parameters - String, number of words
 * @return string
 * @author Michael Bell
 */


//Custom Excerpt Length
function string_excerpt_length($passedSentence, $wordLength)
{
  // strip tags to avoid breaking any html
  $string = strip_tags($passedSentence);
  
  if (strlen($string) > $wordLength) {
    
    // truncate string
    $stringCut = substr($string, 0, $wordLength);
    
    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
  }
  return $string;
}


/* ========================================================================================================================

Ajax

======================================================================================================================== */

// AJAX POSTS
add_action('wp_ajax_nopriv_do_ajax', 'our_ajax_function');
add_action('wp_ajax_do_ajax', 'our_ajax_function');
function our_ajax_function()
{
  
  switch ($_REQUEST['fn']) {
    case 'get_more_items':
      $output = ajax_get_more_items($_REQUEST['posttype'], $_REQUEST['trackOffset'], $_REQUEST['term']);
      break;
    case 'get_more_jobs':
      $output = ajax_get_more_jobs($_REQUEST['posttype'], $_REQUEST['term']);
      break;
    default:
      $output = 'No function specified, check your jQuery.ajax() call';
      break;
      
  }
  
  // at this point, $output contains some sort of valuable data!
  // Now, convert $output to JSON and echo it to the browser 
  // That way, we can recapture it with jQuery and run our success function
  
  $output = json_encode($output);
  if (is_array($output)) {
    print_r($output);
  } else {
    echo $output;
  }
  die;
}

// AJAX FUNCTIONS
function ajax_get_more_jobs($postType,$term)
{
  $args = array(
    'posts_per_page' => -1,
  	'post_type'			 => $postType,
  	'order'					 => 'DESC',
  	'orderby'				 => 'date',
  	'post_status'		 => 'publish',
  	'taxonomy' 			 => $postType,
		'term' 					 => $term
  );
  
  $arr = array();
  
  $loop = new WP_Query($args);
  
  while ($loop->have_posts()):
    $loop->the_post(); {
    $queryAttachments   = array();
    $entry              = array();
    $entry['id']        = get_the_id();
    //$entry['category']  = get_the_category();
    $entry['link']      = get_permalink();
    $entry['title']     = get_the_title();
    $entry['content']     = get_the_content();
    $entry['thumbnail']['span4'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span4');
    $entry['thumbnail']['span5'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span5');
    $entry['thumbnail']['span7'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span7');
    $entry['thumbnail']['span8'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span8');
    $entry['thumbnail']['squarelarge'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'square-large');
    $entry['terms']			= wp_get_post_terms( get_the_id() , $postType , array('fields'=>'names' ) );
    
    $attachments = get_posts(array(
      'post_type' => 'attachment',
      'posts_per_page' => -1,
      'post_parent' => get_the_id()
    ));
    //if ($attachments) {
    	$count = 0;
      foreach ($attachments as $attachment) {
      	
      	$queryAttachments['span4'] = wp_get_attachment_image_src($attachment->ID, 'span4');
        $queryAttachments['span5'] = wp_get_attachment_image_src($attachment->ID, 'span5');
        $queryAttachments['span7'] = wp_get_attachment_image_src($attachment->ID, 'span7');
        $queryAttachments['span8'] = wp_get_attachment_image_src($attachment->ID, 'span8');
        $imageAttachments[$count] = $queryAttachments;
        unset($queryAttachments);
        $count++;
      }
      $entry['attachments'] = $imageAttachments;
    //}
    
    $entry['acf'] = get_fields();
    $arr[]        = $entry;
  }
  endwhile;
  return $arr;
  
}


function ajax_get_more_items($postType, $trackOffset, $term)
{
  $args = array(
    'offset' 				 => $trackOffset,
    'posts_per_page' => 7,
  	'post_type'			 => $postType,
  	'order'					 => 'DESC',
  	'orderby'				 => 'date',
  	'post_status'		 => 'publish',
  	'taxonomy' 			 => $postType,
		'term' 					 => $term
  );
  
  $arr = array();
  
  $loop = new WP_Query($args);
  
  while ($loop->have_posts()):
    $loop->the_post(); {
    $queryAttachments   = array();
    $entry              = array();
    $entry['id']        = get_the_id();
    //$entry['category']  = get_the_category();
    $entry['link']      = get_permalink();
    $entry['title']     = get_the_title();
    $entry['thumbnail']['span4'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span4');
    $entry['thumbnail']['span5'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span5');
    $entry['thumbnail']['span7'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span7');
    $entry['thumbnail']['span8'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'span8');
    $entry['terms']			= wp_get_post_terms( get_the_id() , $postType , array('fields'=>'names' ) );
    
    $attachments = get_posts(array(
      'post_type' => 'attachment',
      'posts_per_page' => -1,
      'post_parent' => get_the_id()
    ));
    //if ($attachments) {
    	$count = 0;
      foreach ($attachments as $attachment) {
      	
      	$queryAttachments['span4'] = wp_get_attachment_image_src($attachment->ID, 'span4');
        $queryAttachments['span5'] = wp_get_attachment_image_src($attachment->ID, 'span5');
        $queryAttachments['span7'] = wp_get_attachment_image_src($attachment->ID, 'span7');
        $queryAttachments['span8'] = wp_get_attachment_image_src($attachment->ID, 'span8');
        $imageAttachments[$count] = $queryAttachments;
        unset($queryAttachments);
        $count++;
      }
      $entry['attachments'] = $imageAttachments;
    //}
    
    $entry['acf'] = get_fields();
    $arr[]        = $entry;
  }
  endwhile;
  return $arr;
  
}

/* ========================================================================================================================

Pagination Links (Bootstap)	

======================================================================================================================== */

function bootstrap_pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2) + 1;
  
  global $paged;
  if (empty($paged))
    $paged = 1;
  
  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }
  
  if (1 != $pages) {
    echo "<div class='pagination pagination-centered'><ul>";
    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
    if ($paged > 1 && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
    
    for ($i = 1; $i <= $pages; $i++) {
      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        echo ($paged == $i) ? "<li class='active'><span class='current'>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
      }
    }
    
    if ($paged < $pages && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
    if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
    echo "</ul></div>\n";
  }
}

/* ========================================================================================================================

Extras

======================================================================================================================== */

// split content at the more tag and return an array
function split_content() {
	global $more;
	$more = true;
	$content = preg_split('/<span id="more-\d+"><\/span>/i', get_the_content('more'));
	for($c = 0, $csize = count($content); $c < $csize; $c++) {
		$content[$c] = apply_filters('the_content', $content[$c]);
	}
	return $content;
}

//
// Get next and previous page link for bottom of page
function getNextPrevious($id){
	$pagelist = get_pages('sort_column=menu_order&child_of='.get_ID_by_slug('about') );
	$pages = array();
	foreach ($pagelist as $page) {
	   $pages[] += $page->ID;
	}
	$current = array_search($id, $pages);
	$prevID = $pages[$current-1];
	$nextID = $pages[$current+1];

	if(count($pages) == $current + 1){
		$nextID = $pages[0];
		return get_permalink($nextID);
	}
	if (!empty($nextID)) {
		return get_permalink($nextID);
	}
}

//Get the terms / categories assigned to the passed taxonomy
function mercerBellTerms($tax){
	$terms = wp_get_post_terms( get_the_id(), $tax );
	foreach ($terms as $a){
		$output[] = $a->name;
	}
	return implode(', ', $output);
	unset($output);
}


//Clean up empty search
add_filter( 'request', 'my_request_filter' );
function my_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

//Get pageID from slug
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}


?>