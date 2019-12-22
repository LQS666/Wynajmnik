<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'sub' => null,
        'name' => $faker->sentences(3, true),
        'desc' => $faker->text(200),
        'visible' => true
    ];
});

$factory->state(Category::class, 'Sub1', function (Faker $faker) {
    return [
        'sub' => 1
    ];
});

$factory->state(Category::class, 'Sub2', function (Faker $faker) {
    return [
        'sub' => 2
    ];
});
