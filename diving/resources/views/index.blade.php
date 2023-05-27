@extends("layouts/app")

@php

$fake_data = [
[
"id" => 1,
"title" => "潛水 1",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街92號"
],
[
"id" => 2,
"title" => "潛水 2",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街92號"
],
[
"id" => 3,
"title" => "潛水 3",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街92號"
]
];

$fake_data2 = [
[
"id" => 1,
"title" => "浮潛",
"image_url" => asset("img/diving.png")
],
[
"id" => 2,
"title" => "自由潛水",
"image_url" => asset("img/diving2.png"),
],
[
"id" => 3,
"title" => "水肺潛水",
"image_url" => asset("img/diving3.png"),
]
];

@endphp

@section("head")
<!-- amCharts javascript sources -->
<script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>
<!-- <script type="text/javascript" src="https://www.amcharts.com/lib/3/maps/js/taiwanLow.js"></script> -->
<script src="{{ asset('js/taiwanLow.js') }}"></script>
<script src="https://www.amcharts.com/lib/4/geodata/lang/tw_ZH.js"></script>

<!-- amCharts javascript code -->
<script type="text/javascript">
    // chart.geodataNames = am4geodata_lang_tw_ZH;
    const chart = AmCharts.makeChart("map", {
        "type": "map",
        "pathToImages": "http://www.amcharts.com/lib/3/images/",
        "addClassNames": true,
        "fontSize": 15,
        "color": "#FFFFFF",
        "projection": "mercator",
        "backgroundAlpha": 1,
        "backgroundColor": "rgba(0,0,0,0)",
        "dataProvider": {
            "map": "taiwanLow",
            "getAreasFromMap": true,
            "images": [{
                "top": 40,
                "left": 60,
                "width": 80,
                "height": 40,
                "pixelMapperLogo": true,
                "url": "http://www.amcharts.com"
            }]
        },
        "balloon": {
            "horizontalPadding": 15,
            "borderAlpha": 0,
            "borderThickness": 1,
            "verticalPadding": 15
        },
        "areasSettings": {
            "color": "rgba(119,208,96,1)",
            "outlineColor": "rgba(80,80,80,1)",
            "rollOverOutlineColor": "rgba(80,80,80,1)",
            "rollOverBrightness": 20,
            "selectedBrightness": 20,
            "selectable": true,
            "unlistedAreasAlpha": 0,
            "unlistedAreasOutlineAlpha": 0
        },
        "imagesSettings": {
            "alpha": 1,
            "color": "rgba(119,208,96,1)",
            "outlineAlpha": 0,
            "rollOverOutlineAlpha": 0,
            "outlineColor": "rgba(80,80,80,1)",
            "rollOverBrightness": 20,
            "selectedBrightness": 20,
            "selectable": true
        },
        "linesSettings": {
            "color": "rgba(119,208,96,1)",
            "selectable": true,
            "rollOverBrightness": 20,
            "selectedBrightness": 20
        },
        "zoomControl": {
            "zoomControlEnabled": true,
            "homeButtonEnabled": true,
            "panControlEnabled": false,
            "right": 38,
            "bottom": 30,
            "minZoomLevel": 0.25,
            "gridHeight": 100,
            "gridAlpha": 0.1,
            "gridBackgroundAlpha": 0,
            "gridColor": "#FFFFFF",
            "draggerAlpha": 1,
            "buttonCornerRadius": 2
        }
    })

    chart.addListener("rendered", function() {
        $("[title='Interactive JavaScript maps']").hide()
    })

    function handleClick(event) {
        console.log(event)
    }
    chart.addListener("clickMapObject", function(event) {
        console.log(event.mapObject.enTitle)
    });
</script>
@endsection

@section("body")
<!-- 輪播 -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <!-- 圖片切換 -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/header_img.png" class="d-block w-100" alt="col1">
        </div>
        <div class="carousel-item">
            <img src="./img/header_img.png" class="d-block w-100" alt="col2">
        </div>
        <div class="carousel-item">
            <img src="./img/header_img.png" class="d-block w-100" alt="col3">
        </div>
    </div>
    <!-- 左右箭頭 -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- search bar -->
<div class="search-container container-fluid">
    <form>
        <div class="row">
            <div class="col-12 col-md-3 d-flex mt-2">
                <div class="m-auto w-100">
                    <select class="form-control" name="location">
                        <option hidden>選擇地區</option>
                        @foreach(["北部地區", "南部地區", "中部地區", "東部地區", "外島/離島地區"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex mt-2">
                <div class="m-auto w-100">
                    <select class="form-control" name="activity">
                        <option hidden>選擇項目</option>
                        @foreach(["浮潛", "自潛", "水肺潛水"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex mt-2">
                <div class="m-auto w-100">
                    <select class="form-control" name="hotel">
                        <option hidden>選擇性質</option>
                        @foreach(["都市潛店"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 mt-2 text-center d-flex">
                <div class="m-auto w-100">
                    <button type="submit" class="btn btn-primary w-100">搜尋最佳景點</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- HOT Point card -->
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white"><b><span class="material-symbols-sharp">signpost</span>熱門潛水景點</b></h2>
        </div>
    </div>
    <div class="row">
        @foreach($fake_data as $data)
        <div class="col-12 col-md-4">
            <div class="card">
                <img src="{{ $data['image_url'] }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['title'] }}</h5>
                    <p class="card-text">{{ $data['address'] }}</p>
                    <a href="{{ route('store.show', $data['id']) }}" class="btn btn-primary">查看更多</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- All Map -->
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white"><b><span class="material-symbols-outlined">travel_explore</span>潛游地圖</b></h2>
        </div>
    </div>
    <div class="row position-relative" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div id="map" style="width: 100%; height: 600px;"></div>
        <!-- w-300 h-265 rounded mx-auto d-block -->
        <!-- <div class="text-center">
            <img src=" ./img/map/map1-preview.png" class="" alt="..." usemap="#image-map">
        </div>
        <map name="image-map">
            <area target="" alt="台南" title="台南" href="https://www.youtube.com/watch?v=KbbfO9KPrgI&list=PL0mviQr8pXaeu9Hk-YGJi0lU7mU957nTi&index=627" coords="1055,480,1019,477,990,509,969,502,949,555,981,587,1008,607,1050,578,1073,546,1091,504,1063,520" shape="poly">
        </map> -->
        <div class="col-12 col-sm-3 col-lg-2 text-end" id="map-btn-div">
            <div class="btn-group-vertical w-100" role="group" aria-label="Basic example">
                <button type="button" class="mt-1 btn btn-primary">Left</button>
                <button type="button" class="mt-1 btn btn-primary">Left</button>
                <button type="button" class="mt-1 btn btn-primary">Left</button>
                <button type="button" class="mt-1 btn btn-primary">Left</button>
                <button type="button" class="mt-1 btn btn-primary">Left</button>
            </div>
        </div>
    </div>
</div>

<!-- activity -->
<div class="conntainer-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white"><b><span class="material-symbols-outlined">follow_the_signs</span>潛水活動介紹</b></h2>
        </div>
    </div>
    <div class="row">
        @foreach($fake_data2 as $data)
        <div class="col-12 col-md-4">
            <img src="{{ $data['image_url'] }}" class="w-50 h-60 rounded mx-auto d-block" alt="..." style="cursor: pointer;">
            <h4 class="text-white text-center"><b>{{ $data['title'] }}</b></h4>
        </div>
        @endforeach
    </div>
</div>
@endsection