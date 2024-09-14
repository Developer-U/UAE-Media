<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

blocksy_after_current_template();
do_action('blocksy:content:bottom');

$logo_color = get_field('logo_color', 'options');
$logo_white = get_field('logo_white', 'options');
?>
</main>

<ul?php
do_action('blocksy:content:after');
do_action('blocksy:footer:before');
?>

<section class="footer dark">
    <div class="container">
        <div class="footer-wrapper d-grid align-items-start">
            <div class="footer-list first">
                <a href="/" class="header__logo footer-wrapper__logo">
                    <?php
                    if ($logo_white) { ?>
                        <img src="<?php echo $logo_white['url']; ?>" alt="<?php echo $logo_white['alt']; ?>">
                    <?php }

                    // estore_secondary_menu(); 
                    ?>
                </a>
            </div>

            <ul class="footer-list__cats footer-cat-list flex-wrap flex-lg-nowrap d-flex justify-content-between">
                <?php
                $arg_cat = array(
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'number' => 3, // выведем только 3 категории
                    'hide_empty' => 1,
                    'exclude' => '',
                    'include' => '',
                    'taxonomy' => 'category',
                );
                $categories = get_categories($arg_cat);

                if ($categories) {
                    foreach ($categories as $cat) {
                        $cat_link = get_category_link($cat);
                        $arg_posts = array(
                            'orderby' => 'name',
                            'order' => 'DESC',
                            'posts_per_page' => 4,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => $cat->cat_ID,
                        );
                        $query = new WP_Query($arg_posts);

                        if ($query->have_posts()) ?>

                        <li class="footer-cat-list footer-cat-item">
                            <a class="footer-cat-item__title d-block" href="<?php echo $cat_link; ?>">
                                <?php echo $cat->name; ?>
                            </a>
                        </li>
                    <?php }
                } ?>
            </ul>

        </div>

        <a class="web-research" href="https://sim-style.ru" target="_blank">
            <?php
            if (get_locale() == 'en_US') {
                echo 'Powered by:&nbsp; Web studio "Symbol style"';
            } elseif (get_locale() == 'ar') {
                echo 'مدعوم من استوديو الويب"رمز نمط"';
            } ?>
        </a>
    </div>
</section>

<?php
do_action('blocksy:footer:after');
?>
</div>

<?php wp_footer(); ?>

<section class="mega-menu" data-popup="burger_menu">
    <button class="mega-menu__close" aria-label="Закрыть меню" data-popup-close="burger_menu">
        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.66117 19.8388L19.3388 2.16113M19.3388 19.8388L1.66113 2.16117" stroke="#222222" stroke-width="3"
                stroke-linecap="round" />
        </svg>
    </button>

    <div class="mega-menu__top">
        <div class="container">
            <a href="/" class="header__logo header__logo_footer">
                <?php
                if ($logo_color) { ?>
                    <img src="<?php echo $logo_color['url']; ?>" alt="<?php echo $logo_color['alt']; ?>">
                <?php } ?>
            </a>

            <div class="for-form">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <div class="mega-menu__content mega-menu-content">
        <div class="container">
            <div class="block__wrap mega-menu-content__wrap d-grid">
                <div class="mega-menu-content__news mega-news d-grid">
                    <?php
                    $arg_cat = array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'number' => 3, // выведем только 3 категории
                        'hide_empty' => 1,
                        'exclude' => '',
                        'include' => '',
                        'taxonomy' => 'category',
                    );
                    $categories = get_categories($arg_cat);

                    if ($categories) {
                        foreach ($categories as $cat) {
                            $cat_link = get_category_link($cat);
                            $arg_posts = array(
                                'orderby' => 'name',
                                'order' => 'DESC',
                                'posts_per_page' => 4,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'cat' => $cat->cat_ID,
                            );
                            $query = new WP_Query($arg_posts);

                            if ($query->have_posts()) ?>

                            <div class="mega-news__item mega-item">
                                <a class="mega-item__title" href="<?php echo $cat_link; ?>">
                                    <?php echo $cat->name; ?>
                                </a>

                                <ul class="mega-item__posts mega-cat-list">
                                    <?php while ($query->have_posts()):
                                        $query->the_post(); ?>
                                        <li class="mega-cat-list__item">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </li>

                                    <?php endwhile;
                                    wp_reset_postdata() ?>
                                </ul>
                            </div>
                        <?php }
                    } ?>

                    <?php 
                    // estore_secondary_menu(); 
                    ?>
                </div>

                <?php get_template_part('template-parts/mega', 'menu-sidebar'); ?>
            </div>
        </div>
    </div>
</section>

</body>

</html>