@extends("layouts/app")


@section("head")
<link href="{{ asset("css/store.css") }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("css/chatGPT.css") }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="{{ asset("css/law.css") }}" rel="stylesheet">
@endsection

@section("body")
<div id="custom-content">
    <div class="title">
        <h2 class="my-5 text-center text-dark">{{ $shop->ch_name }}</h2>
        @if(!is_null($shop->law))
            <div class="modal-container">
                <input id="modal-toggle" type="checkbox">
                <label class="modal-btn" for="modal-toggle"><img src="{{ asset("img/law/1.png") }}" alt="按鈕圖片"></label> 
                <label class="modal-backdrop" for="modal-toggle"></label>
                <div class="modal-content">
                    <label class="modal-close" for="modal-toggle">&#x2715;</label>
                    <h3><span class="material-symbols-sharp">gavel</span> 判決書</h3>
                    <h5>事件類別：<span>{{ $shop->law->event }}</sapn></h5>
                    <p>{{ $shop->law->directions }}</p> 
                    <a href="{{ $store->law->url }}" target="_blank">判決書完整內容連結</a>
                    <label class="modal-content-btn" for="modal-toggle">OK</label>   
                    
                </div> 
            </div>
        @endif
    </div>

    <div class="tab-action-row">
        <div class="row-item active" data-target="#attractions-info">
            詳細資訊
        </div>
        <div class="row-item" data-target="#chatgpt-suggest">
            ChatGPT建議
        </div>
        <div class="row-item" data-target="#attractions-discussion">
            評論
        </div>
    </div>

    <div class="mask">
        <div class="custom-tab-content">
            <div class="content-item active" id="attractions-info">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel.png") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Spot Information &mdash; 詳細資訊</a>
                    <h2>
                        <a class="store-name" href="{{ $shop->url }}" target="_blank">{{ $shop->ch_name }}<br>
                        @if ($shop->en_name)
                            ({{ $shop->en_name }})
                        @endif
                        </a>
                    </h2>
                    <p>地址：<br>{{ $shop->address }}</p>
                    <p class="m-0">營業時間：<br />
                        <!-- @TODO 可衡量要在前端還是後段加上 html -->
                        {!! $shop->work_info !!}
                    </p>
                    <p>交通建議：<br>{{ $shop->transform_note }}</p>
                </div>
            </div>
            <div class="content-item" id="chatgpt-suggest">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel2.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Suggestion &mdash; ChatGPT建議</a>
                    <h2><a href="#" class="store-name">建議內容</a></h2>
                    <div class="container">
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
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel3.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Comment &mdash; 評論</a>
                    <div class="elfsight-app-50209091-9762-4705-a857-e6b2bf783d2e"></div>
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
    window.test_2_sendMessage('{{ $shop->ch_name }}', dictData)
</script>

@endsection