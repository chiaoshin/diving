@extends("layouts/app")


@section("head")
<link href="{{ asset("css/store.css") }}" rel="stylesheet">
@endsection

@section("body")
<div id="custom-content">
    <div class="title">
        <h2 class="my-5 text-center text-dark">{{ $store->ch_name }}</h2>
    </div>

    <div class="tab-action-row">
        <div class="row-item active" data-target="#attractions-info">
            詳細資訊
        </div>
        <div class="row-item" data-target="#chatgpt-suggest">
            適用設備、裝備
        </div>
        <div class="row-item" data-target="#attractions-discussion">
            相關證照
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
                    <h2><a class="store-name" href="{{ $store->url }}" target="_blank">{{ $store->ch_name }}<br>{{ $store->en_name }}</a></h2>
                    <p>地址：<br>{{ $store->address }}</p>
                    <p class="m-0">營業時間：<br />
                        <!-- @TODO 可衡量要在前端還是後段加上 html -->
                        {!! $store->work_info !!}
                    <p class="m-0">{{ $store->checkin_info }}</p>
                    <p class="m-0">{{ $store->checkout_info }}</p>
                    </p>
                    <p>交通建議：<br>{{ $store->transform_note }}</p>
                    <p>周邊觀光：<br>{{ $store->landscape }}</p>
                </div>
            </div>
            <div class="content-item" id="chatgpt-suggest">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel2.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Suggestion &mdash; 適用設備、裝備</a>
                    <h2><a href="#" class="store-name">建議內容</a></h2>
                    <p>裝備：</p>
                    <p>設備：</p>
                </div>
            </div>
            <div class="content-item" id="attractions-discussion">
                <div class="img-bg">
                    <img class="img-fluid" src="{{ asset("img/store/hotel3.jpg") }}">
                </div>
                <div class="information">
                    <a class="category d-block mb-4" href="#">Comment &mdash; 相關證照</a>
                    <p>國際證照：</p>
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
</script>
@endsection