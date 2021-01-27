<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomsTable extends Migration
{

    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name_class');
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('classrooms');
    }
}