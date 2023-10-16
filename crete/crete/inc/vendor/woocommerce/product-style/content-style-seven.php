 <?php
 global $product, $post;
$product_id = get_the_ID();
$sales_price_from = get_post_meta($post->ID, '_sale_price_dates_from', true);
$sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
 ?>

           <div class="trending-products-sport">
                <div class="trending-product-sport-img">
                    <a href="<?php the_permalink();?>" class="crete-hover-thumb-woo"> 
                                <?php
						/**
						 *
						 * @hooked crete_woo_thumbnail - 11
						 */
						do_action( 'crete_woocommerce_shop_loop_images' );
					?>
                                
                                </a>
                            <?php if ($sales_price_from && $sales_price_to){?>
                            <div class="spe-pro-offer">
                              <?php do_action('xpc_counter_product_woo');?>
                            </div>
                    <?php } ?>
                    
                    
                </div>
                <div class="onesale">
                    <?php pivoo_woo_sale_hook();?>
                </div>
              <?php crete_out_of_stock();?>
                <div class="producticons-sport psf-style-7">
                 <?php crete_add_quick_view_card();?>
                                <?php crete_wishlist_icon_in_product_grid(); ?>
                                 <?php crete_compare_icon_in_product_card();?>
                                  <?php 
                            if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {
			woocommerce_template_loop_add_to_cart();
		}
                            ?>
                </div>
                <div class="product-content">
                    <div class="d-flex justify-content-between">
                        <div class="product-cateory">
                        <a href=""><?php echo wc_get_product_category_list( $product->get_id()); ?></a>
                    </div>
                    <div class="pro-review">
                        <?php crete_get_star_rating('(' . $product->get_review_count() . ')'); ?>
                    </div>
                    </div>
                    

                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="sell-pro-price">
                        <?php echo maybe_unserialize($product->get_price_html()); ?>
                    </div>
                </div>
            </div>
           