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

    public function listDosenDanNip(){
        $out = [];
        foreach ($this->all() as $dsn) {
            $out[$dsn->id] = "{$dsn->nama} ({$dsn->nip})";
        }
        return $out;
    }

    public function listDosenDanMatakuliah()
    {
    	$out = [];
    	foreach ($this->all() as $dsnMtk) {
    		$out[$dsnMtk->id] = "{$dsnMtk->dosen->nama} {$dsnMtk->dosen->nip} (Matakuliah {$dsnMtk->matakuliah->title})";
    	}
    	return $out;
    }
}