<?php
/**
 * Block sixth news
 * Шестой блок - первая новость крупная картинка, далее - списком
 */

$sixth_news_cat = get_field('sixth_news_cat_' . get_locale() . '', 'options');

if ($sixth_news_cat) {
    ?>

    <section class="block third pink">
        <div class="container">
            <!-- Мобильная версия списка - слайдером -->
            <?php
            $sixth_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 5,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $sixth_news_cat,

            );
            $cat = get_category($sixth_news_cat);
            $cat_link = get_category_link($cat);

            query_posts($sixth_news_args);
            ?>

            <a class="button cat-button d-flex d-sm-none" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <div class="swiper third__slider sixth-slider d-block d-sm-none">
                <!-- Мобильная версия блок со списком новостей -->
                <?php get_template_part('template-parts/left', 'large-image-mobile'); ?>
            </div>

            <?php
            if (have_posts()) { ?>
                <ul class="block__third third-news d-block d-sm-none mt-4">
                    <?php
                    while (have_posts()) {
                        the_post();
                        ?>

                        <li class="first-list__item first">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                            <figure class="block-sidebar__category sidebar">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                } ?>
                            </figure>
                        </li>

                    <?php }
                    wp_reset_query(); ?>
                </ul>
            <?php } ?>

            <!-- Десктопная версия списка -->
            <?php
            $sixth_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 5,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $sixth_news_cat,

            );
            $cat = get_category($sixth_news_cat);
            $cat_link = get_category_link($cat);

            query_posts($sixth_news_args);
            ?>

            <a class="button cat-button d-none d-sm-flex" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <!-- Десктопная версия блок со списком новостей -->
            <?php get_template_part('template-parts/left', 'large-image-desctop'); ?>
        </div>
    </section>

<? }