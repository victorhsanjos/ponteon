<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\pt_BR\PhoneNumber;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $faker->addProvider(new PhoneNumber($faker));

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cellphone' => $faker->unique()->cellphoneNumber(false),
        'city_id' => function () {
            return factory(City::class)->create()->id;
        }
    ];
});
