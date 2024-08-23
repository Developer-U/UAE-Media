<?php
/**
 * Block horizontal desctop
 * Листинг постов для десктопной версии в блоке где 4 горизонтальное новости в ряд
 */
?>

<ul class="block__second block-news block-four d-none d-sm-grid">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>

            <li class="first-list__item block-news__item block-news-item">
                <figure class="block-news-item__image position-relative">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                    } ?>

                    <button class="button"><?php the_tags(''); ?></button>
                </figure>

                <div class="block-news-item__data d-flex align-items-center justify-content-between">
                    <p class="col-auto"><?php echo get_the_date(); ?></p>

                    <p class="col-auto"><?php echo get_the_author(); ?></p>
                </div>

                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>

        <?php }
        wp_reset_query();
    } ?>
</ul>