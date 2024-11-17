@extends('layouts.app_modern')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center py-5">
        <div class="col-md-12">
            <div class="card shadow-lg" style="background-color: rgba(255, 255, 255, 0.85);">                    
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Dashboard Medika Prima</h4>
                    <span>{{ now()->format('d M Y') }}</span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Welcome Section with Image -->
                    <div class="text-center mb-5">
                     <img src="/modern/src/assets/images/logos/klinik.jpg" class="img-fluid mb-3 rounded-circle" alt="Clinic Logo" style="width: 200px; height: 200px; border: 5px solid #007bff;">
                        <h2 class="text-primary">Selamat Datang di Klinik Medika Prima</h2>
                        <p class="lead text-muted">Kami senang bisa melayani Anda dengan perawatan medis terbaik.</p>
                    </div>

                    <!-- Statistics Section -->
                 

                    <!-- Recent Activities Section -->
                  

                    <!-- Call to Action Buttons -->
                    <div class="mt-4 text-center">
                        <a href="/laporan-pasien/create" class="btn btn-primary btn-lg">Lihat Data Pasien</a>
                        <a href="/laporan-daftar/create" class="btn btn-primary btn-lg">Lihat Data Pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
