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
        $data = [["location" => "萬里桐潛水區", "area" => "墾丁", "address" => "946屏東縣恆春鎮萬里路14-1號", "lat" => "21.99572429", "lng" => "120.7065343", "description" => "無"], ["location" => "山海", "area" => "墾丁", "address" => "946屏東縣恆春鎮山海路6號", "lat" => "21.98582481", "lng" => "120.7114139", "description" => "無"], ["location" => "紅柴坑", "area" => "墾丁", "address" => "屏東縣恆春鎮", "lat" => "21.97148602", "lng" => "120.7160298", "description" => "無"], ["location" => "合界", "area" => "墾丁", "address" => "946屏東縣恆春鎮", "lat" => "21.9560355", "lng" => "120.7135968", "description" => "無"], ["location" => "頂白沙", "area" => "墾丁", "address" => "946屏東縣恆春鎮", "lat" => "21.95396385", "lng" => "120.7169318", "description" => "無"], ["location" => "雷打石", "area" => "墾丁", "address" => "946屏
        東縣恆春鎮", "lat" => "21.93267692", "lng" => "120.7461671", "description" => "無"], ["location" => "出水口", "area" => "墾丁", "address" => "946屏東縣恆春鎮", "lat" => "21.93358018", "lng" => "120.7454876", "description" => "無"], ["location" => "後壁湖", "area" => "墾丁", "address" => "946屏東縣恆春鎮", "lat" => "21.93669213", "lng" => "120.7458737", "description" => "無"], ["location" => "跳石", "area" => "墾丁", "address" => "946屏東縣恆春鎮", "lat" => "21.95951447", "lng" => "120.7710636", "description" => "無"], ["location" => "香蕉灣", "area" => "墾丁", "address" => "946屏東縣恆春鎮", "lat" => "21.92746937", "lng" => "120.8288463", "description" => "無"], ["location" => "砂島", "area" => "墾丁", "address" => "946屏東縣恆春鎮砂島路221號", "lat" => "21.91400435", "lng" => "120.8470337", "description" => "無"], ["location" => "後壁湖餵魚區", "area" => "墾丁", "address" => "946屏東縣恆春鎮大光里", "lat" => "21.94537119", "lng" => "120.7514746", "description" => "無"], ["location" => "藍洞", "area" => "綠島", "address" => "951台東縣綠島鄉", "lat" => "22.66167322", "lng" => "121.5086298", "description" => "無"], ["location" => "公館鼻後礁", "area" => "綠島", "address" => "951台東縣綠島鄉", "lat" => "22.67940647", "lng" => "121.4915898", "description" => "無"], ["location" => "石朗", "area" => "綠島", "address" => "951台東縣綠島鄉", "lat" => "22.65595755", "lng" => "121.4744973", "description" => "無"], ["location" => "樓門岩", "area" => "綠島", "address" => "951台東縣綠島鄉", "lat" => "22.68425441", "lng" => "121.5075738", "description" => "無"], ["location" => "三塊石", "area" => "綠島", "address" => "951台東縣綠島鄉", "lat" => "22.63989432", "lng" => "121.4910448", "description" => "無"], ["location" => "大白沙潛水區", "area" => "綠島", "address" => "951台東縣綠島鄉", "lat" => "22.63965608", "lng" => "121.4976939", "description" => "無"], ["location" => "柚子湖", "area" => "
        綠島", "address" => "951台東縣綠島鄉", "lat" => "22.66580318", "lng" => "121.5102378", "description" => "無"], ["location" => "柴口浮潛區", "area" => "綠島", "address" => "95142台東縣綠島鄉柴口61號", "lat" => "22.67908576", "lng" => "121.475748", "description" => "無"], ["location" => "海底郵筒＆海洋之心", "area" => "綠島", "address" => "951台東縣綠島鄉漁港路", "lat" => "22.65591797", "lng" => "121.4714932", "description" => "無"], ["location" => "花瓶岩", "area" => "小琉球", "address" => "929屏東縣琉球鄉", "lat" => "22.35541851", "lng" => "120.38165", "description" => "無"], ["location" => "中澳", "area" => "小琉球", "address" => "929屏東縣琉球鄉三民路124號", "lat" => "22.35122843", "lng" => "120.3875026", "description" => "無"], ["location" => "電廠", "area" => "小琉球", "address" => "929屏東縣琉球鄉仁愛路1之11號", "lat" => "22.33871866", "lng" => "120.3778391", "description" => "無"], ["location" => "厚石", "area" => "小琉球", "address" => "929屏東縣琉球鄉", "lat" => "22.32456304", "lng" => "120.3653352", "description" => "無"], ["location" => "海子口", "area" => "小琉球", "address" => "929屏東縣琉球鄉", "lat" => "22.32539109", "lng" => "120.3591294", "description" => "無"], ["location" => "多仔坪", "area" => "小琉球", "address" => "929屏東縣琉球鄉", "lat" => "22.35014315", "lng" => "120.3654971", "description" => "無"], ["location" => "龍蝦洞", "area" => "小琉球", "address" => "929屏東縣琉球鄉", "lat" => "22.34506537", "lng" => "120.3884634", "description" => "無"], ["location" => "衫福", "area" => "小琉球", "address" => "929屏東縣琉球鄉", "lat" => "22.34224709", "lng" => "120.3629457", "description" => "無"], ["location" => "浮潛秘境海底郵筒", "area" => "澎湖", "address" => "880澎湖縣馬公市鎖港里", "lat" => "23.51987455", "lng" => "119.6134939", "description" => "無"], ["location" => "杭灣", "area" => "澎湖", "address" => "880澎湖縣馬公市", "lat" => "23.51752557", "lng" => "119.6064594", "description" => "無"], ["location" => "月鯉灣", "area" => "澎湖", "address" => "883澎湖縣七美鄉月鯉港東面濱海", "lat" => "23.19689854", "lng" => "119.4301126", "description" => "無"], ["location" => "南方四島", "area" => "澎湖", "address" => "澎湖 縣望安鄉882東坪村東嶼坪43號", "lat" => "23.25650853", "lng" => "119.5125352", "description" => "無"], ["location" => "薰衣草森林", "area" => "澎湖", "address" => "885澎湖縣湖西鄉", "lat" => "23.56467323", "lng" => "119.6370767", "description" => "無"], ["location" => " 東西吉廊道", "area" => "澎湖", "address" => "882澎湖縣望安鄉", "lat" => "23.28214982", "lng" => "119.7254389", "description" => "無"]];

        foreach ($data as $row) {
            Index::create($row);
        }
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

        // Index::create([
        //     "location" => "電廠",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉仁愛路1之11號",
        //     "lat" => 22.33871866,
        //     "lng" => 120.3778391,
        //     "description" => "無",
        // ]);

        // Index::create([
        //     "location" => "厚石",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉",
        //     "lat" => 22.32456304,
        //     "lng" => 120.3653352,
        //     "description" => "無",
        // ]);

        // Index::create([
        //     "location" => "海子口",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉",
        //     "lat" => 22.32539109,
        //     "lng" => 120.3591294,
        //     "description" => "無",
        // ]);

        // Index::create([
        //     "location" => "多仔坪",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉",
        //     "lat" => 22.35014315,
        //     "lng" => 120.3654971,
        //     "description" => "無",
        // ]);

        // Index::create([
        //     "location" => "龍蝦洞",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉",
        //     "lat" => 22.34506537,
        //     "lng" => 120.3884634,
        //     "description" => "無",
        // ]);

        // Index::create([
        //     "location" => "衫福",
        //     "area" => "小琉球",
        //     "address" => "929屏東縣琉球鄉",
        //     "lat" => 22.34224709,
        //     "lng" => 120.3629457,
        //     "description" => "無",
        // ]);
    }
}
