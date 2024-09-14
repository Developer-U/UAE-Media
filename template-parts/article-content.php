<?php
/**
 * Display Article content Block
 * Отображает карточку публикации в листинге
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<article class="category-list__item category-item d-grid align-items-start">
    <a class="picture-link" href="<?php the_permalink(); ?>">
        <figure class="category-item__image">
            <?php
            if (has_post_thumbnail()) { // условие, если есть миниатюра
                the_post_thumbnail('full'); // если параметры функции не указаны, то выводится миниатюра текущего поста, размер thumbnail
            } else {
                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/no-post-thumbnail.jpg" />'; // изображение по умолчанию, если миниатюра не установлена
            } ?>
        </figure>
    </a>

    <div class="category-item__block first-list__item category-block">
        <?php if (get_the_tags()) { ?>
            <div class="category-block__box d-flex align-items-center gap-2">
                <?php the_tags('<ul class="d-flex flex-wrap flex-lg-nowrap gap-2 gap-xl-3"><li class="button tag-name">','</li><li class="button tag-name">','</li></ul>'); ?>
            </div>
        <?php } ?>

        <a class="first-list__item__title" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>

        <div class="category-block__date">
            <?php the_time('F j Y, g:i'); ?>
        </div>
    </div>
</article>