<?php

// Remove WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Remove rating from hook
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Display star rating even if it's empty
add_filter( 'woocommerce_product_get_rating_html', function( $html, $rating, $count ) {
    $html = '';

    /* translators: %s: rating */
    $label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
    $html  = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';

    return $html;
	
}, 10, 3 );

// Update cart count
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    $fragments['div.cart-count'] = '<div class="cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';

    return $fragments;
} ); 

// Customize the WooCommerce breadcrumb
add_filter( 'woocommerce_breadcrumb_defaults', function() {
    return array(
        'delimiter'   => ' &gt; ',
        'wrap_before' => '<section class="first-section section"><div class="container"><nav class="breadcrumbs"><ul>',
        'wrap_after'  => '</ul></nav></div></section>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => __( 'Home', 'roxydev' ),
    );
} );

// Remove notices on the shop page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );

// Remove result count on the shop page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
