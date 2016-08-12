<?php

// Includes Styles
require_once('includes/styles.php');

// Include Scripts
require_once('includes/scripts.php');

// Include Optimize Functions
require_once('includes/optimize.php');

// Include Custom Post Types
// Please edit the post-types.php to include a post-type
// require_once('includes/post-types.php');

// ACF Options Page
if (function_exists('acf_add_options_sub_page')) {
	if( function_exists('acf_add_options_page') ) {
 		acf_add_options_page(); // necessary for v.5 :-/
	}
	acf_add_options_sub_page( 'Theme-Optionen' );
	acf_add_options_sub_page( 'Footer' );
}

// addImage Sizes
add_image_size( 'slider-xl', 1200, 400, true );
add_image_size( 'slider-md', 970, 323, true );
add_image_size( 'slider-sm', 750, 250, true );
add_image_size( 'slider-xs', 500, 166, true );

// Custom Menus registrieren
register_nav_menus();

// Post Thumbnails aktivieren
add_theme_support( 'post-thumbnails' );
load_theme_textdomain( 'gutwerker', templatepath.'/languages' );

// Navigation registrieren
if ( function_exists('register_nav_menu')) {
	$menus = array(
		'navi' => __('Navigation'),
		'footer' => __('Footer Menu'),
		);
	register_nav_menus( $menus );
}
