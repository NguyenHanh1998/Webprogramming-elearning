<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Category::class, 400)->create();
		$faker = Faker\Factory::create();
        DB::table('categories')->insert([
            'name' => 'Agriculture',
			'description' => $faker->sentence(2)
        ]);
        DB::table('categories')->insert([
            'name' => 'Architecture',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'Dancing',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'IT',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'Business',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'Design',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'Marketing',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'Psychology',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'Legal',
			'description' => $faker->sentence(2)
        ]);
		DB::table('categories')->insert([
            'name' => 'DJ',
			'description' => $faker->sentence(2)
        ]);
		
    }
}
