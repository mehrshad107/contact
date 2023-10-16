<?php
/**
 * The template for displaying archive pages
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
						 <?php
					the_archive_title( '<h1 class="text-white mb-3 display-2 fw-bold">', '</h1>' );
					the_archive_description( '<div class="archive-description text-white">', '</div>' );
					?>
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