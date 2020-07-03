<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Attribute_value;
use Faker\Generator as Faker;

$factory->define(Attribute_value::class, function (Faker $faker) {
    return [
        'value' => $faker->word,
        'price' =>$faker->numberBetween(100, 500),
        'attribute_id' => function(){
            return App\Model\Attribute::all()->random();
        },
    ];
});
