<?php

use App\Goal;
use Illuminate\Database\Seeder;
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
        $user = 1;
        for ($i = 0; $i < 100; $i++) {
            $goal = new Goal([
                'title' => 'Goal: '.Str::random(5)."__". ($i + 1),
                'description' => Str::random(25),
                'goal' => rand(100000, 9999999),
                'saved' => rand(0, 100000),
                'last' => 0,
                'limit_day' => date_create((2000 + $i).'-12-31'),
                'user_id' => $user,
                'daily_pay' => rand(0, 10000),
            ]);
            $goal->save();
            ($user == 1) ? $user = 2 : $user = 1;
        }
    }
}
