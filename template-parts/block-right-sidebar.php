<?php
/**
 * Block width right sidebar
 */
?>

    <section class="block">
        <div class="container">
            <div class="block__wrap d-grid">
                <div class="block__main block-main">
                    <div class="block-main__first block-first d-grid">
                        <?php    
                                        
                        $hot_news_args =  array(
                            'orderby'      => 'name',
                            'order'        => 'DESC',
                            'posts_per_page' => 3,
                            'post_type' => 'post',
                            'post_status' => 'publish',  
                            'cat' => 48,
                                
                        );
                        $cat = get_category( 48 );

                        query_posts($hot_news_args);
                        ?>
                        <div class="block-first__list">
                            <a class="button cat-button" href="<?php echo $cat->link; ?>"><?php echo $cat->name; ?></a>

                            <ul class="block-first__list first-list">
                                <?php
                                if(have_posts() ){
                                while( have_posts() ){
                                    the_post();
                                    ?>

                                    <li class="first-list__item">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>

                                <?php }
                                    wp_reset_query();
                                } ?>
                            </ul>
                        </div>

                        <figure class="block-first__picture">
                            <?php
                            $center_news_args =  array(
                                'orderby'      => 'name',
                                'order'        => 'DESC',
                                'posts_per_page' => 1,
                                'post_type' => 'post',
                                'post_status' => 'publish',  
                                'cat' => 48,                                    
                            );
                            query_posts($center_news_args);

                            if( have_posts() ){
                            while( have_posts() ){
                                the_post();
                                
                                if (has_post_thumbnail()) { 
                                    the_post_thumbnail('full'); 
                                }

                            }
                                wp_reset_query();
                            } ?>
                        </figure>
                    </div>
                    <div class="block-main__second">
                        
                    </div>
                </div>

                <aside class="block__sidebar block-sidebar">
                    <?php
                    $arg_cat = array(
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                        'hide_empty'   => 1,
                        'exclude'      => '',
                        'include'      => '',
                        'taxonomy'     => 'category',
                        'post_type' => 'post',
                    );
                    $categories = get_categories( $arg_cat );
                    ?>

                    <div class="block-sidebar__cats right-sidebar-cat-list d-flex">
                        <?php 
                        if( $categories ){
                            $i = 0;
                            foreach( $categories as $cat ){
                                $index = $i++;
                                echo '<button class="button" data-tab=" ' . $index . '">' . $cat->name . '</button>';	
                                }
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
                                'posts_per_page' => 3,
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'cat' => $cat->cat_ID,
                            );
                            $query = new WP_Query($arg_posts);                    
                            ?>

                            <ul class="block-first__list first-list" data-target="<?php echo $target; ?>">

                                <?php if ($query->have_posts() ) ?>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                    <li class="first-list__item">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>

                                <?php endwhile; wp_reset_postdata()?>
                            </ul>
                        <?php		
                        }
                    } ?>
                </aside>
            </div>
        </div>
    </section>