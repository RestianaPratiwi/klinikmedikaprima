<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = \App\Models\Poli::latest()->paginate(10);
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama_poli' => 'required',
            'biaya_konsultasi' => 'required',
            'keterangan' => 'nullable'
        ]);
        $poli = new \App\Models\Poli;
        $poli->fill($requestData);
        $poli->save();
        flash('Data berhasil disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['poli'] = Poli::findOrFail($id);
        return view('poli_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['poli'] = Poli::findOrFail($id);
        return view('poli_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $requestData = $request->validate([
            'nama_poli' => 'required',
            'biaya_konsultasi' => 'required',
            'keterangan' => 'nullable',
        ]);
    
        // Cari data yang akan diupdate
        $poli = \App\Models\Poli::findOrFail($id);
    
        // Mengisi data baru dan update
        $poli->fill($requestData);
        $poli->save();
    
        // Menampilkan pesan sukses
        flash('Data Anda berhasil diubah')->success();
        
        // Redirect setelah update
        return redirect('/poli');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = poli::findOrfail($id);
        $poli->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
