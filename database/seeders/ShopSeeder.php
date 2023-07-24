<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            "ch_name" => "迪卡儂 嘉義店",
            "en_name" => "DECATHLON Ciayi Store",
            "address" => "600嘉義市西區博愛路二段461號",
            "url" => "https://decathlon.tw/store/taiwan_chiayi_store",
            "work_start_from" => "10:00",
            "work_end_to" => "22:00",
            "transform_note" => "火車：搭至<嘉義站>，於後站出口步行約18分鐘沿博愛路往南，於興業西路與博愛路交叉口即可抵達",
            "lat" => "23.47140394",
            "lng" => "120.4323684",
            "location" => "嘉義市",
            "area" => "南部地區"
        ]);

        Shop::create([
            "ch_name" => "迪卡儂 雲林店",
            "en_name" => "DECATHLON Yunlin Store",
            "address" => "640雲林縣斗六市雲林路二段297號",
            "url" => "https://decathlon.tw/store/taiwan_yunlin_store",
            "work_start_from" => "10:00",
            "work_end_to" => "22:00",
            "transform_note" => "火車：搭至<斗六火車站>，步行約21分鐘※亦可轉乘公車：101、7124A、7124B 至<慈濟門診中心>站",
            "lat" => "23.70621086",
            "lng" => "120.5171477",
            "location" => "雲林縣",
            "area" => "中部地區"
        ]);

        // 多筆假資料塞法
        // $data =[[]];

        // foreach ($data as $row) {
        //     Store::create($row);
        // } 
    }
}
