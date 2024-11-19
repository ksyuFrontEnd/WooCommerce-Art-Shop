<?php get_header(); ?>		

<?php do_action( 'woocommerce_before_main_content' ); ?>

	<section class="shop-section section">
		<div class="container">
			<div class="shop__wrapper">
				<div class="shop__sidebar">
					<?php do_action( 'woocommerce_sidebar' ); ?>
				</div>
				<div class="shop__content">
					<div class="shop__content-header">
						<?php do_action( 'woocommerce_shop_loop_header' ); ?>
					</div>
					<!-- Product loop -->
					<div class="shop__content-loop">
						<?php

						if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */

						woocommerce_output_all_notices();
						?>
						
						<div class="before-shop-container">
							<?php do_action( 'woocommerce_before_shop_loop' ); ?>
						</div>

						<?php
						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
						} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
						}
						?>
					 </div> <!-- ./shop__content-loop -->
				</div>

			 </div> <!--./shop__wrapper -->
		 </div> <!--./container -->
	</section>

<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer(); ?>
