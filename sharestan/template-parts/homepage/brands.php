<?php
/**
 * Popular Brands Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$brands = array(
	array( 'name' => 'سامسونگ', 'slug' => 'samsung' ),
	array( 'name' => 'اپل', 'slug' => 'apple' ),
	array( 'name' => 'شیائومی', 'slug' => 'xiaomi' ),
	array( 'name' => 'چرم مشهد', 'slug' => 'mashhad-leather' ),
	array( 'name' => 'آدیداس', 'slug' => 'adidas' ),
	array( 'name' => 'سونی', 'slug' => 'sony' ),
);
?>

<section class="homepage-brands-section">
	<div class="sharestan-container">
		<div class="section-header">
			<h2 class="section-title">برندهای محبوب و برتر</h2>
		</div>

		<div class="brands-grid">
			<?php foreach ( $brands as $brand ) : ?>
				<div class="brand-item">
					<div class="brand-name-box"><?php echo esc_html( $brand['name'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
