<?php
/**
 * Main Header Template Part (Desktop)
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone_number = get_option( 'sharestan_phone_number', '۰۲۱-۱۲۳۴۵۶۷۸' );
?>

<div class="header-top-bar">
	<div class="sharestan-container top-bar-flex">
		<div class="top-bar-notice">
			<i class="sharestan-icon icon-truck"></i>
			<span>ارسال سریع و رایگان برای سفارشی‌های بالای ۵۰۰ هزار تومان</span>
		</div>
		<div class="top-bar-contact">
			<span>پشتیبانی ۷/۲۴: <strong><?php echo esc_html( $phone_number ); ?></strong></span>
		</div>
	</div>
</div>

<div class="header-main-row">
	<div class="sharestan-container header-main-flex">
		<!-- Brand Logo -->
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-text">
					<span class="logo-highlight">شار</span>ستان
				</a>
			<?php endif; ?>
		</div>

		<!-- Live Ajax Search Box -->
		<div class="header-search-box">
			<form role="search" method="get" class="ajax-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="search-input-wrapper">
					<input type="text" name="s" class="search-input-field" placeholder="نام محصول، برند یا دسته‌بندی را جستجو کنید..." autocomplete="off">
					<button type="submit" class="search-submit-btn" aria-label="جستجو">
						<i class="sharestan-icon icon-search"></i>
					</button>
				</div>
				<input type="hidden" name="post_type" value="product">
				<div class="ajax-search-results-popup"></div>
			</form>
		</div>

		<!-- Header Actions (Account, Wishlist, Cart) -->
		<div class="header-actions">
			<!-- Account Action -->
			<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url() ); ?>" class="header-action-item account-action-btn">
				<i class="sharestan-icon icon-user"></i>
				<div class="action-text">
					<span class="sub-label">حساب کاربری</span>
					<span class="main-label"><?php echo is_user_logged_in() ? 'پروفایل من' : 'ورود / ثبت‌نام'; ?></span>
				</div>
			</a>

			<!-- Wishlist Action -->
			<a href="#" class="header-action-item wishlist-action-btn" title="علاقه‌مندی‌ها">
				<div class="icon-wrapper">
					<i class="sharestan-icon icon-heart"></i>
					<span class="badge-count wishlist-count">۰</span>
				</div>
			</a>

			<!-- Cart Action -->
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
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
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- Navigation Bar -->
<div class="header-navigation-row">
	<div class="sharestan-container navigation-flex">
		<div class="mega-menu-trigger-wrapper">
			<button class="mega-menu-btn">
				<i class="sharestan-icon icon-menu"></i>
				<span>دسته‌بندی کالاهـا</span>
			</button>
			<?php get_template_part( 'template-parts/header/mega-menu' ); ?>
		</div>

		<nav class="main-navigation">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'main-menu-list',
					'container'      => false,
				) );
			} else {
				echo '<ul class="main-menu-list">';
				echo '<li class="current-menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">صفحه اصلی</a></li>';
				if ( class_exists( 'WooCommerce' ) ) {
					echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">فروشگاه</a></li>';
				}
				echo '<li><a href="#">تخفیف‌ها و پیشنهادها</a></li>';
				echo '<li><a href="#">درباره ما</a></li>';
				echo '<li><a href="#">تماس با ما</a></li>';
				echo '</ul>';
			}
			?>
		</nav>
	</div>
</div>
