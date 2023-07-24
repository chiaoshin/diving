<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Index;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Index::create([
        // "location" => "花瓶岩",
        // "area" => "小琉球",
        // "address" => "929屏東縣琉球鄉",
        // "lat" => 22.35541851,
        // "lng" => 120.38165,
        // "description" => "無",
        // ]);

        // Index::create([
        //     "location" => "中澳",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉三民路124號",
        //     "lat" => 22.35122843,
        //     "lng" => 120.3875026,
        //     "description" => "無",
        // ]);

        // 多筆假資料塞法
        $data = [
            ["ch_name" => "萬里桐潛水區", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮萬里路14-1號", "lat" => "21.99572429", "lng" => "120.7065343", "description" => "無"], ["ch_name" => "山海", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮山海路6號", "lat" => "21.98582481", "lng" => "120.7114139", "description" => "無"], ["ch_name" => "紅柴坑", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.97148602", "lng" => "120.7160298", "description" => "無"], ["ch_name" => "合界", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.9560355", "lng" => "120.7135968", "description" => "無"], ["ch_name" => "頂白沙", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆
            春鎮", "lat" => "21.95396385", "lng" => "120.7169318", "description" => "無"], ["ch_name" => "雷打石", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.93267692", "lng" => "120.7461671", "description" => "無"], ["ch_name" => "出水
            口", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.93358018", "lng" => "120.7454876", "description" => "無"], ["ch_name" => "後壁湖", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.93669213", "lng" => "120.7458737", "description" => "無"], ["ch_name" => "跳石", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.95951447", "lng" => "120.7710636", "description" => "無"], ["ch_name" => "香蕉灣", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮", "lat" => "21.92746937", "lng" => "120.8288463", "description" => "無"], ["ch_name" => "砂島", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏東縣恆春鎮砂島路221號", "lat" => "21.91400435", "lng" => "120.8470337", "description" => "無"], ["ch_name" => "後壁湖餵魚區", "area" => "南部地區", "location" => "屏東縣", "address" => "946屏
            東縣恆春鎮大光里", "lat" => "21.94537119", "lng" => "120.7514746", "description" => "無"], ["ch_name" => "藍洞", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.66167322", "lng" => "121.5086298", "description" => "無"], ["ch_name" => "公館鼻後礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.67940647", "lng" => "121.4915898", "description" => "無"], ["ch_name" => "石朗", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65595755", "lng" => "121.4744973", "description" => "無"], ["ch_name" => "樓門岩", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.68425441", "lng" => "121.5075738", "description" => "無"], ["ch_name" => "大白沙潛水區", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.63965608", "lng" => "121.4976939", "description" => "無"], ["ch_name" => "柴口浮潛區", "area" => "外島/離島地區", "location" => "台東縣", "address" => "95142台東縣綠島鄉柴口61號", "lat" => "22.67908576", "lng" => "121.475748", "description" => "無"], ["ch_name" => "海洋之心", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉漁港路", "lat" => "22.65591797", "lng" => "121.4714932", "description" => "無"], ["ch_name" => "花瓶岩", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉", "lat" => "22.35541851", "lng" => "120.38165", "description" => "無"], ["ch_name" => "中澳", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉三民路124號", "lat" => "22.35122843", "lng" => "120.3875026", "description" => "無"], ["ch_name" => "電廠", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉仁愛路1之11號", "lat" => "22.33871866", "lng" => "120.3778391", "description" => "無"], ["ch_name" => "厚石", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉", "lat" => "22.32456304", "lng" => "120.3653352", "description" => "無"], ["ch_name" => "海子口", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉", "lat" => "22.32539109", "lng" => "120.3591294", "description" => "無"], ["ch_name" => "多仔坪", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉", "lat" => "22.35014315", "lng" => "120.3654971", "description" => "無"], ["ch_name" => "龍蝦洞", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉", "lat" => "22.34506537", "lng" => "120.3884634", "description" => "無"], ["ch_name" => "衫福", "area" => "外島/離島地區", "location" => "屏東縣", "address" => "929屏東縣琉球鄉", "lat" => "22.34224709", "lng" => "120.3629457", "description" => "無"], ["ch_name" => "浮潛秘境海底郵 筒", "area" => "外島/離島地區", "location" => "澎湖縣", "address" => "880澎湖縣馬公市鎖港里", "lat" => "23.51987455", "lng" => "119.6134939", "description" => "無"], ["ch_name" => "杭灣", "area" => "外島/離島地區", "location" => "澎湖縣", "address" => "880澎湖縣馬公市", "lat" => "23.51752557", "lng" => "119.6064594", "description" => "無"], ["ch_name" => "月鯉灣", "area" => "外島/離島地區", "location" => "澎湖縣", "address" => "883澎湖縣七美鄉月鯉港東面濱海", "lat" => "23.19689854", "lng" => "119.4301126", "description" => "無"], ["ch_name" => "南方四島", "area" => "外島/離島地區", "location" => "澎湖縣", "address" => "123澎湖縣望安鄉882東坪村東嶼坪43號", "lat" => "23.25650853", "lng" => "119.5125352", "description" => "無"], ["ch_name" => "薰衣草森林", "area" => "外島/離島地區", "location" => "澎湖縣", "address" => "885澎湖縣湖西鄉", "lat" => "23.56467323", "lng" => "119.6370767", "description" => "無"], ["ch_name" => "東西吉廊道", "area" => "外島/離島地區", "location" => "澎湖縣", "address" => "882澎湖縣望安鄉", "lat" => "23.28214982", "lng" => "119.7254389", "description" => "無"], ["ch_name" => "基隆潮境公園", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區北寧路369巷61號", "lat" => "25.1446129", "lng" => "121.8041399", "description" => "無"], ["ch_name" => "基隆平浪橋", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區漁港三街", "lat" => "25.13991815", "lng" => "121.8021934", "description" => "無"], ["ch_name" => "花園二號", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區", "lat" => "25.14567179", "lng" => "121.8068228", "description" => "無"], ["ch_name" => "秘密花園", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正 區", "lat" => "25.14447062", "lng" => "121.805751", "description" => "無"], ["ch_name" => "花牆", "area" => "北部地區", "location" => "基 隆市", "address" => "202基隆市中正區", "lat" => "25.1469538", "lng" => "121.8083538", "description" => "無"], ["ch_name" => "油庫口", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區", "lat" => "25.14776226", "lng" => "121.7997671", "description" => "無"], ["ch_name" => "鋼鐵礁", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區", "lat" => "25.14398553", "lng" => "121.8082135", "description" => "無"], ["ch_name" => "海建號沈船", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區", "lat" => "25.14087859", "lng" => "121.8073076", "description" => "無"], ["ch_name" => "鋼鐵屋", "area" => "北部地區", "location" => "基隆市", "address" => "202基隆市中正區", "lat" => "25.13992944", "lng" => "121.807711", "description" => "無"], ["ch_name" => "鼻頭角公園", "area" => "北部地區", "location" => "新北市", "address" => "224新北市瑞芳區鼻頭路1號", "lat" => "25.12566856", "lng" => "121.9151645", "description" => "無"], ["ch_name" => "蝙蝠洞公園", "area" => "北部地區", "location" => "新北市", "address" => "224新北市瑞芳區海濱里", "lat" => "25.12663764", "lng" => "121.8317214", "description" => "無"], ["ch_name" => "龍洞灣", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區", "lat" => "25.10399692", "lng" => "121.9232823", "description" => "無"], ["ch_name" => "龍洞1號", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區龍洞街63-8號", "lat" => "25.1171114", "lng" => "121.9173877", "description" => "無"], ["ch_name" => "龍洞1.5號", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區龍洞街63-8號", "lat" => "25.11594308", "lng" => "121.9154998", "description" => "無"], ["ch_name" => "龍洞2號", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區龍洞街63-8號", "lat" => "25.11416872", "lng" => "121.9133884", "description" => "無"], ["ch_name" => "龍洞3號", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區龍洞街35-2號", "lat" => "25.1121126", "lng" => "121.9169991", "description" => "無"], ["ch_name" => "龍洞4號", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區龍洞街35-2號", "lat" => "25.11327742", "lng" => "121.9197311", "description" => "無"], ["ch_name" => "蚊 子坑", "area" => "北部地區", "location" => "新北市", "address" => "228新北市貢寮區和美里", "lat" => "25.09306342", "lng" => "121.916026", "description" => "無"], ["ch_name" => "水晶宮", "area" => "北部地區", "location" => "新北市", "address" => "224新北市瑞芳區", "lat" => "25.13473915", "lng" => "121.8151204", "description" => "無"], ["ch_name" => "象鼻岩放流點", "area" => "北部地區", "location" => "新北 市", "address" => "224新北市瑞芳區", "lat" => "25.13506585", "lng" => "121.8185848", "description" => "無"], ["ch_name" => "玫瑰花園", "area" => "北部地區", "location" => "新北市", "address" => "224新北市瑞芳區", "lat" => "25.13234603", "lng" => "121.8239979", "description" => "無"], ["ch_name" => "豆腐峽", "area" => "北部地區", "location" => "宜蘭縣", "address" => "270宜蘭縣蘇澳鎮", "lat" => "24.5838643", "lng" => "121.8714373", "description" => "無"], ["ch_name" => "粉鳥林", "area" => "北部地區", "location" => "宜蘭縣", "address" => "270 宜蘭縣蘇澳鎮", "lat" => "24.49727166", "lng" => "121.8431698", "description" => "無"], ["ch_name" => "石梯坪", "area" => "東部地區", "location" => "花蓮縣", "address" => "977花蓮縣豐濱鄉台11線", "lat" => "23.48869398", "lng" => "121.5137846", "description" => "無"], ["ch_name" => "杉原灣", "area" => "東部地區", "location" => "台東縣", "address" => "954台東縣卑南鄉海水浴場", "lat" => "22.83076987", "lng" => "121.1861319", "description" => "無"], ["ch_name" => "三仙台", "area" => "東部地區", "location" => "台東縣", "address" => "961台東縣 成功鎮", "lat" => "23.12689065", "lng" => "121.4221268", "description" => "無"], ["ch_name" => "中寮漁港", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.67565232", "lng" => "121.472588", "description" => "無"], ["ch_name" => "黑毛礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.68014256", "lng" => "121.4798349", "description" => "無"], ["ch_name" => "柴口", "area" => "外島/離島地區", "location" => "台東縣", "address" => "95142台東縣綠島 鄉柴口61號", "lat" => "22.6766976", "lng" => "121.4829034", "description" => "無"], ["ch_name" => "公館鼻", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.676215", "lng" => "121.493002", "description" => "無"], ["ch_name" => "將軍岩", "area" => "外島/離島地區", "location" => "台東縣", "address" => "123台東縣綠島鄉951東邊海岸", "lat" => "22.6766718", "lng" => "121.4957395", "description" => "無"], ["ch_name" => "豆丁礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.67834348", "lng" => "121.4932005", "description" => "無"], ["ch_name" => "一線天", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.68109827", "lng" => "121.4931103", "description" => "無"], ["ch_name" => "大峽谷", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.68827349", "lng" => "121.4904579", "description" => "無"], ["ch_name" => "樓門岩", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.68178773", "lng" => "121.5112288", "description" => "無"], ["ch_name" => "三塊石", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉環島公路", "lat" => "22.63969412", "lng" => "121.4907967", "description" => "無"], ["ch_name" => "仙人疊石", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.6589914", "lng" => "121.5072898", "description" => "無"], ["ch_name" => "柚子湖", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東 縣綠島鄉", "lat" => "22.66563416", "lng" => "121.5100447", "description" => "無"], ["ch_name" => "仙掌森林", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.66776488", "lng" => "121.5115434", "description" => "無"], ["ch_name" => "大白沙", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.63848472", "lng" => "121.4906913", "description" => "無"], ["ch_name" => "獨立礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.63856394", "lng" => "121.4921719", "description" => "無"], ["ch_name" => "教堂", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.63933631", "lng" => "121.4921719", "description" => "無"], ["ch_name" => "鋼鐵礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.63917788", "lng" => "121.4912706", "description" => "無"], ["ch_name" => "馬蹄橋", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.63974708", "lng" => "121.4915663", "description" => "無"], ["ch_name" => "龜灣鼻", "area" => "外島/離島地區", "location" => " 台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.64659007", "lng" => "121.472954", "description" => "無"], ["ch_name" => "雞仔礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.64296427", "lng" => "121.48178", "description" => "無"], ["ch_name" => "海底郵筒", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉漁港路", "lat" => "22.65517826", "lng" => "121.4731667", "description" => "無"], ["ch_name" => "破沉箱", "area" => "外島/離島地區", "location" => " 台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65657072", "lng" => "121.4737977", "description" => "無"], ["ch_name" => "大香菇", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65527516", "lng" => "121.4718768", "description" => "無"], ["ch_name" => "十字礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65604358", "lng" => "121.4723239", "description" => "無"], ["ch_name" => "小丑島", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65666641", "lng" => "121.4738139", "description" => "無"], ["ch_name" => "後花園", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65455526", "lng" => "121.4722625", "description" => "無"], ["ch_name" => "六米礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65353086", "lng" => "121.4720975", "description" => "無"], ["ch_name" => "斜坡花園", "area" => "外島/離島地區", "location" => "台東縣", "address" => "951台東縣綠島鄉", "lat" => "22.65390263", "lng" => "121.4719053", "description" => "無"], ["ch_name" => "機場外礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.01952055", "lng" => "121.5334349", "description" => "無"], ["ch_name" => "八代灣沉船", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.01685864", "lng" => "121.5490159", "description" => "無"], ["ch_name" => "蘭恩", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.02420856", "lng" => "121.5388245", "description" => "無"], ["ch_name" => "漁人舊部落港灣", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.02558206", "lng" => "121.5426642", "description" => "無"], ["ch_name" => "椰子油斷層", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.05086756", "lng" => "121.5098466", "description" => "無"], ["ch_name" => "開元港藍洞", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.05633311", "lng" => "121.5066294", "description" => "無"], ["ch_name" => "椰油浮潛 區", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.0776057", "lng" => "121.5031239", "description" => "無"], ["ch_name" => "玉女岩", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.08207818", "lng" => "121.517715", "description" => "無"], ["ch_name" => "朗島秘境", "area" => "外島/離島地區", "location" => "台 東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.08133686", "lng" => "121.5225239", "description" => "無"], ["ch_name" => "母雞岩外 礁", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.0830151", "lng" => "121.5587245", "description" => "無"], ["ch_name" => "雙獅岩", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.08515017", "lng" => "121.5672812", "description" => "無"], ["ch_name" => "雙獅天井", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.08585084", "lng" => "121.5683082", "description" => "無"], ["ch_name" => "東清七號", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.07499159", "lng" => "121.5682765", "description" => "無"], ["ch_name" => "情人洞", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.06187418", "lng" => "121.5733371", "description" => "無"], ["ch_name" => "核廢料", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.00761347", "lng" => "121.5945829", "description" => "無"], ["ch_name" => "龍門港小香菇", "area" => "外島/離島地區", "location" => "台東縣", "address" => "952台東縣蘭嶼鄉", "lat" => "22.00428895", "lng" => "121.5811297", "description" => "無"]
        ];

        foreach ($data as $row) {
            Index::create($row);
        }
    }
}
