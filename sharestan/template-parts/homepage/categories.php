<?php
/**
 * Visual Categories Grid Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories_data = array(
	array( 'name' => 'گوشی هوشمند', 'slug' => 'mobile', 'icon' => 'icon-mobile', 'bg' => '#eff6ff' ),
	array( 'name' => 'لپ‌تاپ و کالای دیجیتال', 'slug' => 'digital', 'icon' => 'icon-laptop', 'bg' => '#f0fdf4' ),
	array( 'name' => 'کفش اسپرت و رسمی', 'slug' => 'shoes', 'icon' => 'icon-shoe', 'bg' => '#fff7ed' ),
	array( 'name' => 'کیف چرمی و کوله', 'slug' => 'bags', 'icon' => 'icon-bag', 'bg' => '#fdf2f8' ),
	array( 'name' => 'ساعت و اکسسوری', 'slug' => 'accessories', 'icon' => 'icon-watch', 'bg' => '#faf5ff' ),
	array( 'name' => 'هدفون و هندزفری', 'slug' => 'headphones', 'icon' => 'icon-headphones', 'bg' => '#fff1f2' ),
);
?>

<section class="homepage-categories-section">
	<div class="sharestan-container">
		<div class="section-header">
			<h2 class="section-title">دسته‌بندی‌های محبوب</h2>
			<div class="section-subtitle">انتخاب سریع بر اساس نیاز شما</div>
		</div>

		<div class="categories-grid">
			<?php foreach ( $categories_data as $cat ) : ?>
				<?php
				$cat_url = class_exists( 'WooCommerce' ) ? get_term_link( $cat['slug'], 'product_cat' ) : '#';
				if ( is_wp_error( $cat_url ) ) {
					$cat_url = '#';
				}
				?>
				<a href="<?php echo esc_url( $cat_url ); ?>" class="category-card" style="--cat-bg: <?php echo esc_attr( $cat['bg'] ); ?>;">
					<div class="cat-icon-wrapper">
						<i class="sharestan-icon <?php echo esc_attr( $cat['icon'] ); ?>"></i>
					</div>
					<h3 class="cat-title"><?php echo esc_html( $cat['name'] ); ?></h3>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
