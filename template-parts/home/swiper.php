<div class="swiper-slide index-banner-wrapper">
    <div class="swiper-container index-banner-swiper swiper-container-initialized swiper-container-horizontal">
        <div class="swiper-wrapper" style="transform: translate3d(-5730px, 0px, 0px); transition-duration: 0ms;">
            <?php

            $carousels = get_tvbtech_option('carousel', 'repeater');

            if(!empty($carousels)):
               foreach($carousels as $index => $carousel):
            ?>
            <div class="swiper-slide">
                <a href="<?php echo $carousel['link'];?>">

                    <img src="<?php echo $carousel['image'];?>" alt="33 3299F" class="pc">

                    <img src="<?php echo $carousel['mobile_image'];?>" alt="33 3299F" class="phone">

                    <div class="info info-1">
                        <div class="box-container">

                            <div class="desc"></div>
                        </div>
                    </div>
                </a>
            </div>

            <?php endforeach; endif;?>

        </div>
        <!-- 轮播进度 -->
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet one" tabindex="0" role="button" aria-label="Go to slide 1"><div class="circlechart" data-percentage="100"><svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"></circle><circle class="circle-chart__circle " stroke-dasharray="100,100" cx="16.9" cy="16.9" r="15.9"></circle></svg></div></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"><div class="circlechart" data-percentage="100"><svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"></circle><circle class="circle-chart__circle " stroke-dasharray="100,100" cx="16.9" cy="16.9" r="15.9"></circle></svg></div></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"><div class="circlechart" data-percentage="100"><svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"></circle><circle class="circle-chart__circle " stroke-dasharray="100,100" cx="16.9" cy="16.9" r="15.9"></circle></svg></div></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"><div class="circlechart" data-percentage="100"><svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"></circle><circle class="circle-chart__circle " stroke-dasharray="100,100" cx="16.9" cy="16.9" r="15.9"></circle></svg></div></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"><div class="circlechart" data-percentage="100"><svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"></circle><circle class="circle-chart__circle " stroke-dasharray="100,100" cx="16.9" cy="16.9" r="15.9"></circle></svg></div></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"><div class="circlechart" data-percentage="100"><svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg"><circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"></circle><circle class="circle-chart__circle " stroke-dasharray="100,100" cx="16.9" cy="16.9" r="15.9"></circle></svg></div></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    <a href="javascript:;" class="swiper-btn prev" tabindex="0" role="button" aria-label="Previous slide"><i></i></a><a href="javascript:;" class="swiper-btn next" tabindex="0" role="button" aria-label="Next slide"><i></i></a>
</div>