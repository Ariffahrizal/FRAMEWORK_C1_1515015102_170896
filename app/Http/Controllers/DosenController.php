<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen;

class DosenController extends Controller
{
    
    public function awal()
    {
    	return "Hello, ini dari DosenController";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$dosen = new Dosen();
    	$dosen->nama = 'Arif';
    	$dosen->nip = '1515015102';
    	$dosen->alamat = 'Pramuka 6 Komp P&K';
        $dosen->pengguna_id = 1;
    	$dosen->save();
    	return "Data Dosen dengan nama {$dosen->nama} telah disimpan";
    }
}