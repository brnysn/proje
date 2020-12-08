<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_user', function (Blueprint $table) {
            $table->unsignedBigInteger('password_id');
            
            $table->foreign('password_id')->references('id')->on('passwords')->onDelete('CASCADE')->onUpdate('CASCADE');
            
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

}
