<?php
/**
 * Theme Setup Configuration
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'sharestan_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function sharestan_setup() {
		// Make theme available for translation
		load_theme_textdomain( 'sharestan', SHARESTAN_DIR . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register Nav Menus
		register_nav_menus(
			array(
				'primary' => esc_html__( 'منوی اصلی', 'sharestan' ),
				'mobile'  => esc_html__( 'منوی موبایل', 'sharestan' ),
				'footer'  => esc_html__( 'منوی فوتر', 'sharestan' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Custom Logo Support
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// WooCommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Image Sizes
		add_image_size( 'sharestan-product-card', 350, 350, true );
		add_image_size( 'sharestan-banner', 600, 300, true );
		add_image_size( 'sharestan-slider', 1200, 450, true );
	}
}
add_action( 'after_setup_theme', 'sharestan_setup' );

/**
 * Set content width in pixels
 */
function sharestan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sharestan_content_width', 1200 );
}
add_action( 'after_setup_theme', 'sharestan_content_width', 0 );
