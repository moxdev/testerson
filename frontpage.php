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
			<div class="wrapper">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'frontpage' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</div><!-- .wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
