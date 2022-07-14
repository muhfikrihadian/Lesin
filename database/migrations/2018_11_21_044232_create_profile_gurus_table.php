<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idguru');
            $table->string('photo');
            $table->integer('lesco')->nullable();
            $table->string('ktp');
            $table->string('norek');
            $table->string('phone')->default('photoguru/people.png');
            $table->text('alamat');
            $table->text('tentang');
            $table->timestamps();
            $table->foreign('idguru')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_gurus');
    }
}
