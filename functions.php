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

function modify_menu($items, $args) { 
    if(current_user_can('administrator')){
		
        $position=strpos($items,"Nous rencontrer</a></li>");	
        $longeur=strlen("Nous rencontrer</a></li>");
        $lien_dadministration='<li><a href="' .admin_url(). '">Admin</a></li>';
        $offset=$position+$longeur;
        $items=substr_replace($items,$lien_dadministration,$offset,0);
    }
    return $items;
}
add_filter("wp_nav_menu_items", "modify_menu", 10,2);

