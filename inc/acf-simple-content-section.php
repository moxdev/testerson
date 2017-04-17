<?php
/**
 * Simple Content Section
 *
 *
 * @package Test_Theme
 */

function acf_simple_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $bg_color = get_sub_field('section_background_color');
        $title = get_sub_field('title');
        $editor = get_sub_field('editor');
        $add_skills = get_sub_field('add_skills_section');
        $add_secondary_editor = get_sub_field( 'add_seconday_editor' );

        ?>

        <section class="simple-content-section" style="background-color:<?php echo $bg_color; ?>">
            <div class="content-section-wrapper wrapper">
                <div class="editor-wrapper">

                <?php

                if ($title) { ?>
                    <h2><?php echo esc_html( $title ); ?></h2>
                <?php }

                if ($editor) { ?>
                    <?php echo $editor; ?>
                <?php }

                if ($add_skills) {
                    $skills = get_sub_field('skills');
                    if( have_rows('skills') ):

                    ?>

                    <div class="skills-wrapper">

                        <?php while( have_rows('skills') ): the_row();
                            $skill = get_sub_field('skill');
                            ?>

                            <div class="skill">

                            <?php if( !empty($skill) ) : ?>
                                <?php echo esc_html( $skill); ?>
                            <?php endif; ?>

                            </div>

                        <?php endwhile;

                    ?>

                    </div><!-- skills-wrapper -->

                    <?php

                endif; }

                if ($add_secondary_editor) {
                    $secondary_editor = get_sub_field('secondary_editor');

                    if ($secondary_editor) { ?>
                        <?php echo $secondary_editor; ?>
                    <?php }
                }

                ?>

                </div><!-- editor-wrapper -->
            </div><!-- content-section-wrapper -->
        </section>

        <?php
    }
}