<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $fillable = ['title'];

    public function Jadwal_Matakuliah(){
    	return $this -> hasMany(Jadwal_Matakuliah::class);
    }
}