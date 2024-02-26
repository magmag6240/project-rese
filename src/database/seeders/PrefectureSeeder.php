<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'pref_name' => '東京都'],
            ['id' => 2, 'pref_name' => '大阪府'],
            ['id' => 3, 'pref_name' => '福岡県'],
        ];
        DB::table('prefectures')->insert($params);
    }
}
