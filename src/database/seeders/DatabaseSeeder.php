<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PrefectureSeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\BusinessHourSeeder;
use Database\Seeders\ShopSeeder;
use Database\Seeders\BusinessHourShopSeeder;

class DatabaseSeeder extends Seeder
{
    private const SEEDERS = [
        PrefectureSeeder::class,
        GenreSeeder::class,
        BusinessHourSeeder::class,
        ShopSeeder::class,
        BusinessHourShopSeeder::class
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::SEEDERS as $seeder) {
            $this->call($seeder);
        }
    }
}