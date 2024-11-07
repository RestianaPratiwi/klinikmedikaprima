@extends('layouts.app_modern', ['title' => 'Edit Data Poli'])

@section('content')
<div class="container mt-5">
    <div class="card rounded-4" style="border: none; background: #ffffff;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4 text-primary">Edit Data Poli</h5>
            <form action="/poli/{{ $poli->id }}" method="POST">
                @method('put')
                @csrf
                
                <div class="form-group mb-3">
                    <label for="nama_poli" class="form-label">Nama Poli</label>
                    <input type="text" class="form-control @error('nama_poli') is-invalid @enderror" id="nama_poli" name="nama_poli" value="{{ old('nama_poli') ?? $poli->nama_poli }}" placeholder="Masukkan nama poli" required>
                    <span class="text-danger">{{ $errors->first('nama_poli') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label for="biaya_konsultasi" class="form-label">Biaya Konsultasi</label>
                    <input type="text" class="form-control @error('biaya_konsultasi') is-invalid @enderror" id="biaya_konsultasi" name="biaya_konsultasi" value="{{ old('biaya_konsultasi') ?? $poli->biaya_konsultasi }}" placeholder="Masukkan biaya" required>
                    <span class="text-danger">{{ $errors->first('biaya_konsultasi') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') ?? $poli->keterangan }}" placeholder="Masukkan keterangan" required>
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>

                <!-- Tombol Update dan Kembali dengan ukuran medium dan sejajar -->
<div class="d-flex gap-2 mt-4">
    <a href="/poli" class="btn btn-primary btn-md rounded-pill">Kembali</a>
    <button type="submit" class="btn btn-primary btn-md rounded-pill">Update Data Poli</button>
</div>






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
