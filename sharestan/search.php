<?php
/**
 * Search Results Template
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="sharestan-container page-layout-container">
	<main id="primary" class="site-main">

		<header class="page-header search-results-header">
			<h1 class="page-title">
				نتایج جستجو برای: <span><?php echo esc_html( get_search_query() ); ?></span>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="search-results-grid">
				<?php
				while ( have_posts() ) :
					the_post();

					if ( 'product' === get_post_type() && class_exists( 'WooCommerce' ) ) {
						wc_get_template_part( 'content', 'product' );
					} else {
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-card' ); ?>>
							<h3 class="result-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="result-excerpt"><?php the_excerpt(); ?></div>
						</article>
						<?php
					}
				endwhile;
				?>
			</div>

			<div class="sharestan-pagination">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => 'قبلی',
					'next_text' => 'بعدی',
				) );
				?>
			</div>

		<?php else : ?>

			<div class="search-no-results">
				<p>هیچ نتیجه‌ای متناسب با عبارت جستجو شده پیدا نشد. لطفاً کلمات دیگری را امتحان کنید.</p>
				<?php get_search_form(); ?>
			</div>

		<?php endif; ?>

	</main>
</div>

<?php
get_footer();
