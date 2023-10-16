<?php
/**
 * Template Name: Theme Full Width Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'full-width' );

		

		endwhile; // End of the loop.
		?>
        <div class="clearfix"></div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
