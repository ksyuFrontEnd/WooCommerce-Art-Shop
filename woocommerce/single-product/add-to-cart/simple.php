<?php

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php do_action( 'woocommerce_before_add_to_cart_quantity' ); ?>

		<div class="product__add2cart">

			<?php
			$min_quantity = $product->get_min_purchase_quantity();
			$max_quantity = $product->get_max_purchase_quantity();
			$stock_quantity = $product->get_stock_quantity();
			$is_sold_individually = $product->is_sold_individually();

			if ( ! ( $is_sold_individually || $stock_quantity === 1 ) ) {
				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $min_quantity, $product ),
						'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $max_quantity, $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $min_quantity, // WPCS: CSRF ok, input var ok.
					)
				);
			}
			?>

			<?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?> 
				
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single-product__add2cart-btn single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			
		</div> <!--./product__add2cart -->

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
