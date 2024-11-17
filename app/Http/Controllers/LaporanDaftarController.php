<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class LaporanDaftarController extends Controller
{
    public function create()
    {
    $data['listPoli'] = [
        'poli-umum' => 'Poli Umum',
        'poli-gigi' => 'Poli Gigi',
        'poli-mata' => 'Poli Mata',
        'poli-anak' => 'Poli Anak',
    ];
    return view('laporan_daftar_create', $data);
    }
    public function index(Request $request)
    {
        $models = Daftar::query();

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal_mulai')) {
            $models->whereDate('tanggal_daftar', '=', $request->tanggal_mulai);
        }

        // Filter berdasarkan poli
        if ($request->filled('poli')) {
            $models->where('poli', $request->poli);
        }

        // Urutkan data berdasarkan tanggal terbaru
        $data['models'] = $models->orderBy('tanggal_daftar', 'desc')->get();

        return view('laporan_daftar_index', $data);
    }
}

