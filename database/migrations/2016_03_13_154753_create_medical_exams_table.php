<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->length(10)->unsigned();
            $table->dateTime('date');
            $table->integer('doctor_id')->length(10)->unsigned();
            $table->string('diagnose', 2000);
            $table->tinyInteger('finished')->default(0);
            $table->timestamps();
        });

        Schema::table('medical_exams', function ($table) {
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medical_exams');
    }
}
