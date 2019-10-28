<?php

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CourseCategory::class, 20)->create();
    }
}
