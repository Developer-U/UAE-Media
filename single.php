<?php
/**
 * The template for Single
 *
 * @package Blocksy
 */

get_header();

if (have_posts()) {
	the_post();
}

if (
	function_exists('blc_get_content_block_that_matches')
	&&
	blc_get_content_block_that_matches([
		'template_type' => 'single',
		'template_subtype' => 'canvas'
	])
) {
	echo blc_render_content_block(
		blc_get_content_block_that_matches([
			'template_type' => 'single',
			'template_subtype' => 'canvas'
		])
	);
	have_posts();
	wp_reset_query();
	return;
}
?>

<section class="block first">
	<div class="container">
		<div class="block__wrap single d-block d-sm-grid">
			<div class="single__wrap single-wrap">
				<?php if (get_the_tags()) { ?>
					<div class="category-block__box d-flex align-items-center gap-2">
						<p class="button tag-name"><?php the_tags(''); ?></p>
					</div>
				<?php } ?>

				<article class="single__article single-article">
					<div class="single__content single-content pink">
						<div class="single-content__box single-box d-flex">
							<p class="col-auto"><?php the_category(' '); ?></p>

							<p class="col-auto"><?php the_date(); ?></p>
						</div>

						<h1 class="single-content__title">
							<?php the_title(); ?>
						</h1>

						<figure class="single-content__image">
							<?php
							if (has_post_thumbnail()) { // условие, если есть миниатюра
								the_post_thumbnail('full'); // если параметры функции не указаны, то выводится миниатюра текущего поста, размер thumbnail
							} ?>
						</figure>

						<div class="post">
							<?php the_content(); ?>
							<?php
							echo '<span class="share d-flex align-items-center gap-4"><p>';
							if (get_locale() == 'en_US') {
								echo 'Share:';
							} else {
								echo 'حصة';
							}
							'';
							echo do_shortcode('[Sassy_Social_Share]');
							echo '</p></span>';
							?>
						</div>
					</div>					

					<?php get_template_part('template-parts/block', 'recommended'); ?>
				</article>
			</div>

			<?php get_template_part('template-parts/category', 'sidebar'); ?>
		</div>
	</div>
</section>

<?php
have_posts();
wp_reset_query();

get_footer();

