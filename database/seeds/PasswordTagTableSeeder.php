<?php

use App\Password;
use Illuminate\Database\Seeder;

class PasswordTagTableSeeder extends Seeder
{
    public function run()
    {
        Password::findOrFail(1)->tags()->sync([1,2]);
        Password::findOrFail(2)->tags()->sync([1,3]);

    }
}
