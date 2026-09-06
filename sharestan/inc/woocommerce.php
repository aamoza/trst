<?php
/**
 * WooCommerce Integration & Template Overrides Hooks
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Theme Support Modifications
 */
function sharestan_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'sharestan_woocommerce_setup' );

/**
 * Filter WooCommerce Header Cart Fragments for Live AJAX Update
 */
function sharestan_cart_link_fragment( $fragments ) {
	ob_start();
	?>
	<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-action-item cart-action-btn" title="سبد خرید">
		<div class="icon-wrapper">
			<i class="sharestan-icon icon-cart"></i>
			<span class="badge-count cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
		</div>
		<div class="action-text">
			<span class="sub-label">سبد خرید</span>
			<span class="main-label"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
		</div>
	</a>
	<?php
	$fragments['a.cart-action-btn'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'sharestan_cart_link_fragment' );

/**
 * Custom Sales Badge Percentage Text
 */
function sharestan_custom_sale_flash( $text, $post, $product ) {
	if ( $product->is_on_sale() && $product->get_regular_price() > 0 ) {
		$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
		return '<span class="onsale">٪' . sharestan_convert_persian_numbers( $percentage ) . ' تخفیف</span>';
	}
	return '<span class="onsale">تخفیف ویژه</span>';
}
add_filter( 'woocommerce_sale_flash', 'sharestan_custom_sale_flash', 10, 3 );
