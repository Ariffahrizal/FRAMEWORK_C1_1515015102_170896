<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
         
    public function awal()
    {
    	return "Hello, ini dari MahasiswaController";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$mahasiswa = new Mahasiswa();
    	$mahasiswa->nama = 'Arif Fahrizal';
    	$mahasiswa->nim = '1515015102';
    	$mahasiswa->alamat = 'Pramuka 6 Komp P&K';
        $mahasiswa->pengguna_id = 1;
    	$mahasiswa->save();
    	return "Data Mahasiswa dengan nama {$mahasiswa->nama} telah disimpan";
    }
}