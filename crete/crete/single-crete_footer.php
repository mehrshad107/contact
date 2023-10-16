<?php
/**
 * The template for displaying footer content
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crete
 */

get_header('blank');
if( current_user_can('editor') || current_user_can('administrator') ) { 
?>


	<footer class="crete-footer">
        
		<?php
		while ( have_posts() ) :
			the_post();

		the_content();


		endwhile; // End of the loop.
		?>
</footer>

<?php
}
get_footer('blank');
