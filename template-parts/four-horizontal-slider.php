<?php
/**
 * Block horizontal news slider
 * Слайдер для мобильной версии в блоке где 4 горизонтальное новости в ряд
 */
?>

<div class="swiper-wrapper">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $cat = get_the_category($id);
            $cat_link = get_category_link($cat[0]);
            ?>

            <div class="swiper-slide first-list__item block-news__item block-news-item">
                <figure class="block-news-item__image position-relative">
                    <a class="picture-link" href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                        } ?>

                        <?php
                        if (is_single()) { ?>
                            <a class="button cat-button" href="<?php echo $cat_link; ?>">
                                <?php echo $cat[0]->name; ?>
                            </a>
                        <?php } else {
                            if (get_the_tags()) {
                                ?>
                                <button class="button btn-tags"><?php the_tags(''); ?></button>
                            <?php }
                        } ?>
                    </a>
                </figure>

                <div class="block-news-item__data d-flex align-items-center justify-content-between">
                    <p class="col-auto"><?php echo get_the_date(); ?></p>

                    <p class="col-auto"><?php echo get_the_author(); ?></p>
                </div>

                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>

        <?php }
        wp_reset_query();
    } ?>
</div>

<div class="news-list__navigations d-flex align-items-center justify-content-end">
    <div class="swiper-pagination second"></div>

    <div class="news-list__arrows d-flex">
        <div class="swiper-button-prev slider-arrow-prev second"></div>
        <div class="swiper-button-next slider-arrow-next second"></div>
    </div>
</div>