<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Lemari;
use Carbon\Carbon;
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
            'judul_buku' => 'required|string|min:3|max:30|unique:buku,judul_buku',
            'penulis' => 'required|string|min:3|max:100',
            'penerbit' => 'required|string|min:3|max:100',
            'cover' => 'required|file|max:10240',
            'deskripsi' => 'required|string|min:3|max:200',
        ]);

        if($request->hasFile('cover'))
        {
            $gambar = $request->file('cover'); //mengambil data file yang di upload
            $path = 'public/images/cover';
            $ext = $gambar->getClientOriginalExtension();
            $nama = 'cover_'.Carbon::now()->format('Ymdhis').'.'.$ext;
            $gambar->storeAs($path, $nama);
            $input['cover'] = $nama;
        }
        
        Buku::create($input);
        return redirect()->route('buku.index')->with('success', 'Data berhasil dibuat');

    }

    public function show($id)
    {
        $data = Buku::findOrFail($id);
        $lemari = Lemari::all();
        return view('buku.detail', compact('data', 'lemari'));
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
