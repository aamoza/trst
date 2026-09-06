<?php
/**
 * Script & Stylesheet Enqueue
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function sharestan_scripts() {
	// Main CSS
	wp_enqueue_style( 'sharestan-main-style', SHARESTAN_URI . '/assets/css/style.css', array(), SHARESTAN_VERSION );
	wp_enqueue_style( 'sharestan-responsive', SHARESTAN_URI . '/assets/css/responsive.css', array( 'sharestan-main-style' ), SHARESTAN_VERSION );

	if ( is_rtl() ) {
		wp_enqueue_style( 'sharestan-rtl', SHARESTAN_URI . '/assets/css/rtl.css', array( 'sharestan-main-style' ), SHARESTAN_VERSION );
	}

	// Main JS
	wp_enqueue_script( 'sharestan-main-js', SHARESTAN_URI . '/assets/js/main.js', array( 'jquery' ), SHARESTAN_VERSION, true );
	wp_enqueue_script( 'sharestan-ajax-search', SHARESTAN_URI . '/assets/js/ajax-search.js', array( 'jquery' ), SHARESTAN_VERSION, true );
	wp_enqueue_script( 'sharestan-mobile-menu', SHARESTAN_URI . '/assets/js/mobile-menu.js', array( 'jquery' ), SHARESTAN_VERSION, true );

	// Localize script for AJAX functionality
	wp_localize_script(
		'sharestan-main-js',
		'sharestan_params',
		array(
			'ajax_url'    => admin_url( 'admin-ajax.php' ),
			'ajax_nonce'  => wp_create_nonce( 'sharestan_nonce' ),
			'cart_url'    => class_exists( 'WooCommerce' ) ? wc_get_cart_url() : '',
			'loading_msg' => 'در حال بارگذاری...',
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sharestan_scripts' );

/**
 * Enqueue Admin Styles and Scripts
 */
function sharestan_admin_scripts() {
	wp_enqueue_style( 'sharestan-admin-style', SHARESTAN_URI . '/assets/css/admin.css', array(), SHARESTAN_VERSION );
}
add_action( 'admin_enqueue_scripts', 'sharestan_admin_scripts' );
