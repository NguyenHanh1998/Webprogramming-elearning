<?php

use App\Models\StudentCourse;
use Illuminate\Database\Seeder;

class StudentCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StudentCourse::class, 100)->create();
    }
}
