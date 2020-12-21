<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Yasin Baran',
                'email'          => 'yasin@brnysn.com',
                'password'       => bcrypt('secret'),
                'remember_token' => null,
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 2,
                'name'           => 'ikinci Kullanıcı',
                'email'          => 'yasin@brnysn.com',
                'password'       => bcrypt('secret'),
                'remember_token' => null,
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 3,
                'name'           => 'üçüncü Kullanıcı',
                'email'          => 'yasin@brnysn.com',
                'password'       => bcrypt('secret'),
                'remember_token' => null,
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
        ];

        User::insert($users);
    }
}
