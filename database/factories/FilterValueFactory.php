<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Filter;
use App\FilterValue;
use Faker\Generator as Faker;

$factory->define(FilterValue::class, function (Faker $faker) {
    $filters = Filter::all('id', 'type')->toArray();

    $filter = $faker->randomElement($filters);
    $value = null;

    switch ($filter['type'])
    {
        case 'text' : {
            $value = $faker->words(3, true);
        } break;
        case 'int' : {
            $value = $faker->randomNumber(4);
        } break;
        case 'decimal' : {
            $value = $faker->randomFloat(2, 0, 8);
        } break;
    }

    return [
        'filter_id' => $filter['id'],
        'value' => $value
    ];
});
