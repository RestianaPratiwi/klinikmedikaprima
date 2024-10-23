@extends('layouts.app_modern', ['tittle' => 'Data Pendaftaran'])
@section('content')
   <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <h3>Data Pendaftaran</h3>
            <form action="">
            <div class="row g-3 ">
                <div class="col">
                    <input type="text" name="q" class="form-control" placeholder="Nama atau nomor pasien" value="{{ request('q') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <a href ="/daftar/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>TANGGAL DAFTAR</th>
                        <th>POLI</th>
                        <th>KELUHAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftar as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->pasien->nama }}</td>
                           <td>{{ $item->pasien->jenis_kelamin }}</td>
                           <td>{{ $item->tanggal_daftar }}</td>
                           <td>{{ $item->poli_id }}</td>
                           <td>{{ $item->keluhan }}</td>
                           <td>
                               
                                <a href="/daftar/{{ $item->id }}" class="btn btn-info btn=sm">Detail</a>
                                <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline">
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
            {!! $daftar->links() !!}
        </div>
    </div>
@endsection