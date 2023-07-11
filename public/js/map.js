/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
document.addEventListener("DOMContentLoaded", function () {
  // 引入Leaflet.js和CSS
  var leafletCSS = document.createElement('link');
  leafletCSS.rel = 'stylesheet';
  leafletCSS.href = 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css';
  document.head.appendChild(leafletCSS);
  var leafletJS = document.createElement('script');
  leafletJS.src = 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js';

  //地圖初始化
  leafletJS.onload = function () {
    // 設定一地圖，定位在#map，先定位在center座標，zoom定位【已設定好經緯度】
    var map = L.map('map', {
      center: [23.6978, 120.9605],
      zoom: 7
    });

    // 【圖資設定】
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // marker
    L.marker([22.7247326, 120.3124143]).addTo(map).bindPopup('<h2>高雄科技大學<h2><p>上課的地方</p>');
    // L.marker([22.7247326,120.3124143]).addTo(map).bindPopup('<h2>高雄科技大學<h2><br><p>上課的地方</p>').openPopup();

    // 小琉球地點
    L.marker([22.35541851, 120.38165]).addTo(map).bindPopup('<h2>花瓶岩<h2>');
    L.marker([22.35122843, 120.3875026]).addTo(map).bindPopup('<h2>中澳<h2>');
    L.marker([22.33871866, 120.3778391]).addTo(map).bindPopup('<h2>電廠<h2>');
    L.marker([22.32456304, 120.3653352]).addTo(map).bindPopup('<h2>厚石<h2>');
    L.marker([22.32539109, 120.3591294]).addTo(map).bindPopup('<h2>海子口<h2>');
    L.marker([22.35014315, 120.3654971]).addTo(map).bindPopup('<h2>多仔坪<h2>');
    L.marker([22.34506537, 120.3884634]).addTo(map).bindPopup('<h2>龍蝦洞<h2>');
    L.marker([22.34224709, 120.3629457]).addTo(map).bindPopup('<h2>衫福<h2>');
  };
  document.head.appendChild(leafletJS);
});
/******/ })()
;