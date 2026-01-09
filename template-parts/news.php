<div class="breadcrumb-box">
    <?php tvbtech_breadcrumb('News');?>
</div>

<div class="page-box news-wrapper">
    <div class="box-container">
        <h2 class="page-title wow fadeInUp50 animated" style="visibility: visible; animation-name: fadeInUp50;">NEWS AND EVENTS</h2>
        <div class="news-box">
            <ul id="DivList">

                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                );

                $news_query = new WP_Query( $args );

                if ( $news_query->have_posts() ) :

                 while ($news_query->have_posts()): $news_query->the_post();
                ?>
                <li class="wow fadeInUp50 animated" data-wow-delay="0ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeInUp50;">
                    <a href="<?php the_permalink();?>">
                        <div class="pic imgScale">
                            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title();?>"></div>
                        <div class="info">
                            <div class="title"><?php the_title();?></div>
                            <p><?php the_date('Y-m-d');?></p>
                            <div class="more"></div>
                        </div>
                    </a>
                </li>

                <?php endwhile; wp_reset_postdata(); else:
                    echo 'No posts found';
                endif;?>
            </ul>

            <div class="loading wow fadeInUp50" style="visibility: hidden; animation-name: none;"><a href="javascript:getData();" id="btnJZL">
                    <img src="/img/loading.png" alt="">READ MORE</a></div>

        </div>
    </div>
</div>



