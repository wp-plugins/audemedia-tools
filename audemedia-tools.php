<?php
/*
Plugin Name: Audemedia Tools
Plugin URI: http://audemedia.com
Description: Audemedia Tools extends functionality to Audemedia WordPress Themes
Version: 1.0.2
Author: Audemedia
Author Email: hello@audemedia.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
*/

add_filter( 'audemedia_tools-installed', '__return_true' );

if( ! defined('AUDEMEDIA_TOOLS_DIR') )
	define( 'AUDEMEDIA_TOOLS_DIR', WP_PLUGIN_URL . '/audemedia_tools' );

// PORTFOLIO CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_portfolio.php');
add_action( 'init', array('Portfolio_Post_Type', 'portfolio_init') );

// SERVICES CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_services.php');
add_action( 'init', array('Services_Post_Type', 'services_init') );

// SLIDER CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_slider.php');
add_action( 'init', array('Slider_Post_Type', 'slider_init') );

// TESTIMONIALS CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_testimonials.php');
add_action( 'init', array('Testimonials_Post_Type', 'testimonials_init') );

// EASY GALLERY
function check_audemedia_easygallery_support() {
	if(current_theme_supports('audemedia_easygallery')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/gallery/gallery.php');
	}
}
add_action('init', 'check_audemedia_easygallery_support');


// METABOXES FOR SLIDER
function check_audemedia_slider_cpt_support() {
	if(current_theme_supports('audemedia_slider_cpt')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/metaboxes/slider_metaboxes.php');
	}
}
add_action('init', 'check_audemedia_slider_cpt_support');


// METABOXES FOR PORTFOLIO
function check_audemedia_slider_portfolio_support() {
	if(current_theme_supports('audemedia_portfolio_cpt')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/metaboxes/portfolio_metaboxes.php');
	}
}
add_action('init', 'check_audemedia_slider_portfolio_support');

// METABOXES FOR TESTIMONIALS
function check_audemedia_testimonials_cpt_support() {
	if(current_theme_supports('audemedia_testimonials_cpt')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/metaboxes/testimonials_metaboxes.php');
	}
}
add_action('init', 'check_audemedia_testimonials_cpt_support');


// METABOXES FOR POSTS
function check_audemedia_post_metaboxes_support() {
	if(current_theme_supports('audemedia_post_metaboxes')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/metaboxes/post_metaboxes.php');
	}
}
add_action('init', 'check_audemedia_post_metaboxes_support');

// METABOXES FOR POST FORMATS
function check_audemedia_postformats_fields_support() {
	if(current_theme_supports('audemedia_postformats_fields')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/metaboxes/post_postformats_fields.php');
	}
}
add_action('init', 'check_audemedia_postformats_fields_support');

// SHORTCODES
include_once( plugin_dir_path( __FILE__ ) . 'lib/shortcodes.php');

// WIDGETS
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/widget-tweets.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/widget-latest-projects.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/widget-latest-posts.php');

// WIDGETIZED HOME PAGE
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/home-widget-slider.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/home-widget-services.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/home-widget-portfolio.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/home-widget-blog.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/home-widget-testimonials.php');
?>