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
$designation = get_post_meta( get_the_ID(), 'designation', true );
$social = get_post_meta( get_the_ID(), 'social_info', true );
?>

<div class="col-xl-4 col-sm-6 ">
    <div class="team-card">
        <div class="feature-image rounded-4 overflow-hidden">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full'); ?>
            </a>
        </div>
        <div class="team-card-content">
            <div class="team-info">
                <a href="<?php the_permalink(); ?>"><h6 class="mb-1"><?php the_title(); ?></h6></a>
                <?php if ($designation){?>
                    <span class="primary-text-color"><?php echo esc_html($designation);?></span>
                <?php } ?>

            </div>
            <span class="spacer"></span>
            <?php if ($social){?>
            <div class="social-info">
                <?php foreach ($social as $item){
                    $icon = $item['social-icon'];
                    $url = $item['social-link']['url'];
                    $target = $item['social-link']['target'];
                    ?>
                <a href="<?php echo esc_url($url);?>" target="<?php echo esc_html($target);?>"> <i class="<?php echo esc_html($icon);?>"></i></a>
              <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>