<?php
/**
 * Template Name: Home Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Test_Theme
 */

get_header();

    if ( function_exists( 'test_homepage_header' ) ) {
        test_homepage_header();
    } ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php if ( function_exists( 'test_flexible_content_module' ) ) {
				    test_flexible_content_module();
				} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
