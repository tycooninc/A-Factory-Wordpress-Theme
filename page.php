<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tvbtech
 */

get_template_part( 'template-parts/header' );

get_template_part('template-parts/page-banner');

get_template_part( 'template-parts/content' );

get_template_part('template-parts/home/footer');

get_template_part( 'template-parts/footer' );
