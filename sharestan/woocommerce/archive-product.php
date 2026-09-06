<?php
/**
 * WooCommerce Archive Product Template Override
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );
?>

<div class="sharestan-container shop-page-container">
	<div class="shop-breadcrumbs-wrapper">
		<?php sharestan_breadcrumbs(); ?>
	</div>

	<div class="shop-main-layout">
		<!-- Sidebar Filters -->
		<aside class="shop-sidebar-area">
			<div class="filter-card">
				<h3 class="filter-title">فیلترهای فروشگاه</h3>
				<?php
				if ( is_active_sidebar( 'sidebar-shop' ) ) {
					dynamic_sidebar( 'sidebar-shop' );
				} else {
					echo '<p class="sidebar-empty-notice">ویجت‌های فیلتر فروشگاه را از بخش مدیریت پیشخوان تنظیم کنید.</p>';
				}
				?>
			</div>
		</aside>

		<!-- Product Grid / Listing -->
		<main id="primary" class="shop-products-area">
			<header class="woocommerce-products-header">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
			</header>

			<div class="shop-toolbar">
				<div class="toolbar-result-count">
					<?php woocommerce_result_count(); ?>
				</div>
				<div class="toolbar-ordering">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
			</div>

			<?php
			if ( woocommerce_product_loop() ) {
				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						do_action( 'woocommerce_shop_loop' );
						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				do_action( 'woocommerce_after_shop_loop' );
			} else {
				do_action( 'woocommerce_no_products_found' );
			}
			?>
		</main>
	</div>
</div>

<?php
get_footer( 'shop' );
