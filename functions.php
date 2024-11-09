<?php
// Add WooCommerce support
add_action( 'after_setup_theme', 'roxydev_add_woocommerce_support' );

function roxydev_add_woocommerce_support() {
    load_theme_textdomain( 'roxydev', get_template_directory() . '/languages' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnail' );
    
    register_nav_menus(
        array(
            'header-menu' => __( 'Header menu', 'roxydev' )
        )
    );
}

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'roxydev_wp_enqueue_scripts' );

function roxydev_wp_enqueue_scripts() {
    wp_enqueue_style( 'roxydev-main-style', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_style( 'roxydev-google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap', array( 'roxydev-main-style' ) );
    wp_enqueue_style( 'swiper-style','https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array('roxydev-main-style') );


    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'roxydev-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );
    wp_enqueue_script( 'swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), false, true );

}

// function dump
function roxydev_dump( $data ) {
    echo "<pre>" . print_r(  $data, 1) . "</pre>";
}

require_once get_template_directory() . '/incs/woo-c.php';
require_once get_template_directory() . '/incs/customizer.php';
require_once get_template_directory() . '/incs/cpt.php';