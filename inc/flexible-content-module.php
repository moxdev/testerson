<?php
/**
 * Flexible Content Module Function
 *
 *
 * @package Test_Theme
 */

function test_flexible_content_module() {

    if( have_rows('acf_page_content') ):

        while ( have_rows('acf_page_content') ) : the_row();

            if( get_row_layout() == 'simple_content_section' ):

                if ( function_exists( 'acf_simple_content_section' ) ):
                    acf_simple_content_section();
                endif;

            elseif( get_row_layout() == 'advanced_content_section' ):

                if( function_exists( 'acf_advanced_content_section' ) ):
                    acf_advanced_content_section();
                endif;

            elseif( get_row_layout() == 'color_content_section' ):

                if ( function_exists( 'acf_color_content_section' ) ):
                    acf_color_content_section();
                endif;

            elseif( get_row_layout() == 'mid_page_navigation' ):

                if( function_exists('acf_mid_page_navigation_section') ):
                    acf_mid_page_navigation_section();
                endif;

            elseif( get_row_layout() == 'testimonial_section' ):

                if( function_exists('acf_testimonial_section') ):
                    acf_testimonial_section();
                endif;

            elseif( get_row_layout() == 'associates_section' ):

                if ( function_exists( 'acf_associates_section' ) ):
                    acf_associates_section();
                endif;

            endif;

        endwhile;
    else :
        // no layouts found
    endif;

}

