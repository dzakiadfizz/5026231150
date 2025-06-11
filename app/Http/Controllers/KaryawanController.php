<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();

        $karyawan->map(function ($item) {
            $item->namalengkap = strtoupper($item->namalengkap);
            $item->departemen = strtoupper($item->departemen);
            return $item;
        });
        return view('karyawan.karyawan_index', ['karyawan' => $karyawan]);
    }

    public function tambah()
    {
        return view('karyawan.karyawan_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodepegawai' => 'required|string|min:5|max:5|unique:karyawan,kodepegawai',
            'namalengkap' => 'required|string|max:50',
            'divisi' => 'required|string|min:5|max:5',
            'departemen' => 'required|string|max:10',
        ]);

        Karyawan::create($request->all());
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    public function hapus($kodepegawai)
    {
        $karyawan = Karyawan::find($kodepegawai);
        if ($karyawan) {
            $karyawan->delete();
            return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus!');
        }
        return redirect('/karyawan')->with('error', 'Data karyawan tidak ditemukan!');
    }

    /**
     * @param string
     */
    public function edit($kodepegawai)
    {
        $karyawan = Karyawan::find($kodepegawai);
        if (!$karyawan) {
            return redirect('/karyawan')->with('error', 'Data karyawan tidak ditemukan!');
        }
        return view('karyawan.karyawan_edit', ['karyawan' => $karyawan]);
    }

    /**
     * Memperbarui record terpilih dari tabel (tambahan untuk CRUD lengkap).
     * @param Request $request Objek request HTTP yang berisi data form.
     * @param string $kodepegawai Primary key dari karyawan yang akan diperbarui.
     */
    public function update(Request $request, $kodepegawai)
    {
        $request->validate([
            'namalengkap' => 'required|string|max:50',
            'divisi' => 'required|string|min:5|max:5',
            'departemen' => 'required|string|max:10',
        ]);

        $karyawan = Karyawan::find($kodepegawai);
        if ($karyawan) {
            $karyawan->update($request->all());
            return redirect('/karyawan')->with('success', 'Data karyawan berhasil diperbarui!');
        }
        return redirect('/karyawan')->with('error', 'Data karyawan tidak ditemukan!');
    }
}
