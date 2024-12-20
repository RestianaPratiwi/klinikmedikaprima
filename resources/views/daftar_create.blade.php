@extends('layouts.app_modern',['title'=>'Pendaftaran Pasien'])
@section('content')
    <div class="card">
        <div class="card-header">
             FORM PENDAFTARAN PASIEN
        </div>
    <div class="card-body">
        <form action="/daftar" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="tanggal_daftar">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control"
                value="{{ old('tanggal_daftar') ?? date('Y-m-d') }}">
            <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
        </div>
        <div class="form-group mt-3">
            <label for="pasien_id">Nama Pasien
                |<a href="/pasien/create" target="blank">Pasien Baru</a>
            </label>
            <select name="pasien_id" class="form-control select2">
                <option value=""> Pilih Pasien </option>
                @foreach ($listPasien as $item)
                    <option value="{{ $item->id }}" @selected(old('pasien_id') == $item->id)>
                        {{ $item->no_pasien }} - {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
            <div>
                Setelah menambahkan pasien baru, tekan F5
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="poli">Poli</label>
            <select name="poli" class="form-control">
                <option value=""> Pilih Poli </option>
                @foreach ($listPoli as $itemPoli)
                    <option value="{{ $itemPoli->nama_poli }}" @selected(old('poli') == $itemPoli->nama_poli)>
                    {{ $itemPoli->nama_poli }} -  {{ $itemPoli->biaya_konsultasi }}
                    </option>
                @endforeach
            </select>
                <span class="text-danger">{{ $errors->first('poli_id') }}</span>
        </div>
        <div class="form-group mt-3 mb-3">
            <label for="keluhan">Keluhan</label>
            <textarea for="keluhan" name="keluhan" rows="2" class="form-control">{{ old('keluhan') }}</textarea>
            <span class="text-danger">{{ $errors->first('keluhan') }}</span>
        </div>
         <div class="form-group mt-3 mb-3">
            <label for="diagnosis">Diagnosis</label>
            <textarea for="diagnosis" name="diagnosis" rows="2" class="form-control">{{ old('diagnosis') }}</textarea>
            <span class="text-danger">{{ $errors->first('diagnosis') }}</span>
        </div>
         <div class="form-group mt-3 mb-3">
            <label for="tindakan">Tindakan</label>
            <textarea for="tindakan" name="tindakan" rows="2" class="form-control">{{ old('tindakan') }}</textarea>
            <span class="text-danger">{{ $errors->first('tindakan') }}</span>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pendaftaran</button>

        </form>
    </div>
</div>
@endsection
