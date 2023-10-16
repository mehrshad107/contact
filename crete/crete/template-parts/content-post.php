<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */
$post_id = get_the_ID();
?>    
<article class="crete-blog-card bp-blog-card rounded-4 overflow-hidden" id="post-<?php the_ID(); ?>"> 

                   <?php if (has_post_thumbnail()) { ?>
                        <div class="feature-image overflow-hidden">
                               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                        </div>
                        <?php } ?>
                        <div class="blog-content">
                            <?php
                                    if (is_sticky($post_id)) {
                                        echo '<span class="sticky-post-label">' . esc_attr('Featured', 'crete') . '</span>';
                                    }
                                    ?>
                            <div class="blog-meta d-flex align-items-center flex-wrap">
                                <span><i class="fas fa-user me-2"></i> by <?php crete_posted_by();?></span>
                                <span><i class="fas fa-calendar-days me-2"></i><?php crete_posted_on(); ?></span>
                                <span><i class="fas fa-tags me-2"></i><?php if (get_the_category_list()) { ?>
                             <?php crete_post_cat(); ?><?php } ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>"><h4 class="mt-4 mb-4"><?php the_title(); ?></h4></a>
                            <p class="mb-32"><?php echo  wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="template-btn primary-btn">Read Details</a>
                        </div>
                    </article>