@extends('template')

@section('content')
<h2>Tambah Data Nilai</h2>
<form action="/eas/store" method="POST">
    @csrf
    <div class="mb-3">
        <label>NRP</label>
        <input type="text" name="nrp" class="form-control">
    </div>
    <div class="mb-3">
        <label>Nilai Angka</label>
        <input type="number" name="nilaiangka" class="form-control">
    </div>
    <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="sks" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">SIMPAN</button>
</form>


@endsection
