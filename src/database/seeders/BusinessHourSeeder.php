<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'business_hour' => '01:00:00'],
            ['id' => 2, 'business_hour' => '02:00:00'],
            ['id' => 3, 'business_hour' => '03:00:00'],
            ['id' => 4, 'business_hour' => '04:00:00'],
            ['id' => 5, 'business_hour' => '05:00:00'],
            ['id' => 6, 'business_hour' => '06:00:00'],
            ['id' => 7, 'business_hour' => '07:00:00'],
            ['id' => 8, 'business_hour' => '08:00:00'],
            ['id' => 9, 'business_hour' => '09:00:00'],
            ['id' => 10, 'business_hour' => '10:00:00'],
            ['id' => 11, 'business_hour' => '11:00:00'],
            ['id' => 12, 'business_hour' => '12:00:00'],
            ['id' => 13, 'business_hour' => '13:00:00'],
            ['id' => 14, 'business_hour' => '14:00:00'],
            ['id' => 15, 'business_hour' => '15:00:00'],
            ['id' => 16, 'business_hour' => '16:00:00'],
            ['id' => 17, 'business_hour' => '17:00:00'],
            ['id' => 18, 'business_hour' => '18:00:00'],
            ['id' => 19, 'business_hour' => '19:00:00'],
            ['id' => 20, 'business_hour' => '20:00:00'],
            ['id' => 21, 'business_hour' => '21:00:00'],
            ['id' => 22, 'business_hour' => '22:00:00'],
            ['id' => 23, 'business_hour' => '23:00:00'],
            ['id' => 24, 'business_hour' => '24:00:00'],
        ];
        DB::table('business_hours')->insert($params);
    }
}
