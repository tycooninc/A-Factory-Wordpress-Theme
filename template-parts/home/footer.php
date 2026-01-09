<div class="swiper-slide footer">
    <div class="footer-wrapper">
        <div class="box-container">
            <!-- box-1 start -->
            <div class="box-1">
                <div class="other">
                    <a href="/" class="logo">
                        <img src="<?php get_tvbtech_option('footer_logo', 'media');?>" alt="<?php get_tvbtech_option('company_name');?>"></a>

                    <div class="share">

                        <a href="<?php get_tvbtech_option('whatsapp');?>" target="_blank">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204632714.png" class="init">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204638040.png" class="on">

                        </a>



                        <a href="javascript:;">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/2023071920464864.png" class="init">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/2023071920469909.png" class="on">

                            <div class="hidebox"> <img src="<?php get_tvbtech_option('wechat_qrcode', 'media');?>" alt=""></div>
                        </a>


                        <a href="<?php get_tvbtech_option('facebook');?>" target="_blank">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204648143.png" class="init">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204653551.png" class="on">

                        </a>



                        <a href="<?php get_tvbtech_option('youtube');?>" target="_blank">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/2023071920473713.png" class="init">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/2023071920478917.png" class="on">

                        </a>



                        <a href="<?php get_tvbtech_option('instagram');?>" target="_blank">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204720155.png" class="init">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204724706.png" class="on">

                        </a>



                        <a href="<?php get_tvbtech_option('linkedin');?>" target="_blank">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204734810.png" class="init">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/vancheerfile/Images/2023/7/20230719204740606.png" class="on">

                        </a>

                     </div>

                </div>
                <div class="footer-nav-box">
                    <ul>
                        <li>
                            <a href="/products/"><span>Products</span></a>
                            <div class="nav">

                                <?php
                                $taxonomy = 'product_category';
                                $terms = get_terms( $taxonomy );
                                foreach ($terms as $term) {
                                    $term_id = $term->term_id;
                                    $term_name = $term->name;
                                    $term_slug = $term->slug;
                                    $term_link = get_term_link($term_id, $taxonomy);
                                    echo '<a href="' . $term_link . '"><span>' . $term_name . '</span></a>';
                                }
                                ?>

                            </div>
                        </li>

                        <li>
                            <a href="/news/"><span>News</span></a>
                            <a href="/about-us/"><span>About us</span></a>

                        </li>

                        <li>
                            <a href="/downloads/"><span>Download</span></a>
                            <a href="/partnership/"><span>Partnership</span></a>
                            <a href="/contact/"><span>Contact Us</span></a>
                        </li>

                        <li>
                            <div class="caption">Stay In Touch</div>
                            <div class="desc">Company Name: <?php get_tvbtech_option('company_name');?><br>
                                Tel: <?php get_tvbtech_option('phone');?><br>
                                E-mail:<?php get_tvbtech_option('email');?> </div>
                        </li>


                    </ul>
                </div>
            </div>
            <!-- box-1 end -->

            <!-- box-2 start -->
            <div class="box-2">
                <div class="copyright">Copyright  © <?php get_tvbtech_option('company_name');?>. All Rights Reserved</div>

            </div>
            <!-- box-2 end -->
        </div>
    </div>
</div>
