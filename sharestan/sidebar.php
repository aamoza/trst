<?php
/**
 * Sidebar Template
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area main-sidebar">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside>
