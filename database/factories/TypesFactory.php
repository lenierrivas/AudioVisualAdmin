<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Types;
use Faker\Generator as Faker;

$factory->define(Types::class, function (Faker $faker) {
    return [
        'id' => $faker->id,
        'types' => $faker->types,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
