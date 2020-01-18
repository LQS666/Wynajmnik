<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'name' => $faker->sentences(3, true),
        'content' => $faker->paragraph(20),
        'author' => $faker->firstNameMale . ' ' . $faker->lastName,
        'visible' => (bool) rand(0, 1),
    ];
});
