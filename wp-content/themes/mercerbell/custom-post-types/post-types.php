<?php

	/**
	 * Insert into Functions 
	 *
	 * Used to create the Wordpress backend functionality within the insights section
	 * 
	 * @author 	False Behaving Animals - www.falsebehavinganimals.com
	 * @date	2012
	 */

	
	/**
	 * Register Multiple Post Types
	 *
	 * @param 	none
	 * @return 	void
	 * @author 	Michael Bell - False Behaving Animals - michael@falsebehavinganimals.com
	 * @date	2013
	 **/





	register_post_type( 'work',
		array(
			'labels' => array(
				'name' => __( 'Work' ),
				'singular_name' => __( 'Item' ),
				'add_new' => __( 'New Item' ),
				'all_items' => __( 'All Items' ),
				'add_new_item' => __( 'Add New Item' ),
				'edit_item' => __( 'Edit Item' ),
				'new_item' => __( 'New Item' ),
				'view_item' => __( 'View Now (development only)' )
			),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array("slug" => "work"),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
	
	register_post_type( 'news',
		array(
			'labels' => array(
				'name' => __( 'News' ),
				'singular_name' => __( 'Item' ),
				'add_new' => __( 'New Item' ),
				'all_items' => __( 'All Items' ),
				'add_new_item' => __( 'Add New Item' ),
				'edit_item' => __( 'Edit Item' ),
				'new_item' => __( 'New Item' ),
				'view_item' => __( 'View Now (development only)' )
			),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array("slug" => "news"),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
	
	register_post_type( 'jobs',
		array(
			'labels' => array(
				'name' => __( 'Jobs' ),
				'singular_name' => __( 'Item' ),
				'add_new' => __( 'New Item' ),
				'all_items' => __( 'All Items' ),
				'add_new_item' => __( 'Add New Item' ),
				'edit_item' => __( 'Edit Item' ),
				'new_item' => __( 'New Item' ),
				'view_item' => __( 'View Now (development only)' )
			),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array("slug" => "jobs"),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
	
	register_post_type( 'people',
		array(
			'labels' => array(
				'name' => __( 'People' ),
				'singular_name' => __( 'Item' ),
				'add_new' => __( 'New Item' ),
				'all_items' => __( 'All Items' ),
				'add_new_item' => __( 'Add New Item' ),
				'edit_item' => __( 'Edit Item' ),
				'new_item' => __( 'New Item' ),
				'view_item' => __( 'View Now (development only)' )
			),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array("slug" => "people"),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
	
	function custom_taxonomy() {
	 register_taxonomy(
	  'work',
	  'work',
	  array(
	      'hierarchical' => true,
	      'label' => 'Work Categories',
	      'query_var' => true,
	      'rewrite' => array('slug' => 'work')
	  )
		);
		
		register_taxonomy(
	  'jobs',
	  'jobs',
	  array(
	      'hierarchical' => true,
	      'label' => 'Job Categories',
	      'query_var' => true,
	      'rewrite' => array('slug' => 'jobs')
	  )
		);
		
		register_taxonomy(
	  'news',
	  'news',
	  array(
	      'hierarchical' => true,
	      'label' => 'News Categories',
	      'query_var' => true,
	      'rewrite' => array('slug' => 'news')
	  )
		);
		
		register_taxonomy(
	  'people',
	  'people',
	  array(
	      'hierarchical' => true,
	      'label' => 'People Categories',
	      'query_var' => true,
	      'rewrite' => array('slug' => 'people')
	  )
		);
		
   }
    
    add_action( 'init', 'custom_taxonomy' );



	
	add_action('init', 'add_default_boxes');
 
  function add_default_boxes() {
      register_taxonomy_for_object_type('category', 'directory');
  }
  
 

  
	
?>