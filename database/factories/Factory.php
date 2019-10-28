<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->text(40),
        'description' => $faker->sentence(2)
    ];
});

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(6),
        'fee' => $faker->numberBetween(19, 199),
        /* khi nao lam frontend thi fix size o cho 100x100 */
        'cover' => 'https://via.placeholder.com/100x100',
        'ava' => 'https://via.placeholder.com/100x100',
        'description' => json_encode($faker->sentences(6, false)),
        'requirement' => json_encode($faker->sentences(4, false)),
        'learnable' => json_encode($faker->sentences(10, false)),
    ];
});
