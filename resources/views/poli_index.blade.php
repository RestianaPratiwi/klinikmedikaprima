@extends('layouts.app_modern', ['tittle' => 'Data Pendaftaran'])
@section('content')
   <div class="card">
        <h5 class="card-header">Data Poli</h5>
        <div class="card-body">
            <h3>Data Poli</h3>
            <a href ="/poli/create" class="btn btn-primary">Tambah Poli</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA POLI</th>
                        <th>BIAYA KONSULTASI</th>
                        <th>KETERANGAN</th>
                        <th>DATE TIME</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poli as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->nama_poli }}</td>
                           <td>{{ $item->biaya_konsultasi }}</td>
                           <td>{{ $item->keterangan }}</td>
                           <td>{{ $item->created_at }}</td>
                           <td>
                                <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn=sm">Edit</a>

                                <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn=sm"
                                        onclick="return confirm('Anda yakin ingin menghapus data?')">
                                        Hapus
                                    </button>
                                </form>  
                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $poli->links() !!}
        </div>
    </div>
@endsection