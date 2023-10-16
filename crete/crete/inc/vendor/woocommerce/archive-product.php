<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
$page_meta = get_post_meta( get_the_ID(), 'pivoo_page_options', true );

if (class_exists( 'Crete_Core' )) {
if (is_tax( 'product_cat' )){
$catmeta = get_term_meta( get_queried_object_id(), 'crete_woo_cat_options', true );

;


}
}
$hide_breadcrumb = ( ! empty( $page_meta['page_breadcrumb'] ) ) ? $page_meta['page_breadcrumb'] : '';
$page_width = ( ! empty( $page_meta['page_width'] ) ) ? $page_meta['page_width'] : 'container';
$page_b_style= ( ! empty( $page_meta['page_breadcrumb_style'] ) ) ? $page_meta['page_breadcrumb_style'] : '';
if ($page_b_style == 'custom-style'){
    $global_page_icon = ( ! empty( $page_meta['custom_page_icon'] ) ) ? $page_meta['custom_page_icon'] : '';
} else {
    $global_page_icon = cs_get_option('global_page_icon');
}
$desktopcol = cs_get_option('crete-archive-col');
$mobcol = cs_get_option('crete-archive-col-mob');
$filterpanel = cs_get_option('crete-ach-filter-type');
$filtertext = cs_get_option('crete-filter-shortcode');

$archivelayout = cs_get_option('crete-archive-type');
$sidebarposition = cs_get_option('archive-sidebar-position');



get_header( 'shop' );


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20 (Removed)
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>



    <!-- Crete Hero Start -->
    <div id="crete-hero-banner">
        <div class="row crete-hero-banner">
            <div class="crete-single-post-breadcumb text-center medianimated medianimatedFadeInUp medi-fadein-up-one">
                <?php woocommerce_breadcrumb(); ?>
            </div>
            <h2 class="best-medical-treatment-right-h2 crete-heading text-center medianimated2 medianimatedFadeInUp medi-fadein-up-one"><?php woocommerce_page_title(); ?>
            </h2>
            <p> <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?></p>
        </div>

    </div>
  
    <!-- Crete Hero End -->

<section class="crete-woo-archive-main">
    <div class="container">



        <?php if($archivelayout=="sidebar"){ ?>
        <div class="row gx-6">
            <?php } else { ?>
            <div class="without-sidebar">
                <?php } ?>
                <?php if($archivelayout=="sidebar" && $sidebarposition=="left"){ ?>
                    <div class="d-none d-md-block col-12 col-md-3 crete-product-archive-sidebar">
                        <?php dynamic_sidebar( 'crete-woo-sidebar' ); ?>
                    </div>
                <?php } ?>

                <?php if($archivelayout=='sidebar'){ ?>
                <div class="col-12 col-md-9">
                    <?php } else { ?>
                    <div class="w-100">
                        <?php } ?>
                        
                   



                        <div class="row align-items-center">
                            <div class="col-12 col-md-4 pivoo-total-product-count">
                                <?php woocommerce_result_count();?>
                            </div>

                            <div class="col-4 col-md-4 crete-product-filter-b">
                                
                                <?php if($archivelayout=="sidebar"){ ?>
                                    <div class="d-md-none crete-mobile-filter-sidebar">
                                        <button class="crete-m-filter-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#creteCatCanvas" aria-controls="creteCatCanvas">
                                            <i class="ri-equalizer-line"></i>
                                        </button>
                        
                                        <div class="offcanvas offcanvas-start" tabindex="-1" id="creteCatCanvas" aria-labelledby="creteCatCanvasLabel">
                                           
                                            <div class="offcanvas-body">
                                                <?php dynamic_sidebar( 'crete-woo-sidebar' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <?php if($filterpanel=="droppanel"){?>
                                    <a href="javascript:void(0);" class="crete-product-toogle-btn"><i class="ri-equalizer-line"></i> <span><?php esc_html_e('Filter','crete');?></span></a>
                                <?php } elseif($filterpanel=="off-canvas"){ ?>
                                    <button class="crete-filter-offcanvas-btn" data-bs-toggle="offcanvas" data-bs-target="#creteproductfilter" aria-controls="creteproductfilter">
                                        <i class="ri-equalizer-line"></i> <span><?php esc_html_e('Filter','crete');?></span>
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-8 col-md-4 pivoo-product-filter text-md-end">
                                <?php woocommerce_catalog_ordering();?>
                            </div>
                        </div>
                        <?php if($filterpanel=="droppanel"){?>
                            <div class="crete-filter-toogle-box">
                                <?php echo do_shortcode('[yith_wcan_filters slug="'.$filtertext.'"]');?>
                            </div>
                        <?php } elseif($filterpanel=="off-canvas"){ ?>
                            <div class="crete-filter-canvas offcanvas offcanvas-start" tabindex="-1" id="creteproductfilter" aria-labelledby="creteproductfilterLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="creteproductfilterLabel">Filter</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <?php echo do_shortcode('[yith_wcan_filters slug="'.$filtertext.'"]');?>

                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($desktopcol){ ?>
                        <div class="pivoo-shop-product-grid row row-<?php echo esc_html($mobcol);?> row-cols-<?php echo esc_html($desktopcol);?>">
                        <?php } else { ?>
                        <div class="pivoo-shop-product-grid row row-cols-1 row-cols-md-3">
                        <?php } ?>
                        

                            <?php if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();

                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action( 'woocommerce_shop_loop' );

                                    wc_get_template_part( 'content', 'product' );
                                }
                            }


                            ?>
                        </div>
                        <?php
                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );

                        ?>
                        

                    <?php if($archivelayout=="sidebar" && $sidebarposition=="right"){ ?>
                        <div class="col-12 d-none d-md-block col-md-3 crete-product-archive-sidebar">
                            <?php dynamic_sidebar( 'crete-woo-sidebar' ); ?>
                        </div>
                    <?php } ?>
                                        </div>
                </div>
        
</section>

<?php
                        /**
                         * Hook: woocommerce_after_main_content.
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );

                        ?>
<?php

get_footer( 'shop' );

?>
