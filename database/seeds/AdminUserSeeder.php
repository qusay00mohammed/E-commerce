<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'qusay00mohammed',
            'email'    => 'qusay@gmail.com',
            'password' => Hash::make('qusay2001'), // bcrypt('qusay2001'),
            'fullname' => 'qusay mohammed alkahlout',
            'groupId'  => 1,
            'regStatus'=> 1,
        ]);
    }
}
