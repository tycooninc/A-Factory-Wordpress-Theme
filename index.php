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

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        // Include the Post-Format-specific template for the content.
        get_template_part( 'template-parts/content', get_post_format() );
    endwhile;

    // Optional: Add pagination
    the_posts_pagination( array(
        'prev_text' => esc_html__( 'Previous', 'tvbtech' ),
        'next_text' => esc_html__( 'Next', 'tvbtech' ),
    ) );

else :

    get_template_part( 'template-parts/content', 'none' );

endif;

get_template_part( 'template-parts/footer' );
