<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Test_Theme
 */

get_header(); ?>

	<!--
	Biz Monthly Example

	<header class="entry-header wrapper">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php //biz_monthly_posted_on(); ?>
		</div>
	</header>

	<div id="primary" class="content-area wrapper">
		<main id="main" class="site-main" role="main">
	-->
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single-post' );

			/*
			* Biz Monthly Example
			*
			if(in_category(20)) {
				$prev = '&larr; Previous Archived Article';
				$next = 'Next Archived Article &rarr;';
			} else {
				$prev = '&larr; Previous Post';
				$next = 'Next Post &rarr;';
			}

			$args = array(
				'prev_text' => $prev,
				'next_text' => $next,
				'in_same_term' => true
			);

			the_post_navigation($args);

			 */

			the_post_navigation();


			//If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
