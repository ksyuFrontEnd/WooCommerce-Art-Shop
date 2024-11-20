<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : 
			
			// Зміна тексту опцій
            if ( $id === 'popularity' ) {
                $name = 'за популярністю'; 
            } elseif ( $id === 'rating' ) {
                $name = 'за оцінкою'; 
            } elseif ( $id === 'date' ) {
                $name = 'за найновішими'; 
            } elseif ( $id === 'price' ) {
                $name = 'за ціною: від найнижчої'; 
            } elseif ( $id === 'price-desc' ) {
                $name = 'за ціною: від найвищої';
            } else {
				$name = 'сортувати за замовчуванням';
			}
			
			?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
