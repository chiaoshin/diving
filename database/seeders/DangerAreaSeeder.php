<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DangerArea;
use App\Models\DangerAreaPosition;

class DangerAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => '危險海域 1',
                'description' => '<h3>臺南市南區灣裡(含黃金海岸)近岸海域</h3><p>禁止從事所有水域遊憩活動</p>',
                'position' => [
                    [26.2175, 119.979444],
                    [26.2125, 119.984167],
                    [26.203056, 119.971944],
                    [26.204722, 119.970278],
                    [26.21, 119.97]
                ]
            ],
            [
                'title' => '危險海域 2',
                'description' => '<h3>宜蘭縣南澳地區海域</h3><p>禁止水域遊憩活動</p>',
                'position' => [
                    [24.480224, 121.849641],
                    [24.479599, 121.859254],
                    [24.313261, 121.783037], 
                    [24.312948, 121.77308]
                ]
            ]

        ];

        foreach ($data as $key => $row) {
            $danger_area = DangerArea::create([
                'title' => $row['title'],
                'description' => $row['description']
            ]);

            foreach ($row['position'] as $key => $pos_row) {
                DangerAreaPosition::create([
                    'danger_area_id' => $danger_area->id,
                    'lat' => $pos_row[0],
                    'lng' => $pos_row[1]
                ]);
            }
        }
    }
}
