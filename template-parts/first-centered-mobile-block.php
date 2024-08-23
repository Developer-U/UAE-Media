<?php
/**
 * First centered mobile block
 * Центральный блок на розовом мобильная версия
 */
?>

<section class="block__sidebar block-sidebar grid-column pink d-sm-none">
    <div>
        <?php
        $mobile_centered_cat_1 = get_field('first_bottom_left_news_cat_' . get_locale() . '', 'options');
        $mobile_centered_cat_2 = get_field('first_bottom_centered_news_cat_' . get_locale() . '', 'options');
        $mobile_centered_cats = [$mobile_centered_cat_1, $mobile_centered_cat_2];

        if ($mobile_centered_cat_1 && $mobile_centered_cat_2) { // Показываем содержимое сайдбара только, если в админке выбраны 2 категории
            $arg_cat = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 1,
                'exclude' => '',
                'include' => $mobile_centered_cats,
                'taxonomy' => 'category',
                'post_type' => 'post',
            );
            $categories = get_categories($arg_cat);
            ?>

            <div class="block-sidebar__cats right-sidebar-cat-list d-flex">
                <?php
                if ($categories) {
                    $i = 3;
                    foreach ($categories as $cat) {
                        $index = $i++; ?>
                        <button class="js-pathTabs button <?php if ($index == 3) { ?>active<?php } ?>"
                            data-path="<?php echo $index; ?>"><?php echo $cat->name; ?>
                        </button>
                    <?php }
                }
                ?>
            </div>

            <?php
            if ($categories) {
                $n = 3;
                foreach ($categories as $cat) {
                    $target = $n++;

                    $arg_posts = array(
                        'orderby' => 'name',
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $cat->cat_ID,
                    );
                    $query = new WP_Query($arg_posts);
                    ?>

                    <ul class="block-first__list first-list js-targetTabs <?php if ($target == 3) { ?>active<?php } ?>"
                        data-target="<?php echo $target; ?>">

                        <?php if ($query->have_posts())
                            $a = 3; ?>
                        <?php while ($query->have_posts()):
                            $query->the_post();
                            $news_index = $a++;
                            ?>

                            <li class="first-list__item <?php if ($news_index == 3) { ?>first <?php } ?>">
                                <?php
                                if ($news_index == 3) {
                                    if (has_post_thumbnail()) {
                                        echo '<figure class="block-sidebar__category sidebar">';
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                        echo '</figure>';
                                    }
                                }
                                ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>

                        <?php endwhile;
                        wp_reset_postdata() ?>
                    </ul>
                <?php
                }
            }
        } ?>
    </div>

    <?php get_template_part('template-parts/button', 'wide'); ?>
</section>