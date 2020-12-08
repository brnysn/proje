<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordTagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('password_id');
            
            $table->foreign('password_id')->references('id')->on('passwords')->onDelete('CASCADE')->onUpdate('CASCADE');
            
            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

}
