<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal_Matakuliah;

class Jadwal_MatakuliahController extends Controller
{
       
    public function awal()
    {
    	return view('jadwal_matakuliah.awal',['data'=>Jadwal_Matakuliah::all()]);
    }

    public function tambah()
    {
    	return view('jadwal_matakuliah.tambah');
    }

    public function simpan(Request $input)
    {
    	// $jadwalmk = new Jadwal_Matakuliah();
     //    $jadwalmk->mahasiswa_id = 2;
     //    $jadwalmk->ruangan_id = 1;
     //    $jadwalmk->dosen_matakuliah_id = 8;
    	// $jadwalmk->save();
    	// return "Data Jadwal_Matakuliah telah disimpan";
        $jadwal_matakuliah = new Jadwal_Matakuliah();
        $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        $informasi = $jadwal_matakuliah->save() ? 'Berhasil menyimpan data':'Gagal simpan data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function edit($id)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        return view('jadwal_matakuliah.edit')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }

    public function lihat($id)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));   
    }

    public function update($id, Request $input)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        $informasi = $jadwal_matakuliah->save() ? 'Berhasil mengupdate data':'Gagal update data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);   
    }

    public function hapus($id)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        $informasi = $jadwal_matakuliah->delete() ? 'Berhasil menghapus data':'Gagal hapus data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }
}