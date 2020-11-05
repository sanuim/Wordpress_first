<?php
function reg_mymenu() {
    register_nav_menu('header-menu',__( 'Menu główne' ));
}
add_action( 'init', 'reg_mymenu');

function my_menu_li_class($classes, $item, $args) {
    if (property_exists($args, 'my_menu_li_class')) {
        $classes[] = $args->my_menu_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'my_menu_li_class', 1, 3);

function my_menu_a_class( $attributes, $item, $args ) {
    if (property_exists($args, 'my_menu_a_class')) {
        $attributes['class'] = $args->my_menu_a_class;
    }
    return $attributes;
}
add_filter( 'nav_menu_link_attributes', 'my_menu_a_class', 1, 3 );

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function my_widget_init() {
    register_sidebar( array(
        'name'          => 'Przykładowy widget',
        'id'            => 'przykladowy-widget',
        'before_widget' => ' ',
        'after_widget'  => ' ',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
dynamic_sidebar('przykladowy-widget');
add_action( 'widgets_init', 'my_widget_init' );
add_theme_support( 'custom-logo' );
add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('post', 'page'));
add_theme_support('woocommerce');
function add_wc_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_wc_support' );
?>