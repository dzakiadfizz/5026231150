@extends('template')
@section('content')

<h2>Data Nilai Mahasiswa</h2>
<a href="eas/tambah" class="btn btn-primary mb-3">+ Tambah Data </a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>NRP</th>
        <th>Nilai Angka</th>
        <th>SKS</th>
        <th>Nilai Huruf</th>
        <th>Bobot</th>
    </tr>
    @foreach($data as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->normorinduksiswa }}</td>
        <td>{{ $item->nilaangka }}</td>
        <td>{{ $item->sks }}</td>
        <td>
            @php
                if ($item->nilaangka <= 40) $huruf = 'D';
                elseif ($item->nilaangka <= 60) $huruf = 'C';
                elseif ($item->nilaangka <= 80) $huruf = 'B';
                else $huruf = 'A';
            @endphp
            {{ $huruf }}
        </td>
        <td>{{ $item->nilaangka * $item->sks }}</td>
    </tr>
    @endforeach
</table>
@endsection
