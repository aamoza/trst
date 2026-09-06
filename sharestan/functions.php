<?php
/**
 * Sharestan Theme functions and definitions
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Define Theme Constants
 */
define( 'SHARESTAN_VERSION', '1.0.0' );
define( 'SHARESTAN_DIR', get_template_directory() );
define( 'SHARESTAN_URI', get_template_directory_uri() );

/**
 * Include Required Theme Files
 */
require_once SHARESTAN_DIR . '/inc/setup.php';
require_once SHARESTAN_DIR . '/inc/helpers.php';
require_once SHARESTAN_DIR . '/inc/security.php';
require_once SHARESTAN_DIR . '/inc/enqueue.php';
require_once SHARESTAN_DIR . '/inc/theme-options.php';
require_once SHARESTAN_DIR . '/inc/customizer.php';
require_once SHARESTAN_DIR . '/inc/widgets.php';
require_once SHARESTAN_DIR . '/inc/breadcrumbs.php';
require_once SHARESTAN_DIR . '/inc/ajax.php';

// Include WooCommerce compatibility functions if WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) {
	require_once SHARESTAN_DIR . '/inc/woocommerce.php';
}
