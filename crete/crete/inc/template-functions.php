<?php
/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'crete_child_cf7_button');
/*adding out submit button tag*/
if (!function_exists('crete_child_cf7_button')) {
    function crete_child_cf7_button() {
        wpcf7_add_form_tag('submit', 'crete_child_cf7_button_handler');
    }
}
/*out button markup inside handler*/
if (!function_exists('crete_child_cf7_button_handler')) {
    function crete_child_cf7_button_handler($tag) {
        $tag = new WPCF7_FormTag($tag);
        $class = wpcf7_form_controls_class($tag->type);
        $atts = array();
        $atts['class'] = $tag->get_class_option($class);
        $atts['class'] .= ' crete-child-custom-btn';
        $atts['id'] = $tag->get_id_option();
        $atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
        $value = isset($tag->values[0]) ? $tag->values[0] : '';
        if (empty($value)) {
            $value = esc_html__('Send', 'crete');
        }
        $atts['type'] = 'submit';
        $atts = wpcf7_format_atts($atts);
        $html = sprintf('<button class="template-btn primary-btn"><span class="crete-child-custom-btn-text">%2$s</span></button>', $atts, $value);
        return $html;
    }
}
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Crete
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function crete_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}

add_filter('body_class', 'crete_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function crete_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'crete_pingback_header');


/**
 * Excertp Function
 */
function crete_get_excerpt($limit, $source = null)
{

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '<div class="xpc-post-read-more-box"><a class="read-more" href="' . get_permalink() . '"> Read More</a></div>';
    return $excerpt;
}

function crete_get_excerpt_alt($limit, $source = null)
{

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " FF..."));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt;
    return $excerpt;
}

#-----------------------------------------------------------------#
# Crete Time Ago
#-----------------------------------------------------------------#/
function crete_time_ago_function() {
    return sprintf( esc_html__( '%s ago', 'crete' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}


#-----------------------------------------------------------------#
# Crete Paginantion
#-----------------------------------------------------------------#/
if (!function_exists('crete_page_navs')): /**
 * Displays post pagination links
 *
 * @since crete 1.0
 */
    function crete_page_navs($query = false)
    {
        global $wp_query;
        if ($query) {
            $temp_query = $wp_query;
            $wp_query = $query;
        }
        // Return early if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <div class="crete-common-paginav text-center">
            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'type' => 'list',
                    'prev_text' => '<i class="fa-solid fa-arrow-left"></i>',
                    'next_text' => '<i class="fa-solid fa-arrow-right"></i>'
                ));
                ?>
            </div>
        </div>
        <?php
        if (isset($temp_query)) {
            $wp_query = $temp_query;
        }
    }
endif;


if (!function_exists('crete_page_paging_nav')) {
    function crete_page_paging_nav($max_num_pages = false, $args = array())
    {

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($max_num_pages === false) {
            global $wp_query;
            $max_num_pages = $wp_query->max_num_pages;
        }


        $defaults = array(
            'nav' => 'load',
            'posts_per_page' => get_option('posts_per_page'),
            'max_pages' => $max_num_pages,
            'post_type' => 'post',
        );


        $args = wp_parse_args($args, $defaults);

        if ($max_num_pages < 2) {
            return;
        }


        $big = 999999999; // need an unlikely integer

        $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $max_num_pages,
            'prev_next' => true,
            'prev_text' => esc_html__('Previous', 'crete'),
            'next_text' => esc_html__('Next', 'crete'),
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'list',
        ));

        if (!empty($links)): ?>
            <div class="crete-common-paginav crete-page-pagination flex text-center">
                <?php echo wp_kses_post($links); ?>
            </div>
            <div class="empty-space marg-sm-b60"></div>
        <?php endif;
    }


}


#-----------------------------------------------------------------#
# Crete Header Builder
#-----------------------------------------------------------------#/

if (!function_exists('crete_header_builder')) {
    function crete_header_builder()
    {
        $page_meta = get_post_meta(get_the_ID(), 'crete_page_options', true);
        $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
        if ($custom_options == 'enabled') {
            $header = $page_meta['select_header_blocks_meta'];
        } else {
            $header = cs_get_option('select_header_blocks');
        }

        $stacked_header_enable = cs_get_option('stacked_header_enable');

        if (empty($stacked_header_enable)) {
            $stackclass = 'no-stacked-header';
        } else {
            $stackclass = 'stacked-header';
        }
        if (!empty($header)) {
            echo '<header class="crete-header-builder crete-site-header ' . $stackclass . '"><div class="header-content-holder">' . \Elementor\Plugin::$instance->frontend->get_builder_content(intval($header)) . '</div></header>';
        } else {
            echo '<header class="crete-header crete-site-header stacked-header"><div class="header-content-holder">';
            get_template_part('template-parts/header/header', 'deafult');
            echo '</div></header>';
        }


    }

}

add_action('wp_enqueue_scripts', function () {
    if (!class_exists('\Elementor\Core\Files\CSS\Post')) {
        return;
    }
    $page_meta = get_post_meta(get_the_ID(), 'crete_page_options', true);
    $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
    if ($custom_options == 'enabled') {
        $headerid = $page_meta['select_header_blocks_meta'];
    } else {
        $headerid = cs_get_option('select_header_blocks');
    }
    $template_id = $headerid;

    $css_file = new \Elementor\Core\Files\CSS\Post($template_id);
    $css_file->enqueue();
}, 500);


#-----------------------------------------------------------------#
# Crete Footer Builder
#-----------------------------------------------------------------#/


if (!function_exists('crete_footer_builder')) {
    function crete_footer_builder()
    {

        $page_meta = get_post_meta(get_the_ID(), 'crete_page_options', true);
        $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';

        if ($custom_options == 'enabled') {
            $footer = $page_meta['select_footer_blocks_meta'];
        } else {
            $footer = cs_get_option('select_footer_blocks');
        }

        if (!empty($footer)) {
            echo '<footer class="crete-footer">' . \Elementor\Plugin::$instance->frontend->get_builder_content(intval($footer)) . '</footer>';
        } else {

            get_template_part('template-parts/footer/footer', 'default');

        }

    }

}

add_action('wp_enqueue_scripts', function () {
    if (!class_exists('\Elementor\Core\Files\CSS\Post')) {
        return;
    }
    $page_meta = get_post_meta(get_the_ID(), 'crete_page_options', true);
    $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
    if ($custom_options == 'enabled') {
        $footer = $page_meta['select_footer_blocks_meta'];
    } else {
        $footer = cs_get_option('select_footer_blocks');
    }
    $template_id = $footer;

    $css_file = new \Elementor\Core\Files\CSS\Post($template_id);
    $css_file->enqueue();
}, 500);


#-----------------------------------------------------------------#
# Crete Elementor CPT Support
#-----------------------------------------------------------------#/
function crete_add_cpt_support()
{

    //if exists, assign to $cpt_support var
    $cpt_support = get_option('elementor_cpt_support');

    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'crete_header', 'crete_footer', 'crete_block']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    } //if it DOES exist, but crete_header is NOT defined
    else if (!in_array('crete_header', $cpt_support)) {
        $cpt_support[] = 'crete_header'; //append to array
        update_option('elementor_cpt_support', $cpt_support); //update database
    } else if (!in_array('crete_footer', $cpt_support)) {
        $cpt_support[] = 'crete_footer'; //append to array
        update_option('elementor_cpt_support', $cpt_support); //update database
    }
    //otherwise do nothing, crete_header already exists in elementor_cpt_support option
}

add_action('after_switch_theme', 'crete_add_cpt_support');

#-----------------------------------------------------------------#
# Title Trim
#-----------------------------------------------------------------#/
function crete_title_trim($maxchar = 90)
{

    $fullTitle = get_the_title();

    // get the length of the title
    $titleLength = strlen($fullTitle);

    if ($maxchar > $titleLength) {
        return $fullTitle;
    } else {
        $shortTitle = substr($fullTitle, 0, $maxchar);
        return $shortTitle . " &hellip;";
    }
}


#-----------------------------------------------------------------#
# Theme Option Compatibility
#-----------------------------------------------------------------#/
if (class_exists('Crete_Core')) {

    function cs_get_option($option, $name = NULL, $default = NULL)
    {
        $base_options = get_option('crete_options');

        if ($name == NULL) {

            if (isset($base_options[$option])) {
                return $base_options[$option];
            } else {
                return false;
            }

        } else if (isset($base_options[$option][$name])) {

            return $base_options[$option][$name];

        } else if ($default != NULL) {

            return $default;

        } else {

            return false;

        }
    }


} else {
    function cs_get_option($option_name = '', $default = '')
    {
        return false;
    }

}

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
                                    <a data-splitting class="splitting" href="<?php the_permalink(); ?>">
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

