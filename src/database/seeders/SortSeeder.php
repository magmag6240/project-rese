<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'kind_of_sort' => 'ランダム'],
            ['id' => 2, 'kind_of_sort' => '評価が高い順'],
            ['id' => 3, 'kind_of_sort' => '評価が低い順'],
        ];
        DB::table('sorts')->insert($params);
    }
}
