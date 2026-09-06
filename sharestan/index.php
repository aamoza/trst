<?php
/**
 * Main Template File (Fallback / Blog)
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>

			<div class="posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium' ); ?>
								</a>
							</div>
						<?php endif; ?>

						<div class="post-content">
							<h2 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="post-meta">
								<span><i class="sharestan-icon icon-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
								<span><i class="sharestan-icon icon-user"></i> <?php the_author(); ?></span>
							</div>
							<div class="post-excerpt">
								<?php the_excerpt(); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="read-more-btn">ادامه مطلب</a>
						</div>
					</article>
					<?php
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

			<section class="no-results not-found">
				<h2>محتوایی یافت نشد</h2>
				<p>متأسفانه مطلبی متناسب با درخواست شما پیدا نشد.</p>
			</section>

		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
