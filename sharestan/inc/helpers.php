<?php
/**
 * Helper functions
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Convert English numbers to Persian digits
 */
function sharestan_convert_persian_numbers( $string ) {
	$persian_digits = array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' );
	$english_digits = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' );
	return str_replace( $english_digits, $persian_digits, (string) $string );
}

/**
 * Calculate and return discount percentage
 */
function sharestan_get_discount_percentage( $regular_price, $sale_price ) {
	if ( ! $regular_price || ! $sale_price || $regular_price <= $sale_price ) {
		return 0;
	}
	$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
	return $percentage;
}

/**
 * Get product category list HTML with icons
 */
function sharestan_get_category_icon( $category_slug ) {
	$icons = array(
		'mobile'      => 'icon-mobile',
		'digital'     => 'icon-laptop',
		'bags'        => 'icon-bag',
		'shoes'       => 'icon-shoe',
		'clothing'    => 'icon-shirt',
		'accessories' => 'icon-watch',
	);

	return isset( $icons[ $category_slug ] ) ? $icons[ $category_slug ] : 'icon-grid';
}
