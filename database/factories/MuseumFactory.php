<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Museum::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'place' =>$faker->prefecture,
        'body' =>$faker->randomElement($array = ['総合', '歴史・人文', '自然・科学', '美術', '動・水・植']),
        'address' => $faker->streetAddress,
        'time' =>$faker->numberBetween($min = 1, $max = 1000),
        'day' =>$faker->randomNumber($nbDigits = 5),
        'money' =>$faker->numberBetween($min = 100, $max = 3000),
        'traffic' => $faker->lexify($string = '??????'),
        'sns' =>$faker->url,
        'tel' =>$faker->phoneNumber,
        'homepage' =>$faker->url,
        'other' =>$faker->realText($maxNbChars = 50, $indexSize = 2),
        // 'place_id' =>'',
        // 'body_id' =>''
    ];
});
