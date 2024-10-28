@extends('layouts.app_modern', ['tittle' => 'Data Pendaftaran'])
@section('content')
   <div class="card">
        <h5 class="card-header">Data Pendaftaran</h5>
        <div class="card-body">
            <h3>Data Pendaftaran</h3>
            <form action="">
            <div class="row g-3 ">
                <div class="col">
                    <input type="text" name="q" class="form-control" placeholder="Nama Pasien" value="{{ request('q') }}">
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
                               
                               <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm px-4 py-2 shadow-sm text-white" 
                                    style="background: linear-gradient(135deg, #17a2b8, #117a8b); border: none; 
                                           transition: transform 0.2s, box-shadow 0.2s; display: inline-block;">
                                       Detail
                                </a>

                                <style>
                                    .btn-info {
                                          background: linear-gradient(135deg, #17a2b8, #117a8b); /* Gradasi warna tetap */
                                    }

                                    .btn-info:hover {
                                          transform: scale(1.05); /* Memperbesar tombol saat hover */
                                          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Bayangan saat hover */
                                    }
                                </style>

                                



                                
                                <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                       <button type="submit" class="btn btn-danger btn-sm"
                                         style="background: linear-gradient(135deg, #f44336, #c62828); border: none; padding: 10px 20px; transition: transform 0.3s, box-shadow 0.3s;"
                                         onclick="return confirm('Anda yakin ingin menghapus data?')">
                                         Hapus
                                     </button>

                                    <style>
                                        .btn-danger {
                                           background: linear-gradient(135deg, #e57373, #c62828); /* Gradasi merah dasar */
                                        }

                                        .btn-danger:hover {
                                           background: linear-gradient(135deg, #c62828, #b71c1c); /* Gradasi lebih gelap saat hover */
                                           transform: scale(1.05); /* Memperbesar tombol saat hover */
                                           box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Bayangan saat hover */
                                        }
                                    </style>

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