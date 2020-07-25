<?php
/*
Plugin Name: Contact Form Plugin
Plugin URI: http://example.com
Description: Simple non-bloated WordPress Contact Form
Version: 1.0
Author: Tariq Mahmood
Author URI: http://w3guy.com
*/
    //
    // the plugin code will go here..
    //

function pd101_register_book_post_type() {
 
	$labels = array(
		'name'               => 'CFData',
		'singular_name'      => 'CFData',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New CFData',
		'edit_item'          => 'Edit CFData',
		'new_item'           => 'New CFData',
		'all_items'          => 'All CFData',
		'view_item'          => 'View CFData',
		'search_items'       => 'Search CFData',
		'not_found'          =>  'No books found',
		'not_found_in_trash' => 'No books found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'ContactFormData'
	);
 
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);
 
	register_post_type( 'contactformdata', $args );
 
}
add_action( 'init', 'pd101_register_book_post_type' );

include 'inc/main.php';









?>