<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */


$tag_list = get_the_tag_list('', '', '');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
     <!--bradcrumb section start-->
        <div class="breadcrumb-section position-relative z-1 overflow-hidden" data-background="<?php the_post_thumbnail_url(); ?>" style="background:url(<?php the_post_thumbnail_url(); ?>);">
        <span class="circle-shape-1 rounded-circle position-absolute"></span>
        <span class="circle-shape-2 rounded-circle position-absolute"></span>
        <span class="circle-shape-3 rounded-circle position-absolute"></span>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h1 class="text-white mb-3 display-2 fw-bold"><?php the_title();?></h1>
                        <?php crete_breadcrumbs();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--bradcrumb section end-->
    
<section class="bp-blog-section ptb-100">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-details-content rounded-3">
                             <?php if ( has_post_thumbnail() ) : ?>
                                <div class="feature-image">
                                    
                                   
    	
                                    		<?php the_post_thumbnail('full', array( 'class' => 'img-full rounded-3' )); ?>
                                    	
                                    
                                   
                                </div>
                            <?php endif; ?>
                            <div class="blog-meta d-flex align-items-center flex-wrap mt-40">
                                <span><i class="fa-regular fa-user me-2"></i>by  <?php crete_posted_by(); ?></span>
                                <span><i class="fa-solid fa-calendar-days me-2"></i><?php crete_posted_on(); ?></span>
                                <span><i class="fa-solid fa-tags me-2"></i><?php if (get_the_category_list()) { ?>
                        <?php crete_post_cat(); ?><?php } ?></span>
                            </div>
                           
                            
                            <div class="crete-single-blog-content">
                                <?php the_content();?>
                            </div>
                            
                            <div class="clearfix"></div>
                               <div class="row align-items-center justify-content-between my-5">
                                <div class="bdp-tags-list col-12 col-md-7">
                                    <?php echo maybe_unserialize($tag_list); ?>
                                </div>
                                <div class="bdp-social-follow col-12 col-md-5">
                                    <span class="title fw-bold">Follow Us:</span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-google-plus"></i></a>
                                </div>
                            </div>
                            
                            
                            <div class="bdp-author-box d-flex align-items-center gap-4 rounded-4 bg-white flex-wrap flex-sm-nowrap">
                                <?php
                                global $current_user, $post;
        
                                $authorid = get_the_author_meta('ID');
                                $address = get_user_meta($authorid, 'user_address', true);
                                $website = get_the_author_meta('user_url');
                                $facebook = get_user_meta($authorid, 'user_facebook', true);
                                $twitter = get_user_meta($authorid, 'user_twitter', true);
                                $instagram = get_user_meta($authorid, 'user_instagram', true);
                                $linkedin = get_user_meta($authorid, 'user_linkedin', true);
                                $usercover = get_user_meta($authorid, 'user_cover', true);
                        ?>
                                <div class="thumbnail rounded-4 overflow-hidden">
                                     <?php echo get_avatar(get_the_author_meta('ID'), '220'); ?>
                                </div>
                                <div>
                                    <h6 class="mb-3"><?php echo esc_html(get_the_author_meta('display_name')); ?></h6>
                                    <p class="mb-4"><?php echo esc_html(get_the_author_meta('description')); ?></p>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                       
                                        
                                        
                                        <?php if ($website) { ?>
                                    <a href="<?php echo esc_html($website); ?>" target="_blank"><i class="fa-solid fa-earth-europe"></i> </a>
                                <?php } ?>
                                <?php if ($facebook) { ?>
                                   <a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <?php } ?>
                                <?php if ($twitter) { ?>
                                   <a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                <?php } ?>
                                <?php if ($instagram) { ?>
                                    <a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="blog-comments mt-40">
                                 <?php

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if (comments_open() || get_comments_number()) :
                                        comments_template();
                                    endif;
                                    ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="blog-sidebar mt-5 mt-xl-0">
                        
                           <?php dynamic_sidebar( 'crete-sidebar' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   
</article>