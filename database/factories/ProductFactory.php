<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Product;
use App\UserAddress;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->reject(function ($value) {
        return $value == 1;
    })->toArray();

    $user = $faker->randomElement($users);
    $user_addresses = UserAddress::user($user)->get()->pluck('id')->toArray();

    return [
        'user_id' => $user,
        'user_address_id' => $faker->randomElement($user_addresses),
        //'slug' => $faker->slug(5),
        'name' => $faker->sentence(),
        'desc' => $faker->paragraph(20),
        'price' => $faker->randomFloat(2, 0, 1000),
        'premium' => (bool) rand(0, 1),
        'visible' => (bool) rand(0, 1)
    ];
});

$factory->state(Product::class, 'first', function (Faker $faker) {
    return [
        'user_id' => 1,
        'user_address_id' => 1
    ];
});
