<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HarddiskController extends Controller
{
    // Fungsi transformHarddiskToPegawai DIHAPUS karena kita tidak lagi perlu memetakan data
    // untuk view 'index' lama. Kita akan bekerja langsung dengan data harddisk di view baru.

    /**
     * Menampilkan daftar harddisk dengan pagination.
     * Mengembalikan view 'harddisk_index.blade.php'.
     */
    public function index()
    {
        $harddisk = DB::table('harddisk')->paginate(10);
        return view('harddisk_index', ['harddisk' => $harddisk]);
    }

    /**
     * Mencari data harddisk dan menampilkannya di view 'harddisk_index.blade.php'.
     */
    public function cari(Request $request)
    {
        $keyword = $request->input('cari');
        $harddisk = DB::table('harddisk')
            ->where('harddisk_id', 'like', "%{$keyword}%")
            ->orWhere('harddisk_merk', 'like', "%{$keyword}%")
            ->paginate(10);
        $harddisk->appends(['cari' => $keyword]);
        return view('harddisk_index', ['harddisk' => $harddisk]);
    }

    /**
     * Menampilkan form edit untuk harddisk tertentu.
     * Mengembalikan view 'harddisk_edit.blade.php' (Anda mungkin perlu membuat file ini).
     * @param int $id ID harddisk yang akan diedit.
     */
    public function edit($id)
    {
        $harddisk = DB::table('harddisk')->where('harddisk_id', $id)->first();
        if (!$harddisk) {
            return redirect('/harddisk')->with('error', 'Harddisk tidak ditemukan.');
        }
        // Meneruskan objek harddisk asli ke view edit
        return view('harddisk_edit', ['harddisk' => $harddisk]);
        // PERHATIAN: Anda perlu membuat file 'harddisk_edit.blade.php' jika belum ada.
        // Di dalamnya, gunakan variabel $harddisk dan propertinya ($harddisk->harddisk_merk, dll.)
    }

    /**
     * Memperbarui data harddisk.
     * Diasumsikan ID harddisk (`$request->id`) dan data lainnya
     * dikirim melalui form POST dari view 'harddisk_edit.blade.php'.
     * @param Request $request Objek request HTTP yang berisi data form.
     */
    public function update(Request $request)
    {
        $harddiskId = $request->id; // Mengambil ID harddisk dari hidden input 'id' di form

        // Validasi input berdasarkan nama input form yang baru (merk, harga, tersedia, berat)
        $request->validate([
            'id' => 'required', // ID biasanya dikirim sebagai hidden input
            'merk' => 'required',
            'harga' => 'required|numeric',
            'tersedia' => 'required',
            'berat' => 'required'
        ]);

        DB::table('harddisk')->where('harddisk_id', $harddiskId)->update([
            'harddisk_merk'     => $request->merk,
            'harddisk_harga'    => $request->harga,
            'harddisk_tersedia' => $request->tersedia,
            'harddisk_berat'    => $request->berat
        ]);

        return redirect('/harddisk')->with('success', 'Data harddisk berhasil diperbarui.');
    }

    /**
     * Menambahkan data harddisk baru ke database.
     * Metode ini dipanggil dari form di 'harddisk_tambah.blade.php'.
     * @param Request $request Objek request HTTP yang berisi data form.
     */
    public function store(Request $request)
    {
        // Validasi input form 'tambah'
        $request->validate([
            'id' => 'required', // ID biasanya dikirim sebagai hidden input
            'merk' => 'required',
            'harga' => 'required|numeric',
            'tersedia' => 'required',
            'berat' => 'required'
        ]);

        DB::table('harddisk')->insert([
            'harddisk_id'       => $request->id, // Jika ID adalah auto-increment, Anda tidak perlu meminta ID dari form
            'harddisk_merk'     => $request->merk,
            'harddisk_harga'    => $request->harga,
            'harddisk_tersedia' => $request->tersedia,
            'harddisk_berat'    => $request->berat
        ]);

        return redirect('/harddisk')->with('success', 'Data harddisk berhasil ditambahkan.');
    }

    /**
     * Menghapus data harddisk berdasarkan ID.
     * @param int $id ID harddisk yang akan dihapus.
     */
    public function hapus($id)
    {
        DB::table('harddisk')->where('harddisk_id', $id)->delete();
        return redirect('/harddisk');
    }

    /**
     * Menampilkan form untuk menambah harddisk baru.
     * Mengembalikan view 'harddisk_tambah.blade.php'.
     */
    public function tambah()
    {
        return view('harddisk_tambah');
    }

    // Metode 'formulir' dan 'proses' jika memang ada dan diperlukan di aplikasi Anda
    // Perhatikan bahwa rute yang memanggil ini di web.php harus unik (misalnya formulir-harddisk)
    public function formulir() { /* Implementasi Anda */ }
    public function proses() { /* Implementasi Anda */ }

    // Jika Anda memiliki formulir2 di routes/web.php, Anda perlu mendefinisikannya di sini
    public function formulir2() { /* Implementasi untuk formulir2 harddisk */ }
}
