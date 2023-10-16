<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crete
 */
$backtotop = cs_get_option('back-top-top-enable');
$headerstyle = cs_get_option( 'crete-header-style','');
?>
<?php  get_template_part( 'template-parts/footer/footer', 'default' ); ?>
        
        <!--scrolltop button start-->
<?php if ($backtotop == "enabled") { ?>
	

<button type="button" class="scroll-top-btn" style="display: none;"><i class="fa-solid fa-angle-up"></i></button>
  

<?php } ?>

<?php  if ($headerstyle == 'style-three' || 'style-four'){ ?>
</main>
<?php } ?>

<!--scrolltop button end-->
<?php wp_footer(); ?>
</body>
</html>
