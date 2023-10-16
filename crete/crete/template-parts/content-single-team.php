<!--bradcrumb section start-->
<?php
$custom_breadcrumb_img = get_post_meta(get_the_ID(), 'custom_breadcrumb_image', true);
if (is_array($custom_breadcrumb_img) && !empty($custom_breadcrumb_img['url'])) {
    $breadcrumb_img_link = $custom_breadcrumb_img['url'];
} else {
    $breadcrumb_img_link = get_the_post_thumbnail_url();
}
?>
<div class="breadcrumb-section position-relative z-1 overflow-hidden" data-background="<?php echo esc_url($breadcrumb_img_link); ?>">
    <span class="circle-shape-1 rounded-circle position-absolute"></span>
    <span class="circle-shape-2 rounded-circle position-absolute"></span>
    <span class="circle-shape-3 rounded-circle position-absolute"></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h1 class="text-white mb-3 display-2 fw-bold"><?php the_title(); ?></h1>
                    <?php crete_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--bradcrumb section end-->


<!--team details start-->
<section class="team-details-area ptb-100 overflow-hidden">
    <div class="container">
        <div class="team-details">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="feature-image">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="team" class="img-fluid rounded-4">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="teadm-details-content">
                        <h3 class="mb-3"><?php the_title(); ?></h3>
                        <?php
                        $designation = get_post_meta(get_the_ID(), 'designation', true);
                        if (!empty($designation)) {
                            ?>
                            <span class="fw-medium primary-text-color">
                            <?php printf( esc_html__('%s', 'crete' ), $designation ); ?>
                        </span>
                        <?php } ?>
                        <p class="mt-4">
                            <?php the_content(); ?>
                        </p>
                        <div class="mt-5 light-bg rounded-4 team-d-info">
                            <div class="row g-4">
                                <?php
                                $additional_information = get_post_meta(get_the_ID(), 'additional_information', true);
                                if (is_array($additional_information)) {
                                    foreach ($additional_information as $information) {
                                        $titlez = $information['info-title'];
                                        $subtitlez = $information['info-subtitle'];
                                        ?>
                                        <div class="col-md-6">
                                            <div class="td-icon-box d-flex align-items-center flex-wrap">
                                            <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-white theme-shadow">
                                                <i class="<?php echo esc_attr($information['info-icon']); ?>"></i>
                                            </span>
                                                <div>
                                                    <span><?php printf( esc_html__('%s', 'crete' ), $subtitlez ); ?></span>
                                                    <h6 class="mb-0 mt-1 fs-18"><?php printf( esc_html__('%s', 'crete' ), $titlez ); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--team details end-->
<?php
$newsletter_bg_img = cs_get_option('newsletter_section_bg_img');
$newsletter_switcher = cs_get_option('team_newsletter_switcher');
if (is_array($newsletter_bg_img) && !empty($newsletter_bg_img['url'])) {
    $newsletter_bg_img_url = $newsletter_bg_img['url'];
} else {
    $newsletter_bg_img_url = '';
}
if ($newsletter_switcher) {
    ?>
    <!--newsletter area start-->
    <section class="newsletter-section ptb-100" data-background="<?php echo esc_url($newsletter_bg_img_url); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="text-center">
                        <?php if (!empty(cs_get_option('newsletter_section_subtitle'))) { ?>
                            <span class="cr-subtitle fw-semibold position-relative primary-text-color"><?php echo esc_html(cs_get_option('newsletter_section_subtitle')) ?></span>
                        <?php } ?>

                        <?php if (!empty(cs_get_option('newsletter_section_title'))) { ?>
                            <h2 class="mt-4"><?php echo esc_html(cs_get_option('newsletter_section_title')); ?> <span class="primary-text-color primary-bg-light"><?php echo esc_html(cs_get_option('newsletter_section_special_title')); ?></span></h2>
                        <?php } ?>

                        <?php echo do_shortcode(cs_get_option('newsletter_shortcode')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--newsletter area end-->
<?php } ?>

<?php
$team_blog_switcher = cs_get_option('team_blog_switcher');
if ($team_blog_switcher) {
    ?>
    <!--blog section start-->
    <section class="blog-section ptb-100 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center">
                        <?php if (!empty(cs_get_option('Blog_section_subtitle'))) { ?>
                            <span class="cr-subtitle position-relative primary-text-color fw-semibold"><?php echo esc_html(cs_get_option('Blog_section_subtitle')) ?></span>
                        <?php } ?>
                        <?php if (!empty(cs_get_option('blog_section_title'))) { ?>
                            <h2 class="mt-4"><?php echo esc_html(cs_get_option('blog_section_title')) ?> <span class="primary-bg-light primary-text-color px-2"><?php echo esc_html(cs_get_option('blog_section_special_title')) ?></span></h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center g-4">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();

                        $mycontent = $post->post_content;
                        $word = str_word_count(strip_tags($mycontent));
                        $m = floor($word / 200);
                        $est = $m . ' min read';

                        $post_video = get_post_meta(get_the_ID(), 'video-link', true);
                        ?>
                        <div class="col-xl-4 col-sm-6">
                            <article class="hm2-blog-card">
                                <div class="feature-image rounded-3 overflow-hidden position-relative">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="blog" class="img-fluid">
                                    <?php if (is_array($post_video) && !empty($post_video['url'])) { ?>
                                        <a href="<?php echo esc_url($post_video['url']); ?>" class="video-btn video-popup-btn rounded-circle d-inline-flex align-items-center justify-content-center"><i class="fas fa-play"></i></a>
                                    <?php } ?>
                                </div>
                                <div class="blog-content mt-32">
                                    <div class="blog-meta d-flex align-items-center flex-wrap gap-4">
                                        <span class="fs-sm fw-medium"><?php echo get_the_date('d M, Y'); ?></span>
                                        <span class="fs-sm fw-medium"><?php printf( esc_html__('%s', 'crete' ), $est ); ?></span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"><h6 class="my-4"><?php the_title(); ?></h6></a>
                                    <div class="categories d-flex align-items-center gap-3 flex-wrap crete__team_single_category">
                                         <?php if (get_the_category_list()) { ?>
                             <?php crete_post_cat_alt(); ?><?php } ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </section>
    <!--blog section end-->
<?php } ?>
