<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
        'taro' => '太郎',
        'hanako' => '花子'
        ];
        
        foreach ($names as $name_en => $name_jp) {

            \App\User::create([
                'name' => $name_jp,
                'email' => $name_en .'@example.com',
                'password' => bcrypt('xxxxxxxx')
            ]);
                }
        }
    }