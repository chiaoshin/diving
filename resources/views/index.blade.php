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
"address" => "831高雄市大寮區民泰街73號"
],
[
"id" => 3,
"title" => "潛水 3",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街38號"
]
];

$fake_data2 = [
[
"id" => 1,
"title" => "浮潛",
"image_url" => asset("img/diving.png"),
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

<!-- map 效能處理 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css">
</link>
<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css">
</link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>
<!-- map 嵌入 -->
<!-- <link href="{{ asset("css/leaflet.css") }}" rel="stylesheet"> -->
<link href="{{ asset("css/map.css") }}" rel="stylesheet">

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
            <img src="./img/header_img.jpg" class="d-block w-100" alt="col1">
        </div>
        <div class="carousel-item">
            <img src="./img/header_img.jpg" class="d-block w-100" alt="col2">
        </div>
        <div class="carousel-item">
            <img src="./img/header_img.jpg" class="d-block w-100" alt="col3">
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
                        <option hidden>選擇縣市</option>
                        @foreach(["高雄市", "台北市", "台南市", "台中市","小琉球"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex mt-2">
                <div class="m-auto w-100">
                    <select class="form-control" name="hotel">
                        <option hidden>選擇項目</option>
                        @foreach(["都市潛店","熱門潛點","背包客房","潛水用品店"] as $location)
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
        <button id="test-btn-1">本島</button>
        <button id="test-btn-2">小琉球</button>

        <!-- leaflet地圖 -->
        <div id="map"></div>
    </div>

</div>

<!-- weather -->

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white"><b><span class="material-symbols-sharp">partly_cloudy_day</span>天氣狀態</b></h2>
        </div>
    </div>
    <div class="row position-relative" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div id="map"></div>
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
            <a href="{{ route('snorkeling.index') }}"><img src="{{ $data['image_url'] }}" class="w-50 h-60 rounded mx-auto d-block" alt="..." style="cursor: pointer;"></a>
            <h4 class="text-white text-center"><b>{{ $data['title'] }}</b></h4>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<link href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" rel="stylesheet">
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
    const markers = @json($marker);

    // marker color
    var redIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var orangeIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    let map;

    function initMap() {
        map = L.map('map', {
            center: [23.6978, 120.9605],
            zoom: 7,
            scrollWheelZoom: false
        });

        // 【圖資設定】
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // marker 彈跳視窗
        // L.marker([22.7247326,120.3124143]).addTo(map).bindPopup('<h2>高雄科技大學<h2><br><p>上課的地方</p>').openPopup();

        // 小琉球地點
        markers.forEach(row => {
            L.marker([row.lat, row.lng], {
                icon: redIcon
            }).addTo(map).bindPopup(`<h2>${row.location}</h2>`)
        })
    }

    initMap()

    $("#test-btn-1").click(function() {
        map.flyTo(new L.LatLng(23.6978, 120.9605), 7);
    })

    $("#test-btn-2").click(function() {
        map.flyTo(new L.LatLng(22.340539, 120.370736), 14)
    })
</script>

@endsection