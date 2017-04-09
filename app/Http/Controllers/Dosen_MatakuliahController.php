<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dosen_Matakuliah;
use App\Dosen;
use App\Matakuliah;
use App\Jadwal_Matakuliah;

class Dosen_MatakuliahController extends Controller
{
    
    public function awal()
    {
    	return view('dosen_matakuliah.awal',['data'=>Dosen_Matakuliah::all()]);
    }

    public function tambah()
    {
    	// return view('dosen_matakuliah.tambah');
         $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.tambah',compact('dosen','matakuliah'));
        return $this->simpan();
    }

    public function simpan(Request $input)
    {
        // $dosen_matakuliah = new Dosen_Matakuliah();
        // $dosen_matakuliah->dosen_id = $input->dosen_id;
        // $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        // $informasi = $dosen_matakuliah->save() ? 'Berhasil menyimpan data':'Gagal simpan data';
        // return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
        $dosen_matakuliah = new Dosen_Matakuliah($input->only('dosen_id','matakuliah_id'));

        if($dosen_matakuliah->save()) {
            $this->informasi = "Jadwal Dosen Mengajar berhasil disimpan";
        }
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }

    public function edit($id)
    {
        // $dosen_matakuliah = Dosen_Matakuliah::find($id);
        // return view('dosen_matakuliah.edit')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.edit',compact('dosen','matakuliah','dosen_matakuliah'));
    }

    public function lihat($id)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        return view('dosen_matakuliah.lihat',compact('dosen_matakuliah'));
    }

    public function update($id, Request $input)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        // $dosen_matakuliah->dosen_id = $input->dosen_id;
        // $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        // $informasi = $dosen_matakuliah->save() ? 'Berhasil mengupdate data':'Gagal update data';
        // return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
        $dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Jadwal Dosen Mengajar berhasil diperbarui";
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }

    public function hapus($id)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        // $informasi = $dosen_matakuliah->delete() ? 'Berhasil menghapus data':'Gagal hapus data';
        // return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
        if($dosen_matakuliah->delete()) $this->informasi = "Jadwal Mahasiswa berhasil dihapus";
        return redirect('dosen_matakuliah')-> with(['informasi'=>$this->informasi]);
    }
}