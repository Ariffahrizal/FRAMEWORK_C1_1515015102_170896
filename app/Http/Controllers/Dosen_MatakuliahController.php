<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen_Matakuliah;

class Dosen_MatakuliahController extends Controller
{
    
    public function awal()
    {
    	return "Hello, ini dari Dosen_MatakuliahController";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$dosenmk = new Dosen_Matakuliah();
        $dosenmk->dosen_id =4;
        $dosenmk->matakuliah_id = 1;
    	$dosenmk->save();
    	return "Data Dosen_Matakuliah telah disimpan";
    }
}