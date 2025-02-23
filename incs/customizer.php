<?php

add_action( 'customize_register', 'social_links_customize_register' );

function social_links_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'roxydev_theme_options', array(
        'title' => __( 'Theme options', 'roxydev' ),
        'priority' => 10,
    ) ); 

    // Instagram
    $wp_customize->add_setting( 'roxydev_instagram', array( 'default' => '', 'sanitize_callback' => 'esc_url' ) );
    $wp_customize->add_control( 'roxydev_instagram', array(
        'label' => __( 'Instagram link', 'roxydev' ),
        'section' => 'roxydev_theme_options',
        'type' => 'text',
    ) );
    // Facebook
    $wp_customize->add_setting( 'roxydev_facebook', array( 'default' => '', 'sanitize_callback' => 'esc_url' ) );
    $wp_customize->add_control( 'roxydev_facebook', array(
        'label' => __( 'Facebook link', 'roxydev' ),
        'section' => 'roxydev_theme_options',
    ) );
    // Telegram
    $wp_customize->add_setting( 'roxydev_telegram', array( 'default' => '', 'sanitize_callback' => 'esc_url' ) );
    $wp_customize->add_control( 'roxydev_telegram', array(
        'label' => __( 'Telegram link', 'roxydev' ),
        'section' => 'roxydev_theme_options',
        'type' => 'text',
    ) );
}

function roxydev_theme_options() {
    return array(
        'instagram' => get_theme_mod( 'roxydev_instagram' ),
        'facebook' => get_theme_mod( 'roxydev_facebook' ),
        'telegram' => get_theme_mod( 'roxydev_telegram' ),
    );
}