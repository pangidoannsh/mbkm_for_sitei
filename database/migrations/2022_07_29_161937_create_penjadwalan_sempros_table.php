<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalanSemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalan_sempro', function (Blueprint $table) {
            $table->id();
            $table->string('pembimbingsatu_nip');
            $table->string('pembimbingdua_nip')->nullable();
            $table->string('pengujisatu_nip');
            $table->string('pengujidua_nip');
            $table->string('pengujitiga_nip');
            $table->string('mahasiswa_nim');
            $table->string('jenis_seminar');
            $table->string('judul_proposal');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->string('status_seminar')->default(0);
            $table->string('dibuat_oleh');
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
        Schema::dropIfExists('penjadwalan_sempros');
    }
}
