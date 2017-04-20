<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area wrapper" role="complementary">

    <?php if(is_home()) {
        $slug = get_page_by_path( 'blog' );

        if ( function_exists( 'get_field' ) ) {
            $top = get_field('top_image', $slug->ID);
            $bottom = get_field('bottom_image', $slug->ID);

            ?>

            <figure class="sidebar-top-image">
                <img src="<?php echo $top['sizes']['thumbnail']; ?>" alt="<?php echo $top['alt']; ?>" description="<?php echo $top['description']; ?>">
            </figure>

            <?php dynamic_sidebar( 'sidebar-1' ); ?>

            <figure class="sidebar-image-bottom">
                <img src="<?php echo $bottom['sizes']['thumbnail']; ?>" alt="<?php echo $bottom['alt']; ?>" description="<?php echo $bottom['description']; ?>">
            </figure>

            <?php
        }

    } else {

        dynamic_sidebar( 'sidebar-1' );

    } ?>

</aside><!-- #secondary -->
