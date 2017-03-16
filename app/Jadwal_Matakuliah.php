<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_Matakuliah extends Model
{
    protected $table = 'Jadwal_Matakuliah';
    protected $fillable = ['mahasiswa_id', 'Ruangan_id', 'Dosen_matakuliah_id'];
}