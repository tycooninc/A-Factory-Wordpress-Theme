<div class="breadcrumb-box">
    <?php tvbtech_breadcrumb('Download'); ?>
</div>

<div class="page-box goods-wrapper">
    <div class="box-container">
        <?php

        $terms = get_terms( array(
            'taxonomy'   => 'download_category',
            'hide_empty' => false,
        ));

        if(!empty($terms)){
            $first_term_name = $terms[0]->name;
            $first_term_id = $terms[0]->term_id;

            $products_args = array(
                'post_type'      => 'downloads',        // Your Custom Post Type name
                'posts_per_page' => 10,               // Number of products to show (-1 for all)
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'download_category', // The name of your custom taxonomy
                        'field'    => 'term_id',          // We are querying by ID
                        'terms'    => $first_term_id,                // REPLACE 123 with your specific Term ID
                        'operator' => 'IN',               // Standard inclusion
                    ),
                ),
            );

            $downloads_query = new WP_Query( $products_args );

        }else{
            $first_term_name = 'example product category';
        }

        ?>

        <h2 class="page-title wow fadeInUp50 animated" style="visibility: visible; animation-name: fadeInUp50;"><?php echo $first_term_name;?></h2>

        <div class="page-box download-wrapper">
            <div class="box-container">
                <?php

                $terms = get_terms( array(
                    'taxonomy'   => 'download_category',
                    'hide_empty' => false,
                ));

                if(!empty($terms)) {
                    $first_term_name = $terms[0]->name;
                    $first_term_id = $terms[0]->term_id;

                    $products_args = array(
                        'post_type'      => 'downloads',        // Your Custom Post Type name
                        'posts_per_page' => 10,               // Number of products to show (-1 for all)
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'download_category', // The name of your custom taxonomy
                                'field'    => 'term_id',          // We are querying by ID
                                'terms'    => $first_term_id,                // REPLACE 123 with your specific Term ID
                                'operator' => 'IN',               // Standard inclusion
                            ),
                        ),
                    );

                    $downloads_query = new WP_Query( $products_args );
                }

                ?>
                <div class="list">

                    <?php if ( $downloads_query->have_posts() ) {
                        echo '<ul id="DivList">';
                        while ( $downloads_query->have_posts() ) {
                            $downloads_query->the_post();
                            $meta_info = get_post_meta(get_the_ID(), 'tvbtech_download_options', true);
                            ?>
                            <li class="wow fadeInUp50 animated" data-wow-delay="0ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeInUp50;">
                                <div class="date"><?php the_date('Y-m-d');?></div>
                                <a href="<?php echo $meta_info['download_file_upload'];?>" class="title"><?php the_title();?></a>
                                <a href="" class="download">Download</a>
                            </li>
                            <?php
                        }
                        echo '</ul>';
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

</div>

