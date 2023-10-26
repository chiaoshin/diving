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
{{-- <!-- amCharts javascript sources --> --}}
<script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>
<!-- <script type="text/javascript" src="https://www.amcharts.com/lib/3/maps/js/taiwanLow.js"></script> -->
<script src="{{ asset('js/taiwanLow.js') }}"></script>
<script src="https://www.amcharts.com/lib/4/geodata/lang/tw_ZH.js"></script>

{{-- <!-- map 效能處理 --> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">

{{-- map control定位套件 --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />


{{-- <!-- 評論&結果畫面 --> --}}
<link href="{{ asset("css/reviews.css") }}" rel="stylesheet">
<link href="{{ asset("css/search_res.css") }}" rel="stylesheet">

{{-- <!-- map 嵌入 --> --}}
<!-- <link href="{{ asset("css/leaflet.css") }}" rel="stylesheet"> -->
<link href="{{ asset("css/map.css") }}" rel="stylesheet">
{{-- <!-- weather 導入 --> --}}
<link href="{{ asset("css/weather.css") }}" rel="stylesheet">

<style>
    /* .search-container {
    width: 100%;
    background-color: #f0f0f0;
    padding: 10px;
    初始位置
    position: static;
  } */

    .fixed-search {
    /* 捲動固定 */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #f0f0f0;
    padding: 10px;
    /* 其他樣式，可自行調整 */
    border-bottom: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    /* 確保在其他內容之上 */
    z-index: 2000;
  }
</style>

@endsection

@section("body")
{{-- <!-- 輪播 --> --}}
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    {{-- <!-- 圖片切換 --> --}}
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/header_new_img1.png" class="d-block w-100" alt="col1">
        </div>
        <div class="carousel-item">
            <img src="./img/header_new_img2.png" class="d-block w-100" alt="col2">
        </div>
        <div class="carousel-item">
            <img src="./img/header_new_img3.png" class="d-block w-100" alt="col3">
        </div>
    </div>
    {{-- <!-- 左右箭頭 --> --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

{{-- <!-- search bar --> --}}
{{-- <div class="search-container container-fluid bg-light" style="position:fixed; top:7%; width:100%;"> --}}
<div class="search-container container-fluid bg-light" style="">
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

{{-- <!-- HOT Point card --> --}}
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

{{-- <!-- All Map --> --}}
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-white"><b><span class="material-symbols-outlined">travel_explore</span>潛游地圖</b></h2>
        </div>
    </div>

    <div class="row position-relative" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div class="row">
            <div class="col col-2">
                {{--  --}}
                <div class="btn_group">
                    <div class="div">
                        <button class="zoom-btn btn w-75 mb-3 pl-3" data-lat="23.6978" data-lng="120.9605" data-zoom="7">本島</button>
                    </div>
                    <div id='zoom-switch-container' class='p-0'></div>
                    <div class="div ps-5">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><b>區域熱點數</b></label>
                          </div>                          
                    </div>
                </div>
            </div>
            <div class="col col-10">
                {{-- <!-- leaflet地圖 --> --}}
                <div id="map"></div>
            </div>
        </div>
    </div>

</div>

{{-- <!-- weather --> --}}
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
    {{-- <div class="row position-relative" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div class="div">
            <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col" class="data big-title">日期</th>
                    <th scope="col" class="data big_p" td colspan="4">10/27(五)</th></td>
                    <th scope="col" class="data big_p" td colspan="4">10/28(六)</th></td>
                    <th scope="col" class="data big_p" td colspan="4">10/29(日)</th></td>
                    <th scope="col" class="data big_p" td colspan="4">10/30(一)</th></td>
                    <th scope="col" class="data big_p" td colspan="4">10/31(二)</th></td>
                    <th scope="col" class="data big_p" td colspan="4">11/1(三)</th></td>
                    <th scope="col" class="data big_p" td colspan="4">11/2(四)</th></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="weather-description text big-title">天氣狀況</td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/clouldy.png') }}" class="img_weather" ></td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/clouldy.png') }}" class="img_weather"></td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/sun.png') }}" class="img_weather"></td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/sun.png') }}" class="img_weather"></td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/rain.png') }}" class="img_weather"></td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/rain.png') }}" class="img_weather"></td>
                    <td colspan="4" class="big_p"><img src="{{ asset('img/weather/rainstorm.png') }}" class="img_weather"></td>
                  </tr>

                    <tr>
                      <td class="weather-description text big-title">溫度</td>
                      <td colspan="4" class="big_p">29℃</td>
                      <td colspan="4" class="big_p">26℃</td>
                      <td colspan="4" class="big_p">33℃</td>
                      <td colspan="4" class="big_p">30℃</td>
                      <td colspan="4" class="big_p">27℃</td>
                      <td colspan="4" class="big_p">28℃</td>
                      <td colspan="4" class="big_p">20℃</td>
                    </tr>

                    <tr>
                      <td class="weather-description text big-title">降雨機率</td>
                      <td colspan="4" class="big_p">40%</td>
                      <td colspan="4" class="big_p">20%</td>
                      <td colspan="4" class="big_p">10%</td>
                      <td colspan="4" class="big_p">40%</td>
                      <td colspan="4" class="big_p">60%</td>
                      <td colspan="4" class="big_p">54%</td>
                      <td colspan="4" class="big_p">100%</td>
                    </tr>

                    <tr>
                      <td class="weather-description text big-title">浪高</td>
                      <td colspan="4" class="big_p">0.4</td>
                      <td colspan="4" class="big_p">0.4</td>
                      <td colspan="4" class="big_p">0.4</td>
                      <td colspan="4" class="big_p">0.3</td>
                      <td colspan="4" class="big_p">0.4</td>
                      <td colspan="4" class="big_p">0.3</td>
                      <td colspan="4" class="big_p">0.4</td>
                    </tr>

                    <tr>
                      <td class="weather-description text big-title">流向</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/right.png') }}" class="img_position"><br>東</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/left.png') }}" class="img_position"><br>西</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/down.png') }}" class="img_position"><br>南</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/up-left.png') }}" class="img_position"><br>西北</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/down-right.png') }}" class="img_position"><br>東南</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/down.png') }}" class="img_position"><br>南</td>
                      <td colspan="4" class="big_p"><img src="{{ asset('img/weather/down-left.png') }}" class="img_position"><br>西南</td>
                    </tr>

                     <tr>
                      <td class="weather-description text big-title">潮汐</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                      <td class="big_p">漲潮</td><td class="big_p">退潮</td><td class="big_p">漲潮</td><td class="big_p">退潮</td>
                    </tr>

                    <tr>
                      <td class="weather-description text big-title">時間</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                      <td class="big_p">00:36</td><td class="big_p">05:39</td><td class="big_p">09:53</td><td class="big_p">17:06</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
    <div id="weather-container" style="border: solid 1px #928d8d; padding: 0.5rem;">
        <div class="">
            <select class="form-control" id="location"></select>
        </div>
    </div>
</div>

{{-- <!-- activity --> --}}
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
{{-- map control定位套件 --}}
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<script src="{{ asset('js/leaflet-providers.js') }}"></script>
<script>
/* 
* 載入氣象檔案
*/
let weather_data
let wave_data
let wave_2_data

let format_result = {}

const load_wave_2_data = () => {
    return new Promise((resolve) => {
        fetch('https://cwaopendata.s3.ap-northeast-1.amazonaws.com/Model/M-B0078-001.json')
        .then(res=>{
            return res.blob()
        }).then((blob_content) => {
            let b = new Blob([blob_content], {type:"binary/octet-stream"})
            let reader = new FileReader()
            reader.onload = function() {
                let json_data = JSON.parse(this.result)
                wave_2_data = json_data["cwaopendata"]["dataset"]["location"]

                console.log("API Done")

                resolve()
            };
            reader.readAsText(b)
        })
    })
}

const load_wave_data = () => {
    return new Promise((resolve) => {
        fetch('https://cwaopendata.s3.ap-northeast-1.amazonaws.com/Forecast/F-A0021-001.json')
        .then(res=>{
            return res.blob()
        }).then((blob_content) => {
            let b = new Blob([blob_content], {type:"binary/octet-stream"})
            let reader = new FileReader()
            reader.onload = function() {
                let json_data = JSON.parse(this.result)
                wave_data = json_data["cwaopendata"]["Resources"]["Resource"]["Data"]["TideForecasts"]

                console.log("API Done")

                resolve()
            };
            reader.readAsText(b)
        })
    })
}

const load_weather_data = () => {
    return new Promise((resolve) => {
        fetch('https://cwaopendata.s3.ap-northeast-1.amazonaws.com/Forecast/F-B0053-074.json')
        .then(res=>{
            return res.blob()
        }).then((blob_content) => {
            let b = new Blob([blob_content], {type:"binary/octet-stream"})
            let reader = new FileReader()
            reader.onload = function() {
                let json_data = JSON.parse(this.result)

                weather_data = json_data["cwaopendata"]["dataset"]["locations"]
                console.log("API Done")

                resolve()
            };
            reader.readAsText(b)
        })
    })
}

const get_date = (date_str) => {
    let date_obj = new Date(date_str)

    return `${date_obj.getFullYear()}-${date_obj.getMonth() + 1}-${date_obj.getDate()}`
}

const get_time = (date_str) => {
    let date_obj = new Date(date_str)

    return `${date_obj.getHours()}:${(date_obj.getMinutes() + "").padStart(2, "0")}`
}

const fetchall = async () => {
    await load_wave_data()
    await load_weather_data()
    await load_wave_2_data()
}

const format_data = () => {
    // 整理天氣資料
    weather_data.location.forEach(row => {
        let nid = row.parameterSet.parameter.parameterValue
        if (!(nid in format_result)) {
            format_result[nid] = {
                locationName: row.locationName
            }
        }

        row.weatherElement.forEach((row_data, index) => {
            format_result[nid][row_data.description] = row_data.time.map(data => {
                if (Array.isArray(data.elementValue)) {
                    return data.elementValue[0].value
                }else{
                    return data.elementValue.value
                }
            })

            // 設定日期, 日期格式都相同, 因此用第一個資料的 start_time 來做設定即可
            if (index == 0) {
                format_result[nid]["日期"] = row_data.time.map(data => {
                    return get_date(data.startTime)
                })
            }
        })
    })

    // 整理潮汐資料
    Object.keys(format_result).forEach(key => {
        let id = key + "00"

        let target_data = wave_data.filter(row => row.Location?.LocationId == id)

        if (target_data.length > 0) {
            let timedata = target_data[0].Location.TimePeriods.Daily
            let timeinfo = {}

            timedata.forEach(row => {
                if (Array.isArray(row.Time)) {
                    timeinfo[row.Date] = row.Time.map(data => {
                        return {
                            datetime: data.DateTime,
                            tide: data.Tide
                        }
                    })
                }else{
                    timeinfo[row.Date] = row.Time
                }
            })

            format_result[key]["潮汐"] = timeinfo
        }else{
            format_result[key]["潮汐"] = {}
        }
    })

    // 整理海浪資料
    Object.keys(format_result).forEach(key => {
        let id = key + "00"

        let target_data = wave_2_data.filter(row => row.locationCode == id)
        
        let time_info = {}

        target_data.forEach(row => {
            let date_key = get_date(row.time.dataTime)

            if (!(date_key in time_info)) {
                time_info[date_key] = {}
            }

            time_info[date_key][row.time.dataTime] = {}

            row.weatherElement.map(row_data => {
                time_info[date_key][row.time.dataTime][row_data.elementName] = row_data.elementValue.value
            })
        })
        
        format_result[key]["海浪"] = time_info
    })

    // 設定下拉選單資料
    let optgroup = {
        "新北市": ["N001", "N002", "N003", "N004"],
        "屏東縣": ["N014", "N007", "N008", "N009", "N010", "N013", "N015", "N011", "N012"],
        "宜蘭縣": ["N006"],
        "台東縣": ["N005", "N016", "N017", "N018", "N019"]
    }

    let options = ""

    Object.keys(optgroup).forEach(group_name => {
        options += `<optgroup label="${group_name}">`
        optgroup[group_name].forEach(key => {
            options += `<option value="${key}">${format_result[key]["locationName"]}</option>`
        })
        options += "</optgroup>";
    })

    $("#location").html(options)
}

// 天氣對照圖
const generate_weather_html = (id) => {
    let image_mapper = {
        "多雲短暫雨": "{{ asset('img/weather/CR.svg') }}",
        "陰時多雲短暫雨":"{{ asset('img/weather/CR2.svg') }}",
    }
    
    let arrow_mapper = {
        "sw": "{{ asset('img/weather/down-left.png') }}"
    }

    let html = `
    <div id='weather-information'>
        <div class='weather-container'>
            <div class="data-column label">
                <div class="date" style="background-color: #9999cc; color:black;">
                    <span>日期</span>
                </div>
                <div class="tempature">
                    <span>溫度</span>
                </div>
                <div class="rain_rate">
                    <span>降雨機率</span>
                </div>
                <div class="weather_type">
                    <span>天氣狀況</span>
                </div>
                <div class="wave_type">
                    <span>海況</span>
                </div>
                <div class="tidal_type">
                    <span>潮汐</span>
                </div>
            </div>
        
    `

    let data = format_result[id]

    // 依序產生日期, 溫度, 降雨機率
    for(let i = 0; i < 7; i ++) {
        let today = data["日期"][i]

        let date_obj = new Date(today)
        let day = date_obj.getDay()
        let days = ["日","一","二","三","四","五","六"]

        let img_html = ""

        if (data["天氣現象"][i] in image_mapper) {
            img_html = `<img style="width: 50px;" src="${image_mapper[data["天氣現象"][i]]}">`
        }else{
            img_html = data["天氣現象"][i]
        }
        
        html += `
        <div class="data-column">
        <div class="date">
            <span>${(date_obj.getMonth() + 1 + "").padStart(2, "0")}/${(date_obj.getDate() + "").padStart(2, "0")}(${days[day]})</span>
        </div>
        <div class="tempature">
            <span>${data["平均溫度"][i]}˚C</span>
        </div>
        <div class="rain_rate">
            <span>${data["24小時降雨機率"][i] ?? 0}%</span>
        </div>
        <div class="weather_type">
            <span>${img_html}</span>
        </div>
        `

        // 設定浪高資料
        // 浪高資料每 3 小時一次
        // 所以要顯示多筆
        let today_wave_data = data["海浪"][today]

        if (!today_wave_data) {
            html += `<div class="wave_data">無當日海浪資料</div>`
        }else{
            html += `<div class="wave_data"><div class="d-flex m-auto">`
            Object.keys(today_wave_data).forEach(time_key => {
                html += `
                <div class="wave-data-box">
                    <div class="wave-time-row">
                        時間:${get_time(time_key)}
                    </div>
                    <div class="wave-value-row">
                `
                Object.keys(today_wave_data[time_key]).filter(key => ["浪高", "流向"].includes(key)).forEach(value_key => {
                    if (value_key == "流向") {
                        let arrow_html = ""
                        if (today_wave_data[time_key][value_key] in arrow_mapper) {
                            arrow_html = `<img style="width: 25px;" src="${arrow_mapper[today_wave_data[time_key][value_key]]}">`
                        }else{
                            arrow_html = today_wave_data[time_key][value_key]
                        }

                        html += `<p>${value_key}:${arrow_html}</p>`
                    }else{
                        html += `<p>${value_key}:${today_wave_data[time_key][value_key]}</p>`
                    }
                })
                html += "</div></div>"
            })
            html += "</div></div>"
        }

        // 設定當日潮汐資料
        let today_tidal_data = data["潮汐"][today]

        if (!today_tidal_data) {
            html += `<div class="wave_data">無當日潮汐資料</div>`
        } else {
            html += `<div class="tidal_data"><div class="d-flex m-auto">`
            today_tidal_data.forEach(row_data => {
                html += `
                <div class="tidal-data-box">
                    <div class="tidal-time-row">
                        <p>時間:${get_time(row_data.datetime)}</p>
                    </div>
                    <div class="tidal-value-row">
                        <p>${row_data.tide}</p>
                    </div>
                </div>
                `
            })
            html += "</div></div>"
        }
        html += "</div>"
    }
    html += "</div></div>"

    $("#weather-information").remove()
    $("#weather-container").append(html)
}

const process = async () => {
    await fetchall()

    format_data()

    generate_weather_html("N001")
}

</script>
<script>
    const markers = @json($diveSite);
    const danger_area = @json($danger_area);

    // marker color/打點圖片更換(https://github.com/pointhi/leaflet-color-markers)
    var mapIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        // iconUrl: '{{ asset("img/map/潛點.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var mapIconGreen = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        // iconUrl: '{{ asset("img/map/潛點.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var mapIconOrange = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
        // iconUrl: '{{ asset("img/map/潛點.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    var mapIconRed = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        // iconUrl: '{{ asset("img/map/潛點.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var storeIcon = new L.Icon({
        // iconUrl: '{{ asset("img/map/store.png") }}',
        // iconUrl: '{{ asset("img/map/scuba-diver-svgrepo-com.svg") }}',
        iconUrl: '{{ asset("img/map/dive.png") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [40, 50],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var hotelIcon = new L.Icon({
        // iconUrl: '{{ asset("img/map/bag.png") }}',
        iconUrl: '{{ asset("img/map/hotel-hostel-svgrepo-com2.svg") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [50, 60],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var shopIcon = new L.Icon({
        // iconUrl: '{{ asset("img/map/用品店.png") }}',
        iconUrl: '{{ asset("img/map/diving-mask-svgrepo-com.svg") }}',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [50, 60],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    let map;
    let markerGroup = [];
    let markers_group;
    let using_data = [];

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

        // 圖層載入
        L.tileLayer.provider('Jawg.Matrix').addTo(map);

        // 圖層切換
        const basemaps = {
        街道地圖: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution: '© <a href="https://www.openstreetmap.org/copyright">OSM開源地圖</a>'}),
        // 熱點圖: L.tileLayer('https://wmts.nlsc.gov.tw/wmts/EMAP/default/EPSG:3857/{z}/{y}/{x}', {attribution: '&copy; <a href="https://www.tgos.tw/tgos/web/tgos_home.aspx">TGOS</a>'}),
        道路清晰版: L.tileLayer('https://{s}.tile.jawg.io/jawg-matrix/{z}/{x}/{y}{r}.png?access-token=MNiPzMGxrs9OfKmwhx85CXMeBukniOVvEMn2vWuDwyGV6qClwU6muHYnTjSqwjee', {attribution: '<a href="http://jawg.io" title="Tiles Courtesy of Jawg Maps" target="_blank">&copy; <b>Jawg</b>Maps</a>'}),
        衛星: L.tileLayer('https://wmts.nlsc.gov.tw/wmts/PHOTO_MIX/default/GoogleMapsCompatible/{z}/{y}/{x}', {attribution: '&copy; <a href="https://www.tgos.tw/tgos/web/tgos_home.aspx">TGOS</a>'}),
        
        // 山脈_地形地勢Topography: L.tileLayer.wms('http://ows.mundialis.de/services/service?',   {layers: 'TOPO-WMS'}),
        // 省道_Places: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {layers: 'OSM-Overlay-WMS'}),
        // GOOGLE: L.tileLayer('https://maps.googleapis.com/maps/api/tile?{z}&x={x}&y={y}', {attribution: '© Google'}),
        // 微軟地圖: L.tileLayer('http://ecn.t{server}.tiles.virtualearth.net/tiles/{type}/{z}/{x}/{y}.{format}?g=854&mkt={culture}', {attribution: '© Microsoft'}),
        };
        
        L.control.layers(basemaps).addTo(map);
        basemaps.街道地圖.addTo(map);
        
        //map定位功能 
        // L.control.locate().addTo(map);

        L.control.locate({
            position: 'topleft',
            locateOptions: {
              enableHighAccuracy: true
            },
            strings: {
              title: '定位我的位置',
              metersUnit: '公尺',
              feetUnit: '英尺',
              popup: '距離誤差：{distance}{unit}以內'
            },
            clickBehavior: {
              inView: 'stop',
              outOfView: 'setView',
              inViewNotFollowing: 'inView'
            }
        }).addTo(map);

        // 『打點初始化』(潛水地點)
        createMarkersWithoutGroups(markers)

        // marker 彈跳視窗
        // L.marker([22.7247326,120.3124143]).addTo(map).bindPopup('<h2>高雄科技大學<h2><br><p>上課的地方</p>').openPopup();

        // 危險海域(直接打點,拆兩個表紀錄)
        danger_area.forEach(row => {
            let positions = row.positions.map(r => [r.lat, r.lng])
            let polygon = L.polygon(positions).setStyle({
                fillColor: '#FF0000',
                color: '#FF0000'
            }).addTo(map).bindPopup(row.description);
        })

        // 全部寫在DangerAreaSeeder
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
        markers_group?.clearLayers()

        markerGroup.forEach(row => {
            map.removeLayer(row)
        })
    }

    // 『新增打點』
    function createMarkers(data) {
        using_data = data;

        clearMakers()

        markers_group = L.markerClusterGroup({
            spiderfyOnMaxZoom: false,
            showCoverageOnHover: false,
            zoomToBoundsOnClick: false,
        });

        data.forEach(row => {
            let icon

            if (row.type == 'map') {
                // icon = mapIcon
                // 發生事件頻率(無:綠色、<5：橘色、>=5：紅色)
                if(row.counter>=5)
                {
                    icon = mapIconRed
                }else if(row.counter>0&&row.counter<5)
                {
                    icon = mapIconOrange
                }
                else if(row.counter==0){
                    icon = mapIconGreen
                }
            }else if(row.type == 'store'){
                icon = storeIcon
            }else if(row.type == 'hotel'){
                icon = hotelIcon
            }else if(row.type == 'shop'){
                icon = shopIcon
            }

            let marker = L.marker([row.lat, row.lng], {
                icon: icon
            }).bindPopup(`
                <h2>${row.name}</h2>
                <a href="${row.url}" class="h4" style="text-decoration: none;">查看更多</a><br/>
                <a href="https://www.google.com/search?q=${row.name}&sourceid=chrome&ie=UTF-8" target="_blank" title="${row.address}">${row.address}</a>
            `)

            markerGroup.push(marker)
            markers_group.addLayer(marker)
        })

        map.addLayer(markers_group);
    }

    function createMarkersWithoutGroups(data) {
        using_data = data;

        clearMakers()

        data.forEach(row => {
            let icon

            if (row.type == 'map') {
                // icon = mapIcon
                // 發生事件頻率(無:綠色、<5：橘色、>=5：紅色)
                if(row.counter>=5)
                {
                    icon = mapIconRed
                }else if(row.counter>0&&row.counter<5)
                {
                    icon = mapIconOrange
                }
                else if(row.counter==0){
                    icon = mapIconGreen
                }
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

    function switch_groups(type) {
        if (type == 'group') {
            createMarkers(using_data)
        }else{
            createMarkersWithoutGroups(using_data)
        }
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

                createMarkersWithoutGroups(res)
            },
            error: (err) => {
                console.log(err)
            }
        })
    })

    $("#flexSwitchCheckDefault").change(function(){
        if($(this).prop("checked")) {
            switch_groups("group")
        }else{
            switch_groups("single")
        }
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
        '澎湖縣': [23.654072, 119.596528, 14],
        '金門縣': [24.450180, 118.367563, 14],
        '連江縣': [26.164330, 120.248569, 14],
        '臺北市': [25.056083, 121.559522, 14],
        '新北市': [25.119584, 121.912055, 14],
        '基隆市': [25.121252, 121.719304, 14],
        '桃園市': [24.918439, 121.243436, 14],
        '新竹市': [24.787220, 120.939825, 14],
        '新竹縣': [24.735878, 121.139237, 14],
        '宜蘭縣': [24.570412, 121.653605, 14],
        '花蓮縣': [23.852462, 121.406987, 14],
        '臺東縣': [22.951539, 121.051822, 14],
        '苗栗縣': [24.500105, 120.902437, 14],
        '臺中市': [24.228988, 120.915181, 14],
        '彰化縣': [23.975269, 120.490295, 14],
        '南投縣': [23.858716, 120.935998, 14],
        '雲林縣': [23.715187, 120.390177, 14],
        '嘉義市': [23.481751, 120.446901, 14],
        '嘉義縣': [23.483329, 120.512126, 14],
        '臺南市': [23.166952, 120.303771, 14],
        '高雄市': [22.983211, 120.585943, 14],
        '屏東縣': [21.93816589937437, 120.77412452862782, 13],
        // '澎湖縣': [23.654072, 119.596528, 9.25]
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
            '臺北市': [25.056083, 121.559522, 14]
        },
        '新北市': {
            '新北市': [25.119584, 121.912055, 10]
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
            '屏東縣': [21.93816589937437, 120.77412452862782, 13],
            '小琉球': [22.347902, 120.383985, 17]
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
                    <button class="zoom-btn btn  w-75 mb-3 pl-3" data-lat="${value[0]}" data-lng="${value[1]}" data-zoom="${value[2]}">${key}</button>
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

    // 搜尋欄捲動事件
    window.addEventListener('scroll', function() {
        const searchContainer = document.querySelector('.search-container');
        const scrollY = window.scrollY;

        if (scrollY > 480) { // 根據您希望的捲動位置調整數值
        searchContainer.classList.add('fixed-search');
        } else {
        searchContainer.classList.remove('fixed-search');
        }
    });

    $(function() {
        process()
    })

    $("#location").change(function() {
        generate_weather_html($(this).val())
    })

</script>

@endsection