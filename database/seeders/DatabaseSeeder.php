<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StoreSeeder::class,
            PartnerSeeder::class,
            MapSeeder::class,
            HotelSeeder::class,
            ShopSeeder::class,
            LawSeeder::class,
            ChatgptSeeder::class,
            UserSeeder::class,
            DangerAreaSeeder::class
        ]);
    }
}
