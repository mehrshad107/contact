<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crete
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--bradcrumb section start-->
    <div class="crete-page-breadcrumb breadcrumb-section position-relative z-1 overflow-hidden">
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

    <section class="about-section overflow-hidden">
        <?php crete_post_thumbnail(); ?>
        <div class="crete-full-container ">
            <div class="post-content crete-default-page-content-alt">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'crete' ),
                        'after'  => '</div>',
                    )
                );
                ?>


                <?php if ( get_edit_post_link() ) : ?>
                    <div class="post-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'crete' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post( get_the_title() )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </div><!-- .post-footer -->
                <?php endif; ?>



                <div class="clearfix"></div>
                <div class="crete-page-comment-section">
                    <div class="container">
                        <?php	// If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                        ?>
                    </div>

                </div>
            </div><!-- .post-content -->
        </div>
        </div>
</article><!-- #post-<?php the_ID(); ?> -->

