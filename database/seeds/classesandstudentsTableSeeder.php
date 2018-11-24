<?php

use Illuminate\Database\Seeder;
use App\ClassAndStudents;
class classesandstudentsTableSeeder extends Seeder
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
            ClassAndStudents::create([
                'classID' => $faker->numberBetween($min = 1, $max = 54)  ,
                'studentID' => $faker->numberBetween($min = 1, $max = 54)   
            ]);
        }
    }
}
