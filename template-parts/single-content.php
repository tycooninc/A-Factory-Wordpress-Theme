<div class="page-box newsinfo-wrapper">
    <div class="box-container">
        <div class="main">
            <div class="top">
                <div class="date"><?php echo get_the_date('Y-m-d');?></div>
                <h1><?php the_title();?></h1>
            </div>
            <div class="content">
                <?php the_content();?>

            </div>
            <div class="relative-btn">
                <?php if(!empty(get_previous_post())):?>
                    <a href="<?php get_previous_post_link();?>" class="btn prev"><i></i></a>
                <?php endif;?>
                <?php if(!empty(get_next_post())):?>
                    <a href="<?php get_next_post_link();?>" class="btn next"><i></i></a>
                <?php endif;?>
                <a href="<?php echo '/news'; ?>" class="return"><span>Return to previous page</span></a>
            </div>
        </div>
        <div class="share-box">
            <a href="<?php get_tvbtech_option('facebook');?>" target="_blank" rel="nofollow">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/ni-facebook.png" alt="" class="init">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/ni-facebook2.png" alt="" class="on">
                <span class="line_t"></span>
                <span class="line_r"></span>
                <span class="line_b"></span>
                <span class="line_l"></span>
            </a>
            <a href="<?php get_tvbtech_option('youtube');?>" target="_blank" rel="nofollow">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/YouTube1.png" alt="" class="init">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/YouTube22.png" alt="" class="on">
                <span class="line_t"></span>
                <span class="line_r"></span>
                <span class="line_b"></span>
                <span class="line_l"></span>
            </a>

            <a href="<?php get_tvbtech_option('instagram');?>" target="_blank" rel="nofollow">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/INST1.png" alt="" class="init">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/INST22.png" alt="" class="on">
                <span class="line_t"></span>
                <span class="line_r"></span>
                <span class="line_b"></span>
                <span class="line_l"></span>
            </a>
            <a href="<?php get_tvbtech_option('linkedin');?>" target="_blank" rel="nofollow">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/ni-ins.png" alt="" class="init">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/ni-ins2.png" alt="" class="on">
                <span class="line_t"></span>
                <span class="line_r"></span>
                <span class="line_b"></span>
                <span class="line_l"></span>
            </a>
        </div>
    </div>
</div>