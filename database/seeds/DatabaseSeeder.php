<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\User::class,2)->create();
        // factory(App\Model\Coupon::class,2)->create();
        // factory(App\Model\Shop::class,10)->create();
        // factory(App\Model\Product::class,10)->create();
        // factory(App\Model\Attribute::class,2)->create();
        // factory(App\Model\Attribute_value::class,8)->create();
        factory(App\Model\Country::class,2)->create();
        factory(App\Model\City::class,8)->create();

    }
}
