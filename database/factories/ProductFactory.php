<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->reject(function ($value) {
        return $value == 1;
    })->toArray();

    return [
        'user_id' => $faker->randomElement($users),
        //'slug' => $faker->slug(5),
        'name' => $faker->sentence(),
        'desc' => $faker->paragraph(20),
        'price' => $faker->randomFloat(2, 0, 1000),
        'premium' => (bool) rand(0, 1),
        'visible' => (bool) rand(0, 1)
    ];
});
