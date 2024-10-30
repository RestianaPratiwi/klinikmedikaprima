@extends('layouts.app_modern_laporan')

@section('content')
    <div class="container py-4">
        <div class="text-center mb-4">
            <h3 class="text-primary font-weight-bold">LAPORAN DATA PASIEN</h3>
            <p class="text-muted">Laporan Tanggal: <strong>{{ request('tanggal_mulai') }}</strong></p>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center" width="5%">NO</th>
                        <th class="text-center">No Pasien</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Tanggal Daftar</th>
                        <th class="text-center">Poli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->pasien->no_pasien }}</td>
                            <td>{{ $item->pasien->nama }}</td>
                            <td class="text-center">{{ $item->pasien->umur }}</td>
                            <td class="text-center">{{ $item->pasien->jenis_kelamin }}</td>
                            <td class="text-center">{{ $item->tanggal_daftar }}</td>
                            <td class="text-center">{{ $item->poli_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* General styling for a modern and clean look */
        .text-primary {
            color: #007bff;
        }

        /* Alternating row colors for better readability */
        .table-hover tbody tr:nth-of-type(odd) {
            background-color: #f9fbfd;
        }
        
        .table th, .table td {
            vertical-align: middle;
        }

        /* Border and shadow effects for table */
        .table-bordered {
            border: 2px solid #dee2e6;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Row hover effect for highlighting */
        .table-hover tbody tr:hover {
            background-color: #e9f5ff;
        }

        /* Padding and border radius for a softer look */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
