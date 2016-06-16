<?php
// Register Team Member Post Type
function team_members_post_type() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'bank' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'bank' ),
		'menu_name'             => __( 'Team Members', 'bank' ),
		'name_admin_bar'        => __( 'Team Members', 'bank' ),
		'archives'              => __( 'Item Archives', 'kolnoa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kolnoa' ),
		'all_items'             => __( 'All Items', 'kolnoa' ),
		'add_new_item'          => __( 'Add New Item', 'kolnoa' ),
		'add_new'               => __( 'Add New', 'kolnoa' ),
		'new_item'              => __( 'New Item', 'kolnoa' ),
		'edit_item'             => __( 'Edit Item', 'kolnoa' ),
		'update_item'           => __( 'Update Item', 'kolnoa' ),
		'view_item'             => __( 'View Item', 'kolnoa' ),
		'search_items'          => __( 'Search Item', 'kolnoa' ),
		'not_found'             => __( 'Not found', 'kolnoa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kolnoa' ),
		'featured_image'        => __( 'Featured Image', 'kolnoa' ),
		'set_featured_image'    => __( 'Set featured image', 'kolnoa' ),
		'remove_featured_image' => __( 'Remove featured image', 'kolnoa' ),
		'use_featured_image'    => __( 'Use as featured image', 'kolnoa' ),
		'insert_into_item'      => __( 'Insert into item', 'kolnoa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kolnoa' ),
		'items_list'            => __( 'Items list', 'kolnoa' ),
		'items_list_navigation' => __( 'Items list navigation', 'kolnoa' ),
		'filter_items_list'     => __( 'Filter items list', 'kolnoa' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'bank' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'member', $args );

}
add_action( 'init', 'team_members_post_type', 0 );

/**************************************************************/

// Register Location Post Type
function locations_post_type() {

	$labels = array(
		'name'                  => _x( 'Locations', 'Post Type General Name', 'bank' ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'bank' ),
		'menu_name'             => __( 'Locations', 'bank' ),
		'name_admin_bar'        => __( 'Locations', 'bank' ),
		'archives'              => __( 'Item Archives', 'kolnoa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kolnoa' ),
		'all_items'             => __( 'All Items', 'kolnoa' ),
		'add_new_item'          => __( 'Add New Item', 'kolnoa' ),
		'add_new'               => __( 'Add New', 'kolnoa' ),
		'new_item'              => __( 'New Item', 'kolnoa' ),
		'edit_item'             => __( 'Edit Item', 'kolnoa' ),
		'update_item'           => __( 'Update Item', 'kolnoa' ),
		'view_item'             => __( 'View Item', 'kolnoa' ),
		'search_items'          => __( 'Search Item', 'kolnoa' ),
		'not_found'             => __( 'Not found', 'kolnoa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kolnoa' ),
		'featured_image'        => __( 'Featured Image', 'kolnoa' ),
		'set_featured_image'    => __( 'Set featured image', 'kolnoa' ),
		'remove_featured_image' => __( 'Remove featured image', 'kolnoa' ),
		'use_featured_image'    => __( 'Use as featured image', 'kolnoa' ),
		'insert_into_item'      => __( 'Insert into item', 'kolnoa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kolnoa' ),
		'items_list'            => __( 'Items list', 'kolnoa' ),
		'items_list_navigation' => __( 'Items list navigation', 'kolnoa' ),
		'filter_items_list'     => __( 'Filter items list', 'kolnoa' ),
	);
	$args = array(
		'label'                 => __( 'Locations', 'bank' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'location', $args );

}
add_action( 'init', 'locations_post_type', 0 );

/**************************************************************/

// Register Testimonials Post Type
function testimonials_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'bank' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'bank' ),
		'menu_name'             => __( 'Testimonials', 'bank' ),
		'name_admin_bar'        => __( 'Testimonials', 'bank' ),
		'archives'              => __( 'Item Archives', 'kolnoa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kolnoa' ),
		'all_items'             => __( 'All Items', 'kolnoa' ),
		'add_new_item'          => __( 'Add New Item', 'kolnoa' ),
		'add_new'               => __( 'Add New', 'kolnoa' ),
		'new_item'              => __( 'New Item', 'kolnoa' ),
		'edit_item'             => __( 'Edit Item', 'kolnoa' ),
		'update_item'           => __( 'Update Item', 'kolnoa' ),
		'view_item'             => __( 'View Item', 'kolnoa' ),
		'search_items'          => __( 'Search Item', 'kolnoa' ),
		'not_found'             => __( 'Not found', 'kolnoa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kolnoa' ),
		'featured_image'        => __( 'Featured Image', 'kolnoa' ),
		'set_featured_image'    => __( 'Set featured image', 'kolnoa' ),
		'remove_featured_image' => __( 'Remove featured image', 'kolnoa' ),
		'use_featured_image'    => __( 'Use as featured image', 'kolnoa' ),
		'insert_into_item'      => __( 'Insert into item', 'kolnoa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kolnoa' ),
		'items_list'            => __( 'Items list', 'kolnoa' ),
		'items_list_navigation' => __( 'Items list navigation', 'kolnoa' ),
		'filter_items_list'     => __( 'Filter items list', 'kolnoa' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'bank' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array('post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonials_post_type', 0 );

/**************************************************************/
