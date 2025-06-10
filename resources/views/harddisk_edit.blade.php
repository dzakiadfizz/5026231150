@extends("template") {{-- Asumsi ini adalah nama layout utama Anda --}}

@section("content")
    <h3>Form Edit Harddisk</h3>

    <a href="/harddisk" class="btn btn-secondary mb-3"> Kembali</a>

    {{-- Pastikan action mengarah ke rute update dan method POST --}}
    <form action="/harddisk/update" method="POST">
        @csrf {{-- Token CSRF untuk keamanan --}}
        {{-- Method spoofing jika rute update Anda disetel sebagai PUT/PATCH, bukan POST --}}
        {{-- @method('PUT') --}}

        {{-- Hidden input untuk mengirim harddisk_id yang akan diupdate --}}
        <input type="hidden" name="id" value="{{ $harddisk->harddisk_id }}">

        <div class="form-group">
            <label for="merk">Merk Harddisk:</label>
            {{-- value="{{ old('merk', $harddisk->harddisk_merk) }}" untuk mempertahankan input jika ada error validasi --}}
            <input type="text" name="merk" id="merk" class="form-control" value="{{ old('merk', $harddisk->harddisk_merk) }}">
            @error('merk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga">Harga Harddisk:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $harddisk->harddisk_harga) }}">
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tersedia">Tersedia (Ya/Tidak):</label>
            <select name="tersedia" id="tersedia" class="form-control">
                <option value="1" {{ old('tersedia', $harddisk->harddisk_tersedia) == '1' ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ old('tersedia', $harddisk->harddisk_tersedia) == '0' ? 'selected' : '' }}>Tidak</option>
            </select>
            @error('tersedia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="berat">Berat (gram):</label>
            <input type="text" name="berat" id="berat" class="form-control" value="{{ old('berat', $harddisk->harddisk_berat) }}">
            @error('berat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
@endsection
