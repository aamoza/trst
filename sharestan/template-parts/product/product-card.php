<?php
/**
 * Product Card Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( empty( $product ) || ! is_a( $product, 'WC_Product' ) ) {
	$product = wc_get_product( get_the_ID() );
}

if ( ! $product ) {
	return;
}

$regular_price = $product->get_regular_price();
$sale_price    = $product->get_sale_price();
$discount_pct  = sharestan_get_discount_percentage( $regular_price, $sale_price );
?>

<div class="sharestan-product-card" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">
	<?php if ( $product->is_on_sale() && $discount_pct > 0 ) : ?>
		<span class="product-badge discount-badge">%<?php echo esc_html( sharestan_convert_persian_numbers( $discount_pct ) ); ?> تخفیف</span>
	<?php endif; ?>

	<div class="product-card-image">
		<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
			<?php
			if ( $product->get_image_id() ) {
				echo $product->get_image( 'sharestan-product-card' );
			} else {
				echo '<img src="' . esc_url( SHARESTAN_URI . '/assets/images/placeholder.jpg' ) . '" alt="' . esc_attr( $product->get_name() ) . '">';
			}
			?>
		</a>
		<div class="product-card-actions">
			<button class="card-action-btn quick-view-btn" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>" title="نمایش سریع">
				<i class="sharestan-icon icon-eye"></i>
			</button>
			<button class="card-action-btn wishlist-add-btn" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>" title="افزودن به علاقه‌مندی">
				<i class="sharestan-icon icon-heart"></i>
			</button>
		</div>
	</div>

	<div class="product-card-details">
		<div class="product-category">
			<?php
			$terms = get_the_terms( $product->get_id(), 'product_cat' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				echo esc_html( $terms[0]->name );
			} else {
				echo 'دسته‌بندی نشده';
			}
			?>
		</div>

		<h3 class="product-card-title">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
				<?php echo esc_html( $product->get_name() ); ?>
			</a>
		</h3>

		<div class="product-card-rating">
			<div class="star-rating-box">
				<?php
				$rating = $product->get_average_rating();
				$count  = $product->get_rating_count();
				if ( $rating > 0 ) {
					echo wc_get_rating_html( $rating, $count );
				} else {
					echo '<span class="no-rating">بدون امتیاز</span>';
				}
				?>
			</div>
		</div>

		<div class="product-card-price-row">
			<div class="price-box">
				<?php if ( $product->is_on_sale() && $sale_price ) : ?>
					<del class="old-price"><?php echo wc_price( $regular_price ); ?></del>
					<ins class="current-price"><?php echo wc_price( $sale_price ); ?></ins>
				<?php else : ?>
					<span class="current-price"><?php echo wc_price( $product->get_price() ); ?></span>
				<?php endif; ?>
			</div>
		</div>

		<div class="product-card-footer">
			<?php
			woocommerce_template_loop_add_to_cart( array(
				'class' => 'sharestan-add-to-cart-btn button',
			) );
			?>
		</div>
	</div>
</div>
