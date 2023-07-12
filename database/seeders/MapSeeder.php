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
        Index::create([
            "location" => "花瓶岩",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉",
            "lat" => 22.35541851,
            "lng" => 120.38165,
            "description" => "無",
        ]);

        Index::create([
            "location" => "中澳",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉三民路124號",
            "lat" => 22.35122843,
            "lng" => 120.3875026,
            "description" => "無",
        ]);

        Index::create([
            "location" => "電廠",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉仁愛路1之11號",
            "lat" => 22.33871866,
            "lng" => 120.3778391,
            "description" => "無",
        ]);

        Index::create([
            "location" => "厚石",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉",
            "lat" => 22.32456304,
            "lng" => 120.3653352,
            "description" => "無",
        ]);

        Index::create([
            "location" => "海子口",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉",
            "lat" => 22.32539109,
            "lng" => 120.3591294,
            "description" => "無",
        ]);

        Index::create([
            "location" => "多仔坪",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉",
            "lat" => 22.35014315,
            "lng" => 120.3654971,
            "description" => "無",
        ]);

        Index::create([
            "location" => "龍蝦洞",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉",
            "lat" => 22.34506537,
            "lng" => 120.3884634,
            "description" => "無",
        ]);

        Index::create([
            "location" => "衫福",
            "area" => "小琉球",
            "address" => "929屏東縣琉球鄉",
            "lat" => 22.34224709,
            "lng" => 120.3629457,
            "description" => "無",
        ]);
    }
}
