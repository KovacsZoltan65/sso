<?php

namespace Database\Seeders;

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
        $users = [
            [
                'id' => 1,
                'name' => 'SSO Admin',
                'email' => 'sso_admin@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'id' => 2,
                'name' => 'Dr Gruit Katalin',
                'email' => 'gruiz@downalapitvany.hu',
                'password' => bcrypt('password'),
            ],
        ];

        \App\Models\User::insert($users);
    }
}
