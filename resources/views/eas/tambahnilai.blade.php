
@extends('template')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Data Nilai</h1>

    <form action="{{ url('/store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" class="form-control" id="nrp" name="nrp" required>
        </div>

        <div class="mb-3">
            <label for="nilaiangka" class="form-label">Nilai Angka</label>
            <input type="number" class="form-control" id="nilaiangka" name="nilaiangka" min="0" max="100" required>
        </div>

        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">SIMPAN</button>
        <a href="{{ url('/eas') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
