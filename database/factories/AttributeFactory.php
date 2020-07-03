<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Attribute;
use Faker\Generator as Faker;

$factory->define(Attribute::class, function (Faker $faker) {
    return [
        'code' => $faker->sentence(1),
        'name' => $faker->sentence(2),
        'frontend_type' =>'show',
        'is_filterable' =>true,
        'is_required' =>true,
    ];
});
