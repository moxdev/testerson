<?php
/**
 * Color Content Section
 *
 *
 * @package Test_Theme
 */

function acf_color_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $bg_color = get_sub_field('section_background_color');
        $bg_image = get_sub_field('section_background_image');

        if ( $bg_image ) {
            $title = get_sub_field('title');
            $editor = get_sub_field('editor');

            ?>

            <section class="color-callout-section-img" style="">

                <div class="background-img-fade wrapper" style="background-image:url(http://localhost:8888/leading-minds/wp-content/themes/leading_minds/imgs/brains.svg);background-color:<?php echo $bg_color; ?>;">

                    <div class="content-section-wrapper wrapper">
                        <div class="editor-wrapper">

                            <h2><?php echo esc_html( $title ); ?></h2>

                            <?php echo $editor; ?>

                        </div>
                    </div>
                </div>
            </section>

            <?php

        }else {
            $title = get_sub_field('title');
            $editor = get_sub_field('editor');
            $img = get_sub_field('image');

            ?>

            <section class="color-callout-section-no-img">
                <div class="content-section-wrapper wrapper" style="background-color:<?php echo $bg_color; ?>">

                    <figure class="color-callout-img">
                        <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                    </figure>
                    <div class="editor-wrapper">

                        <h2><?php echo esc_html( $title ); ?></h2>

                        <?php echo $editor; ?>

                    </div>
                </div>
            </section>

            <?php
        }
    }
}