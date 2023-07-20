<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            "ch_name" => "琉浪潛水背包客棧",
            "en_name" => "Drift Diving Hostel",
            "address" => "929屏東縣琉球鄉忠孝路一巷2-6號",
            "url" => "https://driftdivinghostel.com/",
            "work_start_from" => "08:00",
            "work_end_to" => "22:00",
            "checkin_start_from" => "15:00",
            "checkin_end_to" => "22:00",
            "checkout_start_from" => "07:00",
            "checkout_end_to" => "11:00",
            "transform_note" => "開車（提供停車場） 桃園市公車-710 路線 (大溪-捷運永寧站) 台灣好行-小烏來線，於大溪老茶廠站下車 客運-5090、5091、5301路線",
            "landscape" => "慈湖、角板山公園",
            "lat" => "22.32495307",
            "lng" => "120.3644877",
            "location" => "屏東縣",
            "area" => "南部地區"
        ]);

        Store::create([
            "ch_name" => "日日潛水",
            "en_name" => "GOODAY DIVE",
            "address" => "880澎湖縣馬公市68-2號",
            "url" => "https://www.goodaydive.com/",
            "work_start_from" => "08:00",
            "work_end_to" => "18:00",
            "checkin_start_from" => null,
            "checkin_end_to" => null,
            "checkout_start_from" => null,
            "checkout_end_to" => null,
            "transform_note" => null,
            "landscape" => "浮潛秘境海底郵筒",
            "lat" => "23.53445205",
            "lng" => "119.6023905",
            "location" => "澎湖縣",
            "area" => "外島/離島地區"

        ]);
    }
}
