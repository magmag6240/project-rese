<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 8001, 'name' => '虎杖 悠仁', 'role' => 'shop_manager', 'email' => 'yuji.itadori@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8002, 'name' => '伏黒 恵', 'role' => 'shop_manager', 'email' => 'megumi.hishiguro@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8003, 'name' => '釘崎 野薔薇', 'role' => 'shop_manager', 'email' => 'nobara.kugisaki@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8004, 'name' => '禪院 真希', 'role' => 'shop_manager', 'email' => 'maki.zenin@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8005, 'name' => '狗巻 棘', 'role' => 'shop_manager', 'email' => 'toge.inumaki@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8006, 'name' => 'パンダ', 'role' => 'shop_manager', 'email' => 'panda@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8007, 'name' => '乙骨 憂太', 'role' => 'shop_manager', 'email' => 'yuta.okkotu@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8008, 'name' => '東堂 葵', 'role' => 'shop_manager', 'email' => 'aoi.takada@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8009, 'name' => '加茂 憲紀', 'role' => 'shop_manager', 'email' => 'noritoshi.kamo@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8010, 'name' => '西宮 桃', 'role' => 'shop_manager', 'email' => 'momo.nishimiya@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8011, 'name' => '与 幸吉', 'role' => 'shop_manager', 'email' => 'kouichi.muta@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8012, 'name' => '禪院 真依', 'role' => 'shop_manager', 'email' => 'mai.zenin@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8013, 'name' => '三輪 霞', 'role' => 'shop_manager', 'email' => 'kasumi.miwa@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8014, 'name' => '五条 悟', 'role' => 'shop_manager', 'email' => 'satoru.gojyo@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8015, 'name' => '七海 建人', 'role' => 'shop_manager', 'email' => 'kento.nanami@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8016, 'name' => '夏油 傑', 'role' =>'shop_manager', 'email' => 'suguru.geto@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8017, 'name' => '灰原 雄', 'role' => 'shop_manager', 'email' => 'yu.haibara@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8018, 'name' => '家入 硝子', 'role' => 'shop_manager', 'email' => 'shoko.ieiri@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8019, 'name' => '冥冥', 'role' => 'shop_manager', 'email' => 'meimei@example.com', 'password' => '1qaz2wsx'],
            ['id' => 8020, 'name' => '庵 歌姫', 'role' => 'shop_manager', 'email' => 'utahime.iori@example.com', 'password' => '1qaz2wsx'],
            ['id' => 9001, 'name' => '佐々井 麻衣', 'role' => 'admin', 'email' => 'mai.sasai@example.com', 'password' => '1qaz2wsx']
        ];
        DB::table('users')->insert($params);
    }
}
