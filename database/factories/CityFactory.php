<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'country_id' => function(){
            return App\Model\Country::all()->random();
        },
    ];
});
