<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('name_father');
            $table->string('national_id_father');
            $table->string('passport_id_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->bigInteger('nationality_father_id')->unsigned();
            $table->bigInteger('blood_type_father_id')->unsigned();
            $table->bigInteger('religion_father_id')->unsigned();
            $table->string('address_father');

            //Mother information
            $table->string('name_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->bigInteger('nationality_mother_id')->unsigned();
            $table->bigInteger('blood_type_mother_id')->unsigned();
            $table->bigInteger('religion_mother_id')->unsigned();
            $table->string('address_mother');
            $table->timestamps();
// Realations
            $table->foreign('nationality_father_id')->references('id')->on('nationalities')->onDelete('cascade');;
            $table->foreign('blood_type_father_id')->references('id')->on('type_bloods')->onDelete('cascade');;
            $table->foreign('religion_father_id')->references('id')->on('religions')->onDelete('cascade');;
            // ---
            $table->foreign('nationality_mother_id')->references('id')->on('nationalities')->onDelete('cascade');;
            $table->foreign('blood_type_mother_id')->references('id')->on('type_bloods')->onDelete('cascade');;
            $table->foreign('religion_mother_id')->references('id')->on('religions')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}