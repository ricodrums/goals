<?php

use App\Goal;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker();

        for ($i = 0; $i < 50; $i++) {
            $goal = new Goal([
                'title' => 'Title: '.Str::random(5),
                'description' => Str::random(25),
                'goal' => rand(100000, 9999999),
                'saved' => rand(0, 100000),
                'last' => 0,
                'limit_day' => now(),
                'user_id' => 1,
            ]);
            $goal->save();
        }
    }
}
