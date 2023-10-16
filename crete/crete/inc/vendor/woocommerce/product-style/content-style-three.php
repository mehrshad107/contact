<?php
 global $product;
$product_id = get_the_ID();
 ?>
<div class="trending-products-st2">
                           <a href="<?php the_permalink();?>" class="crete-hover-thumb-woo"> 
                                 <?php
                    						/**
                    						 *
                    						 * @hooked woocommerce_get_alt_product_thumbnail - 11
                    						 * @hooked woocommerce_template_loop_product_thumbnail - 10
                    						 */
                    						do_action( 'crete_woocommerce_shop_loop_images' );
                    					?>
                                </a>
                            <div class="onesale">
                                <?php pivoo_woo_sale_hook();?>
                            </div>
                            <?php crete_out_of_stock();?>
                           <div class="producticons">
                               <?php crete_add_quick_view_card();?>
                                <?php crete_wishlist_icon_in_product_grid(); ?>
                                 <?php crete_compare_icon_in_product_card();?>
                            </div>
                            <div class="product-content">
                                <div class="pro-review">
                                    <?php woocommerce_template_loop_rating();?>
                                </div>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="sell-pro-price">
                                    <?php echo maybe_unserialize($product->get_price_html()); ?>
                                </div>

                                <div class="trending-pro-cart-btn">
                                    <?php woocommerce_template_loop_add_to_cart();?>
                                </div>

                            </div>

                        </div>
                        
                        
                          