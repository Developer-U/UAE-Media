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

$term = get_queried_object();

$current_page = !empty($_GET['num']) ? $_GET['num'] : 1;

$category_id = get_query_var('cat');
$arg_news = array(
	'posts_per_page' => 15,
	'post_type' => 'post',
	'orderby' => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'cat' => $category_id,
	'paged' => $current_page,
);

$query_news = new WP_Query($arg_news);
?>

<section class="block first">
	<div class="container">
		<div class="block__wrap category d-grid">
			<div class="category__cats category-cats">
				<p class="button cat-button"><?php echo single_cat_title(); ?></p>

				<ul class="category-cats__list category-list">
					<?php
					if ($query_news->have_posts()) ?>
					<?php while ($query_news->have_posts()):
						$query_news->the_post();


						get_template_part('template-parts/article', 'content');
					endwhile;
					wp_reset_query(); ?>
				</ul>

				<?php
				echo '<pre>' .$term->slug. '</pre>';

				echo paginate_links(array(
					'prev_next' => true,
					'prev_text' => __('&#129144;'),
					'next_text' => __('&#129146;'),
					'end_size' => 2,
					'mid_size' => 2,
					'type' => 'list',
					'base' => site_url() . '/category/' . $term->slug . '/%_%', // 'blog' - должно совпадать со слагом страницы Блога в админке
					'format' => '?num=%#%', // Здесь - переменная 'num'. которую задали на стр. 16. Если что, поменяй.
					'total' => $query_news->max_num_pages,
					'current' => $current_page,
				));
				?>
			</div>

			<?php get_template_part('template-parts/category', 'sidebar'); ?>
		</div>
	</div>
</section>

<?php
get_footer(); ?>