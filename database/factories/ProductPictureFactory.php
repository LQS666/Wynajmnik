<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\ProductPicture;
use Faker\Generator as Faker;

$factory->define(ProductPicture::class, function (Faker $faker) {
    $products = Product::all()->pluck('id')->reject(function ($value) {
        return $value == 1;
    })->toArray();

    return [
        'product_id' => $faker->randomElement($products),
        'name' => $faker->word(),
        //'alt' => $faker->words(1, 5),
        'file' => $faker->imageUrl(1200, 800) // $faker->image('public/storage/products', 640, 480, null, false)
    ];
});

$factory->state(ProductPicture::class, 'first', function (Faker $faker) {
    return [
        'product_id' => 1
    ];
});
