<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data buku dari database
        $allBuku = Buku::all();
        // menampilkan data buku ke view
        // folder buku file index
        // mengirim data menggunakan compact
        return view('buku.index', compact('allBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengirim data penerbit dan kategori
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        // menampilkan form untuk membuat data buku baru
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses saat submit data form
        // validasi
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
        ]);

        // simpan data
        Buku::create($validatedData);

        // redirect ke halaman index
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        // menampilkan detail buku
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        // mengirim data penerbit dan kategori
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        // menampilkan form untuk edit data buku
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        // proses saat submit update data form
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
        ]);

        // simpan update data
        $buku->update($validatedData);

        // redirect ke halaman index
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        // proses saat hapus data
        $buku->delete();
        // redirect ke halaman index
        return redirect()->route('buku.index');
    }
}
