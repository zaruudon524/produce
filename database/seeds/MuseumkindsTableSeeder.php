<?php

use Illuminate\Database\Seeder;

class MuseumkindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $museumkinds = [
            ['body_id' => 1, 'index' => '総合'],
            ['body_id' => 2, 'index' => '歴史・人文'],
            ['body_id' => 3, 'index' => '自然・科学'],
            ['body_id' => 4, 'index' => '美術'],
            ['body_id' => 5, 'index' => '動・水・植']
        ];
        DB::table('museumkinds')->insert($museumkinds);
    }
}
