<?php
/**
 * Featured Products Grid Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="homepage-featured-section">
	<div class="sharestan-container">
		<div class="section-header flex-header">
			<div>
				<h2 class="section-title">محصولات منتخب و ویژه</h2>
				<div class="section-subtitle">برترین و محبوب‌ترین کالاهای هفته</div>
			</div>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="view-all-link">مشاهده همه محصولات &larr;</a>
			<?php endif; ?>
		</div>

		<div class="products-carousel-grid">
			<?php
			if ( class_exists( 'WooCommerce' ) ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 8,
					'post_status'    => 'publish',
				);

				$loop = new WP_Query( $args );

				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) {
						$loop->the_post();
						get_template_part( 'template-parts/product/product-card' );
					}
					wp_reset_postdata();
				} else {
					echo '<div class="no-products-found"><p>هنوز محصولی ثبت نشده است.</p></div>';
				}
			} else {
				echo '<div class="no-products-found"><p>برای مشاهده محصولات، افزونه ووکامرس را فعال کنید.</p></div>';
			}
			?>
		</div>
	</div>
</section>
