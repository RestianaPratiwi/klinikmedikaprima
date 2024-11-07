<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_pasien' => 'required',
            'nama' => 'required|min:3',
            'umur' => 'required',
            'alamat' => 'nullable',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
        ]);
    
        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto')) {
            // Menyimpan foto di folder public/uploads/pasien
            $imageName = time() . '.' . $request->foto->extension();
    
            // Menyimpan foto menggunakan putFileAs di disk public
            Storage::disk('public')->putFileAs(
                'uploads/pasien',       // Folder penyimpanan
                $request->foto,         // File yang akan diupload
                $imageName              // Nama file yang disimpan
            );
        } else {
            $imageName = null; // Jika tidak ada foto, set null
        }
    
        // Menyimpan data pasien ke database
        Pasien::create([
            'no_pasien' => $request->no_pasien,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $imageName,  // Menyimpan nama file foto
        ]);
    
        return back();
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['pasien'] = Pasien::findOrFail($id);
        return view('pasien_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien_edit', compact('pasien'));
    }


    /**
     * Update the specified resource in storage.
     */
    // PasienController.php
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'umur' => 'required',
            'alamat' => 'nullable',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10000'
        ]);
    
        $pasien = Pasien::findOrFail($id);
    
        // Periksa apakah ada file foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pasien->foto) {
                Storage::disk('public')->delete('uploads/pasien/' . $pasien->foto);
            }
    // Simpan foto baru menggunakan Storage disk public
$imageName = time() . '.' . $request->foto->extension();
Storage::disk('public')->putFileAs('uploads/pasien', $request->foto, $imageName);

// Set nama foto baru pada data pasien
$requestData['foto'] = $imageName;

        }
    
        // Update data pasien
        $pasien->update($requestData);
    
        flash('Data anda berhasil diubah')->success();
        return redirect('/pasien');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrfail($id);

        if ($pasien->daftar->count() >= 1) {
            flash('Data tidak bisa dihapus karena terkait dengan data pendaftaran')->error();
            return back();
        }

        if ($pasien->foto !=null && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }
        $pasien->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
