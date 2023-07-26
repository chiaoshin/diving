<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chatgpt;

class ChatgptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chatgpt::create([
            "keyword" => "小琉球龍蝦洞",
            "respond" => "潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！",
        ]);

        Chatgpt::create([
            "keyword" => "萬里桐潛水區",
            "respond" => "介紹：\n
            恆春萬里桐這裡有海底景觀豐富多元著超美的漸層式海水、清澈見底的礁石海岸、色彩繽紛且種類眾多的珊瑚礁群生物，吸引眾多潛水愛好者前來，不論是單純戲水，或者是香蕉船、衝浪等水上活動，許多內行人想要潛水，就會轉往萬里桐的海灘。\n
            注意事項：\n
            1.	最大深度約 22 米\n
            2.穿拖鞋的人要小心這裡都是珊瑚礁的岩石，很容易刮傷流血
            ",
        ]);

        // 多筆假資料塞法
        // $data =[[]];

        // foreach ($data as $row) {
        //     Chatgpt::create($row);
        // }
    }
}
