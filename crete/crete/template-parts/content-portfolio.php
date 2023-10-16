<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */
$post_id = get_the_ID();
$project_cat = get_the_terms(get_the_ID(), 'project-category');
$project_cat_name = join(', ', wp_list_pluck($project_cat, 'name'));
?>
<div class="col-lg-4 col-sm-6">
    <div class="pp-project-card rounded-3 overflow-hidden position-relative z-1">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('crete-blog-sthome-one'); ?>
        </a>
        <a href="<?php the_permalink(); ?>" class="explore-btn"><i class="fas fa-eye"></i></a>
        <div class="project-content">
            <h6 class="mb-2 text-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
            <span class="fw-semibold text-uppercase text-white fs-sm"><?php printf( esc_html__('%s', 'crete' ), $project_cat_name ); ?></span>
        </div>
    </div>
</div>
