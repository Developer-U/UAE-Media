<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method(){
	wp_register_style( 'bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );
	wp_enqueue_style('bootstrap_css');	
	wp_enqueue_style( 'global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), null, 'all');   
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), null, 'all');  

	wp_register_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', null, null, true );
	wp_enqueue_script('bootstrap_js');	
	wp_enqueue_script( 'popup-js', get_stylesheet_directory_uri() . '/assets/js/popups.js', array('jquery'), null, true );
}