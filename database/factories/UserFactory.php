<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => $faker->randomElement(array(1, 2)),
        'email_verified_at' => now(),
        'password' => bcrypt("123456"),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'),
        'balance' => $faker->randomFloat(3, 0, 2000)
    ];
});
