<?php

add_action( 'customize_register', 'social_links_customize_register' );

function social_links_customize_register( $wp_custopmize ) {

    $wp_custopmize->add_section( 'roxydev_theme_options', array(
        'title' => __( 'Theme options', 'roxydev' ),
        'priority' => 10,
    ) ); 

    // Instagram
    $wp_custopmize->add_setting( 'roxydev_instagram' );
    $wp_custopmize->add_control( 'roxydev_instagram', array(
        'label' => __( 'Instagram link', 'roxydev' ),
        'section' => 'roxydev_theme_options',
    ) );
    // Facebook
    $wp_custopmize->add_setting( 'roxydev_facebook' );
    $wp_custopmize->add_control( 'roxydev_facebook', array(
        'label' => __( 'Facebook link', 'roxydev' ),
        'section' => 'roxydev_theme_options',
    ) );
    // Telegram
    $wp_custopmize->add_setting( 'roxydev_telegram' );
    $wp_custopmize->add_control( 'roxydev_telegram', array(
        'label' => __( 'Telegram link', 'roxydev' ),
        'section' => 'roxydev_theme_options',
    ) );
}

function roxydev_theme_options() {
    return array(
        'instagram' => get_theme_mod( 'roxydev_instagram' ),
        'facebook' => get_theme_mod( 'roxydev_facebook' ),
        'telegram' => get_theme_mod( 'roxydev_telegram' ),
    );
}