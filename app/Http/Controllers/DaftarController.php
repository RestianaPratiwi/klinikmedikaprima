<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->filled('q')) {
            $data['daftar'] = \App\Models\Daftar::search(request('q'))->paginate(10);
        }else{
            $data['daftar'] = \App\Models\Daftar::latest()->paginate(10);
        }
        
        return view('daftar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] = \App\Models\Poli::orderBy('nama_poli', 'asc')->get();
        return view('daftar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'pasien_id' => 'required',
            'tanggal_daftar' => 'required',
            'poli' => 'required',
            'keluhan' => 'required',
            'diagnosis' => 'nullable',
            'tindakan' => 'nullable'
        ]);
        $daftar = new Daftar();
        $daftar->fill($requestData);
        $daftar->save();
        flash('Data berhasil disimpan')->success();
        return redirect('/daftar');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['daftar'] = Daftar::findOrFail($id);
        return view('daftar_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
           'diagnosis' => 'required',
           'tindakan' => 'required'
        ]);
        $daftar = \App\Models\Daftar::findOrfail($id);
        $daftar->fill($requestData); //mengisi objek dengan data yang sudah divalidasi requestData
        $daftar->save();
        flash('Data anda berhasil diupdate')->success();
        return redirect('/daftar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daftar = daftar::findOrfail($id);
        $daftar->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
