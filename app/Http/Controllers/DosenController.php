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
        //return view('dosen.awal',['data'=>Dosen::all()]);
        $data = Dosen::all();//
        return view('dosen.awal', compact('data'));
    }

    public function tambah()
    {
        return view('dosen.tambah');
    }

    public function simpan(Request $input)
    {
        $pengguna = new Pengguna($input->only('username','password'));
        
        if ($pengguna->save()) {
        $dosen = new Dosen();
    	$dosen->nama = $input->nama;
    	$dosen->nip = $input->nip;
    	$dosen->alamat = $input->alamat;
    	// $informasi = $dosen->save() ? 'Berhasil menyimpan data':'Gagal simpan data';
    	   if($pengguna->dosen()->save($dosen)) 
            $this->informasi='Berhasil simpan data';
        }        
        return redirect ('dosen')->with(['informasi'=>$this->informasi]);
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
        // $dosen->pengguna_id = $input->pengguna_id;
        // $informasi = $dosen->save() ? 'Berhasil update data':'Gagal update data';
        // return redirect('dosen')->with(['informasi'=>$informasi]);
        // $dosen->pengguna_id = $input->pengguna_id;
        //     if(!is_null($input->username)){
        //         $pengguna = $dosen->pengguna->fill($input->only('username'));
        //     if(!empty($input->password)) 
        //         $pengguna->password = $input->password;
        //     if($pengguna->save()) 
        //     $this->informasi = 'Berhasil simpan data';
        // }
        // else{
        //     $this->informasi = 'Berhasil simpan data';
        // }
        $dosen->save(); 
        if(!is_null($input->username)) {
            $pengguna = $dosen -> pengguna->fill($input -> only ('username'));
            if (!empty($input->password)) 
                $pengguna -> password = $input -> password;
            if ($pengguna()->save()) 
                $this->informasi='Berhasil simpan data';
        }
        return redirect ('dosen') -> with (['informasi'=>$this->informasi]);
    }


    public function hapus($id)
    {
        $dosen = Dosen::find($id);
        $informasi = $dosen->delete() ? 'Berhasil hapus data':'Gagal hapus data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
}