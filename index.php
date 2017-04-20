<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Test_Theme
 */

get_header();

	if(is_home()) {
    	$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
    	$featured_image = $img[0];
    	$slug = get_page_by_path( 'blog' );

    	?>

    	<div class="featured-image-full-width" style="background-image: url( <?php echo $featured_image ?> ) !important;">

			<?php if(function_exists('get_field')) {
        		$on_page_title = get_field('on_page_title', $slug->ID);

        		if($on_page_title) { ?>
            		<header class="featured-header">
                		<h1 class="featured-title">
                    		<?php echo wp_kses(
                        		$on_page_title,
                        			array(
                        	    		'span' => array(),
                        	    		'em' => array(),
                        	    		'strong' => array()
                        			)
                    		); ?>
                		</h1>
            		</header><!-- .featured-header -->
        		<?php } else { ?>
           			<header class="featured-header">
                		<?php single_post_title( '<h1 class="page-title screen-reader-text">', '</h1>' ); ?>
            		</header><!-- .featured-header -->
        		<?php }
   			} ?>

		</div>

    <?php } ?>

	<div class="wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="blog-post-wrapper">

					<?php if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						// the_posts_navigation();

						if( function_exists('pagination') ) :
							pagination($custom_query->max_num_pages);
						endif;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div><!-- blog-post-page -->
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar(); ?>

	</div><!-- wrapper -->

<?php

get_footer();
