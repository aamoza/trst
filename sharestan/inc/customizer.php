<?php
/**
 * Theme Customizer Settings
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer Settings
 */
function sharestan_customize_register( $wp_customize ) {
	// Section: Sharestan Options
	$wp_customize->add_section(
		'sharestan_options_section',
		array(
			'title'    => 'تنظیمات عمومی شارستان',
			'priority' => 30,
		)
	);

	// Primary Color Setting
	$wp_customize->add_setting(
		'sharestan_theme_color',
		array(
			'default'           => '#2563eb',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sharestan_theme_color',
			array(
				'label'    => 'رنگ اصلی سایت',
				'section'  => 'sharestan_options_section',
				'settings' => 'sharestan_theme_color',
			)
		)
	);
}
add_action( 'customize_register', 'sharestan_customize_register' );
