<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    //
    protected $table = 'pengguna';
    protected $fillable = ['username', 'password'];

    public function Mahasiswa(){
    	return $this->hasOne(Mahasiswa::class,'pengguna_id');
    }

    public function dosen(){
    	return $this->hasOne(dosen::class,'pengguna_id');
    }
}
