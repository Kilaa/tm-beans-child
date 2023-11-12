<?php


require_once( get_template_directory() . '/lib/init.php' );



add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

function beans_child_enqueue_assets() {

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

}

function beans_breadcrumb_nope() {
	return; 
}
beans_modify_action_callback( 'beans_main_grid_before_markup', 'beans_breadcrumb' );