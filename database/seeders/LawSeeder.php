<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Law;

class LawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Law::create([
            "store_id" =>null,
            "shop_id" =>null,
            "hotel_id" =>1,
            "business_id" =>"54080509",
            "ch_name"=>"驛家旅店-EasyInn Hotel & Hostel-青年旅館",
            // "en_name"=>null,
            // "area"=>"南部地區",
            // "location"=>"台南市",
            // "address"=>"700台南市中西區成功路343號9樓",
            "event"=>"刑事",
            "url" => "https://www.lawsq.com/book/48044803256",
            "directions"=>"偽造文書等",
            "type"=>"背包客房"

        ]);

        Law::create([
            "store_id" =>1,
            "shop_id" =>null,
            "hotel_id" =>null,
            "business_id" =>"25122613",
            "ch_name"=>"iDiving愛潛水",
            // "en_name"=>null,
            // "area"=>"北部地區",
            // "location"=>"台北市",
            // "address"=>"111台北市士林區前港街8號",
            "event"=>"民事",
            "url" => "https://www.lawsq.com/book/42538011604",
            "directions"=>"侵權行為損害賠償",
            "type"=>"潛店"
        ]);
    }
}
