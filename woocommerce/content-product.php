<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_classes = is_front_page() ? 'product-card__main' : 'product-card__shop'

?>

<div <?php wc_product_class( $product_classes, $product ); ?>>
	<div class="product-card">

		<div class="add_to_cart_loader">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/add_to_cart_loader.svg" alt="loader">
		</div>
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		?>

		<div class="product-thumb">
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</div> <!--./product-thumb -->
		<div class="product-details">
			<?php 
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			?>

			<div class="product-bottom-details">
				<?php

				echo '<div class="roxydev-rating">';
					woocommerce_template_loop_rating();
				echo '</div>';
				?>

				<div class="product-details__center">
					<?php
					/**
					 * Hook: woocommerce_after_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
					?>

					<div class="product-details__add-to-cart">
						<?php
						/**
						 * Hook: woocommerce_after_shop_loop_item.
						 *
						 * @hooked woocommerce_template_loop_product_link_close - 5
						 * @hooked woocommerce_template_loop_add_to_cart - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item' );
						?>
					</div> <!--./product-details__add-to-cart -->
				</div> <!-- product-details__center -->
			</div> <!--./product-bottom-details -->
		</div> <!--./product-details -->
	</div><!--./product-card -->

</div> <!-- ./product-card__main -->
