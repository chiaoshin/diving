@extends("layouts/app")

@php

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


<!-- 評論&結果畫面 -->
<link href="{{ asset("css/reviews.css") }}" rel="stylesheet">
<link href="{{ asset("css/search_res.css") }}" rel="stylesheet">

<!-- map 嵌入 -->
<!-- <link href="{{ asset("css/leaflet.css") }}" rel="stylesheet"> -->
<link href="{{ asset("css/map.css") }}" rel="stylesheet">
<!-- weather 導入 -->
<link href="{{ asset("css/weather.css") }}" rel="stylesheet">

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
                    <select class="form-control" name="area">
                        <option hidden>選擇地區</option>
                        @foreach(["選擇地區","北部地區", "南部地區", "中部地區", "東部地區", "外島/離島地區"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex mt-2">
                <div class="m-auto w-100">
                    <select class="form-control" name="location">
                        <option hidden>選擇縣市</option>
                        @foreach(["選擇縣市","臺北市", "新北市", "桃園市", "臺中市","臺南市","高雄市","新竹縣","苗栗縣","彰化縣","南投縣","雲林縣","嘉義縣","屏東縣","宜蘭縣","花蓮縣","臺東縣","澎湖縣","金門縣","連江縣","基隆市","新竹市","嘉義市"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex mt-2">
                <div class="m-auto w-100">
                    <select class="form-control" name="item">
                        <option hidden>選擇項目</option>
                        @foreach(["選擇項目","都市潛店","熱門潛點","背包客房","潛水用品店"] as $location)
                        <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3 mt-2 text-center d-flex">
                <div class="m-auto w-100">
                    <button type="button" class="btn btn-primary w-100" id="search">搜尋最佳景點</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- HOT Point card -->
<div class="container-fluid p-5" id='hot-site-title'>
    <div class="row">
        <div class="col-12">
            <h2 class="text-white"><b><span class="material-symbols-sharp">signpost</span>熱門潛水景點</b></h2>
        </div>
    </div>
    <div class="row" id="hotSite">
        @foreach($diveSite as $index => $data)
            <div class="col-12 col-md-4">
                <div class="card" style="min-height: 100%;">
                    <img src="{{ asset($data['preview_img_url']) }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $data['name'] }}</h5>
                        <p class="card-text">{{ $data['address'] }}</p>
                        <div class="rating-card">
						    <div class="m-b-30">  <!-- ... 調整表格裡面的位置 ... -->
							    <!-- <h1 class="rating-number">4.3<small>/5</small></h1>
                                <div class="text-muted">(2,145 review)</div> -->
							    <div class="rating-stars d-inline-block position-relative mr-2">
								    <img src="{{ asset('img/reviews/grey-star.svg') }}" alt="">
								    <div class="filled-star" style="width:{{ $data['rate_star_percent'] }}%"></div>  <!-- ... width可以調整星星占比 ... -->
							    </div>  
						    </div>
					    </div>
                        <a href="{{ route('map.show', $data['id'] ) }}" class="btn btn-primary" style="margin-top: auto;width: fit-content;">查看更多</a>
                    </div>
                </div>
            </div>
            @if($index >= 2)
                @break
            @endif
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
        <button class="zoom-btn" data-lat="23.6978" data-lng="120.9605" data-zoom="7">本島</button>
        <div id='zoom-switch-container' class='p-0'></div>

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
    <!-- <div class="row position-relative" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div id="map"></div>
    </div> -->
    <!-- 表格 -->
    <div class="row position-relative" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div class="div">
            <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col" class="data">日期</th>
                    <th scope="col" class="data" td colspan="4">8/4(五)</th></td>
                    <th scope="col" class="data" td colspan="4">8/5(六)</th></td>
                    <th scope="col" class="data" td colspan="4">8/6(日)</th></td>
                    <th scope="col" class="data" td colspan="4">8/7(一)</th></td>
                    <th scope="col" class="data" td colspan="4">8/8(二)</th></td>
                    <th scope="col" class="data" td colspan="4">8/9(三)</th></td>
                    <th scope="col" class="data" td colspan="4">8/10(四)</th></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="weather-description text">天氣狀況</td>
                    <td colspan="4"><img src="{{ asset('img/weather/clouldy.png') }}" class="img_weather" ></td>
                    <td colspan="4"><img src="{{ asset('img/weather/clouldy.png') }}" class="img_weather"></td>
                    <td colspan="4"><img src="{{ asset('img/weather/sun.png') }}" class="img_weather"></td>
                    <td colspan="4"><img src="{{ asset('img/weather/sun.png') }}" class="img_weather"></td>
                    <td colspan="4"><img src="{{ asset('img/weather/rain.png') }}" class="img_weather"></td>
                    <td colspan="4"><img src="{{ asset('img/weather/rain.png') }}" class="img_weather"></td>
                    <td colspan="4"><img src="{{ asset('img/weather/rainstorm.png') }}" class="img_weather"></td>
                  </tr>

                    <tr>
                      <td class="weather-description text">溫度</td>
                      <td colspan="4">29℃</td>
                      <td colspan="4">26℃</td>
                      <td colspan="4">33℃</td>
                      <td colspan="4">30℃</td>
                      <td colspan="4">27℃</td>
                      <td colspan="4">28℃</td>
                      <td colspan="4">20℃</td>
                    </tr>

                    <tr>
                      <td class="weather-description text">降雨機率</td>
                      <td colspan="4">40%</td>
                      <td colspan="4">20%</td>
                      <td colspan="4">10%</td>
                      <td colspan="4">40%</td>
                      <td colspan="4">60%</td>
                      <td colspan="4">54%</td>
                      <td colspan="4">100%</td>
                    </tr>

                    <tr>
                      <td class="weather-description text">浪高</td>
                      <td colspan="4">0.4</td>
                      <td colspan="4">0.4</td>
                      <td colspan="4">0.4</td>
                      <td colspan="4">0.3</td>
                      <td colspan="4">0.4</td>
                      <td colspan="4">0.3</td>
                      <td colspan="4">0.4</td>
                    </tr>

                    <tr>
                      <td class="weather-description text">流向</td>
                      <td colspan="4"><img src="{{ asset('img/weather/right.png') }}" class="img_position"><br>東</td>
                      <td colspan="4"><img src="{{ asset('img/weather/left.png') }}" class="img_position"><br>西</td>
                      <td colspan="4"><img src="{{ asset('img/weather/down.png') }}" class="img_position"><br>南</td>
                      <td colspan="4"><img src="{{ asset('img/weather/up-left.png') }}" class="img_position"><br>西北</td>
                      <td colspan="4"><img src="{{ asset('img/weather/down-right.png') }}" class="img_position"><br>東南</td>
                      <td colspan="4"><img src="{{ asset('img/weather/down.png') }}" class="img_position"><br>南</td>
                      <td colspan="4"><img src="{{ asset('img/weather/down-left.png') }}" class="img_position"><br>西南</td>
                    </tr>

                     <tr>
                      <td class="weather-description text">潮汐</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                      <td>漲潮</td><td>退潮</td><td>漲潮</td><td>退潮</td>
                    </tr>

                    <tr>
                      <td class="weather-description text">時間</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                      <td>00:36</td><td>05:39</td><td>09:53</td><td>17:06</td>
                    </tr>
                </tbody>
            </table>
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
        <!-- @foreach($fake_data2 as $data)
        <div class="col-12 col-md-4">
            <a href="{{ route('snorkeling.index') }}"><img src="{{ $data['image_url'] }}" class="w-50 h-60 rounded mx-auto d-block" alt="..." style="cursor: pointer;"></a>
            <h4 class="text-white text-center"><b>{{ $data['title'] }}</b></h4>
        </div>
        @endforeach -->
        <div class="col-12 col-md-4">
            <a href="{{ route('snorkeling.index') }}"><img src="{{ asset('img/diving.png') }}" class="w-50 h-60 rounded mx-auto d-block" alt="..." style="cursor: pointer;"></a>
            <h4 class="text-white text-center"><b>浮潛</b></h4>
        </div>
        <div class="col-12 col-md-4">
            <a href="{{ route('freeDiving.index') }}"><img src="{{ asset('img/diving2.png') }}" class="w-50 h-60 rounded mx-auto d-block" alt="..." style="cursor: pointer;"></a>
            <h4 class="text-white text-center"><b>自由潛水</b></h4>
        </div>
        <div class="col-12 col-md-4">
            <a href="{{ route('scuba.index') }}"><img src="{{ asset('img/diving3.png') }}" class="w-50 h-60 rounded mx-auto d-block" alt="..." style="cursor: pointer;"></a>
            <h4 class="text-white text-center"><b>水肺潛水</b></h4>
        </div>
    </div>
</div>
@endsection

@section('script')
<link href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" rel="stylesheet">
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
    const markers = @json($diveSite);

    // marker color
    var mapIcon = new L.Icon({
        // iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        iconUrl: '{{ asset("img/map/潛點.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var storeIcon = new L.Icon({
        iconUrl: '{{ asset("img/map/store.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var hotelIcon = new L.Icon({
        iconUrl: '{{ asset("img/map/bag.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var shopIcon = new L.Icon({
        iconUrl: '{{ asset("img/map/用品店.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    let map;
    let markerGroup = [];

    // 【初始化地圖】
    function initMap() {
        map = L.map('map', {
            center: [23.6978, 120.9605],
            zoom: 7,
            scrollWheelZoom: false
        });

        // 『圖資設定』
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // marker 彈跳視窗
        // L.marker([22.7247326,120.3124143]).addTo(map).bindPopup('<h2>高雄科技大學<h2><br><p>上課的地方</p>').openPopup();

        // 『打點初始化』(潛水地點)
        createMarkers(markers)

        // 危險海域(直接打點,拆兩個表紀錄)
        var polygon1 = L.polygon([
            [25.195111, 121.415583],
            [25.187278, 121.404833]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>新北市淡水區沙崙沿岸海域</h3>' + '<p>禁止水域遊憩活動區域</p>' + '<br> <p> 自淨水廠前海堤A點起， 向南沿沙灘高潮線至淡水河出海口交界B點止之區域。 </p>');

        var polygon2 = L.polygon([
            [22.934628, 120.175472],
            [22.933136, 120.170942],
            [22.911783, 120.172142],
            [22.912428, 120.176967]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>臺南市南區灣裡(含黃金海岸)近岸海域</h3>' + '<p>禁止從事所有水域遊憩活動</p>');

        var polygon3 = L.polygon([
            [26.2175, 119.979444],
            [26.2125, 119.984167],
            [26.203056, 119.971944],
            [26.204722, 119.970278],
            [26.21, 119.97]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>連江縣北竿鄉?里附近海域</h3>' + '<p>禁止從事各項水域遊憩活動</p>');

        var polygon4 = L.polygon([
            [24.480224, 121.849641],
            [24.479599, 121.859254],
            [24.312948, 121.77308],
            [24.313261, 121.783037]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>宜蘭縣南澳地區海域</h3>' + '<p>禁止水域遊憩活動</p>');

        var polygon5 = L.polygon([
            [22.452778, 120.458611],
            [22.4475, 120.451389],
            [22.446111, 120.452222],
            [22.449167, 120.460556]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>大鵬灣潟湖潮口水域</h3>' + '<p>禁止遊客於上述區域從事各項水域遊憩活動</p>');

        var polygon6 = L.polygon([
            [23.7885, 119.598368],
            [23.784251, 119.598368],
            [23.784251, 119.602022],
            [23.7885, 119.602022]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>澎湖縣目斗嶼海域</h3>' + '<p>禁止從事所有水域遊憩活動</p>');

        var polygon7 = L.polygon([
            [25.285489, 121.50971],
            [25.285332, 121.513423]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>麟山鼻岬角兩側水域(至等深線20公尺水域)</h3>' + '<p>禁止遊客從事水域遊憩活動管理辦法所定義之各項水域遊憩活動</p>');

        var polygon8 = L.polygon([
            [25.294631, 121.533492],
            [25.294688, 121.540374]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>富貴角岬角兩側水域(至等深線20公尺水域)</h3>' + '<p>禁止遊客從事水域遊憩活動管理辦法所定義之各項水域遊憩活動</p>');

        var polygon9 = L.polygon([
            [25.231418, 121.648864],
            [25.226152, 121.651506]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>獅頭山岬角兩側水域(獅頭山公園附近海域至等深線20公尺水域)</h3>' + '<p>禁止遊客從事水域遊憩活動管理辦法所定義之各項水域遊憩活動</p>');

        var polygon10 = L.polygon([
            [25.207678, 121.690098],
            [25.206862, 121.692723]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>野柳岬角兩側水域(至等深線20公尺水域)</h3>' + '<p>禁止遊客從事水域遊憩活動管理辦法所定義之各項水域遊憩活動</p>');

        var polygon11 = L.polygon([
            [25.125147, 121.915211],
            [25.126419, 121.914036],
            [25.124256, 121.912733],
            [25.124372, 121.913072]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>新北市瑞芳區鼻頭漁港外海域</h3>' + '<p>禁止潛水活動</p>');

        var polygon12 = L.polygon([
            [25.135583, 121.8265],
            [25.128472, 121.834222]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>新北市瑞芳區深澳海域</h3>' + '<p>禁止橡皮艇活動</p>');

        var polygon15 = L.polygon([
            [25.172725, 121.38745],
            [25.160392, 121.401744],
            [25.168964, 121.413694]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>新北市八里 紅海灘海域</h3>' + '<p>禁止從事風箏衝浪活動</p>');

        var polygon16 = L.polygon([
            [23.219191, 120.082761],
            [23.21794, 120.082031],
            [23.218287, 120.081296],
            [23.219538, 120.081775]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>臺南市馬沙溝海域(游泳區)</h3>' + '<p>限制僅得從事游泳活動 ，並依公告限制時間及注意事項為之</p>');

        var polygon17 = L.polygon([
            [23.21794, 120.082031],
            [23.216857, 120.08171],
            [23.217897, 120.079004],
            [23.221972, 120.071964],
            [23.219538, 120.081775],
            [23.218287, 120.081296]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>臺南市馬沙溝海域(非動力區)</h3>' + '<p>限制僅得從事乘騎獨木舟、風浪板及立式划槳活動，並依公告活動時間及注意事項為之</p>');

        var polygon18 = L.polygon([
            [23.220191, 120.083211],
            [23.219191, 120.082761],
            [23.221972, 120.071964],
            [23.217897, 120.079004],
            [23.218591, 120.0772],
            [23.221925, 120.078701]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>臺南市馬沙溝海域(動力區)</h3>' + '<p>限制僅得從事乘騎水上 摩托車、香蕉船活動， 並依公告活動時間及注意事項為之</p>');

        var polygon19 = L.polygon([
            [22.621667, 120.256667],
            [22.624444, 120.262778],
            [22.634167, 120.2525],
            [22.635833, 120.255833],
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>高雄市西子灣海域</h3>' + '<p>以風浪板、香蕉船、拖 曳浮胎、獨木舟活動為限，並依公告活動時間及注意事項為之</p>');

        var polygon20 = L.polygon([
            [25.164747, 121.708008],
            [25.166058, 121.707708]
        ]).setStyle({
            fillColor: '#FF0000',
            color: '#FF0000'
        }).addTo(map).bindPopup('<h3>基隆市大武崙澳底沙灘海域</h3>' + '<p>限制僅得從事非動力水域遊憩活動</p>');
    }

    // 『清除打點』
    function clearMakers() {
        markerGroup.forEach(row => {
            map.removeLayer(row)
        })
    }

    // 『新增打點』
    function createMarkers(data) {
        data.forEach(row => {
            let icon

            if (row.type == 'map') {
                icon = mapIcon
            }else if(row.type == 'store'){
                icon = storeIcon
            }else if(row.type == 'hotel'){
                icon = hotelIcon
            }else if(row.type == 'shop'){
                icon = shopIcon
            }

            let marker = L.marker([row.lat, row.lng], {
                icon: icon
            }).addTo(map).bindPopup(`
                <h2>${row.name}</h2>
                <a href="${row.url}" class="h4" style="text-decoration: none;">查看更多</a><br/>
                <a href="https://www.google.com/search?q=${row.name}&sourceid=chrome&ie=UTF-8" target="_blank" title="${row.address}">${row.address}</a>
            `)

            markerGroup.push(marker)
        })
    }

    initMap()

    // Select Change Event
    $("select[name=area], select[name=location], select[name=item]").change(function() {

        // if ($("select[name=area]").val() == "選擇地區"){
        //     $("select[name=location]").val("選擇縣市")
        // }

        $.ajax({
            method: 'GET',
            url: "{{ route('markers.search') }}",
            data: {
                area: $("select[name=area]").val(),
                location: $("select[name=location]").val(),
                item: $("select[name=item]").val()
            },
            dataType: 'json',
            success: (res) => {
                clearMakers()

                createMarkers(res)
            },
            error: (err) => {
                console.log(err)
            }
        })
    })

    // 所有搜尋_縣市區域切換
    let cityMapper = {
        '北部地區': ['臺北市', '新北市', '基隆市', '桃園市', '新竹市', '新竹縣', '宜蘭縣'],
        '中部地區': ['苗栗縣', '臺中市', '彰化縣', '南投縣', '雲林縣'],
        '南部地區': ['嘉義市', '嘉義縣', '臺南市', '高雄市', '屏東縣'],
        '東部地區':['花蓮縣','臺東縣'],
        '外島/離島地區':['澎湖縣','金門縣','連江縣']
    }

    // 所有搜尋_zoom切換
    let cityPositionMapper = {
        '澎湖縣': [23.654072, 119.596528, 9.25],
        '金門縣': [24.450180, 118.367563, 11.5],
        '連江縣': [26.164330, 120.248569, 10],
        '臺北市': [25.093967, 121.554655, 11],
        '新北市': [24.944788, 121.556745, 10],
        '基隆市': [25.121252, 121.719304, 11],
        '桃園市': [24.918439, 121.243436, 10.5],
        '新竹市': [24.787220, 120.939825, 11],
        '新竹縣': [24.735878, 121.139237, 10.5],
        '宜蘭縣': [24.570412, 121.653605, 9],
        '花蓮縣': [23.852462, 121.406987, 9],
        '臺東縣': [22.951539, 121.051822, 9],
        '苗栗縣': [24.500105, 120.902437, 10.5],
        '臺中市': [24.228988, 120.915181, 10.5],
        '彰化縣': [23.975269, 120.490295, 10.5],
        '南投縣': [23.858716, 120.935998, 9.25],
        '雲林縣': [23.715187, 120.390177, 10.5],
        '嘉義市': [23.481751, 120.446901, 12],
        '嘉義縣': [23.483329, 120.512126, 10.5],
        '臺南市': [23.166952, 120.303771, 10],
        '高雄市': [22.983211, 120.585943, 9.5],
        '屏東縣': [22.510463, 120.651370, 9],
        '澎湖縣': [23.654072, 119.596528, 9.25]
    }

    // 潛游地圖_縣市切換按鈕
    let zoomSwitchMapper = {
        '臺東縣': {
            '臺東縣': [22.951539, 121.051822, 9],
            '綠島': [22.659797, 121.490896, 13],
            '蘭嶼': [22.049802, 121.546543, 12.5]
        },
        '花蓮縣': {
            '花蓮縣': [23.852462, 121.406987, 9]
        },
        '臺北市': {
            '臺北市': [25.093967, 121.554655, 11]
        },
        '新北市': {
            '新北市': [24.944788, 121.556745, 10]
        },
        '基隆市': {
            '基隆市': [25.121252, 121.719304, 11]
        },
        '桃園市': {
            '桃園市': [24.918439, 121.243436, 10.5]
        },
        '新竹市': {
            '新竹市': [24.787220, 120.939825, 11]
        },
        '新竹縣': {
            '新竹縣': [24.735878, 121.139237, 10.5]
        },
        '宜蘭縣': {
            '宜蘭縣': [24.570412, 121.653605, 9]
        },
        '苗栗縣': {
            '苗栗縣': [24.500105, 120.902437, 10.5]
        },
        '臺中市': {
            '臺中市': [24.228988, 120.915181, 10.5]
        },
        '彰化縣': {
            '彰化縣': [23.975269, 120.490295, 10.5]
        },
        '南投縣': {
            '南投縣': [23.858716, 120.935998, 9.25]
        },
        '雲林縣': {
            '雲林縣': [23.715187, 120.390177, 10.5]
        },
        '嘉義市': {
            '嘉義市': [23.481751, 120.446901, 12]
        },
        '嘉義縣': {
            '嘉義縣': [23.483329, 120.512126, 10.5]
        },
        '臺南市': {
            '臺南市': [23.166952, 120.303771, 10]
        },
        '高雄市': {
            '高雄市': [22.983211, 120.585943, 9.5]
        },
        '宜蘭縣': {
            '宜蘭縣': [24.570412, 121.653605, 9]
        },
        '屏東縣': {
            '屏東縣': [22.510463, 120.651370, 9],
            '小琉球': [22.340036, 120.369805, 12]
        },
        '澎湖縣': {
            '澎湖縣': [23.654072, 119.596528, 9.25]
        },
        '金門縣': {
            '金門縣': [24.450180, 118.367563, 11.5]
        },
        '連江縣': {
            '連江縣': [26.164330, 120.248569, 10]
        },
        '選擇縣市':{

        }
    }

    // 所有搜尋_縣市區域切換事件
    $("select[name=area]").change(function() {

        let key = $(this).val()

        if (key in cityMapper) {
            let options = cityMapper[key].reduce((acc, curr) => acc + `<option value="${curr}">${curr}</option>`, "<option value='選擇縣市' hidden>選擇縣市</option>")

            $("select[name=location]").html(options)

            let sites = markers.filter(row => row.area == key)

            if (sites.length > 3) {
                sites = sites.slice(0, 3)
            }
            
            if(sites.length == 0) {
                $("#hot-site-title").hide()
            }else{
                $("#hot-site-title").show()
            }
            
            $("#hotSite").html("")
 
            // 熱門潛點卡片，縣市切換
            sites.forEach(row => {
                $("#hotSite").append(`
                <div class="col-12 col-md-4">
                    <div class="card" style="min-height: 100%;">
                        <img src="${row.preview_img_url}" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">${row.name}</h5>
                            <p class="card-text">${row.address}</p>
                            <div class="rating-card">
						    <div class="m-b-30">
							    <div class="rating-stars d-inline-block position-relative mr-2">
								    <img src="{{ asset('img/reviews/grey-star.svg') }}" alt="">
								    <div class="filled-star" style="width:${row.rate_star_percent}%"></div>
							    </div>  
						    </div>
					    </div>
                            <a href="{{ route('map.show', ":id" ) }}" class="btn btn-primary" style="margin-top: auto;width: fit-content;">查看更多</a>
                        </div>
                    </div>
                </div>
                `.replace(":id", row.id))
            })

        } else {
            let options = "<option value='選擇縣市' hidden>選擇縣市</option>"

            Object.keys(cityMapper).forEach(key => {
                options = cityMapper[key].reduce((acc, curr) => acc + `<option value="${curr}">${curr}</option>`, options)
            })

            $("select[name=location]").html(options)

            map.flyTo(new L.LatLng(23.6978, 120.9605), 7)
        }
    })
    
    // 所有搜尋_zoom切換_事件
    $("select[name=location]").change(function() {
        if ($(this).val() in cityPositionMapper) {
            let position = cityPositionMapper[$(this).val()]

            map.flyTo(new L.LatLng(position[0], position[1]), position[2])

            let sites_county = markers.filter(row => row.location == $(this).val())

            if (sites_county.length > 3) {
                sites_county = sites_county.slice(0, 3)
            }

            if(sites_county.length == 0) {
                $("#hot-site-title").hide()
            }else{
                $("#hot-site-title").show()
            }
            
            $("#hotSite").html("")
            
            sites_county.forEach(row => {
                $("#hotSite").append(`
                <div class="col-12 col-md-4">
                    <div class="card" style="min-height: 100%;">
                        <img src="${row.preview_img_url}" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">${row.name}</h5>
                            <p class="card-text">${row.address}</p>
                            <div class="rating-card">
						    <div class="m-b-30">
							    <div class="rating-stars d-inline-block position-relative mr-2">
								    <img src="{{ asset('img/reviews/grey-star.svg') }}" alt="">
								    <div class="filled-star" style="width:${row.rate_star_percent}%"></div>
							    </div>  
						    </div>
                            <a href="{{ route('map.show', ":id" ) }}" class="btn btn-primary" style="margin-top: auto;width: fit-content;">查看更多</a>
                        </div>
                    </div>
                </div>
                `.replace(":id", row.id))
            })

        } else {
            map.flyTo(new L.LatLng(23.6978, 120.9605), 7)
        }

        if ($(this).val() in zoomSwitchMapper) {
            $("#zoom-switch-container").html("")

            Object.keys(zoomSwitchMapper[$(this).val()]).forEach(key => {
                let value = zoomSwitchMapper[$(this).val()][key]

                $("#zoom-switch-container").append(`
                    <button class="zoom-btn w-100" data-lat="${value[0]}" data-lng="${value[1]}" data-zoom="${value[2]}">${key}</button>
                `)
            })
        }
    })

    $("body").off("click", ".zoom-btn").on("click", ".zoom-btn", function(){
        let lat = $(this).data("lat")
        let lng = $(this).data("lng")
        let zoom = $(this).data("zoom")

        map.flyTo(new L.LatLng(lat, lng), zoom)
    })

    // 綁事件、頁面跳轉
    $("#search").click(function() {
        let area = $("select[name=area]").val()
        let location = $("select[name=location]").val()
        let type = $("select[name=item]").val()
        let url = "{{ route('search_res.index') }}?"

        if(!(area == "選擇地區"))
        {
            url += "&area="+area
        }
    
        if(!(location == "選擇縣市"))
        {
            url += "&location="+location
        }

        if(!(type == "選擇項目"))
        {
            url += "&type="+type
        }

        window.open(url, '_blank');

        // http://127.0.0.1:8000/search_res?location=%E5%B1%8F%E6%9D%B1%E7%B8%A3&page=2
    })


</script>

@endsection