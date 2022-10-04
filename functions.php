<?php

//! adds dynamic elements and assets
function vineyard_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumnails');

}
add_action('after_setup_theme', 'vineyard_theme_support');


//! make menus available
function vineyard_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

   register_nav_menus($locations);
    
}
add_action( 'init', 'vineyard_menus');




//! enqueue styles and scripts
function vineyard_register_styles(){
    //~ dinamic version based on CSS top Version tag
    $version = wp_get_theme()->get( 'Version');
    //~ function('name', 'path', array(depends of 'name' || empty), 'version', 'type')
    wp_enqueue_style('vineyard-style', get_template_directory_uri() . "/style.css", array('vineyard-bootstrap'), $version, 'all');
    wp_enqueue_style('vineyard-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('vineyard-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'vineyard_register_styles');

function vineyard_register_scripts(){
    //~ last parameter= false(default) -> header / true -> footer
    wp_enqueue_script('vineyard-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('vineyard-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('vineyard-popper', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '3.4.1', true);
    wp_enqueue_script('vineyard-js', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'vineyard_register_scripts');


//! adding widget customize areas
function vineyard_widget_areas(){

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">', 
            'after_widget' => '</ul>',
            'name' => 'Sidebar area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area', 
        )
        );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">', 
            'after_widget' => '</ul>',
            'name' => 'Footer area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area', 
        )
        );

}
add_action( 'widgets_init', 'vineyard_widget_areas');

?>