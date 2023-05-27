@extends("layouts/app")

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
        font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    p {
        color: #999999;
        font-weight: 300;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    a {
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    a,
    a:hover {
        text-decoration: none !important;
    }

    .content {
        padding: 7rem 0;
    }

    h2 {
        font-size: 20px;
    }

    .owl-1 .owl-nav {
        width: 100%;
        position: absolute;
        top: 50%;
    }

    .owl-1 .owl-nav .owl-next,
    .owl-1 .owl-nav .owl-prev {
        border: 1px solid red;
        z-index: 92;
        position: absolute;
        top: 50%;
    }

    .owl-1 .owl-nav .owl-next:active,
    .owl-1 .owl-nav .owl-next:focus,
    .owl-1 .owl-nav .owl-prev:active,
    .owl-1 .owl-nav .owl-prev:focus {
        outline: none;
    }

    .owl-1 .owl-nav .owl-next span,
    .owl-1 .owl-nav .owl-prev span {
        color: #fff;
    }

    .owl-1 .owl-nav .owl-next span:before,
    .owl-1 .owl-nav .owl-prev span:before {
        font-size: 40px !important;
    }

    .owl-1 .owl-nav .owl-next {
        border: 4px solid blue;
        right: 20px;
    }

    .owl-1 .owl-nav .owl-prev {
        left: 20px;
    }

    .owl-1 .owl-dots {
        position: absolute;
        bottom: 40px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .owl-1 .owl-dots .owl-dot {
        background: none;
        display: inline-block;
    }

    .owl-1 .owl-dots .owl-dot>span {
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        margin: 4px;
    }

    .owl-1 .owl-dots .owl-dot.active>span {
        background: white;
    }

    .owl-1 .owl-dots .owl-dot:active,
    .owl-1 .owl-dots .owl-dot:focus {
        outline: none;
    }

    .media-29101 .img {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
    }

    .media-29101 .text {
        padding: 50px;
    }

    @media (max-width: 991.98px) {
        .media-29101 .text {
            padding: 20px;
            width: 100%;
        }
    }

    .media-29101 .text .category {
        color: #adb5bd;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: .2rem;
    }

    .media-29101 .text h2 {
        font-family: "Playfair Display", times, serif;
        font-size: 2rem;
        line-height: 1.3;
        margin-bottom: 30px;
    }

    .media-29101 .text h2 a {
        color: #000;
    }

    .carousel-nav {
        width: 100%;
        border-bottom: 1px solid #ccc;
        margin-bottom: 40px;
    }

    .carousel-nav a {
        color: #999;
        padding: 20px;
        text-align: center;
        display: inline-block;
    }

    .carousel-nav a:hover {
        color: #000;
    }

    .carousel-nav a.active {
        color: #000;
    }

    .carousel-nav a.active:before {
        content: "";
        bottom: -1px;
        left: 0;
        right: 0;
        position: absolute;
        border-bottom: 1px solid #000;
    }
</style>

<script>
    $(function() {
        var owl = $('.owl-1');
        owl.owlCarousel({
            loop: false,
            margin: 0,
            nav: false,
            dots: false,
            items: 1,
            smartSpeed: 1000,
            autoplay: false,
            navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
        });

        var carousel_nav_a = $('.carousel-nav a');

        carousel_nav_a.each(function(slide_index) {
            var $this = $(this);
            $this.click(function(e) {
                owl.trigger('to.owl.carousel', [slide_index, 1500]);
                e.preventDefault();
            })
        })

        owl.on('changed.owl.carousel', function(event) {
            carousel_nav_a.removeClass('active');
            $(".carousel-nav a[data-num=" + event.item.index + "]").addClass('active');
        })
    })
</script>
@endsection

@section('body')
<div class="content">

    <div class="container">
        <h2 class="my-5 text-center text-dark">XXX潛店範本</h2>

        <div class="d-flex carousel-nav">
            <a href="#" class="col active">景點資訊</a>
            <a href="#" class="col">ChatGPT建議</a>
            <a href="#" class="col">景點評論</a>
        </div>


        <div class="owl-carousel owl-1">

            <div class="owl-item media-29101 d-md-flex w-100">
                <div class="img">
                    <img src="{{ asset('img/store/hotel2.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="text">
                    <a class="category d-block mb-4" href="#">Spot Information &mdash; 景點資訊</a>
                    <h2><a href="https://driftdivinghostel.com/" target="_blank">琉浪潛水背包客棧<br>Drift Diving Hostel</a></h2>
                    <p>地址：<br>929屏東縣琉球鄉忠孝路一巷2-6號</p>
                    <p>營業時間：<br>每日入住時間：03:00 pm ~ 10:00 pm<br>每日退房時間：07:00 am ~ 11:00 am</p>
                    <p>交通建議：<br>開車（提供停車場） 桃園市公車-710 路線 (大溪-捷運永寧站) 台灣好行-小烏來線，於大溪老茶廠站下車 客運-5090、5091、5301路線</p>
                    <p>周邊觀光：<br>慈湖、角板山公園</p>
                </div>
            </div> <!-- .item -->

            <div class="owl-item media-29101 d-md-flex w-100">
                <div class="img">
                    <img src="{{ asset('img/store/hotel2.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="text">
                    <a class="category d-block mb-4" href="#">Suggestion &mdash; ChatGPT建議</a>
                    <h2><a href="#">建議內容</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae fuga optio dolorem, fugit
                        voluptates sint ducimus praesentium iste!</p>
                </div>
            </div> <!-- .item -->

            <div class="owl-item media-29101 d-md-flex w-100">
                <div class="img">
                    <img src="{{ asset('img/store/hotel.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="text">
                    <a class="category d-block mb-4" href="#">Comment &mdash; 景點評論</a>
                    <!-- <h2><a href="#">五星好評</a></h2>               -->
                    <div class="elfsight-app-50209091-9762-4705-a857-e6b2bf783d2e"></div>
                    <iframe src='https://sandbox.elfsightcdn.com/50209091-9762-4705-a857-e6b2bf783d2e' width='100%' height='1000' frameborder='0'></iframe>
                </div>
                <!-- 判決書 -->
                <!-- <div class="text">
            <a class="category d-block mb-4" href="#">verdict &mdash; <span class="material-symbols-outlined">
              warning
              </span>判決書</a>
            <div class="category d-block mb-4">
              <p>有點問題，民事糾紛。</p>
              <a href="http://">判決書連結</a>
            </div>
          </div> -->

            </div> <!-- .item -->
        </div>
    </div>
</div>
@endsection