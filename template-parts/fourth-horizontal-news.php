<?php
/**
 * Block horizontal news 4
 * Блок - горизонтальная полоса 4 новости
 */

$fourth_news_cat = get_field('fourth_news_cat_' . get_locale() . '', 'options');   

if ($fourth_news_cat) {
    ?>

    <section class="block second">
        <div class="container">
            <!-- Мобильная версия списка -->
            <?php
            $fourth_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $fourth_news_cat,

            );
            $cat = get_category($fourth_news_cat);
            $cat_link = get_category_link( $cat );

            query_posts($fourth_news_args);
            ?>

            <a class="button cat-button d-flex d-sm-none" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <div class="swiper block__fourth block-news block-fourth-slider d-block d-sm-none">
                <?php get_template_part('template-parts/four', 'horizontal-slider'); ?>              
            </div>

            <!-- Десктопная версия списка -->
            <?php
            $fourth_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $fourth_news_cat,

            );
            $cat = get_category($fourth_news_cat);
            $cat_link = get_category_link( $cat );

            query_posts($fourth_news_args);
            ?>

            <a class="button cat-button d-none d-sm-flex" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <?php get_template_part('template-parts/four', 'horizontal-desctop'); ?>
        </div>
    </section>
<?php }