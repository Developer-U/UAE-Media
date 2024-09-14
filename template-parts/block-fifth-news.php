<?php
/**
 * Block 5 Categories & news
 * Блок 5 - новости по категориям в три столбца
 */

?>

<section class="block fifth">
    <div class="container">
        <ul class="categories-list d-grid">
            <?php
            $arg_cat = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 1,
                'exclude' => '',
                'include' => '',
                'number' => 3,
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
                    <li class="categiries-list__item cat-item" data-num="<?php echo $cat_num; ?>">
                        <a class="button cat-button" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

                        <div class="cat-item__border">
                            <?php
                            $arg_posts = array(
                                'orderby' => 'name',
                                'order' => 'DESC',
                                'posts_per_page' => 4,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'cat' => $cat->cat_ID,
                            );
                            $query = new WP_Query($arg_posts);
                            ?>

                            <ul class="cat-item__list">
                                <?php if ($query->have_posts())
                                    $i = 0;
                                while ($query->have_posts()):
                                    $query->the_post();
                                    $index = $i++;

                                    if ($index == 0) { ?>
                                        <li class="cat-item__first">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                echo '<a class="picture-link" href=" ' . get_the_permalink() . '">';
                                                echo '<figure class="cat-item__image">';
                                                the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                                echo '</figure>';
                                                echo '</a>';
                                            } ?>

                                            <div class="first-list__item block-center-list__left">
                                                <div
                                                    class="block-news-item__data d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between">
                                                    <h5><?php the_tags(''); ?></h5>

                                                    <p class="col-auto"><?php echo get_the_date(); ?></p>
                                                </div>

                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                        </li>
                                    <?php } else { ?>
                                        <li class="cat-item__item d-grid">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                echo '<a class="picture-link" href=" ' . get_the_permalink() . '">';
                                                echo '<figure>';
                                                the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                                echo '</figure>';
                                                echo '</a>';
                                            } ?>

                                            <div class="first-list__item block-center-list__left">
                                                <div
                                                    class="block-news-item__data d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between">
                                                    <h5><?php the_tags(''); ?></h5>

                                                    <p class="col-auto"><?php echo get_the_date(); ?></p>
                                                </div>

                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                        </li>
                                    <?php }
                                endwhile;
                                wp_reset_postdata() ?>
                            </ul>
                        </div>
                    </li>
                <?php }
            } ?>

        </ul>
    </div>
</section>