@extends('layouts.app_modern')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg" style="background-color: #f8f9fa;">
                    <div class="card-header bg-primary text-white text-center" style="font-size: 1.5rem; font-weight: bold;">
                        LAPORAN PENDAFTARAN
                    </div>
                    <div class="card-body">
                        <form action="/laporan-daftar" method="GET" target="_blank">
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="tanggal_mulai" class="font-weight-bold text-primary">Tanggal Daftar</label>
                                    <input type="date" name="tanggal_mulai" class="form-control shadow-sm" style="border-radius: 8px;">
                                </div>
                                 <div class="form-group col-md-4">
                                    <label for="jenis_kelamin" class="font-weight-bold text-primary">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control shadow-sm" style="border-radius: 8px;">
                                        <option value="">Semua Data</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="poli" class="font-weight-bold text-primary">Pilih Poli</label>
                                    <select name="poli" class="form-control shadow-sm" style="border-radius: 8px;">
                                        <option value="">Semua Data</option>
                                        @foreach ($listPoli as $key => $val)
                                            <option value="{{ $key }}" @selected(old('poli') == $key)>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="padding: 10px 30px; font-weight: bold; border-radius: 10px; transition: background 0.3s, transform 0.3s;">
                                    Cetak
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus {
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.25);
            border-color: #007bff;
        }

        .btn-primary:hover {
            background: #0056b3;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }
    </style>
@endsection
