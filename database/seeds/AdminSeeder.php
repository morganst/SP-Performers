<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        User::create([
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'center' => $faker->state,
            'email' => 'admin@performers.com',
            'password' => 'qwerty',
            'role' => 1,
        ]);
    }
}
