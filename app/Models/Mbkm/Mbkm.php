<?php

namespace App\Models\Mbkm;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Konsentrasi;
use App\Models\Mbkm\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbkm extends Model
{
    use HasFactory;

    protected $table = 'mbkm';
    protected $guarded = [];

    public $timestamps = false;
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function konsentrasi()
    {
        return $this->belongsTo(Konsentrasi::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }
}
