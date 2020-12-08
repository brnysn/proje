<?php

use App\Password;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class PasswordsTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'title'          => 'demo',
                'username'       => 'demo',
                'pass'           => Crypt::encrypt('demodemo'),
                'owner'          => 1,
                'description'    => 'asdasdasd as das',
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 2,
                'title'          => 'iki',
                'username'       => 'demo',
                'pass'           => Crypt::encrypt('demodemo2'),
                'owner'          => 1,
                'description'    => 'asdasdasd as das',
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 3,
                'title'          => 'üç',
                'username'       => 'demo',
                'pass'           => Crypt::encrypt('sifreler'),
                'owner'          => 2,
                'description'    => 'asdasdasd as das',
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
        ];

        Password::insert($users);
    }
}
