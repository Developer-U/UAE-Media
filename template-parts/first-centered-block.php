<?php
/**
 * First centered block
 * Центральный блок новостей в первом блоке на розовом фоне
 */
$first_bottom_centered_news_cat = get_field('first_bottom_centered_news_cat_' . get_locale() . '', 'options');

if ($first_bottom_centered_news_cat) { ?>

    <div class="block-first__center block-center-list grid-column pink">
        <div>
            <?php
            $uae_news_args = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => 3,
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $first_bottom_centered_news_cat,
            );
            $cat = get_category($first_bottom_centered_news_cat);
            $cat_link = get_category_link( $cat );

            query_posts($uae_news_args);
            ?>
            <a class="button cat-button" href="<?php echo $cat_link; ?>"><?php echo $cat->name; ?></a>

            <ul class="block-center-list__list first-list">
                <?php
                if (have_posts()) {
                    $c_n = 0;
                    while (have_posts()) {
                        the_post();
                        $centered_news_index = $c_n++;

                        if ($centered_news_index == 0) { ?>
                            <li class="block-center-list__item d-grid">
                                <div class="block-center-list__left">
                                    <h5><?php the_tags(''); ?></h5>

                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>

                                <figure>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    }
                                    ?>
                                </figure>
                            </li>
                        <?php } else { ?>
                            <li class="block-center-list__item left d-grid">
                                <figure>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    }
                                    ?>
                                </figure>
                                <div class="block-center-list__left">
                                    <h5><?php the_tags(''); ?></h5>

                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                        <?php } ?>

                    <?php }
                    wp_reset_query();
                } ?>
            </ul>
        </div>

        <?php get_template_part('template-parts/button', 'wide'); ?>
    </div>
<?php }