<?php
/**
 * Mobile Header Template Part
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="mobile-header-wrapper">
	<div class="sharestan-container mobile-header-flex">
		<button class="mobile-menu-toggle-btn" aria-label="منو">
			<i class="sharestan-icon icon-menu"></i>
		</button>

		<div class="mobile-site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-logo-text">
					<span class="logo-highlight">شار</span>ستان
				</a>
			<?php endif; ?>
		</div>

		<div class="mobile-header-actions">
			<a href="<?php echo esc_url( class_exists( 'WooCommerce' ) ? wc_get_cart_url() : '#' ); ?>" class="mobile-cart-btn">
				<i class="sharestan-icon icon-cart"></i>
				<?php if ( class_exists( 'WooCommerce' ) && WC()->cart ) : ?>
					<span class="badge-count cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
				<?php endif; ?>
			</a>
		</div>
	</div>

	<!-- Mobile Drawer Menu -->
	<div class="mobile-drawer-overlay"></div>
	<div class="mobile-drawer-menu">
		<div class="drawer-header">
			<div class="drawer-title">منوی دسترسی</div>
			<button class="drawer-close-btn">&times;</button>
		</div>
		<div class="drawer-search">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" name="s" placeholder="جستجوی محصول...">
				<input type="hidden" name="post_type" value="product">
				<button type="submit"><i class="sharestan-icon icon-search"></i></button>
			</form>
		</div>
		<nav class="drawer-nav">
			<?php
			if ( has_nav_menu( 'mobile' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'mobile',
					'menu_class'     => 'mobile-menu-list',
					'container'      => false,
				) );
			} elseif ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'mobile-menu-list',
					'container'      => false,
				) );
			} else {
				echo '<ul class="mobile-menu-list">';
				echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">صفحه اصلی</a></li>';
				if ( class_exists( 'WooCommerce' ) ) {
					echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">فروشگاه</a></li>';
				}
				echo '<li><a href="#">درباره ما</a></li>';
				echo '<li><a href="#">تماس با ما</a></li>';
				echo '</ul>';
			}
			?>
		</nav>
	</div>
</div>
