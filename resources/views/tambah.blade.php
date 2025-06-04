@extends('template')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Pegawai</h2>

        <form action="/pegawai/store" method="post">
            @csrf
            <div class="form-group">
                <label for="namaPegawai">Nama</label>
                <input type="text" class="form-control" id="namaPegawai" name="nama" placeholder="Masukkan nama pegawai" required>
            </div>

            <div class="form-group">
                <label for="jabatanPegawai">Jabatan</label>
                <input type="text" class="form-control" id="jabatanPegawai" name="jabatan" placeholder="Masukkan jabatan pegawai" required>
            </div>

            <div class="form-group">
                <label for="umurPegawai">Umur</label>
                <input type="number" class="form-control" id="umurPegawai" name="umur" placeholder="Masukkan umur pegawai" required>
            </div>

            <div class="form-group">
                <label for="alamatPegawai">Alamat</label>
                <textarea class="form-control" id="alamatPegawai" name="alamat" rows="3" placeholder="Masukkan alamat pegawai" required></textarea>
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="/pegawai" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
