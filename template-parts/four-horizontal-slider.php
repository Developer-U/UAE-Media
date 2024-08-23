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
            ?>

            <div class="swiper-slide first-list__item block-news__item block-news-item">
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