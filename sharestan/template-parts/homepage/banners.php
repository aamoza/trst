<?php
/**
 * Advertising Banners Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="homepage-banners-section">
	<div class="sharestan-container">
		<div class="banners-grid">
			<div class="banner-box box-1">
				<div class="banner-info">
					<span class="badge">پیشنهاد فوق‌العاده</span>
					<h3>انواع کیف چرمی دست‌دوز</h3>
					<p>کیفیت بی‌نظیر با تخفیف ویژه برای مشتریان جدید</p>
					<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#' ); ?>" class="sharestan-btn btn-sm">خرید کنید</a>
				</div>
			</div>

			<div class="banner-box box-2">
				<div class="banner-info">
					<span class="badge">جدیدترین‌های دیجیتال</span>
					<h3>لوازم جانبی موبایل و کامپیوتر</h3>
					<p>انواع پاوربانک، شارژر و کابل‌های اصلی</p>
					<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#' ); ?>" class="sharestan-btn btn-sm">مشاهده همه</a>
				</div>
			</div>
		</div>
	</div>
</section>
