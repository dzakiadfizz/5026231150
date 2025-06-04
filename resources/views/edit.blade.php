@extends('template')

@section('content')
    <h2>Edit Pegawai</h2>

    <form action="/pegawai/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $pegawai->pegawai_id }}">

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="{{ $pegawai->pegawai_nama }}">
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" required value="{{ $pegawai->pegawai_jabatan }}">
        </div>

        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" required value="{{ $pegawai->pegawai_umur }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ $pegawai->pegawai_alamat }}</textarea>
        </div>

        <div class="form-group d-flex justify-content-between">
            <a href="/pegawai" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
