<?php

use App\Models\TeacherCourse;
use Illuminate\Database\Seeder;

class TeacherCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TeacherCourse::class, 5)->create();
    }
}