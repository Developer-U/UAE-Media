<?php
/**
 * Block Mega-menu sidebar
 * Сайдбар в мега меню
 */

$mega_arg_posts = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 2,
    'post_type' => 'post',
    'post_status' => 'publish',
);
$mega_query = new WP_Query($mega_arg_posts);
?>

<aside class="mega-menu__sidebar mega-sidebar">
    <ul class="first-list">
        <?php if ($mega_query->have_posts()) ?>
        <?php while ($mega_query->have_posts()):
            $mega_query->the_post();
            ?>

            <li class="first-list__item">
                <?php
                if (has_post_thumbnail()) {
                    echo '<a class="picture-link" href=" ' . get_the_permalink() . '"><figure class="block-sidebar__category sidebar">';
                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                    echo '</figure></a>';
                }
                ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>

        <?php endwhile;
        wp_reset_postdata() ?>
    </ul>
</aside>