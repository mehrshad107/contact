<?php
$hm4menu = cs_get_option('hm4-menu');
$filesystem = new WP_Filesystem_Direct( true );
?>
<?php if($hm4menu){?>
    <ul class="hm5-sidebar-navigation">
        <?php foreach ($hm4menu as $menu){
            $title = $menu['title'];
            $link = $menu['link'];
            $icon = $menu['icon'];
            $image = $menu['image']['url'];
            $active = $menu['active'];
            $acclass="";
            if($active==true && is_front_page()){
                $acclass="active";
            }
            ?>
            <li>
                <a href="<?php echo esc_html($link);?>" class="<?php echo esc_html($acclass);?>">
                    <?php if($image){
                        $e = pathinfo($image, PATHINFO_EXTENSION);
                        ?>
                        <?php if($e == "svg") { ?>
                            <?php echo maybe_unserialize($filesystem->get_contents( $image )); ?>
                        <?php } else { ?>
                            <img src="<?php echo esc_url($image);?>" alt="menu img" >
                        <?php } ?>
                    <?php } else { ?>
                        <i class="<?php echo esc_html($icon);?>"></i>
                    <?php } ?>
                    <span class="title-text"><?php printf( esc_html__('%s', 'crete' ), $title ); ?></span>
                </a>
            </li>

        <?php } ?>

    </ul>
    <?php if(!is_front_page()) { ?>
        <div class="hf5-backto-home-div"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hf5-backto-home"><i class="fas fa-arrow-rotate-left"></i> <span class="title-text"><?php echo esc_html__('Back to Home', 'crete');?></span></a></div>
    <?php } ?>
<?php } ?>