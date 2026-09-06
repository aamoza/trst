<?php
/**
 * Discounted Products Offer Slider Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="homepage-discount-section">
	<div class="sharestan-container">
		<div class="discount-box-wrapper">
			<div class="discount-banner-sidebar">
				<div class="timer-badge">پیشنهاد شگفت‌انگیز</div>
				<h3 class="discount-box-title">تخفیف‌های ویژه شارستان</h3>
				<p>فرصت محدود خرید کالاهای پرفروش با قیمت عالی</p>
				<div class="countdown-timer-box" data-countdown="2025-12-31">
					<div class="time-item"><span class="number">۲۴</span><span class="label">ساعت</span></div>
					<div class="time-item"><span class="number">۴۵</span><span class="label">دقیقه</span></div>
					<div class="time-item"><span class="number">۱۰</span><span class="label">ثانیه</span></div>
				</div>
			</div>

			<div class="discount-products-grid">
				<?php
				if ( class_exists( 'WooCommerce' ) ) {
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => 4,
						'meta_query'     => array(
							'relation' => 'OR',
							array(
								'key'     => '_sale_price',
								'value'   => 0,
								'compare' => '>',
								'type'    => 'NUMERIC',
							),
						),
					);

					$loop = new WP_Query( $args );

					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) {
							$loop->the_post();
							get_template_part( 'template-parts/product/product-card' );
						}
						wp_reset_postdata();
					} else {
						// Fallback query if no products are explicitly on sale
						$args_fallback = array(
							'post_type'      => 'product',
							'posts_per_page' => 4,
						);
						$loop_fb = new WP_Query( $args_fallback );
						while ( $loop_fb->have_posts() ) {
							$loop_fb->the_post();
							get_template_part( 'template-parts/product/product-card' );
						}
						wp_reset_postdata();
					}
				}
				?>
			</div>
		</div>
	</div>
</section>
