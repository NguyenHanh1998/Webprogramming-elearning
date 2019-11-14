<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Course;
use App\Models\Comment;
use App\Models\CourseCategory;
use App\Models\StudentCourse;
use App\Models\TeacherCourse;
use App\Models\Video;

use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->text(40),
        'description' => $faker->sentence(2)
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(2,102),
        'content' => $faker->sentence(4),
		'tag' => $faker->numberBetween(2,102)
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
        'user_id' => $faker->numberBetween(3, 4)
    ];
});

$factory->define(CourseCategory::class, function (Faker $faker) {
    return [
        'course_id' => $faker->numberBetween(1,200),
        'category_id' => $faker->numberBetween(1,10)
    ];
});

$factory->define(StudentCourse::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'course_id' => $faker->numberBetween(1,200),
		'enrolled_date' => $faker->dateTimeBetween('-10 years', 'now')
    ];
});

$factory->define(TeacherCourse::class, function (Faker $faker) {
    return [
        'teacher_id' => 2,
        'course_id' => $faker->numberBetween(1,200)
    ];
});
$factory->define(Video::class, function (Faker $faker) {
    return [
        'course_id' => $faker->numberBetween(1,200),
    ];
});
