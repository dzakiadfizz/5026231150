<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = DB::table('pegawai')->paginate(10);
        return view('index', ['pegawai' => $pegawai]);
    }

    public function edit($id)
    {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->first();

        if (!$pegawai) {
            return redirect('/pegawai')->with('error', 'Pegawai tidak ditemukan.');
        }

        return view('edit', ['pegawai' => $pegawai]);
    }

    public function update(Request $request)
    {
        DB::table('pegawai')->where('pegawai_id', $request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);

        return redirect('/pegawai')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required'
        ]);

        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);

        return redirect('/pegawai')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function cari(Request $request)
    {
    $keyword = $request->input('cari');

    $pegawai = DB::table('pegawai')
        ->where('pegawai_nama', 'like', "%{$keyword}%")
        ->orWhere('pegawai_jabatan', 'like', "%{$keyword}%")
        ->paginate(10);

    // Supaya parameter 'cari' tetap ada di URL pagination
    $pegawai->appends(['cari' => $keyword]);

    return view('index', ['pegawai' => $pegawai]);
    }


    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
	DB::table('pegawai')->where('pegawai_id',$id)->delete();

	// alihkan halaman ke halaman pegawai
	return redirect('/pegawai');
    }
}
