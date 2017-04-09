<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal_Matakuliah;
use App\Mahasiswa;
use App\Dosen_Matakuliah;
use App\Ruangan;
use App\Matakuliah;
use App\Dosen;

class Jadwal_MatakuliahController extends Controller
{
       
    public function awal()
    {
    	// return view('jadwal_matakuliah.awal',['data'=>Jadwal_Matakuliah::all()]);
        $data = Jadwal_Matakuliah::all();
        return view('jadwal_matakuliah.awal',compact('data'));
    }

    public function tambah()
    {    	
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_Matakuliah;
        return view('jadwal_matakuliah.tambah',compact('mahasiswa','ruangan','dosen_matakuliah'));
    }

    public function simpan(Request $input)
    {
        $jadwal_matakuliah = new Jadwal_Matakuliah();
        $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        $informasi = $jadwal_matakuliah->save() ? 'Berhasil menyimpan data':'Gagal simpan data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function edit($id)
    {
        // $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        // return view('jadwal_matakuliah.edit')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        $mahasiswa = new Mahasiswa;
        $ruangan = new Ruangan;
        $dosen_matakuliah = new Dosen_Matakuliah;
        return view('jadwal_matakuliah.edit',compact('mahasiswa','ruangan','dosen_matakuliah','jadwal_matakuliah'));
    }

    public function lihat($id)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));   
    }

    public function update($id, Request $input)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        // $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        // $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        // $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        // $informasi = $jadwal_matakuliah->save() ? 'Berhasil mengupdate data':'Gagal update data';
        // return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);   
        $jadwal_matakuliah->fill($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));
        if($jadwal_matakuliah->save()) 
            $this->informasi = "Jadwal Mahasiswa berhasil diperbarui";
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
    }

    public function hapus($id)
    {
        $jadwal_matakuliah = Jadwal_Matakuliah::find($id);
        // $informasi = $jadwal_matakuliah->delete() ? 'Berhasil menghapus data':'Gagal hapus data';
        if($jadwal_matakuliah->delete()) 
            $this->informasi = "Jadwal Mahasiswa berhasil dihapus";
        return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
    }
}