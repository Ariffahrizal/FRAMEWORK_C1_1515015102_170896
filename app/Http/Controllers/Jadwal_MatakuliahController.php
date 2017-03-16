<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal_Matakuliah;

class Jadwal_MatakuliahController extends Controller
{
       
    public function awal()
    {
    	return "Hello ini dari Jadwal_MatakuliahController";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$jadwalmk = new Jadwal_Matakuliah();
        $jadwalmk->mahasiswa_id = 2;
        $jadwalmk->ruangan_id = 1;
        $jadwalmk->dosen_matakuliah_id = 8;
    	$jadwalmk->save();
    	return "Data Jadwal_Matakuliah telah disimpan";
    }
}