<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PrefectureSeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\BusinessHourSeeder;
use Database\Seeders\ShopSeeder;
use Database\Seeders\BusinessHourShopSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\StarSeeder;

class DatabaseSeeder extends Seeder
{
    private const SEEDERS = [
        UserSeeder::class,
        PrefectureSeeder::class,
        GenreSeeder::class,
        StarSeeder::class,
        BusinessHourSeeder::class,
        ShopSeeder::class,
        BusinessHourShopSeeder::class,
        MenuSeeder::class
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