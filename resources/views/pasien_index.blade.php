@extends('mylayout', ['tittle' => 'Data Pasien'])
@section('content')
   <div class="card">
        <div class="card-body">
            <h3>Data Pasien</h3>
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
                           <td>{{ $item->nama }}</td>
                           <td>{{ $item->umur }}</td>
                           <td>{{ $item->jenis_kelamin }}</td>
                           <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $pasien->links() !!}
        </div>
    </div>
@endsection