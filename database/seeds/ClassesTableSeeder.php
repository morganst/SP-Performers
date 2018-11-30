<?php

use Illuminate\Database\Seeder;
use App\Classes;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            ]);
        }
    }
}
