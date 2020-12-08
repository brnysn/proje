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
                'email'          => 'yasin@1010.ist',
                'password'       => '$2y$10$vwkeP9ZNIgpM/kkPkmnFvOnTU9snBXZTVhpFquHGCKuf1dTXSsbDq',
                'remember_token' => null,
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 2,
                'name'           => 'iki Baran',
                'email'          => 'yasin@1010.ist',
                'password'       => '$2y$10$vwkeP9ZNIgpM/kkPkmnFvOnTU9snBXZTVhpFquHGCKuf1dTXSsbDq',
                'remember_token' => null,
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 3,
                'name'           => 'üç Baran',
                'email'          => 'yasin@1010.ist',
                'password'       => '$2y$10$vwkeP9ZNIgpM/kkPkmnFvOnTU9snBXZTVhpFquHGCKuf1dTXSsbDq',
                'remember_token' => null,
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
        ];

        User::insert($users);
    }
}
