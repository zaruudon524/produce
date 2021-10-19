<?php

use Illuminate\Database\Seeder;

class PrefsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefs = [
            ['place_id' => 1, 'name' => '北海道'],
            ['place_id' => 2, 'name' => '青森県'],
            ['place_id' => 3, 'name' => '岩手県'],
            ['place_id' => 4, 'name' => '宮城県'],
            ['place_id' => 5, 'name' => '秋田県'],
            ['place_id' => 6, 'name' => '山形県'],
            ['place_id' => 7, 'name' => '福島県'],
            ['place_id' => 8, 'name' => '茨城県'],
            ['place_id' => 9, 'name' => '栃木県'],
            ['place_id' => 10, 'name' => '群馬県'],
            ['place_id' => 11, 'name' => '埼玉県'],
            ['place_id' => 12, 'name' => '千葉県'],
            ['place_id' => 13, 'name' => '東京都'],
            ['place_id' => 14, 'name' => '神奈川県'],
            ['place_id' => 15, 'name' => '新潟県'],
            ['place_id' => 16, 'name' => '富山県'],
            ['place_id' => 17, 'name' => '石川県'],
            ['place_id' => 18, 'name' => '福井県'],
            ['place_id' => 19, 'name' => '山梨県'],
            ['place_id' => 20, 'name' => '長野県'],
            ['place_id' => 21, 'name' => '岐阜県'],
            ['place_id' => 22, 'name' => '静岡県'],
            ['place_id' => 23, 'name' => '愛知県'],
            ['place_id' => 24, 'name' => '三重県'],
            ['place_id' => 25, 'name' => '滋賀県'],
            ['place_id' => 26, 'name' => '京都府'],
            ['place_id' => 27, 'name' => '大阪府'],
            ['place_id' => 28, 'name' => '兵庫県'],
            ['place_id' => 29, 'name' => '奈良県'],
            ['place_id' => 30, 'name' => '和歌山県'],
            ['place_id' => 31, 'name' => '鳥取県'],
            ['place_id' => 32, 'name' => '島根県'],
            ['place_id' => 33, 'name' => '岡山県'],
            ['place_id' => 34, 'name' => '広島県'],
            ['place_id' => 35, 'name' => '山口県'],
            ['place_id' => 36, 'name' => '徳島県'],
            ['place_id' => 37, 'name' => '香川県'],
            ['place_id' => 38, 'name' => '愛媛県'],
            ['place_id' => 39, 'name' => '高知県'],
            ['place_id' => 40, 'name' => '福岡県'],
            ['place_id' => 41, 'name' => '佐賀県'],
            ['place_id' => 42, 'name' => '長崎県'],
            ['place_id' => 43, 'name' => '熊本県'],
            ['place_id' => 44, 'name' => '大分県'],
            ['place_id' => 45, 'name' => '宮崎県'],
            ['place_id' => 46, 'name' => '鹿児島県'],
            ['place_id' => 47, 'name' => '沖縄県'],
        ];
        DB::table('prefs')->insert($prefs);
    }
}
