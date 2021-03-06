<?php
// Register Custom Post Type
function course_post_type() {

	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'kaan-koh-gym' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'kaan-koh-gym' ),
		'menu_name'             => __( 'Courses', 'kaan-koh-gym' ),
		'name_admin_bar'        => __( 'Course', 'kaan-koh-gym' ),
		'archives'              => __( 'Item Archives', 'kaan-koh-gym' ),
		'attributes'            => __( 'Item Attributes', 'kaan-koh-gym' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kaan-koh-gym' ),
		'all_items'             => __( 'All Items', 'kaan-koh-gym' ),
		'add_new_item'          => __( 'Add New Item', 'kaan-koh-gym' ),
		'add_new'               => __( 'Add Course', 'kaan-koh-gym' ),
		'new_item'              => __( 'New Item', 'kaan-koh-gym' ),
		'edit_item'             => __( 'Edit Item', 'kaan-koh-gym' ),
		'update_item'           => __( 'Update Item', 'kaan-koh-gym' ),
		'view_item'             => __( 'View Item', 'kaan-koh-gym' ),
		'view_items'            => __( 'View Items', 'kaan-koh-gym' ),
		'search_items'          => __( 'Search Item', 'kaan-koh-gym' ),
		'not_found'             => __( 'Not found', 'kaan-koh-gym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kaan-koh-gym' ),
		'featured_image'        => __( 'Featured Image', 'kaan-koh-gym' ),
		'set_featured_image'    => __( 'Set featured image', 'kaan-koh-gym' ),
		'remove_featured_image' => __( 'Remove featured image', 'kaan-koh-gym' ),
		'use_featured_image'    => __( 'Use as featured image', 'kaan-koh-gym' ),
		'insert_into_item'      => __( 'Insert into item', 'kaan-koh-gym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kaan-koh-gym' ),
		'items_list'            => __( 'Items list', 'kaan-koh-gym' ),
		'items_list_navigation' => __( 'Items list navigation', 'kaan-koh-gym' ),
		'filter_items_list'     => __( 'Filter items list', 'kaan-koh-gym' ),
	);
	$args = array(
		'label'                 => __( 'Course', 'kaan-koh-gym' ),
		'description'           => __( 'Course Description', 'kaan-koh-gym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'show_in_graphql'       => true,
    'graphql_single_name'   => 'course',
    'graphql_plural_name'   => 'courses',
	);
	register_post_type( 'course', $args );

}
add_action( 'init', 'course_post_type', 0 );

add_filter( 'register_post_type_args', function( $args, $post_type ) {

  // Change this to the post type you are adding support for
  if ( 'courses' === $post_type ) {
    $args['show_in_graphql'] = true;
    $args['graphql_single_name'] = 'course';
    $args['graphql_plural_name'] = 'courses';
  }

  return $args;

}, 10, 2 );


add_action( 'graphql_register_types', function() {
	register_graphql_field( 'ContentNode', 'price', [
		'type' => 'String',
		'description' => __( 'Link to edit the content', 'your-textdomain' ),
		'resolve' => function( \WPGraphQL\Model\Post $post, $args, $context, $info ) {
		   return number_format(get_field( 'price', $post->databaseId ), 2, '.', '');
		}
	]);

} );