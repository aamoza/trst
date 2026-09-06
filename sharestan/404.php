<?php
/**
 * 404 Error Page Template
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="sharestan-container error-404-container">
	<div class="error-404-content">
		<h1 class="error-code">404</h1>
		<h2 class="error-title">صفحه مورد نظر یافت نشد!</h2>
		<p class="error-desc">صفحه‌ای که به دنبال آن بودید ممکن است حذف شده باشد یا آدرس آن تغییر کرده باشد.</p>

		<div class="error-actions">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sharestan-btn btn-primary">بازگشت به صفحه اصلی</a>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="sharestan-btn btn-outline">مشاهده فروشگاه</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
