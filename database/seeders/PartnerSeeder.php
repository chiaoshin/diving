<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Partner::create([
        //     "group_time" => date('Y-m-d'),
        //     "location" => "小琉球",
        //     "money" => 400,
        //     "email" => "C1091931100@gmail.com",
        //     "type" => "浮潛",
        //     "license" => "無",
        //     "people_limit" => 8,
        //     "people_number" => 4,
        // ]);

        Partner::create([
            "name" => "王曉明",
            "group_time" => "2023-12-05",
            "location" => "小琉球",
            "money" => 400,
            "email" => "C1091931100@gmail.com",
            "type" => "浮潛",
            "license" => "無",
            "people_limit" => 8,
            "people_number" => 4,
        ]);

        Partner::create([
            "name" => "昭小美",
            "group_time" => "2023-09-10",
            "location" => "綠島",
            "money" => 14000,
            "email" => "C1091931101@gmail.com",
            "type" => "自由潛水",
            "license" => "有",
            "people_limit" => 4,
            "people_number" => 1,
        ]);

        Partner::create([
            "name" => "王莉莉",
            "group_time" => "2023-08-15",
            "location" => "墾丁",
            "money" => 2500,
            "email" => "C1091931102@gmail.com",
            "type" => "水肺潛水",
            "license" => "無",
            "people_limit" => 8,
            "people_number" => 6,
        ]);

        Partner::create([
            "name" => "陳明明",
            "group_time" => "2023-08-20",
            "location" => "小琉球",
            "money" => 400,
            "email" => "C1091931103@gmail.com",
            "type" => "浮潛",
            "license" => "無",
            "people_limit" => 10,
            "people_number" => 2,
        ]);

        Partner::create([
            "name" => "林戚戚",
            "group_time" => "2023-08-22",
            "location" => "蘭嶼",
            "money" => 12000,
            "email" => "C109193104@gmail.com",
            "type" => "水肺潛水",
            "license" => "有",
            "people_limit" => 8,
            "people_number" => 5,
        ]);

        Partner::create([
            "name" => "鄭美美",
            "group_time" => "2023-08-24",
            "location" => "綠島",
            "money" => 400,
            "email" => "C109193105@gmail.com",
            "type" => "浮潛",
            "license" => "無",
            "people_limit" => 10,
            "people_number" => 4,
        ]);

        Partner::create([
            "name" => "何東東",
            "group_time" => "2023-11-08",
            "location" => "墾丁",
            "money" => 15000,
            "email" => "C109193106@gmail.com",
            "type" => "自由潛水",
            "license" => "有",
            "people_limit" => 6,
            "people_number" => 3,
        ]);

        Partner::create([
            "name" => "胡喃喃",
            "group_time" => "2023-10-01",
            "location" => "小琉球",
            "money" => 2500,
            "email" => "C109193107@gmail.com",
            "type" => "水肺潛水",
            "license" => "無",
            "people_limit" => 8,
            "people_number" => 6,
        ]);

        Partner::create([
            "name" => "曾咚咚",
            "group_time" => "2023-08-25",
            "location" => "綠島",
            "money" => 13000,
            "email" => "C109193108@gmail.com",
            "type" => "自由潛水",
            "license" => "有",
            "people_limit" => 6,
            "people_number" => 4,
        ]);
    }
}
