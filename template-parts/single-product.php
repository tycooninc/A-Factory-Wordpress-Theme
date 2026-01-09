<div class="breadcrumb-box">
    <?php
     $post_meta_info = get_post_meta(get_the_ID(), 'tvbtech_product_options', true);
     $model_number = $post_meta_info['model_number'];
     $gallery = $post_meta_info['product_gallery'];
     $downloads = $post_meta_info['downloads'];
     $gallery_ids = explode(',',$gallery);
     tvbtech_breadcrumb($model_number);
    ?>
</div>

<div class="page-box goodsinfo-wrapper">
    <h1 class="name">3599FB</h1>
    <!-- base-box start -->
    <div class="base-box" style="background-image: url(/vancheerfile/Images/2025/6/2025062617174453.jpg);">
        <div class="box-container">

            <div class="pic-box">

                <div class="swiper-container bigImg-swiper">
                    <div class="swiper-wrapper">
                        <?php if(!empty($gallery_ids)):?>
                        <?php foreach($gallery_ids as $gallery_id):?>
                        <div class="swiper-slide"  data-swiper-autoplay="5000">
                            <img src="<?php echo wp_get_attachment_url( $gallery_id );?>" alt="<?php echo $gallery_id;?>">
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>


            <div class="info-box">
                <div class="title"><?php the_title();?></div>
                <div class="desc">
                    <?php echo $post_meta_info['short_description'];?>
                </div>
                <div class="btns">
                    <a href="/inquiry">Online Inquiry</a>
                    <a href="mailto:<?php get_tvbtech_option('email') ?>">Email Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- base-box end -->

    <!-- detail-box start -->
    <div class="detail-box">
        <div class="tab">
            <div class="box-container">

                <?php if(isset($post_meta_info['key_features'])):?>

                <a href="javascript:;" class="on"><span>Key Features</span></a>

                <?php endif;?>


                <?php if(isset($post_meta_info['specification'])):?>

                <a href="javascript:;"><span>Specification</span></a>

                <?php endif;?>


                <?php if(isset($post_meta_info['standard_configuration'])):?>

                <a href="javascript:;"><span>Standard configuration</span></a>

                <?php endif;?>


                <?php if(!empty($post_meta_info['what_is_included'])):?>

                <a href="javascript:;"><span>What's Included</span></a>

                <?php endif;?>


                <?php if(isset($post_meta_info['downloads'])):?>

                <a href="javascript:;"><span>Documents Download</span></a>

                <?php endif;?>


            </div>
        </div>
        <div class="box-container wow fadeInUp50 animated" style="visibility: visible; animation-name: fadeInUp50;">
            <div class="detail">

                <?php if(!empty($post_meta_info['key_features'])):?>

                <div class="item" style="display: block;">
                    <div class="caption">Key Features: </div>
                    <div class="content">

                        <?php echo $post_meta_info['key_features'];?>

                    </div>
                </div>

                <?php endif;?>

                <?php if(!empty($post_meta_info['specification'])):?>

                <div class="item">
                    <div class="caption">Specification: </div>
                    <div class="content">
                        <?php echo $post_meta_info['specification'];?>
                    </div>
                </div>

                <?php endif;?>

                <?php if(!empty($post_meta_info['standard_configuration'])):?>

                <div class="item">
                    <div class="caption">Standard configuration: </div>
                    <div class="content">
                        <?php echo $post_meta_info['standard_configuration'];?>

                    </div>
                </div>

                <?php endif;?>

                <?php if(!empty($post_meta_info['what_is_included'])):?>

                <div class="item">
                    <div class="caption">What's Included: </div>
                    <div class="content">
                        <?php echo $post_meta_info['what_is_included'];?>
                    </div>
                </div>

                <?php endif;?>

                <?php if(!empty($post_meta_info['downloads'])):?>

                <div class="item">
                    <div class="caption">Documents Download: </div>
                    <div class="download-wrapper">
                        <div class="list">
                            <ul>
                               <?php
                                  if(!empty($downloads)):
                                      foreach($downloads as $download):
                                          $file_title = $download['title'];
                                          $file_url = $download['file'];

                               ?>
                                <li>
                                    <div class="date"><?php echo get_the_date('Y-m-d');?></div>
                                    <a href="<?php echo $file_url;?>" class="title"><?php echo $file_title;?></a>
                                    <a href="<?php echo $file_url;?>" class="download">Download</a>
                                </li>
                                <?php
                                  endforeach;
                                  endif;?>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php endif;?>

            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/cards/contact', 'card');?>
</div>
