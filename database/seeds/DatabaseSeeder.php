<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PrefsTableSeeder::class);
        $this->call(MuseumsTableSeeder::class);
        $this->call(MuseumkindsTableSeeder::class);
        // $this->call(SurveysTableSeeder::class);
    }
}
