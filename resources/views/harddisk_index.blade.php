@extends("template") {{-- Asumsi ini adalah nama layout utama Anda --}}

@section("content")
    {{-- Tombol Tambah Harddisk --}}
    <a href="/harddisk/tambah" class="btn btn-primary"> + Tambah Harddisk Baru</a>
    <br/><br/>

    {{-- Form Pencarian Harddisk --}}
    <form action="/harddisk/cari" method="GET" class="form-inline mb-3">
        <input class="form-control" type="text" name="cari" placeholder="Cari Harddisk .." value="{{ old('cari') }}">
        <input class="btn btn-primary ml-3" type="submit" value="CARI">
    </form>

    {{-- Tabel Daftar Harddisk --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Tersedia</th>
                <th>Berat (gram)</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($harddisk as $h) {{-- Menggunakan variabel $harddisk yang diteruskan dari Controller --}}
            <tr>
                <td>{{ $h->harddisk_id }}</td>
                <td>{{ $h->harddisk_merk }}</td>
                <td>{{ $h->harddisk_harga }}</td>
                <td>{{ $h->harddisk_tersedia }}</td>
                <td>{{ $h->harddisk_berat }}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="/harddisk/edit/{{ $h->harddisk_id }}">Edit</a> |
                    <a class="btn btn-danger btn-sm" href="/harddisk/hapus/{{ $h->harddisk_id }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br/>
    {{-- Informasi Pagination Harddisk --}}
    Halaman : {{ $harddisk->currentPage() }} <br/>
    Jumlah Data : {{ $harddisk->total() }} <br/>
    Data Per Halaman : {{ $harddisk->perPage() }} <br/>

    {{-- Link Pagination Harddisk --}}
    {{ $harddisk->links('pagination::bootstrap-4') }}
@endsection
