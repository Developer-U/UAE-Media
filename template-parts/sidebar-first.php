<?php
/**
 * Sidebar first
 * Сайдбар первого блока новостей
 */
?>

    <aside class="block__sidebar block-sidebar grid-column">
        <div>
            <?php
            $right_sidebar_cats_field1 = get_field('right_sidebar_cats_field_1_' . get_locale(). '', 'options');
            $right_sidebar_cats_field2 = get_field('right_sidebar_cats_field_2_' . get_locale(). '', 'options');
            $right_sidebar_cats = [$right_sidebar_cats_field1, $right_sidebar_cats_field2];

            if($right_sidebar_cats_field1 && $right_sidebar_cats_field2) { // Показываем содержимое сайдбара только, если в админке выбраны 2 категории
                $arg_cat = array(
                    'orderby'      => 'name',
                    'order'        => 'ASC',
                    'hide_empty'   => 1,
                    'exclude'      => '',
                    'include'      => $right_sidebar_cats,
                    'taxonomy'     => 'category',
                    'post_type' => 'post',                        
                );
                $categories = get_categories( $arg_cat );                    

                // Вывод изображения категории
                if( $categories ){
                    $x = 0;
                    foreach( $categories as $cat ){
                        $index_image = $x++; ?>
                        <figure 
                            class="block-sidebar__category d-none d-lg-block js-targetImage <?php if( $index_image == 0) { ?>active<?php } ?>"
                            data-image="<?php echo $index_image; ?>"
                        >
                            <img src="<?php echo z_taxonomy_image_url($cat->term_id, 'full'); ?>" />
                        </figure>                            
                    <?php }
                }
                ?>

                <div class="block-sidebar__cats right-sidebar-cat-list d-flex">
                    <?php 
                    if( $categories ){
                        $i = 0;
                        foreach( $categories as $cat ){                               
                            $index = $i++; ?>                                 
                            <button 
                                class="js-pathTabs button <?php if($index == 0) { ?>active<?php } ?>" 
                                data-path="<?php echo $index; ?>"
                            ><?php echo $cat->name; ?>
                            </button>	
                            <?php }
                        }
                    ?>
                </div>

                <?php 
                if( $categories ){
                    $n = 0;
                    foreach( $categories as $cat ){
                        $target = $n++;

                        $arg_posts =  array(
                            'orderby'      => 'name',
                            'order'        => 'DESC',
                            'posts_per_page' => 5,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => $cat->cat_ID,
                        );
                        $query = new WP_Query($arg_posts);                    
                        ?>

                        <ul class="block-first__list first-list js-targetTabs <?php if($target == 0) { ?>active<?php } ?>" 
                            data-target="<?php echo $target; ?>"
                        >

                            <?php if ($query->have_posts() ) 
                            $a = 0; ?>
                            <?php while ( $query->have_posts() ) : $query->the_post(); 
                            $news_index = $a++;
                            ?>

                                <li class="first-list__item <?php if($news_index == 0) {?>first <?php } ?>">
                                    <?php
                                    if($news_index == 0) { 
                                        if (has_post_thumbnail()) { 
                                            echo '<figure class="block-sidebar__category sidebar">';
                                                the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                            echo '</figure>';
                                        }
                                    }
                                    ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>

                            <?php endwhile; wp_reset_postdata()?>
                        </ul>
                    <?php		
                    }
                } 
            } ?>
        </div>
        
        <?php get_template_part('template-parts/button', 'wide'); ?>
    </aside>