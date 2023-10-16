<div class="crete-single-blog">
                       <?php if(has_post_thumbnail()){?>
                          <a href="<?php the_permalink(); ?>" class="crete-post-thumbnail">
                             <?php the_post_thumbnail('crete-default-post-st-one'); ?>
                          </a>
                          <?php } ?>
                          <div class="crete-blog-meta">
                            <span class="meta-name"> <i class="zil zi-tag"></i>
                             <?php echo crete_post_cat(); ?></span>
                            <span class="meta-date"> <i class="zil zi-clock"></i>
                             <?php crete_posted_on(); ?></span>
                          </div>
                          
                             <h2 class="crete-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          
                          <a href="<?php the_permalink(); ?>" class="readmore-btn"><?php echo esc_html( 'Read More', 'crete' )?></a>
                    </div>