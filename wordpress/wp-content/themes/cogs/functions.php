<?php
// update_option( 'siteurl', 'http://dannyforster.com.s224240.gridserver.com' );
// update_option( 'home', 'http://dannyforster.com.s224240.gridserver.com' );

include 'includes/core/functions/disable-comments.php';

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
};

show_admin_bar(false);

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}


// MENU
function register_menus()
{
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu'),
			'overlay-menu' => __('Overlay Menu'),
			'footer-menu' => __('Footer Menu'),
		)
	);
}
add_action('init', 'register_menus');

add_filter('nav_menu_css_class', 'remove_class_id');
add_filter('nav_menu_item_id', 'remove_class_id', 100, 1);
function remove_class_id($classes)
{
	return array();
}

// function add_menuclass($ulclass) {
// 	return preg_replace('/<a/', '<a class="ajax-link"', $ulclass, -1);
// }
// add_filter('wp_nav_menu','add_menuclass');

// Remove Default Post Type
// add_action('admin_menu', 'remove_default_post_type');
// function remove_default_post_type()
// {
// 	remove_menu_page('edit.php');
// }

// REMOVE POST META BOXES
function remove_my_post_metaboxes()
{
	remove_meta_box('tagsdiv-post_tag', 'project', 'normal'); // Tags Metabox
	remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
}
//add_action('admin_menu','remove_my_post_metaboxes');

add_theme_support('post-thumbnails');
add_post_type_support('page', 'excerpt');

//TINYMCE
add_filter('mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
function jivedig_remove_tiny_mce_buttons_from_editor($buttons)
{
	$remove_buttons = array(
		'blockquote',
		'alignleft',
		'aligncenter',
		'alignright',
		'wp_more', // read more link
		'spellchecker',
		'dfw', // distraction free writing mode
		'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
	);
	foreach ($buttons as $button_key => $button_value) {
		if (in_array($button_value, $remove_buttons)) {
			unset($buttons[$button_key]);
		}
	}
	return $buttons;
}

function enable_more_buttons($buttons)
{
	$buttons[] = 'hr';

	return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");

function my_format_TinyMCE($init)
{
	$init['inline_styles'] = false;
	$init['formats'] = "{ underline: { inline: 'u', exact : true } }";
	return $init;
}
add_filter('tiny_mce_before_init', 'my_format_TinyMCE');

function tinymce_paste_as_text($init)
{
	$init['paste_as_text'] = true;

	// omit the pastetext button so that the user can't change it manually, current toolbar2 content as of 4.1.1 is "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help"
	$init["toolbar2"] = "formatselect,underline,alignjustify,forecolor,removeformat,charmap,outdent,indent,undo,redo,wp_help";

	return $init;
}
add_filter('tiny_mce_before_init', 'tinymce_paste_as_text');

// Register Custom Post Type Event
// Post Type Key: event
add_action('init', 'create_events_cpt', 0);
function create_events_cpt()
{
	$labels = array(
		'name' => __('Event', 'Post Type General Name', 'textdomain'),
		'singular_name' => __('Event', 'Post Type Singular Name', 'textdomain'),
		'menu_name' => __('Events', 'textdomain'),
		'name_admin_bar' => __('Event', 'textdomain'),
		'archives' => __('Event Archives', 'textdomain'),
		'attributes' => __('Event Attributes', 'textdomain'),
		'parent_item_colon' => __('Parent Event:', 'textdomain'),
		'all_items' => __('All Events', 'textdomain'),
		'add_new_item' => __('Add New Event', 'textdomain'),
		'add_new' => __('Add New', 'textdomain'),
		'new_item' => __('New Event', 'textdomain'),
		'edit_item' => __('Edit Event', 'textdomain'),
		'update_item' => __('Update Event', 'textdomain'),
		'view_item' => __('View Event', 'textdomain'),
		'view_items' => __('View Events', 'textdomain'),
		'search_items' => __('Search Event', 'textdomain'),
		'not_found' => __('Not found', 'textdomain'),
		'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
		'featured_image' => __('Featured Image', 'textdomain'),
		'set_featured_image' => __('Set featured image', 'textdomain'),
		'remove_featured_image' => __('Remove featured image', 'textdomain'),
		'use_featured_image' => __('Use as featured image', 'textdomain'),
		'insert_into_item' => __('Insert into Event', 'textdomain'),
		'uploaded_to_this_item' => __('Uploaded to this Event', 'textdomain'),
		'items_list' => __('Events list', 'textdomain'),
		'items_list_navigation' => __('Events list navigation', 'textdomain'),
		'filter_items_list' => __('Filter Events list', 'textdomain'),
	);
	$args = array(
		'label' => __('Event', 'textdomain'),
		'description' => __('', 'textdomain'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'taxonomies' => array('post_tag'),
	);
	register_post_type('event', $args);
}

// Register Custom Post Type Memberships
// Post Type Key: membership
add_action('init', 'create_membership_cpt', 0);
function create_membership_cpt()
{
	$labels = array(
		'name' => __('Membership', 'Post Type General Name', 'textdomain'),
		'singular_name' => __('Membership', 'Post Type Singular Name', 'textdomain'),
		'menu_name' => __('Memberships', 'textdomain'),
		'name_admin_bar' => __('Membership', 'textdomain'),
		'archives' => __('Membership Archives', 'textdomain'),
		'attributes' => __('Membership Attributes', 'textdomain'),
		'parent_item_colon' => __('Parent Membership:', 'textdomain'),
		'all_items' => __('All Memberships', 'textdomain'),
		'add_new_item' => __('Add New Membership', 'textdomain'),
		'add_new' => __('Add New', 'textdomain'),
		'new_item' => __('New Membership', 'textdomain'),
		'edit_item' => __('Edit Membership', 'textdomain'),
		'update_item' => __('Update Membership', 'textdomain'),
		'view_item' => __('View Membership', 'textdomain'),
		'view_items' => __('View Memberships', 'textdomain'),
		'search_items' => __('Search Membership', 'textdomain'),
		'not_found' => __('Not found', 'textdomain'),
		'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
		'featured_image' => __('Featured Image', 'textdomain'),
		'set_featured_image' => __('Set featured image', 'textdomain'),
		'remove_featured_image' => __('Remove featured image', 'textdomain'),
		'use_featured_image' => __('Use as featured image', 'textdomain'),
		'insert_into_item' => __('Insert into Membership', 'textdomain'),
		'uploaded_to_this_item' => __('Uploaded to this Membership', 'textdomain'),
		'items_list' => __('Memberships list', 'textdomain'),
		'items_list_navigation' => __('Memberships list navigation', 'textdomain'),
		'filter_items_list' => __('Filter Memberships list', 'textdomain'),
	);
	$args = array(
		'label' => __('Membership', 'textdomain'),
		'description' => __('', 'textdomain'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-universal-access-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'taxonomies' => array('post_tag'),
	);
	register_post_type('membership', $args);
}

// Register Custom Post Type Program
// Post Type Key: event
add_action('init', 'create_programs_cpt', 0);
function create_programs_cpt()
{
	$labels = array(
		'name' => __('Program', 'Post Type General Name', 'textdomain'),
		'singular_name' => __('Program', 'Post Type Singular Name', 'textdomain'),
		'menu_name' => __('Programs', 'textdomain'),
		'name_admin_bar' => __('Program', 'textdomain'),
		'archives' => __('Program Archives', 'textdomain'),
		'attributes' => __('Program Attributes', 'textdomain'),
		'parent_item_colon' => __('Parent Program:', 'textdomain'),
		'all_items' => __('All Programs', 'textdomain'),
		'add_new_item' => __('Add New Program', 'textdomain'),
		'add_new' => __('Add New', 'textdomain'),
		'new_item' => __('New Program', 'textdomain'),
		'edit_item' => __('Edit Program', 'textdomain'),
		'update_item' => __('Update Program', 'textdomain'),
		'view_item' => __('View Program', 'textdomain'),
		'view_items' => __('View Programs', 'textdomain'),
		'search_items' => __('Search Program', 'textdomain'),
		'not_found' => __('Not found', 'textdomain'),
		'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
		'featured_image' => __('Featured Image', 'textdomain'),
		'set_featured_image' => __('Set featured image', 'textdomain'),
		'remove_featured_image' => __('Remove featured image', 'textdomain'),
		'use_featured_image' => __('Use as featured image', 'textdomain'),
		'insert_into_item' => __('Insert into Program', 'textdomain'),
		'uploaded_to_this_item' => __('Uploaded to this Program', 'textdomain'),
		'items_list' => __('Programs list', 'textdomain'),
		'items_list_navigation' => __('Programs list navigation', 'textdomain'),
		'filter_items_list' => __('Filter Programs list', 'textdomain'),
	);
	$args = array(
		'label' => __('Program', 'textdomain'),
		'description' => __('', 'textdomain'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'taxonomies' => array('post_tag'),
	);
	register_post_type('program', $args);
}

// Register Custom Post Type Staff
// Post Type Key: team
add_action('init', 'create_staff_cpt', 0);
function create_staff_cpt()
{
	$labels = array(
		'name' => __('Staff', 'Post Type General Name', 'textdomain'),
		'singular_name' => __('Staff', 'Post Type Singular Name', 'textdomain'),
		'menu_name' => __('Staff', 'textdomain'),
		'name_admin_bar' => __('Staff', 'textdomain'),
		'archives' => __('Staff Archives', 'textdomain'),
		'attributes' => __('Staff Attributes', 'textdomain'),
		'parent_item_colon' => __('Parent Staff:', 'textdomain'),
		'all_items' => __('All Staff', 'textdomain'),
		'add_new_item' => __('Add New Staff', 'textdomain'),
		'add_new' => __('Add New', 'textdomain'),
		'new_item' => __('New Staff', 'textdomain'),
		'edit_item' => __('Edit Staff', 'textdomain'),
		'update_item' => __('Update Staff', 'textdomain'),
		'view_item' => __('View Staff', 'textdomain'),
		'view_items' => __('View Staffs', 'textdomain'),
		'search_items' => __('Search Staff', 'textdomain'),
		'not_found' => __('Not found', 'textdomain'),
		'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
		'featured_image' => __('Featured Image', 'textdomain'),
		'set_featured_image' => __('Set featured image', 'textdomain'),
		'remove_featured_image' => __('Remove featured image', 'textdomain'),
		'use_featured_image' => __('Use as featured image', 'textdomain'),
		'insert_into_item' => __('Insert into Staff', 'textdomain'),
		'uploaded_to_this_item' => __('Uploaded to this Staff', 'textdomain'),
		'items_list' => __('Staff list', 'textdomain'),
		'items_list_navigation' => __('Staff list navigation', 'textdomain'),
		'filter_items_list' => __('Filter Staff list', 'textdomain'),
	);
	$args = array(
		'label' => __('Staff', 'textdomain'),
		'description' => __('', 'textdomain'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'taxonomies' => array('post_tag'),
	);
	register_post_type('staff', $args);
}

function locations_taxonomy()
{
	register_taxonomy(
		'locations',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'project',             // post type name
		array(
			'hierarchical' => true,
			'label' => 'Locations', // display name
			'query_var' => true,
			'show_in_rest'	=> true,
			'rewrite' => array(
				'slug' => 'locations',    // This controls the base slug that will display before each term
				'with_front' => false  // Don't display the category base before
			)
		)
	);
}
add_action('init', 'locations_taxonomy');

function industries_taxonomy()
{
	register_taxonomy(
		'industries',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'project',             // post type name
		array(
			'hierarchical' => true,
			'label' => 'Industries', // display name
			'query_var' => true,
			'show_in_rest'	=> true,
			'rewrite' => array(
				'slug' => 'industries',    // This controls the base slug that will display before each term
				'with_front' => false  // Don't display the category base before
			)
		)
	);
}
add_action('init', 'industries_taxonomy');

//CAPABILITIES
$editor = get_role('editor');

$editor->remove_cap('delete_pages');
$editor->remove_cap('delete_others_pages');
$editor->remove_cap('delete_published_pages');

add_action('admin_menu', 'wpse26980_remove_tools', 99);
function wpse26980_remove_tools()
{
	remove_menu_page('tools.php');
}

//CUSTOM STYLES
add_action('admin_head', 'custom_styles');
function custom_styles()
{
	echo "
	  		<style>
	    		#wp-admin-bar-comments {
	    			display: none;
	    		}

	    		.short iframe{
		            height: 100px !important;
		            min-height: initial !important;
		        }

		        .acf-field-group {
		        	min-height: initial !important;
		        }

				.acf-field-unique-id {
					display: none;
				}

				#pageparentdiv {
					display: none;
				}

				.menu-icon-dashboard {
					display: none;
				}

				#wp-admin-bar-new-content {
					display: none;
				}

				#wp-admin-bar-wp-logo {
					display: none;
				}

				#login h1 a, .login h1 a {
	                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/logo-dark.svg);
	        		height:65px;
	        		width:320px;
	                pointer-events: none;
	        		background-size: 320px 65px;
	        		background-repeat: no-repeat;
	            	padding-bottom: 30px;
	            }

				// #menu-pages {
				// 	display: none;
				// }

				.image-wrap img {
					max-height: 120px;
				}

				[data-layout='type_one'] .acf-fc-layout-handle:after, [data-layout='type_two'] .acf-fc-layout-handle:after, [data-layout='type_three'] .acf-fc-layout-handle:after {
					background-size: contain;
					background-position: center;
					background-repeat: no-repeat;
					content: '';
					display: inline-block;
					height: 25px;
					margin-left: 20px;
					vertical-align: middle;
					width: 40px;
				}

				[data-layout='type_one'] .acf-fc-layout-handle:after {
					background-image: url(" . get_stylesheet_directory_uri() . "/assets/icon-type-one.svg);
				}

				[data-layout='type_two'] .acf-fc-layout-handle:after {
					background-image: url(" . get_stylesheet_directory_uri() . "/assets/icon-type-two.svg);
				}

				[data-layout='type_three'] .acf-fc-layout-handle:after {
					background-image: url(" . get_stylesheet_directory_uri() . "/assets/icon-type-three.svg);
				}


				#contextual-help-link-wrap {
					display: none;
				}

				#menu-users {
					display: none;
				}

				#wp-admin-bar-edit-profile, #wp-admin-bar-user-info {
					display: none;
				}

				.misc-pub-visibility {
					display: none;
				}

				#post_status option[value='pending'] {
					display: none;
				}

				#mceu_0 {
					display: none;
				}

				#screen-options-link-wrap {
					display: none;
				}

				.update-nag {
					display: none;
				}

				.page-title-action {
					display: none;
				}

				.attachment-details [data-setting='description'], .attachment-details [data-setting='caption'] {
					display: none !important;
				}

				#postexcerpt {
					display: block !important;
				}
	    	</style>";
}

function my_login_logo()
{
?>

	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg");
			height: 200px;
			width: 200px;
			pointer-events: none;
			background-size: contain;
			background-position: center center;
			background-repeat: no-repeat;
			margin-bottom: 0;
			padding-bottom: 0;
		}
	</style>

<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');
//
add_action('admin_menu', 'linked_url');
function linked_url()
{
	add_menu_page('linked_url', 'Homepage', 'read', 'hompage', '', 'dashicons-admin-home', 1);
}

add_action('admin_menu', 'linkedurl_function');
function linkedurl_function()
{
	global $menu;
	$menu[1][2] = "post.php?post=14734&action=edit";
}

// REMOVE WP UNUSED STUFF
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


function remove_json_api()
{

	// Remove the REST API lines from the HTML Header
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

	remove_action('rest_api_init', 'wp_oembed_register_route');

	add_filter('embed_oembed_discover', '__return_false');

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_resource_hints', 2);

	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

	remove_action('wp_head', 'wp_oembed_add_discovery_links');

	remove_action('wp_head', 'wp_oembed_add_host_js');

	remove_action('wp_head', 'wlwmanifest_link');

	// Remove all embeds rewrite rules.
	//add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action('after_setup_theme', 'remove_json_api');

//AJAX
// function CCAjax() {
// 	if($_POST['type'] == 'get_list_items') {
//     	include get_template_directory() . '/includes/get-list-items.php';
// 	}
// 	exit();
// }
//
// add_action('wp_ajax_nopriv_CCAjax', 'CCAjax');
// add_action('wp_ajax_CCAjax', 'CCAjax');


// LOAD SCRIPTS
function my_deregister_scripts()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

add_action('wp_enqueue_scripts', 'load_theme_scripts');
function load_theme_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/dist/app.min.js', '', '', true);
		wp_enqueue_script('vendor', get_template_directory_uri() . '/assets/js/dist/vendor.min.js', '', '', true);
		wp_enqueue_style('danny-forster-architecture', get_template_directory_uri() . '/assets/styles/dist/main.min.css');

		//TO ACCESS ASSETS FROM MAIN.JS
		$args = array(
			'adminAjax' => admin_url('admin-ajax.php'),
			'root' => get_template_directory_uri(),
		);
		wp_localize_script('app', 'dannyforster', $args);
	}
}


///

function my_acf_init()
{
	acf_update_setting('google_api_key', 'AIzaSyDFR-6Q7GoWMHVGYURm0WXqGsrB5el5s8c');
}
add_action('acf/init', 'my_acf_init');

//PREVENT EDITORS FROM DELETING CERTAIN PAGES
add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);
function restrict_post_deletion($post_id)
{
	if (!is_super_admin()) {
		$pages = array(
			5, //homepage
		);

		if (in_array($post_id, $pages)) {
			exit('You don\'t have permissions to delete this page.');
		}
	}
}

//REDIRECT FIRST ADMIN PAGE
function dashboard_redirect()
{
	wp_redirect(admin_url('post.php?post=14734&action=edit'));
}
add_action('load-index.php','dashboard_redirect');

//SUPPOSEDELY REMOVES END TRAILING SLASH
//remove_action('template_redirect', 'redirect_canonical');


add_image_size('medium_small', 400, 500, false);
add_image_size('smallest', 150, 150, false);
add_image_size('largest', 2560, 2560, false);


add_filter('wp_image_editors', 'select_wp_image_editors');

function select_wp_image_editors($editors)
{
	return array('WP_Image_Editor_GD', 'WP_Image_Editor_Imagick');
}

// 	add_filter('allowed_http_origins', 'add_allowed_origins');
//
// function add_allowed_origins($origins) {
//     $origins[] = 'http://local.dannyforster.com';
//     return $origins;
// }

function alx_thumbnail_upscale($default, $orig_w, $orig_h, $dest_w, $dest_h, $crop)
{
	$crop_w = $orig_w;
	$crop_h = $orig_h;

	$s_x = 0;
	$s_y = 0;
	$new_w = $dest_w;
	$new_h = ($dest_w * $orig_h) / $orig_w;
	//list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );

	return array(0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h);
}

add_filter('image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6);
