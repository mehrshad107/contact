<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Crete
 */

get_header();
$headerstyle = cs_get_option( 'crete-header-style','');
?>
<?php if ($headerstyle == 'style-four'){  ?>
<div class="main-content-wrapper crete-hm5-sp-content">
<?php } else { ?>
<div class="crete-single-post">
    <?php   } ?>


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single-project' );
            

		endwhile; // End of the loop.
		?>
	

</div>

		

	

<?php
get_footer();
