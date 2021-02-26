<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration
{

    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_section');
            $table->integer('status');
            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');}
}