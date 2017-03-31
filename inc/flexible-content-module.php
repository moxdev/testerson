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
                <section class="simple-content-section wrapper">
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
                <section class="advanced-content-section wrapper">
                	<div class="content-section-wrapper">

                		<?php

                			if ($img) { ?>
                				<img class="header-img" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
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

                			if ($add_split_column) { ?>
                				<div class="split-column-wrapper">
                					<div class="left-column"></div>
                					<div class="right-column"></div>
                				</div>
                			<?php }

                			if( have_rows('content_footer') ):

                			    ?>

								<div class="content-footer-wrapper">

                				<?php

                			    while ( have_rows('content_footer') ) : the_row();

                			        if( get_row_layout() == 'standard_button_link' ):

                			        	$file = get_sub_field('button_url');
                			        	$file = get_sub_field('button_text');

                			        	?><h1>standard</h1><?php

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

                			        elseif( get_row_layout() == 'image' ):

                			        	$img = get_sub_field('image');

                			        	?>

										<img class="footer-img" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                			        	<?php

                			        endif;

                			    endwhile;

                			    ?>

                			    </div><!-- content-footer-wrapper -->

                			    <?php

                			endif;

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

            elseif( get_row_layout() == 'testimonial_section' ):

                $add_testimonial = get_sub_field('add_the_testimonial_carousel');

                ?>
                <section class="testimonial-section">
                    <div class="content-section-wrapper">

                        <?php

                        if ($add_testimonial) {
                            // WP_Query arguments
                            $args = array(
                                'post_type'              => array( 'testimonials' ),
                                'post_status'            => array( 'publish' ),
                                'nopaging'               => true,
                                'order'                  => 'DESC',
                                'orderby'                => 'date',
                            );

                            // The Query
                            $testimonials = new WP_Query( $args );

                            // The Loop
                            if ( $testimonials->have_posts() ) {

                                ?>

                                <div class="testimonial-carousel">

                                <?php while ( $testimonials->have_posts() ) {
                                    $testimonials->the_post();

                                    ?>

                                    <div class="cell">

                                        <?php the_content(); ?>

                                    </div><!-- cell -->

                                    <?php

                                } ?>

                                </div><!-- testimonial-carousel -->

                                <?php

                            } else {

                                echo '<h4>There were no Testimonials found. Please add a testimonial in your Dashboard or remove the testimonial section from the page.</h4>';
                            }

                            // Restore original Post Data
                            wp_reset_postdata();
                        }

                        ?>

                    </div>

                </section>
                <?php

            endif;

        endwhile;

    else :

        // no layouts found

    endif;

}

