<div class="breadcrumb-box">
    <?php tvbtech_breadcrumb('Products'); ?>
</div>

<div class="page-box goods-wrapper">
    <div class="box-container">
        <?php

        $queried_object = get_queried_object();

        $terms = get_terms( array(
            'taxonomy'   => 'product_category',
            'hide_empty' => false,
        ) );

        if(!empty($terms)){
            $queried_term_name = $queried_object->name;
            $queried_term_id = $queried_object->term_id;

            $products_args = array(
                'post_type'      => 'products',        // Your Custom Post Type name
                'posts_per_page' => 10,               // Number of products to show (-1 for all)
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_category', // The name of your custom taxonomy
                        'field'    => 'term_id',          // We are querying by ID
                        'terms'    => $queried_term_id,                // REPLACE 123 with your specific Term ID
                        'operator' => 'IN',               // Standard inclusion
                    ),
                ),
            );

            $products_query = new WP_Query( $products_args);

        }else{
            $first_term_name = 'example product category';
        }

        ?>

        <h2 class="page-title wow fadeInUp50 animated" style="visibility: visible; animation-name: fadeInUp50;"><?php echo $queried_term_name;?></h2>
        <div class="goods-box">
            <?php if ( $products_query->have_posts() ) {
                echo '<ul id="DivList">';
                while ( $products_query->have_posts() ) {
                    $products_query->the_post();
                    $meta_info = get_post_meta(get_the_ID(), 'tvbtech_product_options', true);
                    ?>
                    <li class="wow fadeInUp50 animated" data-wow-delay="0ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeInUp50;">
                        <a href="<?php the_permalink();?>">
                            <div class="pic imgScale">
                                <img src="<?php the_post_thumbnail_url();?>" alt="<?php echo $meta_info['model_number'];?>" title="<?php echo $meta_info['model_number'];?>">
                            </div>
                            <div class="info">
                                <div class="title"><?php echo $meta_info['model_number'];?> </div>
                                <div class="desc"><?php the_title();?></div>
                            </div>
                        </a>
                    </li>

                    <?php
                }
                echo '</ul>';

                // RESTORE global post data (Crucial!)
                wp_reset_postdata();
            } else {
                echo 'No products found in this category.';
            }

            ?>


            <div class="loading wow fadeInUp50" style="visibility: hidden; animation-name: none;"><a href="javascript:getData();" id="btnJZL">
                    <img src="/img/loading.png" alt="">READ MORE</a></div>

        </div>
    </div>
</div>