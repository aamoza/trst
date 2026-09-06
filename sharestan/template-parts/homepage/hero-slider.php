<?php
/**
 * Hero Slider Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="homepage-hero-section">
	<div class="sharestan-container hero-grid-layout">
		<!-- Main Hero Banner / Slider -->
		<div class="main-hero-slider">
			<div class="hero-slide active">
				<div class="hero-slide-content">
					<span class="hero-badge">جشنواره فروش ویژه</span>
					<h2 class="hero-title">گوشی‌های هوشمند با تخفیف‌های شگفت‌انگیز</h2>
					<p class="hero-desc">بهترین کالاهای دیجیتال را با ضمانت اصالت و ارسال سریع تجربه کنید.</p>
					<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#' ); ?>" class="sharestan-btn btn-primary hero-btn">مشاهده و خرید محصولات</a>
				</div>
				<div class="hero-slide-image">
					<img src="<?php echo esc_url( SHARESTAN_URI . '/assets/images/hero-1.png' ); ?>" alt="فروش ویژه موبایل">
				</div>
			</div>
		</div>

		<!-- Side Promos -->
		<div class="side-promo-banners">
			<div class="side-banner-card promo-card-1">
				<div class="card-content">
					<span class="sub-title">کیف & کفش</span>
					<h4>جدیدترین کالکشن چرم</h4>
					<a href="#" class="banner-link">خرید آنلاین &larr;</a>
				</div>
			</div>
			<div class="side-banner-card promo-card-2">
				<div class="card-content">
					<span class="sub-title">لوازم جانبی</span>
					<h4>هدفون و ساعت هوشمند</h4>
					<a href="#" class="banner-link">بررسی پیشنهادها &larr;</a>
				</div>
			</div>
		</div>
	</div>
</section>
