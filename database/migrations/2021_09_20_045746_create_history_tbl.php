<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id('historyID');
            $table->bigInteger('profileID')->unsigned();
            $table->foreign('profileID')->references('profileID')->on('profiles')->onDelete('cascade');
            $table->bigInteger('videoID')->unsigned();
            $table->foreign('videoID')->references('videoID')->on('videos')->onDelete('cascade');
            $table->date('watchDate');
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
        Schema::dropIfExists('histories');
    }
}
