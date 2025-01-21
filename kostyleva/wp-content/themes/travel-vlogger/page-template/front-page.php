<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Travel Vlogger
 * @subpackage travel_vlogger
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php get_template_part( 'template-parts/home/post-slider' ); ?>
	<?php get_template_part( 'template-parts/home/latest-tour' ); ?>
	<?php get_template_part( 'template-parts/home/home-content' ); ?>
</main>

<?php get_footer();