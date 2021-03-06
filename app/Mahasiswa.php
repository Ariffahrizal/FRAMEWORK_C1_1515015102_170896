<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'Mahasiswa';
    // protected $fillable = ['nama', 'nim', 'alamat'];
    protected $guarded = ['id'];


    public function Pengguna(){
    	return $this->belongsTo(pengguna::class);
    }


    public function jadwal_matakuiah(){
    	return $this->hasMany(jadwal_matakuiah::class,'Mahasiswa_id');
    }
    

    public function listidmhs()
    {
        $out = [];
        foreach ($this->all() as $mhs) {
            $out[$mhs->id] ="{$mhs->nama} ({$mhs->nim})";
        }
        return $out;
    }
}