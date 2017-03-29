<?php
/**
 * Homepage Header
 *
 *
 * @package Test_Theme
 */

function test_homepage_header() {

	if( has_post_thumbnail() ) {
		$img_url = get_the_post_thumbnail_url(); ?>

		<div class="home-feature-img" style="background-image:url(<?php echo esc_attr( $img_url ); ?>)">

			<?php if(function_exists('get_field')) {

				$on_page_title = get_field('on_page_title');
				$video_url = get_field('video_link');
				$content = get_field('home_header_content_editor');

				?>

				<div class="wrapper center">

					<?php

					if ($video_url) { ?>

						<div class="home-video-player">
							<iframe width="560" height="315" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
						</div><!-- .video-player -->

					<?php }

					if($on_page_title) { ?>

						<header class="home-header">
							<h1 class="home-title">

							<?php echo wp_kses(
								$on_page_title,
								array(
									'span' => array(),
									'em' => array(),
									'strong' => array()
								)
							); ?>

							</h1>
						</header><!-- .home-header -->

					<?php }

					if ($content) { ?>

						<div class="home-header-content">

							<p><?php echo $content; ?></p>

						</div><!-- .home-header-content -->

					<?php }

					?>

				</div><!-- .wrapper -->

				<?php
			} ?>

		</div><!-- .home-feature-img -->

	<?php }
}

