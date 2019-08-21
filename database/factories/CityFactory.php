<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\State;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'state_id' => function () {
            return factory(State::class)->create()->id;
        }
    ];
});
