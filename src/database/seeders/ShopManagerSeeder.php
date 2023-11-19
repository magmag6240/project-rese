<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'name' => '虎杖 悠仁', 'email' => 'yuji.itadori@example.com', 'password' => Hash::make('password')],
            ['id' => 2, 'name' => '伏黒 恵', 'email' => 'megumi.fushiguro@example.com', 'password' => Hash::make('password')],
            ['id' => 3, 'name' => '釘崎 野薔薇', 'email' => 'nobara.kugisaki@example.com', 'password' => Hash::make('password')],
            ['id' => 4, 'name' => '禪院 真希', 'email' => 'maki.zenin@example.com', 'password' => Hash::make('password')],
            ['id' => 5, 'name' => '狗巻 棘', 'email' => 'toge.inumaki@example.com', 'password' => Hash::make('password')],
            ['id' => 6, 'name' => 'パンダ', 'email' => 'panda@example.com', 'password' => Hash::make('password')],
            ['id' => 7, 'name' => '乙骨 憂太', 'email' => 'yuta.okkotu@example.com', 'password' => Hash::make('password')],
            ['id' => 8, 'name' => '三輪 霞', 'email' => 'kasumi.miwa@example.com', 'password' => Hash::make('password')],
            ['id' => 9, 'name' => '東堂 葵', 'email' => 'takada.todo@example.com', 'password' => Hash::make('password')],
            ['id' => 10, 'name' => '禪院 真依', 'email' => 'mai.zenin@example.com', 'password' => Hash::make('password')],
            ['id' => 11, 'name' => '西宮 桃', 'email' => 'momo.nishimiya@example.com', 'password' => Hash::make('password')],
            ['id' => 12, 'name' => '与 幸吉', 'email' => 'kokichi.yota@example.com', 'password' => Hash::make('password')],
            ['id' => 13, 'name' => '加茂 憲紀', 'email' => 'noritoshi.kamo@example.com', 'password' => Hash::make('password')],
            ['id' => 14, 'name' => '五条 悟', 'email' => 'satoru.gojyo@example.com', 'password' => Hash::make('password')],
            ['id' => 15, 'name' => '夏油 傑', 'email' => 'suguru.geto@example.com', 'password' => Hash::make('password')],
            ['id' => 16, 'name' => '家入 硝子', 'email' => 'shoko.ieiri@example.com', 'password' => Hash::make('password')],
            ['id' => 17, 'name' => '冥冥', 'email' => 'meimei@example.com', 'password' => Hash::make('password')],
            ['id' => 18, 'name' => '庵 歌姫', 'email' => 'utahime.iori@example.com', 'password' => Hash::make('password')],
            ['id' => 19, 'name' => '七海 建人', 'email' => 'kento.nanami@example.com', 'password' => Hash::make('password')],
            ['id' => 20, 'name' => '灰原 雄', 'email' => 'yu.haibara@example.com', 'password' => Hash::make('password')]
        ];
        DB::table('shop_managers')->insert($params);
    }
}
