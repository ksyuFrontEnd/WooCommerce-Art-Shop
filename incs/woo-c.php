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

// Register sidebar widget
add_action( 'widgets_init', function() {
    register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'roxydev' ),
			'id'            => 'sidebar_shop',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'roxydev' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
} );

// Remove titles for categories on the front-page
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );

// Add custom titles for categories on the front-page
add_action( 'woocommerce_shop_loop_subcategory_title', function( $category ) {
    echo "<h5 class='category-title'>{$category->name} <span>({$category->count})</span></h5>";
}, 10 );

// Remove sidebar from single product page
add_action( 'template_redirect', function() {
    if ( is_product() ) {
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
} );

// Set image size on a single product page
add_filter( 'woocommerce_get_image_size_single', function($size) {
    return [
        'width'  => 700, 
        'height' => 700,
        'crop'   => 1,   
    ];
});

// Remove woocommerce_upsell_display and woocommerce_output_related_products on a single product page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Remove SKU and category from single product description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove unnecessary fields from checkout form
add_filter( 'woocommerce_default_address_fields' , function($fields) {

    unset( $fields['company'], $fields['address_2'], $fields['postcode'], $fields['country'] );

    return $fields;

} );

// Customize fields in checkout form
add_filter( 'woocommerce_default_address_fields' , function($fields) {

    $fields['address_1']['label'] = "Номер будинку та назва вулиці";
    $fields['address_1']['placeholder'] = "";
    $fields['state']['label'] = "Область";
    
    return $fields;
}); 

add_filter( 'woocommerce_checkout_fields' , function($fields) {

    $fields['billing']['billing_phone']['required'] = false;

    return $fields;
}); 
