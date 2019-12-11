<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $user = $faker->randomElement($users);
    $products = Product::whereNotIn('user_id', [$user, 1])->get()->pluck('id')->toArray();

    return [
        'user_id' => $user,
        'product_id' => $faker->randomElement($products),
        'desc' => $faker->paragraph(20),
        'price' => $faker->randomFloat(2, 0, 1000),
        'date_start' => $faker->dateTimeBetween('-30 days', 'now'),
        'date_end' => $faker->dateTimeBetween('now', '+30 days'),
        'accepted_at' => null,
        'rejected_at' => null
    ];
});

$factory->state(Offer::class, 'first', function (Faker $faker) {
    $users = User::all()->pluck('id')->reject(function ($value) {
        return $value == 1;
    })->toArray();
    $user = $faker->randomElement($users);

    $products = Product::where('user_id', 1)->get()->pluck('id')->toArray();

    return [
        'user_id' => $user,
        'product_id' => $faker->randomElement($products)
    ];
});
