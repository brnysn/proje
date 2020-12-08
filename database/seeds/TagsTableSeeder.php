<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'demo',
                'owner'          => 1,
                'description'    => 'asdasdasd as das',
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 2,
                'name'           => 'iki',
                'owner'          => 1,
                'description'    => 'asdasdasd as das',
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
            [
                'id'             => 3,
                'name'           => 'üç',
                'owner'          => 2,
                'description'    => 'asdasdasd as das',
                'created_at'     => '2020-11-27 07:11:07',
                'updated_at'     => '2020-11-27 07:11:07',
            ],
        ];

        Tag::insert($users);
    }
}
