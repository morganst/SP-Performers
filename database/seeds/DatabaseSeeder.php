<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Note;
use App\Classes;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        for ($i = 0; $i < 10; $i++) {
            Classes::create([
                'name' => $faker->randomElement(['Dance','Art', 'Music']),
                'limit' => $faker->numberBetween(10,20),
                'time' => $faker->time($format = 'H:i'),
                'location' => $faker->randomElement(['DCPS','Juvi','other']),
            ]);
        }

        for ($i = 0; $i < 50; $i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            Student::create([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'fullName' => $firstName . ' ' . $lastName,
                'DOB' => $faker->date,
                'primaryClass' => $faker->realText(20)
            ]);
        }
    }
}
