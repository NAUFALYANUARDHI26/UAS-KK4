<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tiket');
            $table->string('nama_konser');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('nama_artis');
            $table->double('harga');
            $table->string('nomor_kursi');
            $table->string('jenis_tiket');
            $table->string('ketersediaan_tiket');
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
        Schema::dropIfExists('tikets');
    }
}
