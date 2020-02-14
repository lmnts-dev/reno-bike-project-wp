<?php
	function register_my_menus() {
	register_nav_menus(
		array(
			'main_nav' => __( 'Main Nav' )
		)
	);
};
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails',array( 'bike') );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'bike-image', 175, 130, true );
}
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="widget events %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'bike',
    array(
      'labels' => array(
        'name' => __( 'Bikes of the Month' ),
        'singular_name' => __( 'Bike' ),
			  'add_new' => _x('Add Bike of the Month', 'slide'),
	      'add_new_item' => __('Add Bike of the Month'),
      ),
      'public' => true,
     	'supports' => array('thumbnail', 'title', 'editor', 'page-attributes'),
    )
  );
};
require_once ( get_stylesheet_directory() . '/theme-options.php' );
?>

