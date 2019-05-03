<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'first_name'    => 'super',
            'last_name'     => 'admin',
            'email'         => 'superadmin@site.com',
            'password'      => bcrypt('123456'),
            'image'         => 'default-user.jpg'
        ]);

        $user->attachRole('super_admin');

    }
}
