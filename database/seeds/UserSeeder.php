<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Jhonatan David Rico',
            'email' => 'jdrico59@misena.edu.co',
            'email_verified_at' => now(),
            'password' => '$2y$10$KOfpt.vsq5A3/nXwkkf24.GR4d0LLE/Fg4ZTkj4fdti4IaUMx2iCm',
        ]);
        $user->save();
    }
}
