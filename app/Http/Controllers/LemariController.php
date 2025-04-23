<?php

namespace App\Http\Controllers;

use App\Models\Lemari;
use Illuminate\Http\Request;

class LemariController extends Controller
{
    // menampilkan semua data lemari
    public function index()
    {
        $data = Lemari::paginate(5);
        return view('lemari.index', compact('data'));
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
        Lemari::create($input);
        return redirect()->route('lemari.index')->with('success', 'Data berhasil disimpan');

    }

    public function show($id)
    {
        $data = Lemari::findOrFail($id);
        return view('lemari.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Lemari::findOrFail($id);
        $input = $request->all();

        $request->validate([
            'nama_lemari' => 'required|string|min:3|max:30',
            'deskripsi' => 'required|string|min:3|max:100'
        ]);

        $data->update($input);
        return back()->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = Lemari::findOrFail($id);
        $data->delete();
        return redirect()->route('lemari.index')->with('success', 'Data berhasil dihapus');
    }

}
