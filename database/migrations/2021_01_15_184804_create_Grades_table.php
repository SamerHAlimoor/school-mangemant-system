<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration
{

    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('notes')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('grades');
    }
}