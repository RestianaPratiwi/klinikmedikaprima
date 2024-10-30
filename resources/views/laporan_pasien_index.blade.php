@extends('layouts.app_modern_laporan')

@section('content')
    <div class="container py-4">
        <div class="text-center mb-4">
            <h3 class="text-primary" style="font-weight: bold;">LAPORAN DATA PASIEN</h3>
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
                        <th class="text-center">Tanggal Buat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->no_pasien }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->umur }}</td>
                            <td class="text-center">{{ $item->jenis_kelamin }}</td>
                            <td class="text-center">{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Styling table rows for alternating background colors */
        .table-hover tbody tr:nth-of-type(odd) {
            background-color: #f9fbfd;
        }
        
        .table th, .table td {
            vertical-align: middle;
        }

        /* Table border and shadow */
        .table-bordered {
            border: 2px solid #dee2e6;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Row hover effect */
        .table-hover tbody tr:hover {
            background-color: #e9f5ff;
        }
    </style>
@endsection
