<?php
/**
 * Homepage Header
 *
 *
 * @package Test_Theme
 */

function test_flexible_content_module() {

    if( have_rows('acf_page_content') ):

         // loop through the rows of data
        while ( have_rows('acf_page_content') ) : the_row();

            if( get_row_layout() == 'simple_content_section' ):

                $editor = get_sub_field('editor');

                ?>
                <section class="simple-content-section">
                	<div class="content-section-wrapper">

                		<?php echo $editor; ?>

                	</div>
                </section>
                <?php

            elseif( get_row_layout() == 'advanced_content_section' ):

                $img                 = get_sub_field('image');
                $header              = get_sub_field('header');
                $sub_header          = get_sub_field('sub_header');
                $editor              = get_sub_field('editor');
                $add_split_column    = get_sub_field('add_a_split_column_text_section');
                $left_column_text    = get_sub_field('left_column_text');
                $right_column_text   = get_sub_field('right_column_text');
                $add_content_footer  = get_sub_field('add_a_content_footer_section');
                $content_footer      = get_sub_field('content_footer');

                ?>
                <section class="advanced-content-section">
                	<div class="content-section-wrapper">

                		<?php

                			if ($img) { ?>
                				<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                			<?php }

                			if ($header) { ?>
                				<h2><?php echo esc_html( $header ); ?></h2>
                			<?php }

                			if ($sub_header) { ?>
                				<h3><?php echo esc_html( $sub_header ); ?></h3>
                			<?php }

                			if ($editor) { ?>
                				<?php echo $editor; ?>
                			<?php }

                		?>

                	</div>
                </section>
                <?php

            elseif( get_row_layout() == 'green_brain_section' ):

                $header     = get_sub_field('header');
                $sub_header = get_sub_field('sub_header');
                $editor     = get_sub_field('editor');

                ?>
                <section class="green-brain-section">
					<div class="content-section-wrapper">
					</div>

                </section>
                <?php

            elseif( get_row_layout() == 'green_left_image_section' ):

                $image = get_sub_field('image');
                $editor = get_sub_field('editor');

                ?>
                <section class="green-left-image-section">
					<div class="content-section-wrapper">
					</div>

                </section>
                <?php

            endif;

        endwhile;

    else :

        // no layouts found

    endif;

}

