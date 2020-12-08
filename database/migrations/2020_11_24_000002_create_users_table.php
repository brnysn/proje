<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');

            $table->string('email');

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');

            $table->string('remember_token')->nullable();

            $table->string('two_factor_code')->nullable();
            
            $table->dateTime('two_factor_expires_at')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
