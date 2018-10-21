<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        for ($i = 0; $i < 50; $i++) {
            Student::create([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
            ]);
        }
    }
}
