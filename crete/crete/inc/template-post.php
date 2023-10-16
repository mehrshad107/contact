<?php
if ( ! function_exists( 'crete_post_style_list_sidebar' ) ) {
	function crete_post_style_list_sidebar() { ?>

        <li class="d-flex align-items-center gap-3">
            <div class="feature-image rounded-3 overflow-hidden">
                <a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('crete-blog-side-square');
                    } ?></a>
            </div>
            <div>
                <span class="author fs-sm fw-medium"><i class="fa-regular fa-user me-2"></i>by   <?php crete_posted_by(); ?></span>
                <a  href="<?php the_permalink();?>"><h6 class="mb-0 mt-1 fs-18"><?php echo crete_title_trim($maxchar= 42); ?></h6></a>
            </div>
        </li>


	<?php } }