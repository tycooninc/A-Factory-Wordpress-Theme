<div class="swiper-slide index-box-2 wow">
    <div class="other">
        <div class="index-title-box white">
            <h2>Products</h2>
            <div class="line"></div>
        </div>
        <div class="cat">

            <?php $taxonomy = 'product_category';
              $terms = get_terms( $taxonomy );
              foreach($terms as $term):
            ?>

            <a href="javascript:;"><span><?php echo $term->name;?></span></a>

            <?php endforeach;?>

        </div>
    </div>
    <div class="swiper-box">

        <?php foreach($terms as $term):

            $products_args = array(
                'post_type' => 'products',      // Your custom post type
                'posts_per_page' => 10,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_category',    // The custom taxonomy slug
                        'field'    => 'slug',     // Select by 'slug', 'term_id', or 'name'
                        'terms'    => $term->slug,   // The specific term you want
                    ),
                ),
            );

            $products_query = new WP_Query( $products_args );

            ?>

        <div class="item">

            <div class="swiper-container goods-swiper">
                <div class="swiper-wrapper">
                    <?php if($products_query->have_posts()): while($products_query->have_posts()): $products_query->the_post();

                    $post_meta = get_post_meta(get_the_ID(),'tvbtech_product_options',true);
                    $model_number = $post_meta['model_number'];
                    ?>

                    <div class="swiper-slide">
                        <a href="<?php the_permalink();?>">
                            <div class="pic imgScale">
                                <img  src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo $model_number;?>" title="<?php echo $model_number;?>">
                            </div>
                            <div class="title"><?php echo $model_number;?></div>
                        </a>
                    </div>

                    <?php endwhile;endif;?>

                </div>
            </div>


            <div class="swiperbtn">
                <a href="javascript:;" class="prev"><i></i></a>
                <a href="javascript:;" class="next"><i></i></a>
            </div>
        </div>

       <?php endforeach;?>

    </div>


    <div class="decoration" style="background: url('<?php echo get_template_directory_uri();?>/assets/vancheerfile/Images/2023/7/20230719170719542.jpg')"></div>


</div>
<!-- box-2 end -->