<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'stars' => '★'],
            ['id' => 2, 'stars' => '★★'],
            ['id' => 3, 'stars' => '★★★'],
            ['id' => 4, 'stars' => '★★★★'],
            ['id' => 5, 'stars' => '★★★★★'],
        ];
        DB::table('stars')->insert($params);
    }
}
