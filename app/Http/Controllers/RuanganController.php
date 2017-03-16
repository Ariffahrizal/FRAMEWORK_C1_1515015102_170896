<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruangan;

class RuanganController extends Controller
{
       
    public function awal()
    {
    	return "Hello, ini dari RuanganController";
    }

    public function tambah()
    {
    	return $this->simpan();
    }

    public function simpan()
    {
    	$ruangan = new Ruangan();
        $ruangan->title = 'Laboratorium Praktikum';
    	$ruangan->save();
    	return "Data Ruangan {$ruangan->title} telah disimpan";
    }
}