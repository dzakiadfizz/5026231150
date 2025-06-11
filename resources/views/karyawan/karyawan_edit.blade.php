@extends("template")

@section("content")
    <div class="container">
        <h2>Edit Karyawan</h2>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('karyawan.update', $karyawan->kodepegawai) }}" method="POST" class="form-horizontal mt-3">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="kodepegawai" class="col-sm-2 col-form-label">Kode Pegawai:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="kodepegawai" name="kodepegawai" value="{{ $karyawan->kodepegawai }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="{{ old('namalengkap', $karyawan->namalengkap) }}" maxlength="50" required>
                    @error('namalengkap')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="divisi" class="col-sm-2 col-form-label">Divisi:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="divisi" name="divisi" value="{{ old('divisi', $karyawan->divisi) }}" maxlength="5" required>
                    @error('divisi')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="departemen" class="col-sm-2 col-form-label">Departemen:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="departemen" name="departemen" value="{{ old('departemen', $karyawan->departemen) }}" maxlength="10" required>
                    @error('departemen')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
@endsection
