@extends("layouts/app")

@php

$fake_data = [
    "title" => "潛水店範本"
];

@endphp

@section("head")
    <link href="{{ asset("css/store.css") }}" rel="stylesheet">
@endsection

@section("body")
<div id="custom-content">
    <div class="title">
        <h2 class="my-5 text-center text-dark">{{ $fake_data["title"] }}</h2>
    </div>

    <div class="tab-action-row">
        <div class="row-item active" data-target="#attractions-info">
            景點資訊
        </div>
        <div class="row-item" data-target="#chatgpt-suggest">
            ChatGPT建議
        </div>
        <div class="row-item" data-target="#attractions-discussion">
            景點建議
        </div>
    </div>

    <div class="mask">
        <div class="custom-tab-content">
            <div class="content-item active" id="attractions-info">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel.png") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Spot Information &mdash; 景點資訊</a>
                    <h2><a class="store-name" href="https://driftdivinghostel.com/" target="_blank">琉浪潛水背包客棧<br>Drift Diving Hostel</a></h2>
                    <p>地址：<br>929屏東縣琉球鄉忠孝路一巷2-6號</p>
                    <p>營業時間：<br>每日入住時間：03:00 pm ~ 10:00 pm<br>每日退房時間：07:00 am ~ 11:00 am</p>
                    <p>交通建議：<br>開車（提供停車場） 桃園市公車-710 路線 (大溪-捷運永寧站) 台灣好行-小烏來線，於大溪老茶廠站下車 客運-5090、5091、5301路線</p>
                    <p>周邊觀光：<br>慈湖、角板山公園</p>
                </div>
            </div>
            <div class="content-item" id="chatgpt-suggest">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel2.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Suggestion &mdash; ChatGPT建議</a>
                    <h2><a href="#">建議內容</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae fuga optio dolorem, fugit
                        voluptates sint ducimus praesentium iste!</p>
                </div>
            </div>
            <div class="content-item" id="attractions-discussion">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel3.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Comment &mdash; 景點評論</a>
                    <div class="elfsight-app-50209091-9762-4705-a857-e6b2bf783d2e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script>
    const get_width_flag = (width) => {
        if (width >= 1200) {
            return "xl"
        }else if (width >= 992 && width < 1199) {
            return "lg"
        }else if (width >= 768 && width < 991) {
            return "md"
        }else if (width >= 576 && width < 767) {
            return "sm"
        }else{
            return "xs"
        }
    }

    let width_flag = get_width_flag($(window).width())

    $(".content-item").css("width", $("#custom-content").width())
    $(".custom-tab-content").css("width", $("#custom-content").width() * $(".content-item").length)

    $(window).resize(function() {
        let curr_width_flag = get_width_flag($(window).width())

        if (curr_width_flag != width_flag) {
            $(".content-item").css("width", $("#custom-content").width())
            $(".custom-tab-content").css("width", $("#custom-content").width() * $(".content-item").length)

            width_flag = curr_width_flag;
        }
    })
    // 跳轉到指定位置
    $(".row-item").click(function() {
        $(".row-item.active").toggleClass("active")
        $(this).toggleClass("active")

        let target = $(this).data("target")

        let prev = $(target).prev()
        let width = prev.width() || $(target).width()
        let index = $(".content-item").index(prev) + 1

        $(".mask").animate({
            scrollLeft: width * index
        }, 1000);
    })
</script>
@endsection