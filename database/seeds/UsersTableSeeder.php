<?php

use Faker\Provider\ne_NP\Address;
use Faker\Provider\sl_SI\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 0,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'),
            'balance' => $faker->randomFloat(3, 0, 2000)
        ]);
        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'role' => 1,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'),
            'balance' => $faker->randomFloat(3, 0, 2000)
        ]);
        DB::table('users')->insert([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'role' => 2,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'),
            'balance' => $faker->randomFloat(3, 0, 2000)
        ]);
        DB::table('users')->insert([
            'name' => 'teacher2',
            'email' => 'teacher2@gmail.com',
            'role' => 2,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'),
            'balance' => $faker->randomFloat(3, 0, 2000)
        ]);
        factory(App\Models\User::class, 100)->create();
    }
}
