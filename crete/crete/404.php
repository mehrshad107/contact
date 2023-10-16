<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package crete
 */

get_header();



?>

<!-- Crete Hero Start -->
                               
   
<section class="crete-page-main-content-404 crete-alt-404">
	<div id="primary" class="container crete-404-page text-center">
		<main id="main" class="site-main">
			
			<div class="container mx-auto error-404 not-found">
			   
			   
			    <div class="row align-items-center">
			        <div class="col-12">
			               <div class="imga-404-box">
			        <img src="<?php echo get_template_directory_uri();?>/assets/images/404.svg" alt="404">
			    </div>
			            	<div class="page-header w-full">
					<h1 class="page-title-404 medianimated medianimatedFadeInUp medi-fadein-up-one"> <?php esc_html_e( 'Oops.... Page Not Found!', 'crete' ); ?></h1>
				</div><!-- .page-header -->
		<div class="clearfix"></div>
				<div class="page-content-404 medianimated2 medianimatedFadeInUp medi-fadein-up-one text-center">
					<p ><?php esc_html_e( 'Please return to the sites homepage, It looks like nothing was found at this location', 'crete' ); ?></p>
					
					<a class="back-to-hm-btn medianimated3 medianimatedFadeInUp medi-fadein-up-one" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Back to Home','crete');?></a>


				</div><!-- .page-content -->
			        </div>
			        
			        
			    </div>
			   
			
			</div><!-- .error-404 -->
			<div class="clearfix"></div>
			
		

		</main><!-- #main -->
	</div><!-- #primary -->
</section>

				<div class="clearfix"></div>
<?php
get_footer();
