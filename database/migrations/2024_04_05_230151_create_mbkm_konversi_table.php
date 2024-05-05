<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mbkm_konversi', function (Blueprint $table) {
            $table->id();
            $table->string("mbkm_id");
            $table->string("nama_nilai_mbkm");
            $table->string("nama_nilai_matkul");
            $table->string("kode_matkul");
            $table->string("sks");
            $table->enum("jenis_matkul", ["W", "P"]);
            $table->string("bobot")->nullable();
            $table->string("nilai_sks")->nullable();
            $table->string("nilai_mbkm");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbkm_konversi');
    }
};
