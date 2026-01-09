<?php
/**
 * The template for displaying the footer
 *
 * @package tvbtech
 */
?>

<a href="javascript:;" class="gotop" onclick="gotop()"><i></i></a>

<?php wp_footer(); ?>

<script>
    $(".index-box-4 .item").each(function(i){
        $(this).addClass("wow fadeInUp50").attr("data-wow-delay",i*120+"ms")
    })
    if(wid<1024) {
        $(".index-box-1 .info-box,.index-box-1 .video-box,.index-box-2 .decoration").addClass("wow fadeInUp50")
        $(".index-box-2 .other").addClass("wow fadeInLeft50")
        $(".index-box-2 .swiper-box").addClass("wow fadeInRight50")
    }
    // banner 轮播
    var index_banner = new Swiper('.index-banner-swiper', {
        pagination: {
            el: '.index-banner-swiper .swiper-pagination',
            clickable: true,
        },
        navigation: { nextEl: '.index-banner-wrapper .next', prevEl: '.index-banner-wrapper .prev', },
        loop: true,
        speed: 1200,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        on:{
            init: function(){
                setTimeout(function(){
                    $('.index-banner-swiper').find('.swiper-pagination').find('.swiper-pagination-bullet').append('<div class="circlechart" data-percentage="100"></div>');
                    var p =  $('.index-banner-swiper').find('.swiper-pagination').find('.swiper-pagination-bullet .circlechart').attr('data-percentage');
                    $('.index-banner-swiper').find('.swiper-pagination').find('.swiper-pagination-bullet .circlechart').html( makesvg(p))
                    $('.index-banner-swiper').find('.swiper-pagination').find('.swiper-pagination-bullet').eq(0).addClass('one')
                },100)

            },
            slideChangeTransitionStart: function () {

            },
        },
    })

    function creatGoodsSwiper() {
        var goodsLen = $(".index-box-2 .item.on .swiper-slide").length
        var goodsLoop = false
        if (goodsLen > 3) { var goodsLoop = true }
        new Swiper('.index-box-2 .item.on .swiper-container',
            {
                navigation: { nextEl: '.index-box-2 .next', prevEl: '.index-box-2 .prev', },
                slidesPerView: 2.8562, spaceBetween: 30, speed: 1200, loop: goodsLoop, breakpoints: { 1024: { slidesPerView: 1.32, spaceBetween: 15, } },
            })
    }
    $(".index-box-2 .cat a").eq(0).addClass("on")
    $(".index-box-2 .item").eq(0).addClass("on").show()
    creatGoodsSwiper()
    $(".index-box-2 .cat a").click(function(){
        $(this).addClass("on").siblings().removeClass("on")
        $(".index-box-2 .item").eq($(this).index()).addClass("on").fadeIn().siblings().removeClass("on").hide()
        creatGoodsSwiper()
    })

    var news_swiper = new Swiper('.news-swiper', {
        navigation: {
            nextEl: '.index-box-3 .next',
            prevEl: '.index-box-3 .prev',
        },
        slidesPerView: 4,
        spaceBetween: 36,
        speed: 1200,
        loop: true,
        breakpoints: {
            1024: {
                slidesPerView: 1.24,
                spaceBetween: 15,
            }
        },
    })
    function videoModal(obj) {
        event.stopPropagation();
        if(obj) {
            var videoObj = $(".video-modal video")
            var vsrc = $(obj).attr("vsrc")
            if(vsrc == "") {
                var iframeUrl = $(obj).attr("iframeUrl")
                $(".video-modal iframe").attr("src",iframeUrl)
                $(".video-modal iframe").show()
                $(".video-modal video").hide()
            }else{
                videoObj.attr("src", vsrc)
                $(".video-modal iframe").hide()
                $(".video-modal video").show()
            }
            $(".mask").fadeIn(300)
            setTimeout(function(){
                $(".video-modal").fadeIn(300)
                if(vsrc == "") {
                    videoObj.trigger("play")
                }
            },200)
        }else{
            if(vsrc == "") {
                videoObj.trigger("pause")
            }
            $(".video-modal").fadeOut(300)
            setTimeout(function(){
                $(".mask").fadeOut(300)
            },600)
        }
    }
    //点击空白处隐藏弹出层，下面为滑动消失效果和淡出消失效果。
    $(document).click(function(event){
        var _con = $('.video-modal');  // 设置目标区域
        if(!_con.is(event.target) && _con.has(event.target).length === 0){
            $(".video-modal video").trigger("pause")
            if($(".index-box-1 .video-box .play").attr("vsrc") != "") {
                $(".video-modal").fadeOut(300)
            }
            setTimeout(function(){
                $(".mask").fadeOut(300)
            },600)
        }
    });
</script>

<?php if(is_singular('products')):?>
    <script>
        $(".tab a").eq(0).addClass("on")
        $(".detail .item").eq(0).show()
        $(".tab a").click(function () {
            $(this).addClass("on").siblings().removeClass("on")
            $(".detail .item").eq($(this).index()).fadeIn(300).siblings().hide()
        })
        var imgHtml = ""
        var viewPic = 0
        $(".bigImg-swiper .swiper-slide").each(function (i) {
            if (!$(this).hasClass("video")) {
                $(this).addClass("viewPic").attr("viewIndex", viewPic)
                imgHtml += "<img src='" + $(this).find(">img").attr("src") + "' alt=''>"
                viewPic++
            }
        })
        $(".bigImg").html(imgHtml)
        var bigImg_swiper = new Swiper('.bigImg-swiper', {
            pagination: {
                el: '.bigImg-swiper .swiper-pagination',
                clickable: true,
            },
            loop: true,
            effect: "fade",
            speed: 1200,
            on: {
                slideChangeTransitionStart: function () {
                    var _target = this;
                    var curVideo = this.$el.find(".swiper-slide-active").find("video");
                    tol = curVideo.duration;
                    //暂停所有视频
                    function pauseAll(ele) {
                        ele.find("video").each(function () {
                            $(this)[0].pause();
                        });
                    }
                    pauseAll(this.$el);
                    //轮播间隔时间
                    _target.params.autoplay.delay = tol * 1000;
                    //判断当前激活元素是否有视频
                    if (curVideo.length > 0) {
                        // this.autoplay.stop();
                        curVideo[0].currentTime = 0;
                        curVideo[0].play();
                        curVideo[0].removeEventListener('ended', function () { }, false);
                        // curVideo[0].addEventListener('ended', function (){
                        // 	_target.slideNext();
                        // }, false);
                    } else {
                        // _target.params.autoplay.delay=5000;
                        // _target.autoplay.start();
                    }
                },
            }
        })
        var swiperVideoLen = $(".bigImg-swiper .swiper-slide.video").length
        if (swiperVideoLen == 0) {
            bigImg_swiper.autoplay.start();
        }
        $(".contact-box li").each(function (i) {
            $(this).addClass("wow fadeInUp50").attr("data-wow-delay", i * 80 + "ms")
        })
        if (wid > 1024) {
            $(".goods-box .swiper-slide").each(function (i) {
                $(this).addClass("wow fadeInUp50").attr("data-wow-delay", i * 80 + "ms")
            })
        } else {
            $(".goods-box .swiper-container").addClass("wow fadeInUp50")
            var goods_swiper = new Swiper('.goods-swiper', {
                pagination: {
                    el: '.goods-swiper .swiper-pagination',
                    clickable: true,
                },
                loop: true,
                speed: 1200,
                slidesPerView: 1.36,
                spaceBetween: 15,
            })
        }
        var viewer = new Viewer(document.getElementById('bigImg'), {
            url: 'data-original'
        });
        $(".viewPic").click(function () {
            $(".bigImg img").eq($(this).attr("viewIndex")).click()
        })
    </script>

<?php
endif;
?>


<div class="video-modal">
    <div class="main">
        <video src="" controls loop></video>
        <iframe allowfullscreen="true" frameborder="0" src=""></iframe>
        <a href="javascript:;" class="close" onclick="videoModal(false)"></a>
    </div>
</div>


</body>
</html>
