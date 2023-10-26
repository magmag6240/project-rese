<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'genre_name' => '寿司'],
            ['id' => 2, 'genre_name' => '焼肉'],
            ['id' => 3, 'genre_name' => '居酒屋'],
            ['id' => 4, 'genre_name' => 'イタリアン'],
            ['id' => 5, 'genre_name' => 'ラーメン'],
        ];
        DB::table('genres')->insert($params);
    }
}
