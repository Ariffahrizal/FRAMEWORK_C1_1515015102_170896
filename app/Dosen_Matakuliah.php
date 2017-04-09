<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen_Matakuliah extends Model
{
    protected $table = 'Dosen_Matakuliah';
    // protected $fillable = ['dosen_id', 'matakuliah_id'];
    protected $guarded = ['id'];

    public function Matakuliah(){
    	return $this -> belongsTo(Matakuliah::class);
    }

    public function Dosen(){
    	return $this -> belongsTo(Dosen::class);
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