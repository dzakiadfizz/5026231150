
@extends('template')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Nilai Mahasiswa</h1>

    <a href="{{ url('/eas/create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Data
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NRP</th>
                    <th>Nilai Angka</th>
                    <th>SKS</th>
                    <th>Nilai Huruf</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nomorinduksiswa }}</td>
                    <td>{{ $item->nilaiangka }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>
                        @php
                            $huruf = '';
                            $bobot = 0;
                            $nilaiAngkaNumeric = (int)$item->nilaiangka;

                            if ($nilaiAngkaNumeric >= 80) {
                                $huruf = 'A';
                                $bobot = 4;
                            } elseif ($nilaiAngkaNumeric >= 70) {
                                $huruf = 'B';
                                $bobot = 3;
                            } elseif ($nilaiAngkaNumeric >= 60) {
                                $huruf = 'C';
                                $bobot = 2;
                            } elseif ($nilaiAngkaNumeric >= 40) {
                                $huruf = 'D';
                                $bobot = 1;
                            } else {
                                $huruf = 'E';
                                $bobot = 0;
                            }
                        @endphp
                        {{ $huruf }}
                    </td>
                    <td>
                        @php
                            $sksNumeric = (int)$item->sks;
                            $totalBobot = $sksNumeric * $bobot;
                        @endphp
                        {{ $totalBobot }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data nilai yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
