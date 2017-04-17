<?php
/**
 * Associates Section Module
 *
 *
 * @package Test_Theme
 */

function acf_associates_section() {

    if ( function_exists( 'get_field' ) ) {

        $add_associates = get_sub_field('add_the_associates_section');
        ?>
        <section class="associates-section wrapper">
            <div class="content-section-wrapper">

                <?php
                if ($add_associates) {
                    $title = get_field( 'associates_section_title', 'option' );
                    $blurb = get_field( 'associates_blurb', 'option' );
                    if ($title) {
                        echo '<h2>' . esc_html( $title ) . '</h2>';
                    }
                    if ($blurb) {
                        echo $blurb;
                    }
                    if( have_rows( 'associates_information', 'option' ) ): ?>

                        <div class="flex-wrapper">

                        <?php while( have_rows( 'associates_information', 'option' ) ): the_row();
                            $img = get_sub_field('associates_img');
                            $name  = get_sub_field('associates_name');
                            $title = get_sub_field('associates_title');
                            $page = get_sub_field('associates_page');
                            ?>

                            <div class="associate-block">

                                    <a href="<?php echo esc_url( $page ); ?>">

                                    <?php if( $img ): ?>

                                        <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                                    <?php endif; ?>


                                    <?php if( $name ): ?>

                                        <?php echo '<h4>' . esc_html( $name ) . '</h4>'; ?>

                                    <?php endif; ?>

                                    <?php if( $title ): ?>

                                        <?php echo '<h5>' . esc_html( $title ) . '</h5>'; ?>

                                    <?php endif; ?>

                                    </a>

                            </div>

                        <?php endwhile; ?>

                        </div><!-- flex-wrapper -->

                    <?php endif;
                }else {
                    echo '<h4>There were no Associates found. Please add an Associate in your Dashboard or remove the Associates Section from the page.</h4>';
                }
                ?>

            </div>

        </section><!-- associates-section wrapper -->
        <?php
    }
}