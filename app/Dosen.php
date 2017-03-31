<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'Dosen';
    // protected $fillable = ['nama', 'nip', 'alamat', 'pengguna_id'];
    protected $guarded = ['id'];

    public function pengguna(){
    	return $this->belongsTo(Pengguna::class);
    }
    public function dosen_matakuliah(){
    	return $this->hasMany(dosen_matakuliah::class,'dosen_id');
    }
}