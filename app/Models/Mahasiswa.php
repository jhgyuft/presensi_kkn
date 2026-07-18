<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'prodi',
    ];

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }
}