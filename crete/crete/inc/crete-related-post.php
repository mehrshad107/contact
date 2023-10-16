<?php
function crete_cats_related_post()
{

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category($post_id);

    if (!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array(
        'category__in' => $cat_ids,
        'post_type' => $current_post_type,
        'post__not_in' => array($post_id),
        'posts_per_page' => '3',
    );

    $related_cats_post = new WP_Query($query_args);

    if ($related_cats_post->have_posts()):
        ?>
        <div class="swiper crete_related_post ">
            <div class="swiper-wrapper">
                <?php
                while ($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                    <div class="swiper-slide">
                        <div class="crete_related_post_single">
                            <div class="crete_related_post_img">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            </div>
                            <div class="crete_related_post_content">
                                <div class="crete_related_post_content_link">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </div>
                                <div class="crete_related_post_content_date">
                                    <?php crete_posted_on(); ?>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php endwhile;

                // Restore original Post Data
                wp_reset_postdata();
                ?>

            </div>

        </div>
        <div class="crete_home_two-carousel-btn">
            <div class="swiper-related-button-nexts"><i class="ticon-arrow-right"></i></div>
            <div class="swiper-related-button-prevs"><i class="ticon-arrow-left"></i></div>
        </div>
    <?php
    endif;

}

