<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'shop_id' => '1', 'menu_name' => '松', 'price' => '3000'],
            ['id' => 2, 'shop_id' => '1', 'menu_name' => '竹', 'price' => '5000'],
            ['id' => 3, 'shop_id' => '1', 'menu_name' => '梅', 'price' => '8000'],
            ['id' => 4, 'shop_id' => '2', 'menu_name' => '並', 'price' => '2500'],
            ['id' => 5, 'shop_id' => '2', 'menu_name' => '上', 'price' => '5000'],
            ['id' => 6, 'shop_id' => '2', 'menu_name' => '特上', 'price' => '7000'],
            ['id' => 7, 'shop_id' => '3', 'menu_name' => '萩', 'price' => '4000'],
            ['id' => 8, 'shop_id' => '3', 'menu_name' => '葛', 'price' => '6000'],
            ['id' => 9, 'shop_id' => '3', 'menu_name' => '撫子', 'price' => '10000'],
            ['id' => 10, 'shop_id' => '4', 'menu_name' => 'uno', 'price' => '2000'],
            ['id' => 11, 'shop_id' => '4', 'menu_name' => 'due', 'price' => '5000'],
            ['id' => 12, 'shop_id' => '4', 'menu_name' => 'tre', 'price' => '7000'],
            ['id' => 13, 'shop_id' => '6', 'menu_name' => '並', 'price' => '2500'],
            ['id' => 14, 'shop_id' => '6', 'menu_name' => '上', 'price' => '5000'],
            ['id' => 15, 'shop_id' => '6', 'menu_name' => '特上', 'price' => '7000'],
            ['id' => 16, 'shop_id' => '7', 'menu_name' => 'uno', 'price' => '2000'],
            ['id' => 17, 'shop_id' => '7', 'menu_name' => 'due', 'price' => '5000'],
            ['id' => 18, 'shop_id' => '7', 'menu_name' => 'tre', 'price' => '7000'],
            ['id' => 19, 'shop_id' => '9', 'menu_name' => '萩', 'price' => '4000'],
            ['id' => 20, 'shop_id' => '9', 'menu_name' => '葛', 'price' => '6000'],
            ['id' => 21, 'shop_id' => '9', 'menu_name' => '撫子', 'price' => '10000'],
            ['id' => 22, 'shop_id' => '10', 'menu_name' => '松', 'price' => '3000'],
            ['id' => 23, 'shop_id' => '10', 'menu_name' => '竹', 'price' => '5000'],
            ['id' => 24, 'shop_id' => '10', 'menu_name' => '梅', 'price' => '8000'],
            ['id' => 25, 'shop_id' => '11', 'menu_name' => '並', 'price' => '2500'],
            ['id' => 26, 'shop_id' => '11', 'menu_name' => '上', 'price' => '5000'],
            ['id' => 27, 'shop_id' => '11', 'menu_name' => '特上', 'price' => '7000'],
            ['id' => 28, 'shop_id' => '12', 'menu_name' => '並', 'price' => '2500'],
            ['id' => 29, 'shop_id' => '12', 'menu_name' => '上', 'price' => '5000'],
            ['id' => 30, 'shop_id' => '12', 'menu_name' => '特上', 'price' => '7000'],
            ['id' => 31, 'shop_id' => '13', 'menu_name' => '萩', 'price' => '4000'],
            ['id' => 32, 'shop_id' => '13', 'menu_name' => '葛', 'price' => '6000'],
            ['id' => 33, 'shop_id' => '13', 'menu_name' => '撫子', 'price' => '10000'],
            ['id' => 34, 'shop_id' => '14', 'menu_name' => '松', 'price' => '3000'],
            ['id' => 35, 'shop_id' => '14', 'menu_name' => '竹', 'price' => '5000'],
            ['id' => 36, 'shop_id' => '14', 'menu_name' => '梅', 'price' => '8000'],
            ['id' => 37, 'shop_id' => '16', 'menu_name' => '萩', 'price' => '4000'],
            ['id' => 38, 'shop_id' => '16', 'menu_name' => '葛', 'price' => '6000'],
            ['id' => 39, 'shop_id' => '16', 'menu_name' => '撫子', 'price' => '10000'],
            ['id' => 40, 'shop_id' => '17', 'menu_name' => '松', 'price' => '3000'],
            ['id' => 41, 'shop_id' => '17', 'menu_name' => '竹', 'price' => '5000'],
            ['id' => 42, 'shop_id' => '17', 'menu_name' => '梅', 'price' => '8000'],
            ['id' => 43, 'shop_id' => '18', 'menu_name' => '並', 'price' => '2500'],
            ['id' => 44, 'shop_id' => '18', 'menu_name' => '上', 'price' => '5000'],
            ['id' => 45, 'shop_id' => '18', 'menu_name' => '特上', 'price' => '7000'],
            ['id' => 46, 'shop_id' => '19', 'menu_name' => 'uno', 'price' => '2000'],
            ['id' => 47, 'shop_id' => '19', 'menu_name' => 'due', 'price' => '5000'],
            ['id' => 48, 'shop_id' => '19', 'menu_name' => 'tre', 'price' => '7000'],
            ['id' => 49, 'shop_id' => '20', 'menu_name' => '松', 'price' => '3000'],
            ['id' => 50, 'shop_id' => '20', 'menu_name' => '竹', 'price' => '5000'],
            ['id' => 51, 'shop_id' => '20', 'menu_name' => '梅', 'price' => '8000'],
        ];
        DB::table('menus')->insert($params);
    }
}
