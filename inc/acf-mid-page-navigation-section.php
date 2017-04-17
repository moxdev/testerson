<?php
/**
 * Mid Page Navigation Module
 *
 *
 * @package Test_Theme
 */

function acf_mid_page_navigation_section() {

    if ( function_exists( 'get_field' ) ) {

        if( have_rows('page_link_navigation') ): ?>

            <section class="mid-page-navigation-section">
                <div class="content-section-wrapper">
                    <div class="margin-wrapper">

                        <?php while( have_rows('page_link_navigation') ): the_row();
                            $title = get_sub_field('page_title');
                            $text  = get_sub_field('link_text');
                            $link  = get_sub_field('page_link');
                        ?>

                            <div class="nav-container">
                                <div class="nav-wrapper">
                                    <div class="nav-content">

                                        <?php if( $title ) : ?>

                                            <h3><?php echo esc_html( $title ); ?></h3>

                                        <?php endif; ?>

                                        <?php if( $link ) : ?>

                                            <a href="<?php echo esc_html( $link ); ?>"><?php echo esc_html( $text ); ?></a>

                                        <?php endif; ?>

                                    </div><!-- nav-content -->
                                </div><!-- nav-wrapper -->
                            </div><!-- nav-container -->

                        <?php endwhile; ?>

                    </div>
                </div>
            </section>

        <?php endif;
    }
}