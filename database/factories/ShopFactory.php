<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->sentence(20),
        'user_id' => function(){
            return App\User::all()->random();
        },
        'rating' => $faker->numberBetween(1, 5),
    ];
});
