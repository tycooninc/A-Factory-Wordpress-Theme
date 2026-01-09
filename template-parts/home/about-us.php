<div class="swiper-slide index-box-1 wow animated" style="visibility: visible;">
    <div class="info-box">
        <div class="index-title-box">
            <h2>ABOUT US</h2>
            <div class="line"></div>
        </div>
        <h1><?php get_tvbtech_option('company_name');?></h1>
        <div class="content">
                <?php $about_us = get_page_by_path('about-us');
                echo $about_us->post_content; ?>
        </div>
        <a href="/about" class="index-more"><span>Learn More<i></i></span></a>
        <div class="en">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230712150836511.png" alt="TvbTech Co., Ltd." class="pc">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230712150844222.png" alt="TvbTech Co., Ltd." class="phone">

        </div>
    </div>

    <div class="video-box">
        <div class="pic">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/8/20230802152444177.jpg" alt="">
            <div class="play" onclick="videoModal(this)" iframeurl="https://www.youtube.com/embed/I44JoTc2VWI?si=7YNo9VPKvv7RQOgt" vsrc=""><i></i></div>
        </div>
    </div>

</div>