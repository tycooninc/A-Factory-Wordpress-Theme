<div class="breadcrumb-box">
    <?php tvbtech_breadcrumb(get_the_title()) ;?>
</div>

<div class="page-box about-wrapper">

    <div class="box-container">
        <h2 class="page-title">

            <?php $meta_options = get_post_meta(get_the_ID(), 'tvbtech_meta_options', false); ?>
            <?php if(isset($meta_options[0]['page_title']) && !empty($meta_options[0]['page_title'])){
                echo $meta_options[0]['page_title'];
            }
            ?>
        </h2>
        <div class="content">
            <?php the_content();?>
        </div>

    </div>

</div>


