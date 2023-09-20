<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalanSkripsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalan_skripsi', function (Blueprint $table) {
            $table->id();
            $table->string('pendaftaranskripsi_id')->nullable();
            $table->string('mahasiswa_nim');
            $table->string('pembimbingsatu_nip');
            $table->string('pembimbingdua_nip')->nullable();
            $table->string('pengujisatu_nip');
            $table->string('pengujidua_nip');
            $table->string('pengujitiga_nip')->nullable();
            $table->foreignId('prodi_id');                        
            $table->string('jenis_seminar')->default('Skripsi');
            $table->string('judul_skripsi');
            $table->string('revisi_skripsi')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('penjadwalan_skripsis');
    }
}
