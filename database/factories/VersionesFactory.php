<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Versiones;
use Faker\Generator as Faker;

$factory->define(Versiones::class, function (Faker $faker) {
    return [
        'id' => $faker->id,
        'versiones' => $faker->versiones,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
