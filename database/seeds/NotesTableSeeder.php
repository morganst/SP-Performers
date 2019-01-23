<?php

use Illuminate\Database\Seeder;
use App\Note;
class NotesTableSeeder extends Seeder
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
            Note::create([
                'Instructor' => $faker->firstName,
                'Class' => $faker->randomElement(['Dance','Art', 'Music']),
                'I/B' => $faker->randomElement(['Incident', 'Breakthrough','None']),
                'Text' => $faker->text($maxNbChars = 200),
                'SID' => $faker->numberBetween($min = 1, $max = 50)
            ]);
        }
    }
}
