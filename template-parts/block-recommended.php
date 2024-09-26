<?php
/**
 * Block recommended
 * Блок - рекомендованные новости
 */
?>

<div class="recommended">
    <p class="button cat-button recommended__btn">
        <?php
        if (get_locale() == 'en_US') {
            echo 'Recommended';
        } else {
            echo 'الموصى بها';
        }
        '';
        ?>
    </p>

    <!-- Мобильная версия списка -->
    <?php
    $id = get_the_ID();
    $arg_posts = array(
        'orderby' => 'rand',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'post_type' => 'post',
        'post_status' => 'publish',
    );
    query_posts($arg_posts);
    ?>

    <div class="swiper block__second block-news recommended-slider d-block d-sm-none">
        <div class="swiper-wrapper">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>

                    <div class="swiper-slide first-list__item block-news__item block-news-item">
                        <figure class="block-news-item__image position-relative">
                            <a class="picture-link" href="<?php echo $cat_link; ?>">
                                <?php                            
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                } ?>
                            </a>

                            <?php
                            $cat = get_the_category($id);
                            $cat_link = get_category_link($cat[0]);
                            ?>
                            <a class="button cat-button" href="<?php echo $cat_link; ?>">
                                <?php echo $cat[0]->name; ?>
                            </a>
                        </figure>

                        <div class="block-news-item__data d-flex align-items-center justify-content-between">
                            <p class="col-auto"><?php echo get_the_date(); ?></p>

                            
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
    </div>

    <!-- Десктопная версия списка -->
    <ul class="recommended__list recommended-list d-grid block-three d-none d-sm-grid">
        <?php
        // 
        $id = get_the_ID();
        $arg_posts = array(
            'orderby' => 'rand',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'post_type' => 'post',
            'post_status' => 'publish',
            // 'category__in' => '22, 24',
        );
        query_posts($arg_posts);

        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>


                <li class="first-list__item block-news__item block-news-item">
                    <figure class="block-news-item__image recommended-list__image position-relative">
                        <a class="picture-link" href="<?php echo $cat_link; ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                            } ?>
                        </a>

                        <?php
                        $cat = get_the_category($id);
                        $cat_link = get_category_link($cat[0]);
                        ?>
                        <a class="button cat-button" href="<?php echo $cat_link; ?>">
                            <?php echo $cat[0]->name; ?>
                        </a>
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
</div>