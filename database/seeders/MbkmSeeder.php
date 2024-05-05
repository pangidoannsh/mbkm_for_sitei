<?php

namespace Database\Seeders;

use App\Models\Mbkm\MataKuliah;
use App\Models\Mbkm\Program;
use Illuminate\Database\Seeder;

class MbkmSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            "Studi Indenpenden", "Magang", "IISMA", "PMM (Pertukaran Pelajar Merdeka)",
            "KAMPUS MENGAJAR", "Lainnya"
        ];
        foreach ($programs as  $program) {
            Program::create([
                'name' => $program
            ]);
        }
        MataKuliah::create([
            "kode_mk" => "TI123",
            "mk" => "Rekayasa Web",
            "sks" => 4,
        ]);
        MataKuliah::create([
            "kode_mk" => "TI234",
            "mk" => "Etika Profesi",
            "sks" => 2,
        ]);
        MataKuliah::create([
            "kode_mk" => "TI345",
            "mk" => "Pengujian Sistem Informasi",
            "sks" => 3,
        ]);
    }
}
