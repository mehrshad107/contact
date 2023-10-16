<?php

/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */
global $post;

$tag_list = get_the_tag_list('', '', '');

$client = get_post_meta( get_the_ID(), 'client_name', true );
$projectcategory = get_the_term_list(get_the_ID(), 'project-category', '', ', ', '');
$projectdate = get_post_meta( get_the_ID(), 'project_complete_date', true );
$address = get_post_meta( get_the_ID(), 'client_address', true );

?>
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

    <!--project details start-->
    <section class="project-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                      <?php if ( has_post_thumbnail() ) : ?>
                                <div class="feature-image mb-5">
                                    
                                   
    	
                                    		<?php the_post_thumbnail('crete-project-single', array( 'class' => 'w-full rounded-3' )); ?>
                                    	
                                    
                                   
                                </div>
                            <?php endif; ?>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-xl-8">
                    <div class="project-details-content">
                       <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="pd-sidebar">
                        <div class="info-sidebar-widget">
                            <h6 class="mb-4"><?php esc_html_e('Project Information','crete');?></h6>
                            <?php if ($client){ ?>
                            <div class="icon-box">
                                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle">
                                    <i class="fas fa-user"></i>
                                </span>
                                <div>
                                    <span><?php esc_html_e('Clients','crete');?></span>
                                    <h6 class="mb-0 mt-1 fs-18"><?php echo esc_html($client);?></h6>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($projectcategory){?>
                            <div class="icon-box">
                                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle">
                                    <i class="fa-solid fa-layer-group"></i>
                                </span>
                                <div>
                                    <span><?php esc_html_e('Category','crete');?></span>
                                    <h6 class="mb-0 mt-1 fs-18"><?php  echo maybe_unserialize($projectcategory); ?></h6>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($projectdate){ 
                            $newDate = date("F j, Y", strtotime($projectdate));
                            ?>
                            <div class="icon-box">
                                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <div>
                                    <span><?php esc_html_e('Date:','crete');?></span>
                                    <h6 class="mb-0 mt-1 fs-18"><?php echo maybe_unserialize($newDate);?></h6>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if ($address){?>
                            <div class="icon-box">
                                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <div>
                                    <span><?php esc_html_e('Address','crete');?></span>
                                    <h6 class="mb-0 mt-1 fs-18">2<?php echo esc_html($address);?></h6>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--project details end-->
      <?php
                        $previouspost = get_previous_post();
                        $nextpost = get_next_post();
                        ?>
                         <?php
                        if( !empty($nextpost) ){
                            $next_url = get_the_permalink($nextpost->ID);
                            $next_title = get_the_title($nextpost->ID);
                        }
                         if( !empty($previouspost) ){
                                $prev_url = get_the_permalink($previouspost->ID);
                                 $prev_title = get_the_title($previouspost->ID);
                            }
                        ?>
    <!--related projects end-->
    <div class="related-projects pb-100">
        <div class="container">
            <div class="rl-projects d-flex align-items-center justify-content-between gap-4 flex-wrap flex-sm-nowrap">
                 <?php if( !empty($previouspost) ){ ?>
                <div class="rl-project-single d-flex align-items-center">
                    <a href="<?php echo esc_url($prev_url);?>" class="explore-btn"><i class="fas fa-arrow-left"></i></a>
                    <div>
                        <span class="fs-sm fw-medium">Previous Post</span>
                        <a href="<?php echo esc_url($prev_url);?>"><h6 class="mb-0 mt-1 fs-18"><?php echo esc_html($prev_title);?></h6></a>
                    </div>
                </div>
                <?php } ?>
                <?php if( !empty($nextpost) ){ ?>
                <div class="rl-project-single d-flex align-items-center justify-content-end">
                    <div class="text-end">
                        <span class="fs-sm fw-medium">Next Post</span>
                        <a href="<?php echo esc_url($next_url);?>"><h6 class="mb-0 mt-1 fs-18"><?php echo esc_html($next_title);?></h6></a>
                    </div>
                    <a href="<?php echo esc_url($next_url);?>" class="explore-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--related projects end-->

    <!--related projects slider start-->
    <section class="pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="text-center">
                        <span class="cr-subtitle position-relative fw-semibold primary-text-color">Similar Projects</span>
                        <h2 class="mt-4 mb-60">Our Similar <span class="primary-bg-light primary-text-color ps-1">Projects</span></h2>
                    </div>
                </div>
            </div>
            <div class="related-projects-slider slider-spacing">
                
                <?php 
                                    //Get array of terms
                    $terms = get_the_terms( $post->ID , 'project-category', 'string');
                    //Pluck out the IDs to get an array of IDS
                    $term_ids = wp_list_pluck($terms,'term_id');
                    
                    //Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
                    //Chose 'AND' if you want to query for posts with all terms
                      $second_query = new WP_Query( array(
                          'post_type' => 'project',
                          'tax_query' => array(
                                        array(
                                            'taxonomy' => 'project-category',
                                            'field' => 'id',
                                            'terms' => $term_ids,
                                            'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                                         )),
                          'posts_per_page' => 9,
                          'ignore_sticky_posts' => 1,
                          'orderby' => 'rand',
                          'post__not_in'=>array($post->ID)
                       ) );
                     if($second_query->have_posts()) {
     while ($second_query->have_posts() ) : $second_query->the_post();
     $projectcat = get_the_term_list(get_the_ID(), 'project-category', '', ', ', '');
     
     ?>
                <div class="pp-project-card rounded-3 overflow-hidden position-relative z-1">
                  <?php the_post_thumbnail( 'crete-project-medium', array('alt' => get_the_title()) ); ?>
                    <a href="<?php the_permalink();?>" class="explore-btn"><i class="fas fa-eye"></i></a>
                    <div class="project-content">
                        <h6 class="mb-2 text-white"><?php the_title();?></h6>
                        <span class="fw-semibold text-uppercase text-white fs-sm"><?php  echo maybe_unserialize($projectcat); ?></span>
                    </div>
                </div>
                 <?php endwhile; wp_reset_query();
   } ?>
               
              
            </div>
        </div>
    </section>
    <!--related projects slider end-->