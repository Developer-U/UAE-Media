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
	wp_enqueue_style( 'tabs', get_stylesheet_directory_uri() . '/assets/css/tabs.css', array(), null, 'all');
	wp_enqueue_style( 'ajax_search_css', get_stylesheet_directory_uri() . '/assets/css/ajax-search.css', array(), null, 'all');
	wp_enqueue_style( 'estore-swiper', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style( 'slider-css', get_stylesheet_directory_uri() . '/assets/css/slider.css', array(), null, 'all');

	wp_register_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', null, null, true );
	wp_enqueue_script('bootstrap_js');	
	wp_enqueue_script( 'tabs-js', get_stylesheet_directory_uri() . '/assets/js/tabs.js', array(), null, null, true );
	wp_enqueue_script( 'popup-js', get_stylesheet_directory_uri() . '/assets/js/popups.js', array('jquery'), null, true );	
	wp_enqueue_script( 'swiper-bundle-js', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'slider-js', get_stylesheet_directory_uri() . '/assets/js/slider.js', array('jquery'), null, true );

	// Подключаем скрипт формы поиска на сайте

	wp_enqueue_script( 'estore-search', get_stylesheet_directory_uri() . '/assets/js/ajax-search.js', array(), '20151215', true );

	// Перед скриптом добавляем данные

	wp_localize_script( 'estore-search', 'search_form', array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('search-nonce')
	) );
}