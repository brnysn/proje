<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passwords', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('title');

            $table->string('username');

            $table->string('pass');

            $table->string('site_url')->nullable();

            $table->string('ip')->nullable();

            $table->string('description')->nullable();

            $table->unsignedBigInteger('owner');

            $table->foreign('owner')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamps();
            $table->softDeletes();
        });
    }

}
