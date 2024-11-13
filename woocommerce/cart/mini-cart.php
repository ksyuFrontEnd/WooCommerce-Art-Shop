<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="widget_shopping_cart_content">

    <?php if ( ! WC()->cart->is_empty() ) : ?>

        <div class="minicart-wrapper">
            <div class="minicart-table woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
                <div class="minicart-table__body">
                    <?php
                    do_action( 'woocommerce_before_mini_cart_contents' );

                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                            $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                            $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            ?>

                            <div class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                <div class="product-img">
                                    <?php
                                    
                                    if ( isset( $_product ) && is_a( $_product, 'WC_Product' ) ) {
                                        $image_id = $_product->get_image_id(); 

                                        if ( $image_id ) {
                                            $thumbnail = wp_get_attachment_image( $image_id, 'cart-image-size' );
                                        } else {
                                            $thumbnail = wc_placeholder_img( 'cart-image-size' );
                                        }

                                        if ( empty( $product_permalink ) ) {
                                            echo $thumbnail;
                                        } else {
                                            ?>
                                            <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                <?php echo $thumbnail; ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="product-quantity">
                                    <div><?php echo $cart_item['quantity']; ?></div>
                                    <div>&times;</div>
                                </div>

                                <div class="product-name">
                                    <?php if ( empty( $product_permalink ) ) : ?>
                                        <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url( $product_permalink ); ?>">
                                            <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <div class="product-price"><?php echo $product_price; ?></div>

                            </div>

                        <?php }

                    }

                    do_action( 'woocommerce_mini_cart_contents' );

                    ?>
                </div>
            </div>
        </div>

        <p class="woocommerce-mini-cart__total total">
            <?php
            /**
             * Hook: woocommerce_widget_shopping_cart_total.
             *
             * @hooked woocommerce_widget_shopping_cart_subtotal - 10
             */
            do_action( 'woocommerce_widget_shopping_cart_total' );
            ?>
        </p>

        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

        <div class="minicart-buttons woocommerce-mini-cart__buttons buttons">
            <a href="<?php echo wc_get_cart_url(); ?>" class="mini-cart__cart-btn"><?php _e( 'Cart', 'roxydev' ); ?></a>
            <a href="<?php echo wc_get_checkout_url(); ?>" class="mini-cart__checkout-btn"><?php _e( 'Checkout', 'roxydev' ); ?></a>
        </div>

        <?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

    <?php else : ?>

        <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

    <?php endif; ?>

    <?php do_action( 'woocommerce_after_mini_cart' ); ?>

</div>  <!--./widget_shopping_cart_content -->