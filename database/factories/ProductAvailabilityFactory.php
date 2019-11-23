<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\ProductAvailability;
use Faker\Generator as Faker;

$factory->define(ProductAvailability::class, function (Faker $faker) {
    $products = Product::all()->pluck('id')->reject(function ($value) {
        return $value == 1;
    })->toArray();

    return [
        'product_id' => $faker->randomElement($products),
        'date_start' => $faker->dateTimeBetween('-30 days', '-1 day'),
        'date_end' => $faker->dateTimeBetween('now', '+30 days')
    ];
});

$factory->state(ProductAvailability::class, 'first', function (Faker $faker) {
    return [
        'product_id' => 1
    ];
});
