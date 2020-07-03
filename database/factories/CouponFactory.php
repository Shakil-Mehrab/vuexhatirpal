<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'name' =>'friday discount',
        'code' =>'f20',
        'value' =>"-10%",
        'type' =>"discount",
        'description' => 'It is friday discount',
    ];
});
