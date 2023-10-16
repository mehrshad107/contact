<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user = get_userdata( get_query_var( 'author' ) );
$store_info = dokan_get_store_info( $store_user->ID );
$map_location = isset( $store_info['location'] ) ? esc_attr( $store_info['location'] ) : '';
get_header( 'shop' );

?>
 <?php dokan_get_template_part( 'store-header' ); ?>
 <section class="crete-seller-item-box">
<div class="container">
    <?php if ( have_posts() ) { ?>

                        <div class="seller-items crete-seller-items">

                            <?php woocommerce_product_loop_start(); ?>
                    
                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <?php do_action( 'woocommerce_shop_loop' ); ?>
                    
                                        <?php wc_get_template_part( 'content', 'product' ); ?>
                    
                                    <?php endwhile; // end of the loop. ?>
                    
                                <?php woocommerce_product_loop_end(); ?>


                        </div>

                        <?php dokan_content_nav( 'nav-below' ); ?>

                    <?php } else { ?>

                        <p class="dokan-info"><?php esc_html_e( 'No products were found of this seller!', 'crete' ); ?></p>

                    <?php } ?>
</div>
</section>
<?php get_footer( 'shop' ); ?>
