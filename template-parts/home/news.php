<div class="swiper-slide index-box-3">
    <div class="box-container">
        <div class="index-title-box center wow fadeInUp50 animated" style="visibility: visible; animation-name: fadeInUp50;">
            <h2>NEWS AND EVENTS</h2>
            <div class="line"></div>
        </div>
        <div class="news-box wow fadeInUp50 animated" style="visibility: visible; animation-name: fadeInUp50;">
            <div class="swiper-container news-swiper">

                <div class="swiper-wrapper">

                <?php
                   $recent_posts = wp_get_recent_posts();
                   foreach($recent_posts as $post):
                ?>

                    <div class="swiper-slide">
                        <a href="<?php echo get_permalink($post['ID']);?>">
                            <div class="pic imgScale">
                                <img src="<?php echo get_the_post_thumbnail_url($post['ID']); ?>" alt="" title="Next Trade Show: NO-DIG LIVE 2024 in Warwickshire, UK">
                            </div>
                            <div class="info">
                                <div class="title"><?php echo $post['post_title']; ?></div>
                                <p><?php echo substr($post["post_date"], 0, 10); ?></p>
                            </div>
                        </a>
                    </div>

                  <?php endforeach; ?>
                </div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            <a href="javascript:;" class="swiper-btn white prev" tabindex="0" role="button" aria-label="Previous slide"><i></i></a>
            <a href="javascript:;" class="swiper-btn white next" tabindex="0" role="button" aria-label="Next slide"><i></i></a>
        </div>
    </div>
</div>