@extends("layouts/app")


@section("head")
<link href="{{ asset('css/snorkeling.css') }}" rel="stylesheet">
@endsection

@section("body")

<!-- 潛水類型介紹 -->
<br>
<h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">scuba_diving</span>浮潛介紹</b></h3>
<div class="div-c">
    <div class="content">
        <br>
        <img src="{{ asset('img/snorkeling/浮潛.jpg') }}" class="img_size2" alt="">
    </div>
    <div>
        <div class="main">
            <article class="text">
                <br>
                <h3>
                    <mark><b>浮潛</b></mark>
                </h3>
                <br>
                <A>浮潛是指依靠一根呼吸管、蛙鞋及目鏡漂浮在水面上觀賞海中景觀，景色雖比起自由潛水來說較不豐富，但不需要複雜的裝備，因此浮潛的門檻較自由潛水低，適合新手。</A>
                <input id="read-more-check-1" type="checkbox" class="read-more-check">
                <label for="read-more-check-1" class="read-more-label"></label>
                <A class="read-more">浮潛通常在熱帶度假村和水肺潛水地區廣受歡迎，這是一種在水面上進行的休閒活動，浮潛者不需要潛入水中，而是依靠救生衣漂浮在水面上，相比於自由潛水及水肺潛水，浮潛不需要攜帶重裝或經過專業訓練，提供了潛水新手一個較為簡單的方式，讓人們一窺淺海區域的美麗，在活動中，你可以近距離觀察珊瑚、魚類、海龜等海洋生物，並且在水中活動有助於增強身體健康和放鬆心情。</A>
            </article>
        </div>
    </div>
</div>

<!-- 設備 -->
<br>
<h3 class="text-white text-leftr"><b><span class="material-symbols-sharp">construction</span>浮潛設備</b></h3>
<div class="carousel-slider">

    <input type="radio" name="control" id="slide1" checked>
    <input type="radio" name="control" id="slide2">
    <input type="radio" name="control" id="slide3">
    <input type="radio" name="control" id="slide4">
    <input type="radio" name="control" id="slide5">

    <div class="slider-nav-prev">

        <label for="slide1" class="prev prev-1"></label>
        <label for="slide2" class="prev prev-2"></label>
        <label for="slide3" class="prev prev-3"></label>
        <label for="slide4" class="prev prev-4"></label>
        <label for="slide5" class="prev prev-5"></label>
    </div>

    <div class="slider-nav-next">
        <label for="slide1" class="next next-1"></label>
        <label for="slide2" class="next next-2"></label>
        <label for="slide3" class="next next-3"></label>
        <label for="slide4" class="next next-4"></label>
        <label for="slide5" class="next next-5"></label>
    </div>

    <div class="slider-nav-number">
        <label for="slide1" class="slide-nav-1">1</label> <!-- ... 按鈕名字 ... -->
        <label for="slide2" class="slide-nav-2">2</label>
        <label for="slide3" class="slide-nav-3">3</label>
        <label for="slide4" class="slide-nav-4">4</label>
        <label for="slide5" class="slide-nav-5">5</label>
    </div>

    <div class="slides">
        <div id="slide-1" class="slide">
            <div>
                <h3 class="title">呼吸管<br>潛水面鏡</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/snorkeling/aaa.png') }}" class="img_size3" alt=""></div>

        </div>
        <div id="slide-2" class="slide">
            <div>
                <h3 class="title">防寒衣</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/snorkeling/bbb.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-3" class="slide">
            <div>
                <h3 class="title">救生衣</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/snorkeling/ccc.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-4" class="slide">
            <div>
                <h3 class="title">短蛙鞋</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/snorkeling/ddd.png') }}" class="img_size3" alt=""></div>
        </div>
        <div id="slide-5" class="slide">
            <div>
                <h3 class="title">套鞋</h3>
            </div> <!-- ... 設備名字 ... -->
            <div><img src="{{ asset('img/snorkeling/eee.png') }}" class="img_size3" alt=""></div>
        </div>
    </div>
</div>

</div>
<br>
<style>
    body {
        background-color: #a9c2d3;
    }
</style>
@endsection