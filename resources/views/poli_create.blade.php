@extends('layouts.app_modern', ['tittle' => 'Tambah Poli'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Poli</h5>
        <div class="card-body">
            <form action="/poli" method="POST">
                @csrf
               <div class="form-group mt-1 mb-3">
                    <label for="nama_poli">Nama Poli</label>
                    <input type="text" class="form-control @error('nama_poli') is-invalid @enderror" id="nama_poli"
                        name="nama_poli" value="{{ old('nama_poli') }}">
                    <span class="text-danger">{{ $errors->first('nama_poli') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="biaya_konsultasi">Biaya Konsultasi</label>
                    <input type="text" class="form-control @error('biaya_konsultasi') is-invalid @enderror" id="biaya_konsultasi"
                        name="biaya_konsultasi" value="{{ old('biaya_konsultasi') }}">
                    <span class="text-danger">{{ $errors->first('biaya_konsultasi') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" value="{{ old('keterangan') }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>


@endsection