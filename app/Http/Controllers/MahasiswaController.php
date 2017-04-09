<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;
use App\pengguna;

class MahasiswaController extends Controller
{
         
    public function awal()
    {
    	// return "Hello, ini dari MahasiswaController";
        return view('mahasiswa.awal',['data'=>Mahasiswa::all()]);
    }

    public function tambah()
    {
    	return view('mahasiswa.tambah');
    }

    public function simpan(Request $input)
    {
        $pengguna = new Pengguna($input->only('username','password'));

        if ($pengguna -> save()) {
            $mahasiswa = new Mahasiswa();
            $mahasiswa->nama = $input->nama;
            $mahasiswa->nim = $input->nim;
            $mahasiswa->alamat = $input->alamat;
        // $mahasiswa->pengguna_id = $input->pengguna_id;
        if ($pengguna->mahasiswa()->save($mahasiswa)) $this -> informasi = 'Berhasil simpan data';    
        }
    	
    	// $informasi = $mahasiswa->save() ? 'Data berhasil disimpan' : 'gagal menyimpan data';
    	return redirect('mahasiswa')->with (['informasi'=>$this->informasi]);
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function update($id, Request $input)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        // $mahasiswa->pengguna_id = $input->pengguna_id;
        if ($mahasiswa->save()) {
            $pengguna = new Pengguna($input -> only ('username'));
            if (!is_null($input->password)) 
                $pengguna -> password = $input -> password;
            if ($mahasiswa->pengguna()->save($pengguna)) 
                $this->informasi='Berhasil simpan data';
        }
        // $informasi = $mahasiswa->save() ? 'Data berhasil diupdate' : 'gagal mengupdate data';
        return redirect('mahasiswa')->with (['informasi'=>$this->informasi]);
    }

    public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()){
            if($mahasiswa->delete()) 
                $this->informasi = 'Berhasil hapus data';   
            return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
        }
    }
}