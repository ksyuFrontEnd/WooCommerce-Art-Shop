<?php

// Register slider post type
add_action( 'init', 'register_slider_post_types' );

function register_slider_post_types() {
    register_post_type('slider', array(
        'labels' => array(
            'name'               => __( 'Slider', 'roxydev' ), 
            'singular_name'      => __( 'Slider', 'roxydev' ),
            'add_new'            => __( 'Add new slide', 'roxydev' ),
            'add_new_item'       => __( 'New slide', 'roxydev' ), 
            'edit_item'          => __( 'Edit', 'roxydev' ),  
            'new_item'           => __( 'New slide', 'roxydev' ),  
            'view_item'          => __( 'View', 'roxydev' ), 
            'menu_name'          => __( 'Slider', 'roxydev' ), 
            'all_items'          => __( 'All slides', 'roxydev' ), 
    ),
    'public' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', ),
    'menu_icon' => 'dashicons-format-gallery',
    'show_in_rest' => true,
    ) );   
} 
 