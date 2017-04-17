<?php
/**
 * Advanced Content Section Module
 *
 *
 * @package Test_Theme
 */

function acf_advanced_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $bg_color             = get_sub_field('section_background_color');
        $bg_img               = get_sub_field('section_background_color');

        $img                  = get_sub_field('image');
        $header               = get_sub_field('header');
        $sub_header           = get_sub_field('sub_header');
        $editor               = get_sub_field('editor');

        $add_split_column     = get_sub_field('add_a_split_column_text_section');
        $add_skills           = get_sub_field('add_skills_section');
        $add_secondary_editor = get_sub_field( 'add_seconday_editor' );
        $add_content_footer   = get_sub_field('add_a_content_footer_section');

        if ( $bg_img ) { ?>

        <section class="advanced-content-section" style="background-color:<?php echo $bg_color; ?>;background-image:url(http://localhost:8888/test-site/wp-content/themes/test/imgs/brains.svg);">

        <?php }else { ?>

        <section class="advanced-content-section" style="background-color:<?php echo $bg_color; ?>">

        <?php } ?>

            <div class="content-section-wrapper wrapper">

                <?php
                    if ($img) { ?>
                        <img class="header-img" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                    <?php }
                    // Header
                    if ($header) { ?>
                        <h2><?php echo esc_html( $header ); ?></h2>
                    <?php }
                    //Sub Header
                    if ($sub_header) { ?>
                        <h3><?php echo esc_html( $sub_header ); ?></h3>
                    <?php }
                    // Editor
                    if ($editor) { ?>
                        <?php echo $editor; ?>
                    <?php }
                    // Split Column
                    if ($add_split_column) {
                        $left_column_text  = get_sub_field('left_column_text');
                        $right_column_text = get_sub_field('right_column_text'); ?>

                        <div class="split-column-wrapper">
                            <div class="left-column">
                                <div class="column-wrapper">

                                    <?php echo $left_column_text; ?>

                                </div>
                            </div>
                            <div class="right-column">
                                <div class="column-wrapper">

                                    <?php echo $right_column_text; ?>

                                </div>
                            </div>
                        </div>

                    <?php }
                    // Skills
                    if ($add_skills) {
                        $skills = get_sub_field('skills');
                        if( have_rows('skills') ): ?>

                            <div class="skills-wrapper">

                            <?php while( have_rows('skills') ): the_row();
                                $skill = get_sub_field('skill');
                                ?>

                                <div class="skill">

                                    <?php if( !empty($skill) ) : ?>
                                        <?php echo esc_html( $skill); ?>
                                    <?php endif; ?>

                                </div>

                            <?php endwhile; ?>

                            </div><!-- skills-wrapper -->

                        <?php endif;
                    }
                    // Secondary Editor
                    if ($add_secondary_editor) {
                        $secondary_editor = get_sub_field('secondary_editor');
                        if ($secondary_editor) {
                            echo $secondary_editor;
                        }
                    }
                    // Content Footer
                    if ($add_content_footer) {

                        if( have_rows('content_footer') ):

                             // loop through the rows of data
                            while ( have_rows('content_footer') ) : the_row();

                                ?>
                                <div class="content-footer-wrapper">

                                    <?php

                                    if( get_row_layout() == 'footer_editor' ):
                                        $editor = the_sub_field('editor');

                                        ?>

                                        <div class="editor-wrapper">

                                            <?php echo $editor; ?>

                                        </div>

                                        <?php

                                    elseif( get_row_layout() == 'image' ):

                                        $img = get_sub_field('image');

                                        ?>

                                        <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                                        <?php

                                    elseif( get_row_layout() == 'standard_button_link' ):

                                        $url = get_sub_field('button_url');
                                        $text = get_sub_field('button_text');

                                        ?>

                                        <a href="<?php echo esc_url( $url ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                                        <?php

                                    elseif( get_row_layout() == 'call_phone_button' ):

                                        $phone = get_sub_field('phone_number');
                                        $text = get_sub_field('button_text');

                                        ?>

                                        <a href="tel:<?php echo esc_html( $phone ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                                        <?php

                                    elseif( get_row_layout() == 'email_button' ):

                                        $email = get_sub_field('email_address');
                                        $text = get_sub_field('button_text');

                                        ?>

                                        <a href="mailto:<?php echo esc_html( $email ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                                        <?php

                                    endif;

                                    ?>
                                </div>

                                <?php

                            endwhile;

                        else :

                            echo '<h4>There were no Content Footer Sections Found. Please add some sections to the Content Footer Section on this page.</h4>';

                        endif;
                    }
                ?>

            </div><!-- content-section-wrapper -->

        </section>
        <?php
    }
}