<?php if(is_archive() && is_post_type_archive('products')):?>

    <div class="page-banner-wrapper pic">
        <img src="<?php get_tvbtech_option('product_category_banner', 'media');?>" alt="products">
        <div class="info padding">
            <div class="box-container">
                <h1>Products</h1>
                <div class="line"></div>
            </div>
        </div>

        <?php get_template_part('template-parts/category-menu'); ?>
    </div>


<?php elseif(is_post_type_archive('downloads')):?>

    <div class="page-banner-wrapper pic">
        <img src="<?php get_tvbtech_option('download_category_banner', 'media');?>" alt="downloads">
        <div class="info padding">
            <div class="box-container">
                <h1>Downloads</h1>
                <div class="line"></div>
            </div>
        </div>

        <?php get_template_part('template-parts/category-menu'); ?>
    </div>
<?php elseif(is_page('news')):?>

    <div class="page-banner-wrapper pic">
        <img src="<?php get_tvbtech_option('news_category_banner', 'media');?>" alt="news">
        <div class="info padding">
            <div class="box-container">
                <h1>News</h1>
                <div class="line"></div>
            </div>
        </div>

        <?php get_template_part('template-parts/category-menu'); ?>
    </div>
<?php elseif(is_archive("product_category")):?>

    <div class="page-banner-wrapper pic">
        <img src="<?php get_tvbtech_option('product_category_banner', 'media');?>" alt="products">
        <div class="info padding">
            <div class="box-container">
                <h1>Products</h1>
                <div class="line"></div>
            </div>
        </div>

        <?php get_template_part('template-parts/category-menu'); ?>
    </div>

<?php elseif(is_archive("download_category")):?>

    <div class="page-banner-wrapper pic">
        <img src="<?php get_tvbtech_option('download_category_banner', 'media');?>" alt="products">
        <div class="info padding">
            <div class="box-container">
                <h1>Downloads</h1>
                <div class="line"></div>
            </div>
        </div>

        <?php get_template_part('template-parts/category-menu'); ?>
    </div>

<?php else:?>

    <div class="page-banner-wrapper pic">
        <img src="<?php if(has_post_thumbnail()): the_post_thumbnail_url(); else: echo get_template_directory_uri().'/assets/images/banner.jpg'; endif;?>" alt="<?php the_title();?>">
        <div class="info">
            <div class="box-container">
                <h1><?php the_title();?></h1>
                <div class="line"></div>
            </div>
        </div>
    </div>

<?php endif;?>