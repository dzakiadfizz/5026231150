<h2>Tambah Pegawai</h2>
<form action="/pegawai/store" method="post">
    @csrf
    Nama: <input type="text" name="nama"><br>
    Jabatan: <input type="text" name="jabatan"><br>
    Umur: <input type="number" name="umur"><br>
    Alamat: <textarea name="alamat"></textarea><br>
    <button type="submit">Simpan</button>
</form>
