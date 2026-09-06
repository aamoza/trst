<?php
/**
 * Main Front Page Template
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main front-page-main">

	<?php
	// 1. Hero Slider & Promos
	get_template_part( 'template-parts/homepage/hero-slider' );

	// 2. Main Visual Categories
	get_template_part( 'template-parts/homepage/categories' );

	// 3. Discount & Special Offers Slider
	get_template_part( 'template-parts/homepage/discount-products' );

	// 4. Advertising Banners Row 1
	get_template_part( 'template-parts/homepage/banners' );

	// 5. Featured Products Grid
	get_template_part( 'template-parts/homepage/featured-products' );

	// 6. Popular Brands
	get_template_part( 'template-parts/homepage/brands' );
	?>

</main>

<?php
get_footer();
