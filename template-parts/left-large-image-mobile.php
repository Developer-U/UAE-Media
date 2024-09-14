<?php
/**
 * Block Large image mobile
 * Блок мобильная версия слева - большая картинка, справа - список новостей
 */
?>

<div class="swiper-wrapper">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>

            <div class="swiper-slide">
                <figure class="first-news-slider__slide position-relative">              
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                    } ?>
                 
                    <span class="position-absolute">
                        <a class="picture-link" href="<?php the_permalink(); ?>"></a>
                    </span>
                    
                    <a class="position-absolute" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </figure>
            </div>

        <?php }
        // wp_reset_query();
    } ?>
</div>

<div class="swiper-pagination"></div>

<div class="swiper-button-next slider-arrow-next"></div>
<div class="swiper-button-prev slider-arrow-prev"></div>