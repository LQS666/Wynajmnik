<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserAddress;
use Faker\Generator as Faker;

$factory->define(UserAddress::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->reject(function ($value) {
        return $value == 1;
    })->toArray();

    return [
        'user_id' => $faker->randomElement($users),
        'street' => $faker->streetName,
        'home_number' => $faker->buildingNumber,
        'apartment_number' => $faker->buildingNumber,
        'city' => $faker->city,
        'zip_code' => $faker->postcode
    ];
});

$factory->state(UserAddress::class, 'first', function (Faker $faker) {
    return [
        'user_id' => 1
    ];
});
