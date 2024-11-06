@extends('layouts.app_modern', ['title' => 'Detail Pasien'])

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top">
            <h4 class="fw-bold mb-0">Detail Pasien</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th class="bg-light">ID</th>
                            <td><strong>#{{ $pasien->id }}</strong></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nomor Pasien</th>
                            <td>{{ $pasien->no_pasien }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nama Pasien</th>
                            <td>{{ $pasien->nama }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Umur</th>
                            <td>{{ $pasien->umur }}</td>
                        </tr>
                         <tr>
                            <th class="bg-light">Jenis Kelamin</th>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                        </tr>
                         <tr>
                            <th class="bg-light">Alamat</th>
                            <td>{{ $pasien->alamat }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Dibuat Pada</th>
                            <td>{{ \Carbon\Carbon::parse($pasien->created_at)->isoFormat('DD MMMM YYYY, HH:mm') }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Diperbarui Pada</th>
                            <td>{{ \Carbon\Carbon::parse($pasien->updated_at)->isoFormat('DD MMMM YYYY, HH:mm') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="text-end mt-4">
                <a href="/pasien" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
    }

    .table th {
        width: 25%;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-secondary {
        border-radius: 20px;
    }

    .text-end .btn-secondary {
        margin-right: 10px;
    }
</style>
@endsection
