<?php
/**
 * The header for Sharestan Theme
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'sharestan-body' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">

	<header id="masthead" class="site-header">
		<?php
		// Main Desktop Header
		get_template_part( 'template-parts/header/main-header' );

		// Mobile Header
		get_template_part( 'template-parts/header/mobile-header' );
		?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
