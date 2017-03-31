<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen;
use App\Pengguna;

class DosenController extends Controller
{
    
    public function awal()
    {
    	// return "Hello, ini dari DosenController";
        return view('dosen.awal',['data'=>Dosen::all()]);
    }

    public function tambah()
    {
    	// return $this->simpan();
        return view('dosen.tambah');
    }

    public function simpan(Request $input)
    {
    // //     // $dosen = new Dosen();
    // //     // $dosen->nama = 'Arif';
    // //     // $dosen->nip = '1515015102';
    // //     // $dosen->alamat = 'Pramuka 6 Komp P&K';
    // //     // $dosen->pengguna_id = 1;
    // //     // $dosen->save();
    // //     // return "Data Dosen dengan nama {$dosen->nama} telah disimpan";
        $dosen = new Dosen();
    	$dosen->nama = $input->nama;
    	$dosen->nip = $input->nip;
    	$dosen->alamat = $input->alamat;
        $dosen->pengguna_id = $input->pengguna_id;
    	$informasi = $dosen->save() ? 'Berhasil menyimpan data':'Gagal simpan data';
    	return redirect('dosen')->with(['informasi'=>$informasi]);
    }

    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit')->with(array('dosen'=>$dosen));
    }

    public function lihat($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }

    public function update($id, Request $input)
    {
        $dosen = Dosen::find($id);
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $dosen->pengguna_id = $input->pengguna_id;
        $informasi = $dosen->save() ? 'Berhasil update data':'Gagal update data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }


    public function hapus($id)
    {
        $dosen = Dosen::find($id);
        $informasi = $dosen->delete() ? 'Berhasil hapus data':'Gagal hapus data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
}