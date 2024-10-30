<?php

add_action( 'init', 'mattesti_testimonials_init' );

function mattesti_testimonials_init() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'material-testimonials' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'material-testimonials' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'material-testimonials' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'material-testimonials' ),
		'add_new'            => _x( 'Add New', 'testimonials', 'material-testimonials' ),
		'add_new_item'       => __( 'Add New Testimonial', 'material-testimonials' ),
		'new_item'           => __( 'New Testimonial', 'material-testimonials' ),
		'edit_item'          => __( 'Edit Testimonial', 'material-testimonials' ),
		'view_item'          => __( 'View Testimonial', 'material-testimonials' ),
		'all_items'          => __( 'All Testimonials', 'material-testimonials' ),
		'search_items'       => __( 'Search Testimonials', 'material-testimonials' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'material-testimonials' ),
		'not_found'          => __( 'No testimonials found.', 'material-testimonials' ),
		'not_found_in_trash' => __( 'No testimonials found in Trash.', 'material-testimonials' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'material-testimonials' ),
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-format-quote',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes')
	);

	register_post_type( 'testimonials', $args );
}

?>