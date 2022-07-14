<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Myvideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myvideos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser');
            $table->string('guru');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('video');
            $table->string('sampul');
            $table->integer('lesco');
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
        Schema::dropIfExists('myvideos');
    }
}
