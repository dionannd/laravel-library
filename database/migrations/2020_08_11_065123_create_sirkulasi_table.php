<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSirkulasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirkulasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->foreignId('id_buku');
            $table->foreignId('id_anggota');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_kembali');
            $table->enum('status', ['1', '2'])->default('1');
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
        Schema::dropIfExists('sirkulasis');
    }
}
