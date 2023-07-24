<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            "ch_name" => "Cozy House 小羊房 花蓮背包客棧",
            "en_name" => "Cozy House Hualien Hostel",
            "address" => "970花蓮縣花蓮市延平街148巷5號",
            "url" => "https://www.cozyhousetw.com/contact.html",
            "work_start_from" => null,
            "work_end_to" => null,
            "checkin_start_from" => "15:00",
            "checkin_end_to" => null,
            "checkout_start_from" => null,
            "checkout_end_to" => "11:00",
            "transform_note" => "蘇花公路/台9線往花蓮市區方向於中央路四段/新生橋向右轉於中山路向左轉之後商校街向右轉於延平街148巷左轉(路口有免費公有停車場可停車)100M即可到達cozy house",
            "lat" => "23.98613762",
            "lng" => "121.5990068",
            "location" => "花蓮縣",
            "area" => "東部地區"
        ]);

        Hotel::create([
            "ch_name" => "PENGHU LUCAI B&B 旅采民宿",
            "en_name" => "PENGHU LUCAI B&B",
            "address" => "880澎湖縣馬公市1鄰雞母塢216號",
            "url" => "https://site.traiwan.com/PENGHU_LUCAI/location.html",
            "work_start_from" => "08:00",
            "work_end_to" => "21:00",
            "checkin_start_from" => null,
            "checkin_end_to" => null,
            "checkout_start_from" => null,
            "checkout_end_to" => null,
            "transform_note" => null,
            "lat" => "23.52341067",
            "lng" => "119.5902782",
            "location" => "澎湖縣",
            "area" => "外島/離島地區"
        ]);

        // 多筆假資料塞法
        // $data =[[]];

        // foreach ($data as $row) {
        //     Hotel::create($row);
        // }
    }
}
