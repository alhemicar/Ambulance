<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email', 200);
            $table->string('username', 32)->unique();
            $table->integer('user_role_id')->unsigned();
            $table->integer('doctor_type_id')->unsigned()->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });





        Schema::table('users', function ($table) {
            $table->foreign('doctor_type_id')->references('id')->on('doctor_types')->onDelete('cascade');
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
