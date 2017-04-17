<?php
/**
 * Color Content Section
 *
 *
 * @package Test_Theme
 */

function acf_color_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $theme = get_sub_field('section_theme');

        if ( $theme ) {

            $img = get_sub_field('image');
            $title = get_sub_field('title');
            $editor = get_sub_field('editor');

            ?>

            <section class="color-callout-section">

                <div class="<?php echo esc_html( $theme ); ?>">

                    <div class="background-image wrapper">

                        <div class="content-section-wrapper">

                            <?php if( $img ) : ?>

                                <figure class="color-callout-img">
                                    <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                                </figure>

                            <?php endif; ?>

                            <div class="editor-wrapper">

                                <?php if( $title ) : ?>

                                    <h2><?php echo esc_html( $title ); ?></h2>

                                <?php endif; ?>

                                <?php if( $editor ) : ?>

                                    <?php echo $editor; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <?php

        }
    }
}