<?php
/**
 * Block horizontal news
 * Блок - горизонтальная полоса 4 новости
 */

$second_news_cat = get_field('second_news_cat_' . get_locale() . '', 'options');

if ($second_news_cat) {
    ?>

    <section class="block second">
        <div class="container">
            <!-- Мобильная версия списка -->
            <?php
            $second_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $second_news_cat,

            );
            $cat = get_category($second_news_cat);
            $cat_link = get_category_link($cat);

            query_posts($second_news_args);
            ?>

            <a class="button cat-button d-flex d-sm-none" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <div class="swiper block__second block-news block-second-slider d-block d-sm-none">
                <?php get_template_part('template-parts/four', 'horizontal-slider'); ?>
            </div>

            <!-- Десктопная версия списка -->
            <?php
            $second_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $second_news_cat,

            );
            $cat = get_category($second_news_cat);
            $cat_link = get_category_link($cat);

            query_posts($second_news_args);
            ?>

            <a class="button cat-button d-none d-sm-flex" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <?php get_template_part('template-parts/four', 'horizontal-desctop'); ?>
        </div>
    </section>
<?php }