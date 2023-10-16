<?php
global $post;
                                $department_obj_list = get_the_terms($post->ID, 'department');
                                if ($department_obj_list) {
                                    $department_string = join(', ', wp_list_pluck($department_obj_list, 'name'));
                                }
                                $facebook = get_field("facebook");
                                $twitter = get_field("twitter");
                                $linkedin = get_field("linked-in");
                                $instagram = get_field("instagram");

                                $tpprofilephoto = get_field("transparent_profile_photo");
?>


<div class="col-lg-4 crete-team-block-d">
    
     <div class="text-center crete-expert-doctors-position ex-doctor-style-one">
                                                            <div class="crete-expert-doctors-1st m-lg-2 m-2 text-center crete-bg-style">
                                                                <h2 class="crete-global-h-md medical-treatment-name-h2 "><a href="<?php the_permalink(); ?>"><?php the_title(); ?>
                                                                    </a></h2>
                                                                <?php if ($department_obj_list) { ?>
                                                                    <p class="best-medical-treatment-right-p"><?php echo esc_html($department_string); ?></p>
                                                                <?php } ?>

                                                                <?php if ($tpprofilephoto) { ?>
                                                                    <img src="<?php echo esc_url($tpprofilephoto); ?>" alt="doctor photo">
                                                                <?php } else { ?>
                                                                    <?php if (has_post_thumbnail()) {
                                                                        the_post_thumbnail();
                                                                    }  ?>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="medical-sc-icon">
                                                                <ul class="text-center">
                                                                    <?php if ($facebook) { ?>
                                                                        <li>
                                                                            <a href="<?php echo esc_url($facebook); ?>"><i class="zil zi-facebook"></i></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($twitter) { ?>
                                                                        <li>
                                                                            <a href="<?php echo esc_url($twitter); ?>"><i class="zil zi-twitter"></i></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($linkedin) { ?>
                                                                        <li>
                                                                            <a href="<?php echo esc_url($linkedin); ?>"><i class="zil zi-linked-in"></i></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($instagram) { ?>
                                                                        <li>
                                                                            <a href="<?php echo esc_url($instagram); ?>"><i class="zil zi-instagram"></i></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
    
    
    
</div>