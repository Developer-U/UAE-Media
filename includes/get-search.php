<?php
/**
 * Обработчик поиска на сайте
 * В аргументы $args добавь свои нужные критерии поиска: post-type (в данном примере поиск по товарам woocommerce)
 * и их нужно повторить на стр. 83 ($query->set)
 * Также настрой необходимые локации поиска (в данном примере - по заголовку - 'search_columns')
 * Если нужно исключить из поиска определённые посты - используй 'post__not_in' (сейчас закомментировано), а также их нужно
 * повторить на стр. 84 - также сейчас закомментировано
 * Подробные настройки в статье @link https://only-to-top.ru/blog/programming/2020-12-13-ajax-search-wordpress.html
 * Для прелоадера в папке /img есть loader.gif, прелоадеры можно взять здесь:
 * @link https://icons8.com/preloaders/en/free
 */

    // Добавим фильтр чтобы переопределить текущий шаблон темы для поля поиска по сайту

    add_filter('get_search_form', 'ba_search_form');
    function ba_search_form($form) {
        $form = '
            <form role="search" method="get" id="searchform" class="search for-form__form mega-menu__search search-wrap d-flex ct-search-form" action="' . esc_url( home_url( '/' ) ) . '">  
                <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" class="for-form__input search-input search-wrap__input">
                
                <button class="search-to-button hero-sidebar__find wp-element-button button search-wrap__btn" type="submit">to find                               
                </button>               

                <div class="result-search">
                    <div class="preloader"><img src="' . get_stylesheet_directory_uri() . '/assets/img/loader.gif" class="loader" /></div>
                    <div class="result-search-list"></div>
                </div>
            </form>
        ';
        return $form;
    }


    // Сам обработчик поиска на сайте

    function ba_ajax_search(){
        $args = array(
            's' => $_POST['term'], 
            'post_type' => array('post'), // Указываем, в каких постах искать
            'posts_per_page' => 99,            
            'search_columns' => [ 'post_title' ]  // !!! Ищем только по заголовкам
            // 'post__not_in' => array(13786, 10451, 6213, 14385, 6202, 6146, 6020, 5983, 5472, 5936, 4384, 16686, 16683, 16680, 17208),
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
    ?>
                <div class="result_item clear">
                    <?php
                        if(has_post_thumbnail()) {
                            the_post_thumbnail(array('class'=>'post_thumbnail'));
                        } else {
                    ?>
                        <div></div>
                    <?php } ?>
        			<div class="result-item__right">
        				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>		
        				<?php the_excerpt();?>
        			</div>
            </div>
    <?php
            }
        } else {
    ?>
        <div class="result_item">
            <span class="not_found">Ничего не найдено, попробуйте другой запрос</span>
        </div>
    <?php
        }
        exit;
    }
    add_action('wp_ajax_nopriv_ba_ajax_search','ba_ajax_search');
    add_action('wp_ajax_ba_ajax_search','ba_ajax_search');


    // Вывод постов на странице результатов поиска
    add_action( 'pre_get_posts', 'get_posts_search_filter' );
    function get_posts_search_filter( $query ){

        if ( ! is_admin() && $query->is_main_query() && $query->is_search ) {            
            $query->set( 'post_type', ['post'] );
            // $query->set( 'post__not_in', [13786, 10451, 6213, 14385, 6202, 6146, 6020, 5983, 5472, 5936, 4384, 16686, 16683, 16680, 17208] );
            $query->set( 'search_columns', [ 'post_title' ] );
        }
        
    }