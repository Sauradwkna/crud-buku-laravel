<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mendapatkan semua data kategori dari model
        $allKategori = Kategori::all();
        // menampilkan data ke view
        // folder kategori file index
        // mengirimkan data menggunakan compact
        return view('kategori.index', compact('allKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampikan form
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses saat submit data form
        // buat validasi
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        // simpan data
        Kategori::create($validatedData);

        // redirect ke index kategori
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        // menampikan detail data kategori
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        // menampikan form edit
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // proses saat submit update data form
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        // simpan update data
        $kategori->update($validatedData);

        // redirect ke index kategori
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        // hapus data kategori
        $kategori->delete();
        // redirect ke index kategori
        return redirect()->route('kategori.index');
    }
}
