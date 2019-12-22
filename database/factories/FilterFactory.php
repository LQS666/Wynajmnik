<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Filter;
use Faker\Generator as Faker;

$factory->define(Filter::class, function (Faker $faker) {
    $types = ['text', 'int', 'decimal'];

    return [
        'name' => $faker->sentences(2, true),
        'type' => $faker->randomElement($types),
        'visible' => true
    ];
});
