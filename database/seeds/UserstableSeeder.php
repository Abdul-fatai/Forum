<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@forum.ly',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name' => 'Chris Patrick',
            'password' => bcrypt('chris'),
            'email' => 'chris@gmail.com',
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
