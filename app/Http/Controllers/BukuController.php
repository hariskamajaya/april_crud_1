<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        
    }

    // menampilkan halaman create
    public function create()
    {
        return view('lemari.create');
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
