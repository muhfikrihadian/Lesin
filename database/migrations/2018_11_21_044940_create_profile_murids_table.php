<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_murids', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idmurid');
            $table->string('photo')->default('photoguru/people.png');
            $table->integer('lesco')->nullable();
            $table->string('sekolah');
            $table->string('jenjang');
            $table->string('nisn');
            $table->string('norek');
            $table->string('phone');
            $table->text('alamat');
            $table->text('tentang');
            $table->timestamps();
            $table->foreign('idmurid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_murids');
    }
}
