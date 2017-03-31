<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen_Matakuliah;

class Dosen_MatakuliahController extends Controller
{
    
    public function awal()
    {
    	return view('dosen_matakuliah.awal',['data'=>Dosen_Matakuliah::all()]);
    }

    public function tambah()
    {
    	return view('dosen_matakuliah.tambah');
    }

    public function simpan(Request $input)
    {
    	// $dosenmk = new Dosen_Matakuliah();
     //    $dosenmk->dosen_id =4;
     //    $dosenmk->matakuliah_id = 1;
    	// $dosenmk->save();
    	// return "Data Dosen_Matakuliah telah disimpan";
        $dosen_matakuliah = new Dosen_Matakuliah();
        $dosen_matakuliah->dosen_id = $input->dosen_id;
        $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        $informasi = $dosen_matakuliah->save() ? 'Berhasil menyimpan data':'Gagal simpan data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function edit($id)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        return view('dosen_matakuliah.edit')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
    }

    public function lihat($id)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        return view('dosen_matakuliah.lihat')->with(array('dosen_matakuliah'=>$dosen_matakuliah));   
    }

    public function update($id, Request $input)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        $dosen_matakuliah->dosen_id = $input->dosen_id;
        $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        $informasi = $dosen_matakuliah->save() ? 'Berhasil mengupdate data':'Gagal update data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function hapus($id)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        $informasi = $dosen_matakuliah->delete() ? 'Berhasil menghapus data':'Gagal hapus data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);

    }
}