<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
		$this->call(CategoryTableSeeder::class);
		$this->call(CommentsTableSeeder::class);
		$this->call(CourseCategoriesTableSeeder::class);
		$this->call(StudentCoursesTableSeeder::class);
		$this->call(VideosTableSeeder::class);
		
    }
}
