<?php
/**
 * My Account Page Template Override
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="sharestan-container myaccount-page-container">
	<div class="myaccount-breadcrumbs">
		<?php sharestan_breadcrumbs(); ?>
	</div>

	<div class="myaccount-layout">
		<?php
		/**
		 * My Account navigation.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_navigation' );
		?>

		<div class="woocommerce-MyAccount-content account-main-content">
			<?php
				/**
				 * My Account content.
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		</div>
	</div>
</div>

<?php
get_footer();
