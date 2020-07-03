<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'brand' => $faker->sentence(1),
        'sku' => $faker->sentence(1),
        'name' => $faker->sentence(2),
        'slug' => $faker->word,
        'description' => $faker->sentence(20),
        'quantity' => $faker->numberBetween(100, 500),
        'weight' => $faker->numberBetween(100, 5000),
        'price' => $faker->numberBetween(100, 5000),
        'sale_price' => $faker->numberBetween(100, 5000),
        'status' => true,
        'featured' => true,

        'shop_id' => function(){
            return App\Model\Shop::all()->random();
        },
        'rating' => $faker->numberBetween(1, 5),
    ];
});
