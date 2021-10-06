<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('profileID');
            $table->string('firstName');
            $table->string('lastName');
            $table->boolean('gender');
            $table->integer('age')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phoneNumber', 20)->nullable();
            $table->boolean('is_admin')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
