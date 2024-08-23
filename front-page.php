<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 *  Main Page
 */

get_header();

get_template_part('template-parts/block', 'right-sidebar');

get_template_part('template-parts/second', 'horizontal-news');

get_template_part('template-parts/block', 'third-news');

get_template_part('template-parts/fourth', 'horizontal-news');

get_template_part('template-parts/block', 'fifth-news');

get_template_part('template-parts/block', 'sixth-news');

get_footer();
?>