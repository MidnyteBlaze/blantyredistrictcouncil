<?php namespace WHITEHALLPLUGIN\Inc;
use WHITEHALLPLUGIN\Inc\Abstracts\Taxonomy;

class Taxonomies extends Taxonomy {

	public static function init() {

		$labels = array(
			'name'              => _x( 'Portfolio Category', 'whitehall' ),
			'singular_name'     => _x( 'Portfolio Category', 'whitehall' ),
			'search_items'      => __( 'Search Category', 'whitehall' ),
			'all_items'         => __( 'All Categories', 'whitehall' ),
			'parent_item'       => __( 'Parent Category', 'whitehall' ),
			'parent_item_colon' => __( 'Parent Category:', 'whitehall' ),
			'edit_item'         => __( 'Edit Category', 'whitehall' ),
			'update_item'       => __( 'Update Category', 'whitehall' ),
			'add_new_item'      => __( 'Add New Category', 'whitehall' ),
			'new_item_name'     => __( 'New Category Name', 'whitehall' ),
			'menu_name'         => __( 'Portfolio Category', 'whitehall' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'portfolio_cat' ),
		);
		register_taxonomy( 'portfolio_cat', 'portfolio', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'whitehall' ),
			'singular_name'     => _x( 'Service Category', 'whitehall' ),
			'search_items'      => __( 'Search Category', 'whitehall' ),
			'all_items'         => __( 'All Categories', 'whitehall' ),
			'parent_item'       => __( 'Parent Category', 'whitehall' ),
			'parent_item_colon' => __( 'Parent Category:', 'whitehall' ),
			'edit_item'         => __( 'Edit Category', 'whitehall' ),
			'update_item'       => __( 'Update Category', 'whitehall' ),
			'add_new_item'      => __( 'Add New Category', 'whitehall' ),
			'new_item_name'     => __( 'New Category Name', 'whitehall' ),
			'menu_name'         => __( 'Service Category', 'whitehall' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);
		register_taxonomy( 'service_cat', 'service', $args );
		
		//Departments Taxonomy Start
		$labels = array(
			'name'              => _x( 'Department Category', 'whitehall' ),
			'singular_name'     => _x( 'Department Category', 'whitehall' ),
			'search_items'      => __( 'Search Category', 'whitehall' ),
			'all_items'         => __( 'All Categories', 'whitehall' ),
			'parent_item'       => __( 'Parent Category', 'whitehall' ),
			'parent_item_colon' => __( 'Parent Category:', 'whitehall' ),
			'edit_item'         => __( 'Edit Category', 'whitehall' ),
			'update_item'       => __( 'Update Category', 'whitehall' ),
			'add_new_item'      => __( 'Add New Category', 'whitehall' ),
			'new_item_name'     => __( 'New Category Name', 'whitehall' ),
			'menu_name'         => __( 'Department Category', 'whitehall' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'department_cat' ),
		);
		register_taxonomy( 'department_cat', 'department', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'whitehall' ),
			'singular_name'     => _x( 'Testimonials Category', 'whitehall' ),
			'search_items'      => __( 'Search Category', 'whitehall' ),
			'all_items'         => __( 'All Categories', 'whitehall' ),
			'parent_item'       => __( 'Parent Category', 'whitehall' ),
			'parent_item_colon' => __( 'Parent Category:', 'whitehall' ),
			'edit_item'         => __( 'Edit Category', 'whitehall' ),
			'update_item'       => __( 'Update Category', 'whitehall' ),
			'add_new_item'      => __( 'Add New Category', 'whitehall' ),
			'new_item_name'     => __( 'New Category Name', 'whitehall' ),
			'menu_name'         => __( 'Testimonials Category', 'whitehall' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);
		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'whitehall' ),
			'singular_name'     => _x( 'Team Category', 'whitehall' ),
			'search_items'      => __( 'Search Category', 'whitehall' ),
			'all_items'         => __( 'All Categories', 'whitehall' ),
			'parent_item'       => __( 'Parent Category', 'whitehall' ),
			'parent_item_colon' => __( 'Parent Category:', 'whitehall' ),
			'edit_item'         => __( 'Edit Category', 'whitehall' ),
			'update_item'       => __( 'Update Category', 'whitehall' ),
			'add_new_item'      => __( 'Add New Category', 'whitehall' ),
			'new_item_name'     => __( 'New Category Name', 'whitehall' ),
			'menu_name'         => __( 'Team Category', 'whitehall' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);
		register_taxonomy( 'team_cat', 'team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'whitehall' ),
			'singular_name'     => _x( 'Faq Category', 'whitehall' ),
			'search_items'      => __( 'Search Category', 'whitehall' ),
			'all_items'         => __( 'All Categories', 'whitehall' ),
			'parent_item'       => __( 'Parent Category', 'whitehall' ),
			'parent_item_colon' => __( 'Parent Category:', 'whitehall' ),
			'edit_item'         => __( 'Edit Category', 'whitehall' ),
			'update_item'       => __( 'Update Category', 'whitehall' ),
			'add_new_item'      => __( 'Add New Category', 'whitehall' ),
			'new_item_name'     => __( 'New Category Name', 'whitehall' ),
			'menu_name'         => __( 'Faq Category', 'whitehall' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);
		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
	}
	
}
