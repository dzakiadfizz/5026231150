@extends("template")

@section("content")
    <div class="container">
        <h2>Daftar Karyawan</h2>


        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Kode Pegawai</th>
                    <th>Nama Lengkap</th>
                    <th>Divisi</th>
                    <th>Departemen</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $k)
                    <tr>
                        <td>{{ $k->kodepegawai }}</td>
                        <td>{{ $k->namalengkap }}</td>
                        <td>{{ $k->divisi }}</td>
                        <td>{{ $k->departemen }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit', $k->kodepegawai) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('karyawan.hapus', $k->kodepegawai) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus Data</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('karyawan.tambah') }}" class="btn btn-primary mt-3">Tambah Data</a>
    </div>
@endsection
