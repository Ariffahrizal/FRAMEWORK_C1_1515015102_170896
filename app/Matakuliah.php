<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $fillable = ['title','keterangan'];

    public function Dosen_Matakuliah(){
    	return $this -> hasMany(Dosen_Matakuliah::class);
    }
}