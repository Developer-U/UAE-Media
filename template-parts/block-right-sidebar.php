<?php
/**
 * Block width right sidebar
 */

$first_top_news_cat = get_field('first_top_news_cat_' . get_locale() . '', 'options');
$first_top_news_right_cat = get_field('first_top_news_right_cat_' . get_locale() . '', 'options');
?>

<section class="block first">
    <div class="container">
        <!-- Мобильная версия списка - слайдером -->
        <?php
        $hot_news_args = array(
            'orderby' => 'name',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'post_type' => 'post',
            'post_status' => 'publish',
            'cat' => $first_top_news_cat,

        );
        $cat = get_category($first_top_news_cat);
        $cat_link = get_category_link($cat);

        query_posts($hot_news_args);
        ?>
        <div class="swiper block-first__slider first-news-slider d-block d-sm-none">
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
                                    echo '<a class="picture-link" href=" ' . get_the_permalink() . '">';
                                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    echo '</a>';
                                }
                                ?>
                                <span class="position-absolute"></span>
                                <a class="position-absolute" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </figure>
                        </div>

                    <?php }
                    wp_reset_query();
                } ?>
            </div>

            <div class="swiper-pagination"></div>

            <div class="swiper-button-next slider-arrow-next"></div>
            <div class="swiper-button-prev slider-arrow-prev"></div>
        </div>

        <div class="block__wrap under-line d-grid">
            <div class="block__main block-main d-none d-sm-block">
                <?php

                if ($first_top_news_cat) { ?>
                    <div class="block-main__first block-first under-line d-block d-sm-grid">
                        <?php

                        $hot_news_args = array(
                            'orderby' => 'name',
                            'order' => 'DESC',
                            'posts_per_page' => 3,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'taxonomy' => 'category',
                            'cat' => $first_top_news_cat,

                        );
                        $cat = get_category($first_top_news_cat);
                        $cat_link = get_category_link($cat);
                        query_posts($hot_news_args);
                        ?>

                        <!-- Десктопная версия списка -->
                        <div class="block-first__list d-none d-sm-block">
                            <a class="button cat-button" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

                            <ul class="block-first__list first-list">
                                <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        ?>

                                        <li class="first-list__item">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>

                                    <?php }
                                    wp_reset_query();
                                } ?>
                            </ul>
                        </div>

                        <?php if ($first_top_news_right_cat) { ?>

                            <figure class="block-first__picture d-none d-sm-block position-relative">
                                <?php
                                $center_news_args = array(
                                    'orderby' => 'name',
                                    'order' => 'DESC',
                                    'posts_per_page' => 1,
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'cat' => $first_top_news_right_cat,
                                );
                                query_posts($center_news_args);
                                $cat = get_category($first_top_news_right_cat);
                                $cat_link = get_category_link($cat);

                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();

                                        if (has_post_thumbnail()) {
                                            echo '<a class="picture-link" href=" ' . get_the_permalink() . '">';
                                            echo '<span class="on-image-title">' . get_the_title() . '</span>';
                                            the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                            echo '</a>';
                                        }

                                    }
                                    wp_reset_query();
                                } ?>
                            </figure>
                            
                        <? } ?>
                    </div>
                <?php }

                $first_bottom_left_news_cat = get_field('first_bottom_left_news_cat_' . get_locale() . '', 'options'); ?>

                <div class="block-main__second block-first d-none d-sm-grid">
                    <?php
                    if ($first_bottom_left_news_cat) { ?>

                        <div class="block-first__list">
                            <?php
                            $hot_news_2_args = array(
                                'orderby' => 'name',
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'cat' => $first_bottom_left_news_cat,

                            );
                            $cat = get_category($first_bottom_left_news_cat);
                            $cat_link = get_category_link($cat);
                            query_posts($hot_news_2_args);
                            ?>
                            <a class="button cat-button" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

                            <ul class="block-first__list first-list">
                                <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        ?>

                                        <li class="first-list__item">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>

                                    <?php }
                                    wp_reset_query();
                                } ?>
                            </ul>

                            <a class="button wide" href="<?php echo $cat_link; ?>">
                                <?php get_template_part('template-parts/button', 'wide'); ?>
                            </a>
                        </div>

                    <?php }

                    get_template_part('template-parts/first', 'centered-block'); ?>
                </div>
            </div>

            <?php
            get_template_part('template-parts/sidebar', 'first');

            get_template_part('template-parts/first', 'centered-mobile-block');
            ?>
        </div>
    </div>
</section>