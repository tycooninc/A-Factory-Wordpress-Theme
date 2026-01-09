<?php
/**
 * The header for our theme
 *
 * @package tvbtech
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/base.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">

    <?php if(is_singular('products')):?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/viewer.min.css">
    <?php endif;?>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/media.css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/countUp.js"></script>

    <?php if(is_singular('products')):?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/viewer.min.js"></script>
    <?php endif;?>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/page.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/media.css" />

    <?php tvbtech_output_seo_meta();?>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper-4.3.5.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/layui/layui.all.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/layui/layui.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/tanxj.js"></script>
    <link rel="shortcut icon" href="<?php get_tvbtech_option('site_favicon', 'media');?>" type="image/x-icon" />
    <?php wp_head(); ?>
</head>
<?php if(is_page('home')):?>
<body class="index">
<?php else:?>
<body>
<?php endif;?>

<?php wp_body_open(); ?>

<!-- header start -->
<div class="header-wrapper">
    <!-- logo -->
    <div class="logo-box">
        <a href="/">
            <img src="<?php get_tvbtech_option('site_logo', 'media');?>" alt="TvbTech Co., Ltd." class="init">
            <img src="<?php get_tvbtech_option('site_logo', 'media');?>" alt="TvbTech Co., Ltd." class="on">
        </a>
    </div>
    <div class="pc-nav-box">
        <ul>
            <?php $primary_menu = get_tvbtech_menu_array("primary menu");
             if(!empty($primary_menu)):
                foreach($primary_menu as $menu):
            ?>
            <li
               <?php if(is_page($menu['url'])): ?>
                   class="on"
               <?php endif;?>
            ><a href="<?php echo $menu['url'];?>"><?php echo $menu['title'];?></a>

                <?php if(!empty($menu['children'])): ?>

                    <div class="nav">

                        <?php
                          $children = $menu['children'];
                          foreach($children as $child):
                        ?>

                        <a href="<?php echo $child['url'];?>"><span><?php echo $child['title'];?></span></a>

                          <?php endforeach;?>
                    </div>
                <?php endif;?>
            </li>

            <?php endforeach; endif; ?>


        </ul>
    </div>
    <div class="search-box">
        <div class="search"></div>
        <div class="form">
            <input type="text" class="text" placeholder="Please enter search keywords" id="txtsearchC">
            <a href="javascript:search();" class="submit"></a>
        </div>
    </div>
</div>

<!-- 导航菜单按钮 start-->
<div class="nav-icon" onclick="phoneNavToggle(this)">
    <div class="inner"><span></span></div>
</div>
<!-- 导航菜单按钮 start-->
<!-- header end -->

<!-- 遮罩 -->
<div class="mask"></div>

<!-- 隐藏导航 start-->
<div class="phone-nav" id="phone-nav">
    <div class="box">
        <ul>
           <?php if(!empty($primary_menu)): foreach($primary_menu as $menu): ?>
            <li <?php if(is_page($menu['url'])): ?>class="on"<?php endif;?>>
                <a href="<?php echo $menu['url'];?>"><?php echo $menu['title'];?></a>
                <?php if(!empty($menu['children'])): ?>

                    <div class="navs">

                        <?php $children = $menu['children']; foreach($children as $child):?>

                            <a href="<?php echo $child['url'];?>"><span><?php echo $child['title'];?></span></a>

                        <?php endforeach;?>
                    </div>
                <?php endif;?>

            </li>
            <?php endforeach; endif;?>
        </ul>
    </div>
</div>
<!-- 隐藏导航 end-->
