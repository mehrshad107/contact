<div class="row">
<?php

 $product_args =  array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 3,
        );
        
         $the_query = new WP_Query($product_args);
         
 if( $the_query -> have_posts()){
            while( $the_query -> have_posts()){
                $the_query -> the_post();
                global $product;
                
                ?>
                
                <div class="col-12 col-md-4">
                    
               
                 <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-eight' ); ?>
                 
                  </div>
                 
                 
            <?php }
            
 }
  wp_reset_query();
 ?>
 
 </div>