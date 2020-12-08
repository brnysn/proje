<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            TagsTableSeeder::class,
            PasswordsTableSeeder::class,
            PasswordTagTableSeeder::class,
        ]);
    }
}
