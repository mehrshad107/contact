<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */

get_header();
$headerstyle = cs_get_option( 'crete-header-style','');

?>
<?php if ($headerstyle == 'style-four'){  ?>
<div id="primary" class="main-content-wrapper crete-hm5-sp-content">
    <?php } ?>
	<!--bradcrumb section start-->
	<div class="crete-archive-common-bg-blog breadcrumb-section position-relative z-1 overflow-hidden"> <span class="circle-shape-1 rounded-circle position-absolute"></span> <span class="circle-shape-2 rounded-circle position-absolute"></span> <span class="circle-shape-3 rounded-circle position-absolute"></span>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h1 class="text-white mb-3 display-2 fw-bold"><?php esc_html_e('Blog','crete');?></h1>
						<?php crete_breadcrumbs();?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--bradcrumb section end-->
	<!--blog section start-->
	<section class="bp-blog-section ptb-100">
		<div class="container">
			<div class="row g-4">
				<div class="col-xl-8">
					<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
						<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'post' );

				endwhile;

				crete_page_navs();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
				</div>
				<div class="col-xl-4">
					<?php dynamic_sidebar( 'crete-sidebar' ); ?>
				</div>
			</div>
		  </div>
		</div>
	</section>
	
		<?php if ($headerstyle == 'style-four'){  ?>
</div>
    <?php } ?>
	<?php

get_footer();