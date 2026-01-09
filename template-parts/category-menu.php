<?php

$current_url = $_SERVER['REQUEST_URI'];

if(str_contains($current_url, 'products') || str_contains($current_url, 'product-category')):
    $current_slug = 'product-category';
    $taxonomy = 'product_category';
    $contains = 'products';
endif;

if(str_contains($current_url, 'downloads') || str_contains($current_url, 'download-category')):
    $current_slug = 'download-category';
    $taxonomy = 'download_category';
    $contains = 'downloads';
endif;

if(str_contains($current_url, 'news')){
    $current_slug = 'news';
    $taxonomy = 'category';
    $contains = 'news';
}

$terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => true,
));

?>

<div class="page-nav-wrapper">
    <div class="box-container">
        <div class="page-nav-box">
            <div class="nav">
               <?php foreach ( $terms as $index => $term ): ?>
                <a href="<?php echo "/".$current_slug.'/'.$term->slug;?>"
                <?php if(str_contains($current_url, $term->slug)):?>
                class="on"
                <?php endif;?>
                <?php if(str_contains($current_url, $contains) && $index == 0):?>
                class="on"
                <?php endif;?>
                ><?php echo $term->name;?></a>
               <?php endforeach;?>
            </div>
        </div>
    </div>
</div>