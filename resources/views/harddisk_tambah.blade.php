@extends("template") {{-- Asumsi ini adalah nama layout utama Anda --}}

@section("content")
    <h3>Form Tambah Harddisk</h3>

    <a href="/harddisk" class="btn btn-secondary mb-3"> Kembali</a>

    <form action="/harddisk/store" method="POST">
        @csrf {{-- Token CSRF untuk keamanan --}}

        <div class="form-group">
            <label for="id">ID Harddisk:</label>
            <input type="text" name="id" id="id" class="form-control" value="{{ old('id') }}">
            @error('id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="merk">Merk Harddisk:</label>
            <input type="text" name="merk" id="merk" class="form-control" value="{{ old('merk') }}">
            @error('merk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga">Harga Harddisk:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tersedia">Tersedia (Ya/Tidak):</label>
            <select name="tersedia" id="tersedia" class="form-control">
                <option value="1" {{ old('tersedia') == '1' ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ old('tersedia') == '0' ? 'selected' : '' }}>Tidak</option>
            </select>
            @error('tersedia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="berat">Berat (gram):</label>
            <input type="text" name="berat" id="berat" class="form-control" value="{{ old('berat') }}">
            @error('berat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
