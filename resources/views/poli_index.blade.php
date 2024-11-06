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
                        <th>DOKTER</th>
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
                        
                                <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
                                
                                   <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm text-white" 
                                        style="font-family: 'Arial', sans-serif; font-weight: bold; 
                                        background: linear-gradient(135deg, #b0bec5, #78909c); 
                                        padding: 10px 20px; border-radius: 5px; text-decoration: none; 
                                        transition: background 0.3s, transform 0.3s; display: inline-block; border: none;"
                                        onmouseover="this.style.transform='scale(1.1)';"
                                        onmouseout="this.style.transform='scale(1)';">
                                        Edit
                                    </a>

                                    <a href="/poli/{{ $item->id }}" class="btn btn-info btn-sm text-white"
                                        style="background: linear-gradient(135deg, #17a2b8, #117a8b); border: none; 
                                        padding: 10px 20px; border-radius: 5px; transition: background 0.3s, transform 0.3s; 
                                        display: inline-block;"
                                        onmouseover="this.style.transform='scale(1.1)';"
                                        onmouseout="this.style.transform='scale(1)';">
                                        Detail
                                    </a>

                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white" 
                                          style="background: linear-gradient(135deg, #f44336, #c62828); border: none; padding: 10px 20px; 
                                          border-radius: 5px; transition: background 0.3s, transform 0.3s; display: inline-block;" 
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
            {!! $poli->links() !!}
        </div>
    </div>
@endsection