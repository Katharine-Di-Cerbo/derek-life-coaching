<?php
/**
 * This file adds the Core page template to the Derek Life Coaching Theme.
 */

/*
Template Name: Core Page 1
*/

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );


//* Run the Genesis loop
genesis();