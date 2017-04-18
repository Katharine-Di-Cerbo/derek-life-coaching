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

//* Run the Genesis loop
genesis();