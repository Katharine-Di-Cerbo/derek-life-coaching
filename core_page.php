<?php
/**
 * This file adds the Core page template to the Derek Life Coaching Theme.
 */

/*
Template Name: Core Page
*/

function dandy_core_page() {
	if (is_active_sidebar('core-page-widget')) {
	
	//* Interupt genesis loop
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	//* Hook in template page widget (dandy_core_page_widget - the reference to the widget function) 
	add_action( 'genesis_loop', 'dandy_core_page_widget' );
	//* Add core-page body class to the head
	add_filter( 'body_class', 'dandy_add_body_class' );
	
	function dandy_add_body_class( $classes ) {

		$classes[] = 'dandy-core-page';

		return $classes;

	}
		
	}
}

//* widget function
function dandy_core_page_widget() {
	//* 'core-page-widget' is the widget ID that is registered in functions.php
	if ( is_active_sidebar( 'core-page-widget' ) ) {
	genesis_widget_area( 'core-page-widget', array(
	'before' => '<div class="core-page-widget"><div class="wrap">',
    'after' => '</div></div>',
	) );
 }
 
}


//* Remove Skip Links from a template
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

//* Dequeue Skip Links Script
add_action( 'wp_enqueue_scripts', 'digital_dequeue_skip_links' );
function digital_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove navigation
remove_theme_support( 'genesis-menus' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove site footer widgets
remove_theme_support( 'genesis-footer-widgets' );

//* Remove site footer elements
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

//* Run the Genesis loop
genesis();