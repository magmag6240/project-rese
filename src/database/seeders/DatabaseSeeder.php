<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PrefectureSeeder;

class DatabaseSeeder extends Seeder
{
    private const SEEDERS = [
        PrefectureSeeder::class,
        GenreSeeder::class,
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