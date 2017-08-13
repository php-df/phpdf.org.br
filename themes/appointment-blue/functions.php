<?php
add_action( 'wp_enqueue_scripts', 'appointment_blue_theme_css',999);
function appointment_blue_theme_css() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme-menu', get_template_directory_uri() . '/css/theme-menu.css' );
	wp_enqueue_style( 'default-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_enqueue_style( 'element-style', get_template_directory_uri() . '/css/element.css' );
	wp_enqueue_style( 'media-responsive', get_template_directory_uri() . '/css/media-responsive.css');
	wp_dequeue_style( 'appointment-default', get_template_directory_uri() .'/css/default.css');
}

/*
	 * Let WordPress manage the document title.
	 */
	function appointment_blue_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'appointment_blue_setup' );
?>