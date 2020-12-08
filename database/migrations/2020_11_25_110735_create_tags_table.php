<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');

            $table->string('description')->nullable();

            $table->unsignedBigInteger('owner');

            $table->foreign('owner')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            
            $table->timestamps();
            
            $table->softDeletes();
        });
    }

}
