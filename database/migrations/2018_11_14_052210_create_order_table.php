<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nmr_murid');
            $table->string('photo_murid');
            $table->string('studentname');
            $table->string('kategori_pelajaran');
            $table->string('teachername');
            $table->string('pelajaran');
            $table->text('deskripsi');
            $table->string('durasi');
            $table->integer('lesco');
            $table->text('alamat');
            $table->enum('status', ['Waiting','Accept','Process','Success']);
            $table->string('jenjang');
            $table->enum('type', ['Offline','Online']);
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
        Schema::dropIfExists('order');
    }
}
