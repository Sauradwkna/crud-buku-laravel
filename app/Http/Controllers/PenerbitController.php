<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mendapatkan semua data penerbit dari model
        $allPenerbit = Penerbit::all();
        // menampilkan data ke view
        // folder penerbit file index
        // mengirim data menggunakan compact
        return view('penerbit.index', compact('allPenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan form untuk membuat data baru
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses saat submit data form
        // validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100',
        ]);

        // simpan data
        Penerbit::create($validatedData);

        // redirect ke halaman index
        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        // menampilkan detail 
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $penerbit)
    {
        // menampilkan form untuk mengedit data
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        // proses saat submit update data form
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100',
        ]);

        // simpan update data
        $penerbit->update($validatedData);
        
        // redirect ke halaman index
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $penerbit)
    {
        // proses saat hapus data
        $penerbit->delete();
        // redirect ke halaman index
        return redirect()->route('penerbit.index');
    }
}
