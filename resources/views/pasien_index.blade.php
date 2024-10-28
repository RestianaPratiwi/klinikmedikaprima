@extends('layouts.app_modern', ['tittle' => 'Data Pasien'])
@section('content')
   <div class="card">
        <h5 class="card-header">Tambah Data Pasien</h5>
        <div class="card-body">
            <h3>Data Pasien</h3>
            <a href ="/pasien/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO PASIEN</th>
                        <th>NAMA</th>
                        <th>UMUR</th>
                        <th>JENIS KELAMIN</th>
                        <th>TANGGAL BUAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasien as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->no_pasien }}</td>
                           <td>
                                @if ($item->foto)
                                    <img src="{{ asset('/storage/app/public/' . $item->foto) }}" alt="foto" width="50" />
                                @endif
                               {{ $item->nama }}
                           </td>
                           <td>{{ $item->umur }}</td>
                           <td>{{ $item->jenis_kelamin }}</td>
                           <td>{{ $item->created_at }}</td>
                           <td>
                           <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm" 
                                style="font-family: 'Arial', sans-serif; font-weight: bold; color: #fff; 
                                       background: linear-gradient(135deg, #b0bec5, #78909c); padding: 10px 20px; 
                                       border-radius: 5px; text-decoration: none; transition: background 0.3s, transform 0.3s; display: inline-block;">
                                    Edit
                            </a>

                            <style>
                                .btn-warning {
                                   background: linear-gradient(135deg, #b0bec5, #78909c); /* Gradasi abu-abu dasar */
                                }

                                .btn-warning:hover {
                                   background: linear-gradient(135deg, #78909c, #546e7a); /* Gradasi lebih gelap saat hover */
                                   transform: scale(1.05); /* Memperbesar tombol saat hover */
                                   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Bayangan saat hover */
                                } 
                            </style>



                                <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
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
            {!! $pasien->links() !!}
        </div>
    </div>
@endsection