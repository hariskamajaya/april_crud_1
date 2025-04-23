<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Lemari;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::paginate(5);
        return view('buku.index', compact('data'));
    }

    // menampilkan halaman create
    public function create()
    {
        $lemari = Lemari::all();
        return view('buku.create', compact('lemari'));
    }

    // menyimpan data lemari
    public function store(Request $request)
    {
        // mengambil semua nilai yang ada pada form input.
        $input = $request->all();

        // validator untuk syarat isi form
        $request->validate([
            'nama_lemari' => 'required|string|min:3|max:30|unique:lemari,nama_lemari',
            'deskripsi' => 'required|string|min:3|max:100'
        ]);

        // menyimpan data ke database
        

    }

    public function show($id)
    {

        return view('lemari.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        

        $request->validate([
            'nama_lemari' => 'required|string|min:3|max:30',
            'deskripsi' => 'required|string|min:3|max:100'
        ]);

        
        return back()->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        
    }
}
