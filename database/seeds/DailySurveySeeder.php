<?php

use Illuminate\Database\Seeder;
use App\DailySurvey;

class DailySurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        for ($i = 0; $i < 300; $i++) {
            DailySurvey::create([
                'ClassID' => $faker->numberBetween(1,2),
                'StudentID' => $faker->numberBetween(1,49),
                'Q1' => $faker->numberBetween(1,5),
                'Q2' => $faker->numberBetween(1,5),
                'Q3' => $faker->numberBetween(1,5),
                'Q4' => $faker->numberBetween(1,5),
                'Q5' => $faker->numberBetween(1,5),
                'mood' => $faker->numberBetween(1,11),
                'date' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null)->format('Y-m-d')
            ]);
        }
    }
}
