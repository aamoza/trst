<?php
/**
 * Register Widget Areas
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Widget Area.
 */
function sharestan_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'سایدبار اصلی',
			'id'            => 'sidebar-main',
			'description'   => 'ویجت‌های این بخش در سایدبار نوشته‌ها و فروشگاه قرار می‌گیرند.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'فیلترهای فروشگاه',
			'id'            => 'sidebar-shop',
			'description'   => 'ویجت‌های فیلتر محصولات در صفحه فروشگاه.',
			'before_widget' => '<div id="%1$s" class="shop-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="shop-widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'sharestan_widgets_init' );
