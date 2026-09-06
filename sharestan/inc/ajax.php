<?php
/**
 * AJAX Handler Functions (Live Search, Quick View, Wishlist & Add to Cart)
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * AJAX Live Search
 */
function sharestan_ajax_live_search() {
	check_ajax_referer( 'sharestan_nonce', 'nonce' );

	$search_query = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';

	if ( empty( $search_query ) || strlen( $search_query ) < 2 ) {
		wp_send_json_error( array( 'message' => 'عبارت جستجو بسیار کوتاه است' ) );
	}

	$args = array(
		'post_type'      => array( 'product', 'post' ),
		'post_status'    => 'publish',
		'posts_per_page' => 6,
		's'              => $search_query,
	);

	$query = new WP_Query( $args );
	$results = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$product = class_exists( 'WooCommerce' ) && 'product' === get_post_type() ? wc_get_product( get_the_ID() ) : null;

			$results[] = array(
				'id'        => get_the_ID(),
				'title'     => get_the_title(),
				'url'       => get_permalink(),
				'image'     => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) : SHARESTAN_URI . '/assets/images/placeholder.jpg',
				'price_html' => $product ? $product->get_price_html() : '',
				'type'      => get_post_type() === 'product' ? 'محصول' : 'نوشته',
			);
		}
		wp_reset_postdata();
		wp_send_json_success( array( 'results' => $results ) );
	} else {
		wp_send_json_error( array( 'message' => 'هیچ نتیجه‌ای یافت نشد.' ) );
	}
}
add_action( 'wp_ajax_sharestan_live_search', 'sharestan_ajax_live_search' );
add_action( 'wp_ajax_nopriv_sharestan_live_search', 'sharestan_ajax_live_search' );

/**
 * AJAX Quick View Modal
 */
function sharestan_ajax_quick_view() {
	check_ajax_referer( 'sharestan_nonce', 'nonce' );

	$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;

	if ( ! $product_id || ! class_exists( 'WooCommerce' ) ) {
		wp_send_json_error( array( 'message' => 'محصول نامعتبر است' ) );
	}

	$product = wc_get_product( $product_id );
	if ( ! $product ) {
		wp_send_json_error( array( 'message' => 'محصول پیدا نشد' ) );
	}

	ob_start();
	?>
	<div class="quick-view-product-container">
		<div class="quick-view-image">
			<?php echo $product->get_image( 'shop_single' ); ?>
		</div>
		<div class="quick-view-summary">
			<h2 class="product-title"><?php echo esc_html( $product->get_name() ); ?></h2>
			<div class="product-price-box">
				<?php echo $product->get_price_html(); ?>
			</div>
			<div class="product-excerpt">
				<?php echo wp_kses_post( $product->get_short_description() ); ?>
			</div>
			<div class="product-actions">
				<?php
				woocommerce_template_single_add_to_cart();
				?>
			</div>
		</div>
	</div>
	<?php
	$output = ob_get_clean();

	wp_send_json_success( array( 'html' => $output ) );
}
add_action( 'wp_ajax_sharestan_quick_view', 'sharestan_ajax_quick_view' );
add_action( 'wp_ajax_nopriv_sharestan_quick_view', 'sharestan_ajax_quick_view' );
