<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Audiochannel;
use Faker\Generator as Faker;

$factory->define(Audiochannel::class, function (Faker $faker) {
    return [
        'id' => $faker->id,
        'audiochannels' => $faker->audiochannels,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
