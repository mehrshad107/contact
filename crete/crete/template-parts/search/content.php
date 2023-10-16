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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="tctz-default-thm-blog">
        <div class="tctz-default-thm-blog-inner">
        
            <?php if (has_post_thumbnail()) { ?>
			<div class="tctz-default-thumbnail">
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail() ?></a>
			</div>
		<?php } ?>
       
         <?php if (has_post_thumbnail()) { ?>
        <div class="tctz-default-meta tetz-meta-padding-top">
            <?php } else { ?>
            <div class="tctz-default-meta">
            <?php } ?>
              <?php
			    if ( is_sticky($post_id) ){
			        echo '<span class="sticky-post-label">' . esc_attr('Featured','crete') . '</span>';
			    }
			    ?>
            <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
            <div class="post-meta">
                <ul>
                    
                    	<li><i class="zil zi-user"></i> <?php crete_posted_by(); ?></li>
						<li><i class="zil zi-clock"></i> <?php crete_posted_on(); ?></li>
                </ul>
					

					</div><!-- .post-meta -->
					
					<div class="tctz-post-excerpt">
					    <?php echo crete_get_excerpt(200);?>
					</div>
        </div>
        
        </div>
    </div>
</article>