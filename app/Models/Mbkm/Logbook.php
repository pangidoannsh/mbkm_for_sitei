<?php

namespace App\Models\Mbkm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table = "mbkm_logbook";
    protected $guarded = [];
}
