<?php
/**
 * Block Large image Desctop
 * Блок десктопная версия слева - большая картинка, справа - список новостей
 */
?>

<ul class="block__third third-news d-none d-sm-grid">
    <?php
    $th = 0;
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $third_news_index = $th++;

            if ($third_news_index == 0) {
                if (has_post_thumbnail()) {
                    echo '<li class="third-news__first position-relative">';
                    echo '<a class="picture-link" href=" ' . get_the_permalink() . '"><figure>';
                    echo '<span class="on-image-title">' . get_the_title() . '</span>';
                    the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                    echo '</figure></a></li>';
                }
            } else {
                ?>
                <li class="block-center-list__item third-news__item third-item d-grid">
                    <?php
                    if (has_post_thumbnail()) {
                        echo '<a class="picture-link" href=" ' . get_the_permalink() . '"><figure>';                        
                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                        echo '</figure></a>';
                    } ?>


                    <div class="block-center-list__left">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </li>
            <?php }
        }
        wp_reset_query();
    } ?>
</ul>