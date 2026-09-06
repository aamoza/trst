<?php
/**
 * The footer template for Sharestan Theme
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="sharestan-container">
			<div class="footer-widgets-grid">
				<div class="footer-col footer-about">
					<div class="footer-logo">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-title"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					</div>
					<p class="footer-desc">
						<?php
						$footer_about = get_option( 'sharestan_footer_about', 'فروشگاه اینترنتی شارستان، بررسی، انتخاب و خرید آنلاین با بهترین قیمت و ضمانت اصل بودن کالا.' );
						echo esc_html( $footer_about );
						?>
					</p>
					<div class="footer-contact-info">
						<div class="contact-item">
							<i class="sharestan-icon icon-phone"></i>
							<span>پشتیبانی: ۰۲۱-۱۲۳۴۵۶۷۸</span>
						</div>
						<div class="contact-item">
							<i class="sharestan-icon icon-email"></i>
							<span>ایمیل: info@sharestan.com</span>
						</div>
					</div>
				</div>

				<div class="footer-col">
					<h4 class="footer-widget-title">دسترسی سریع</h4>
					<?php
					if ( has_nav_menu( 'footer' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-links-list',
							'container'      => false,
						) );
					} else {
						echo '<ul class="footer-links-list">';
						echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">صفحه اصلی</a></li>';
						if ( class_exists( 'WooCommerce' ) ) {
							echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">فروشگاه</a></li>';
						}
						echo '<li><a href="#">درباره ما</a></li>';
						echo '<li><a href="#">تماس با ما</a></li>';
						echo '</ul>';
					}
					?>
				</div>

				<div class="footer-col">
					<h4 class="footer-widget-title">خدمات مشتریان</h4>
					<ul class="footer-links-list">
						<li><a href="#">پرسش‌های متداول</a></li>
						<li><a href="#">رویه‌های بازگرداندن کالا</a></li>
						<li><a href="#">شرایط استفاده</a></li>
						<li><a href="#">حریم خصوصی</a></li>
					</ul>
				</div>

				<div class="footer-col footer-trust-badges">
					<h4 class="footer-widget-title">نمادهای اعتماد</h4>
					<div class="trust-badges-wrapper">
						<div class="badge-item">
							<div class="badge-placeholder">نماد الکترونیکی</div>
						</div>
						<div class="badge-item">
							<div class="badge-placeholder">نشان ملی ثبت</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="copyright-text">
					کلیه حقوق مادی و معنوی این سایت متعلق به فروشگاه شارستان می‌باشد.
				</div>
				<div class="social-links">
					<a href="#" aria-label="اینستاگرام"><i class="sharestan-icon icon-instagram"></i></a>
					<a href="#" aria-label="تلگرام"><i class="sharestan-icon icon-telegram"></i></a>
					<a href="#" aria-label="واتساپ"><i class="sharestan-icon icon-whatsapp"></i></a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<!-- Mobile Bottom Navigation Bar -->
	<nav class="mobile-bottom-nav">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-nav-item <?php echo is_front_page() ? 'active' : ''; ?>">
			<i class="sharestan-icon icon-home"></i>
			<span>خانه</span>
		</a>
		<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' ) ); ?>" class="mobile-nav-item">
			<i class="sharestan-icon icon-category"></i>
			<span>دسته‌بندی</span>
		</a>
		<a href="#mobile-search-modal" class="mobile-nav-item toggle-mobile-search">
			<i class="sharestan-icon icon-search"></i>
			<span>جستجو</span>
		</a>
		<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_cart_url() : '#' ); ?>" class="mobile-nav-item cart-icon-wrapper">
			<i class="sharestan-icon icon-cart"></i>
			<span>سبد خرید</span>
			<?php if ( class_exists( 'WooCommerce' ) && WC()->cart ) : ?>
				<span class="cart-count badge-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
			<?php endif; ?>
		</a>
		<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url() ); ?>" class="mobile-nav-item">
			<i class="sharestan-icon icon-user"></i>
			<span>حساب کاربری</span>
		</a>
	</nav>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
