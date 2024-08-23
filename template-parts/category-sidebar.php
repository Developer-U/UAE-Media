<?php
/**
 * Category Sidebar
 * Сайдбар на странице категории
 */
?>

<div class="category-cats__sidebar block-sidebar category__sidebar">
    <ul class="category-cats__list cat-sidebar-list">
        <?php
        $arg_cat = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 1,
            'exclude' => $category_id,
            'include' => '',
            'number' => 2,
            'taxonomy' => 'category',
            'post_type' => 'post',
        );
        $categories = get_categories($arg_cat);

        if ($categories) {
            $cn = 0;
            foreach ($categories as $cat) {
                $cat_num = $cn++;
                $cat_link = get_category_link($cat);
                ?>

                <li class="cat-sidebar-list__item cat-sidebar-item">
                    <a class="button cat-button cat-sidebar-item__btn" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

                    <?php
                    $arg_posts = array(
                        'orderby' => 'name',
                        'order' => 'DESC',
                        'posts_per_page' => 3,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $cat->cat_ID,
                    );
                    $query = new WP_Query($arg_posts);
                    ?>

                    <ul class="first-list">
                        <?php if ($query->have_posts()) ?>
                        <?php while ($query->have_posts()):
                            $query->the_post();
                            ?>

                            <li class="first-list__item first cat-sidebar-list__item">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo '<figure class="block-sidebar__category sidebar">';
                                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    echo '</figure>';
                                }
                                ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>

                        <?php endwhile;
                        wp_reset_postdata() ?>
                    </ul>

                </li>
            <?php }
        } ?>
    </ul>
</div>