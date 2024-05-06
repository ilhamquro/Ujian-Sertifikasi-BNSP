<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
// setlocale(LC_TIME, 'id_ID');
// \Carbon\Carbon::setLocale('id');
// \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

class BukuController extends Controller
{
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $buku = Buku::all();
        return view('buku.index',compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ngambil seluruh data dari kategori untuk ditampilkan di dropdown
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $gambar = $request->sampul;
        // 
        $rules = [
            // format penulisan unique = unique:nama_tabel,field_tabel
            'judul' => 'required',
            'penulis' => 'required',
            'sampul' => 'required|mimes:jpg,png|max:5000',
            // 'jenis' => 'required|max:20|unique'
        ];
        //bikin pesan error
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'mimes' => ':ekstensi file tidak didukung. silahkan gunakan (.jpg / .png)',
            'max' => ':attribute ukuran terlalu besar',
        ];

        //eksekusi fungsinya
        $this->validate($request, $rules, $messages);
        // 
        // 
        // getClientOriginalExtension() = untuk mendapatkan ekstensi file (png,jpg, dsb)
        // getClientOriginalName() = untuk mendapatkan nama file
        $namaFile = time() . rand(100, 999) . "." . $gambar->getClientOriginalExtension();

        $this->buku->sampul = $namaFile;
        $this->buku->judul = $request->judul;
        $this->buku->penulis = $request->penulis;
        $this->buku->deskripsi = $request->deskripsi;
        $this->buku->kategori_id = $request->kategori;

        $gambar->move(public_path(). '/upload', $namaFile);
        $this->buku->save();
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $id)
    {
        //
        
        // $buku = Kategori::findOrFail($show);


        // return view('buku.show', compact('buku'));
        $buku = Buku::findOrFail($id);
        return view('buku.show',compact('buku'));
        
        // $show = Buku::findOrFail($buku);
        // return view('buku.show',compact('show'));
        
        // setlocale(LC_TIME, 'id_ID');
        // \Carbon\Carbon::setLocale('id');
        // \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
        $data = Buku::findOrFail($buku);
        $kategori = Kategori::All();
        return view('buku.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
