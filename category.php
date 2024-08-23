<?php
/**
 * The template for displaying Category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});

get_header();

$category_id = get_query_var('cat');
$args = array(
	'posts_per_page' => 99,
	'post_type' => 'post',
	'orderby' => 'date',
	'order' => 'DESC',
	'cat' => $category_id,
);
?>

<section class="block first">
	<div class="container">
		<div class="block__wrap category d-grid">
			<div class="category__cats category-cats">
				<p class="button cat-button"><?php echo single_cat_title(); ?></p>

				<ul class="category-cats__list category-list">
					<?php
					if (have_posts()) ?>
					<?php while (have_posts()):
						the_post();

						get_template_part('template-parts/article', 'content');
					endwhile;
					wp_reset_query(); ?>
				</ul>
			</div>

			<?php get_template_part('template-parts/category', 'sidebar'); ?>
		</div>
	</div>
</section>

<?php
get_footer(); ?>