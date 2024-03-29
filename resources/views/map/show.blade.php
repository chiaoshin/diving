@extends("layouts/app")


@section("head")
<link href="{{ asset("css/store.css") }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("css/chatGPT.css") }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="{{ asset("css/law.css") }}" rel="stylesheet">
<link href="{{ asset("css/reviews.css") }}" rel="stylesheet">
@endsection

@section("body")
<div id="custom-content">
    <div class="title">
        {{-- <h2 class="my-5 text-center text-dark">{{ $map->ch_name }}</h2> --}}
        <h2 class="mt-5 text-center text-dark" style="text-decoration: none;"><a class="store-name text-dark" href="{{ $map->url }}" target="_blank">{{ $map->ch_name }}</a></h2>
        <h3 class="mb-3 text-center text-dark">
            @if ($map->en_name)
                ({{ $map->en_name }})
            @endif
        </h3>
    </div>

    <div class="tab-action-row">
        <div class="row-item active" data-target="#attractions-info">
            詳細資訊
        </div>
        <div class="row-item" data-target="#chatgpt-suggest">
            潛水建議(ChatGPT)
        </div>
        <div class="row-item" data-target="#attractions-discussion">
            評論
        </div>
    </div>

    <div class="mask">
        <div class="custom-tab-content">
            <div class="content-item active" id="attractions-info">
                <div class="img-bg">
                    {{-- {{ asset("img/store/hotel.png") }} --}}
                    <img class="img-fluid" src="{{ asset($map->preview_img_url) }}">
                </div>
                <div class="information  hide-scroll">
                    <a class="category d-block mb-4" href="#">Information &mdash; 詳細資訊</a>
                    {{-- <h2>
                        <a class="store-name" href="{{ $map->url }}" target="_blank">{{ $map->ch_name }}<br>
                        @if ($map->en_name)
                            ({{ $map->en_name }})
                        @endif
                        </a>
                    </h2> --}}
                    <h4>地址：</h4>
                    <p class="big_p"><a href="https://www.google.com/search?q={{ $map->address }}&sourceid=chrome&ie=UTF-8" target="_blank" rel="noopener noreferrer">{{ $map->address }}</a></p>
                    <h4>敘述：</h4>
                    <p class="justify-alignment big_p">{{ $map->description_info }}</p>
                </div>
            </div>
            <div class="content-item" id="chatgpt-suggest">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel2.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Suggestion &mdash; 潛水建議(ChatGPT)</a>
                    {{-- <h2><a href="#" class="store-name">建議內容</a></h2> --}}
                    <div class="container hide-scroll" style="max-height: 400px;">
                        <div class="info"></div>

                        <div class="chat-container">
                            <div id="chat-log"></div>
                        </div>

                        <div class="input-container">
                            <input type="text" id="user-input" placeholder="">
                            <button id="send-button">
                                <i class="fa-solid fa-paper-plane" id="button-icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-item" id="attractions-discussion">
                <div class="information w-100">
                    <a class="category d-block mb-4" href="#">Comment &mdash; 評論</a>
                    <!-- <div class="elfsight-app-50209091-9762-4705-a857-e6b2bf783d2e"></div> -->
                    <section class="main-content">
		                <div class="container">
			                <div class="row">
                                <div class="col">
                                    <div class="rating-card">
						                <div class="text-center m-b-30">  <!-- ... 調整表格裡面的位置 ... -->
							                <h1 class="rating-number">{{ $map->star_rating }}<small>/5</small></h1>
							                <div class="rating-stars d-inline-block position-relative mr-2">
								                <img src="{{ asset('img/reviews/grey-star.svg') }}" alt="">
								                <div class="filled-star" style="width:{{ $map->rate_star_percent }}%"></div>  <!-- ... width可以調整星星占比 ... -->
							                </div>
							                <div class="text-muted">{{ number_format($map->reviews) }} review</div> <br>
							                <div class="container">  <!-- ... 按鈕 ... -->
								                <div class="row">
								    	            <div class="col-sm-12 d-flex justify-content-center">
								    	    	        <a class="btn btn-lg mb-2" target="_blank" href="{{ $map->reviews_url }}" alt="點擊查看更多評論"><span>More Review</span></a>
								    	            </div>
								                </div>
							                </div>
							                <!-- <br> -->
						                </div>
					                </div>
                                </div>
                                <div class="col">
                                    <main class="l-card">
								        <section class="l-card__user">
								            <div class="l-card__userImage">
								        	    <img src="{{ asset('img/reviews/robot.png') }}" alt="">
								            </div>
								            <div class="l-card__userInfo">
									            <span>AI-Generated Summary</span>
									            <span>Based on Google reviews</span>
								            </div>
								        </section>
								        <section class="l-card__text">
								            <!-- <p><span class="material-symbols-sharp">done_outline</span>近距離觀賞海龜，小孩大滿足</p> -->
								            <p>{!! nl2br($map->AI_reviews) !!}</p>
                                            <!-- <p>2.清澈的水和有趣的天然地形</p>
								            <p>3.美麗的環境，但需要小心岩石和垃圾</p> -->
                                            <!-- <p><img src="{{ asset('img/reviews/tick.png') }}" alt="" width="22" height="22s">美麗的環境，但需要小心岩石和垃圾</p> -->
								        </section>
							        </main>
                                </div>                  
			                </div>             
		                </div>
	                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="{{ asset("js/chatGPT.js") }}"></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script>
    const get_width_flag = (width) => {
        if (width >= 1200) {
            return "xl"
        } else if (width >= 992 && width < 1199) {
            return "lg"
        } else if (width >= 768 && width < 991) {
            return "md"
        } else if (width >= 576 && width < 767) {
            return "sm"
        } else {
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

    // let dictData = {
    //     '小琉球龍蝦洞': '潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n 雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！',
    // }
    let dictData = @json($dictData);

    // window.test_sendMessage()
    window.test_2_sendMessage('{{ $map->ch_name }}', dictData)
</script>

@endsection