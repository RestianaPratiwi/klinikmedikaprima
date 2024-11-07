@extends('layouts.app_modern', ['title' => 'Edit Data Pasien'])

@section('content')
<div class="container mt-5">
    <div class="card rounded-4" style="border: none; background: #ffffff;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4 text-primary">Edit Data Pasien</h5>
            <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                <div class="form-group mb-3">
                    <label for="foto" class="form-label">Foto Pasien</label>
                    <div class="mb-3">
                        <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                        
                        <!-- Menampilkan foto yang sudah ada jika ada -->
                     @if($pasien->foto)
                        <img src="{{ asset('storage/uploads/pasien/' . $pasien->foto) }}" width="120" class="mt-2 rounded-circle border border-secondary" alt="Foto Pasien">
                    @endif


                    </div>
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $pasien->nama }}" placeholder="Masukkan nama pasien" required>
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label for="no_pasien" class="form-label">Nomor Pasien</label>
                    <input type="text" class="form-control @error('no_pasien') is-invalid @enderror" id="no_pasien" name="no_pasien" value="{{ old('no_pasien') ?? $pasien->no_pasien }}" placeholder="Masukkan nomor pasien" required>
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur') ?? $pasien->umur }}" placeholder="Masukkan umur pasien" required>
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki" {{ (old('jenis_kelamin') ?? $pasien->jenis_kelamin) === 'laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ (old('jenis_kelamin') ?? $pasien->jenis_kelamin) === 'perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>

                <div class="form-group mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat pasien" required>{{ old('alamat') ?? $pasien->alamat }}</textarea>
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill">Update Data Pasien</button>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control {
        border-radius: 25px;
    }
    
    .form-check-input {
        width: 1.25em;
        height: 1.25em;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
@endsection
