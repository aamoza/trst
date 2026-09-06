<?php
/**
 * Breadcrumb Navigation Generator
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display Custom Persian Breadcrumbs
 */
function sharestan_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	echo '<nav class="sharestan-breadcrumbs" aria-label="مسیر راهنما">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">خانه</a>';
	echo '<span class="delimiter"> / </span>';

	if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {
		the_archive_title( '<span class="current">', '</span>' );
	} elseif ( is_category() ) {
		single_cat_title( '<span class="current">', '</span>' );
	} elseif ( is_single() ) {
		if ( 'product' === get_post_type() ) {
			if ( class_exists( 'WooCommerce' ) ) {
				$terms = wc_get_product_terms( get_the_ID(), 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
				if ( ! empty( $terms ) ) {
					$main_term = $terms[0];
					echo '<a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a>';
					echo '<span class="delimiter"> / </span>';
				}
			}
		} else {
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
				echo '<span class="delimiter"> / </span>';
			}
		}
		echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_page() ) {
		echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_search() ) {
		echo '<span class="current">نتایج جستجو برای: ' . esc_html( get_search_query() ) . '</span>';
	} elseif ( is_404() ) {
		echo '<span class="current">صفحه پیدا نشد</span>';
	}

	echo '</nav>';
}
