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
            "url" => "https://driftdivinghostel.com/",
            "address" => "929屏東縣琉球鄉忠孝路一巷2-6號",
            "work_start_from" => "08:00",
            "work_end_to" => "22:00",
            "checkin_start_from" => "15:00",
            "checkin_end_to" => "22:00",
            "checkout_start_from" => "07:00",
            "checkout_end_to" => "11:00",
            "transform_note" => "開車（提供停車場） 桃園市公車-710 路線 (大溪-捷運永寧站) 台灣好行-小烏來線，於大溪老茶廠站下車 客運-5090、5091、5301路線",
            "landscape" => "慈湖、角板山公園"
        ]);

        Store::create([
            "ch_name" => "不告訴你",
            "en_name" => "Hello World",
            "url" => "https://driftdivinghostel.com/",
            "address" => "0001010010000",
            "transform_note" => "開車",
            "landscape" => "大海"
        ]);
    }
}
