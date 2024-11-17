@extends('layouts.app_modern', ['title' => 'Detail Pendaftaran Pasien'])
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="m-0 text-center">
                            <i class="fas fa-notes-medical"></i> DATA PENDAFTARAN 
                            <strong>{{ strtoupper($daftar->pasien->nama) }}</strong>
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Data Pasien -->
                        <h5 class="mb-3"><i class="fas fa-user"></i> Data Pasien</h5>
                        <table class="table table-borderless mb-4">
                            <tbody>
                                <tr>
                                    <th width="20%">No Pasien</th>
                                    <td>{{ $daftar->pasien->no_pasien }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td>{{ $daftar->pasien->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $daftar->pasien->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td>{{ $daftar->pasien->umur }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>
                                        <img src="{{ asset('storage/uploads/pasien/' . $daftar->pasien->foto) }}" 
                                             alt="Foto Pasien" 
                                             class="img-thumbnail shadow-sm" 
                                             width="150" 
                                             height="150">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Riwayat Pasien -->
                        <h5 class="mb-3"><i class="fas fa-history"></i> Riwayat Pasien</h5>
                        <table class="table table-striped table-hover shadow-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosis</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar->pasien->daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_daftar }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>{{ $item->diagnosis }}</td>
                                        <td>{{ $item->tindakan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Data Pendaftaran -->
                        <h5 class="mb-3"><i class="fas fa-file-medical"></i> Data Pendaftaran</h5>
                        <table class="table table-borderless mb-4">
                            <tbody>
                                <tr>
                                    <th width="20%">No Pendaftaran</th>
                                    <td>{{ $daftar->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Daftar</th>
                                    <td>{{ $daftar->tanggal_daftar }}</td>
                                </tr>
                                <tr>
                                    <th>Poli</th>
                                    <td>{{ $daftar->poli }}</td>
                                </tr>
                                <tr>
                                    <th>Keluhan</th>
                                    <td>{{ $daftar->keluhan }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Hasil Diagnosis -->
                        <h5 class="mb-3"><i class="fas fa-stethoscope"></i> Hasil Diagnosis</h5>
                        <form action="/daftar/{{ $daftar->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="diagnosis" class="form-label">Diagnosis</label>
                                <textarea name="diagnosis" class="form-control shadow-sm" rows="3">{{ $daftar->diagnosis }}</textarea>
                                <span class="text-danger">{{ $errors->first('diagnosis') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <textarea name="tindakan" class="form-control shadow-sm" rows="3">{{ $daftar->tindakan }}</textarea>
                                <span class="text-danger">{{ $errors->first('tindakan') }}</span>
                            </div>
                            <div class="d-flex gap-2">
                                <!-- Tombol Kembali -->
                                    <a href="/daftar" class="btn btn-primary btn-lg shadow-lg rounded-pill">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>

                                <!-- Tombol Simpan -->
                                    <button type="submit" class="btn btn-primary btn-lg shadow-lg rounded-pill">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
