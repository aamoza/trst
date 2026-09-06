<?php
/**
 * WooCommerce Single Product Template Override
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );
?>

<div class="sharestan-container single-product-container">
	<div class="single-product-breadcrumbs">
		<?php sharestan_breadcrumbs(); ?>
	</div>

	<?php
	while ( have_posts() ) :
		the_post();
		global $product;
		if ( empty( $product ) || ! is_a( $product, 'WC_Product' ) ) {
			$product = wc_get_product( get_the_ID() );
		}
		?>

		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product-layout', get_the_ID() ); ?>>
			<div class="product-gallery-section">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>

			<div class="product-summary-section">
				<h1 class="product-title entry-title"><?php the_title(); ?></h1>

				<div class="product-meta-row">
					<div class="product-rating-summary">
						<?php woocommerce_template_single_rating(); ?>
					</div>
					<div class="product-sku-info">
						<?php if ( $product && wc_product_sku_enabled() && ( $sku = $product->get_sku() ) ) : ?>
							<span class="sku_wrapper">شناسه محصول: <span class="sku"><?php echo esc_html( $sku ); ?></span></span>
						<?php endif; ?>
					</div>
				</div>

				<div class="product-price-box">
					<?php woocommerce_template_single_price(); ?>
				</div>

				<div class="product-short-description">
					<?php woocommerce_template_single_excerpt(); ?>
				</div>

				<div class="product-add-to-cart-wrapper">
					<?php woocommerce_template_single_add_to_cart(); ?>
				</div>

				<div class="product-features-badges">
					<div class="feature-item">
						<i class="sharestan-icon icon-truck"></i>
						<span>تحویل اکسپرس و سریع</span>
					</div>
					<div class="feature-item">
						<i class="sharestan-icon icon-shield"></i>
						<span>ضمانت اصالت کالا</span>
					</div>
					<div class="feature-item">
						<i class="sharestan-icon icon-return"></i>
						<span>۷ روز ضمانت بازگشت</span>
					</div>
				</div>
			</div>
		</div>

		<div class="single-product-tabs-section">
			<?php woocommerce_output_product_data_tabs(); ?>
		</div>

		<div class="related-products-section">
			<?php woocommerce_output_related_products(); ?>
		</div>

	<?php endwhile; ?>
</div>

<?php
get_footer( 'shop' );
