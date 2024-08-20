<?php
/**
 * Block width right sidebar
 */
?>

<section class="block">
    <div class="container">
        <div class="block__wrap d-grid">
            <div class="block__main block-main">
                <?php
                $first_top_news_cat = get_field('first_top_news_cat_' . get_locale() . '', 'options');

                if ($first_top_news_cat) { ?>
                    <div class="block-main__first block-first under-line d-grid">
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

                        query_posts($hot_news_args);
                        ?>
                        <div class="block-first__list">
                            <a class="button cat-button" href="<?php echo $cat->link; ?>"><?php echo $cat->name; ?></a>

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

                        <figure class="block-first__picture">
                            <?php
                            $center_news_args = array(
                                'orderby' => 'name',
                                'order' => 'DESC',
                                'posts_per_page' => 1,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'cat' => 48,
                            );
                            query_posts($center_news_args);

                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post();

                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    }

                                }
                                wp_reset_query();
                            } ?>
                        </figure>
                    </div>
                <?php }

                $first_bottom_left_news_cat = get_field('first_bottom_left_news_cat_' . get_locale() . '', 'options'); ?>

                <div class="block-main__second block-first d-grid">
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
                                'cat' => 15,

                            );
                            $cat = get_category(15);

                            query_posts($hot_news_2_args);
                            ?>
                            <a class="button cat-button" href="<?php echo $cat->link; ?>"><?php echo $cat->name; ?></a>

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

                            <button class="button wide">red more</button>
                        </div>

                    <?php }

                    get_template_part('template-parts/first', 'centered-block'); ?>
                </div>
            </div>

            <?php get_template_part('template-parts/sidebar', 'first'); ?>
        </div>
    </div>
</section>