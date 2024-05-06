<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    public $kategori;
    public function __construct()
    {
        $this->kategori = new Kategori();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //menampilkan semua data dari tabel kategori
        // menggunakan syntaks eloquent
        // $data = Kategori::all();
        // menggunakan query builder
        // $data = DB::table('kategori')->get();
        $cari = $request->get('search');
        $data = DB::table('kategori')
        ->where('kategori', 'like', "%$cari%")
        // ->orWhere('id', '>', "%$cari%")
                ->Paginate(5);
        // $data = Kategori::findOrFail($cari)->Paginate(5);


        $no = 5 * ($data->currentPage() - 1);
        return view('kategori.index', compact('data', 'no','cari'));
        // return view('kategori.index', [
        //     'data' => DB::table('kategori')->paginate(10)
        // ]);
    }
    public function count(Request $request)
    {
        $buku = Buku::all();
        $kategori = Kategori::all();

        return view('dashboard',compact('buku','kategori'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect ke form tambah
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // nyimpan data jika tombol simpan diklik

        // tangkep dulu inputan user
        // dd($request->all());

        // validasi v.1 => pesan menggunakan b.inggris (bawaan laravel)
        // $validated = $request->validate([
        //     'kategori' => 'required|max:20',
        // ]);
        // validasi v.2  => pesan buat sendiri
        // aturan main
        $rules = [
            // format penulisan untuk field yang unil = unique:nama_tabel,field_tabel
            'kategori' => 'required|min:3|max:20|unique:kategori,kategori',
        ];

        // bikin pesan error
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain'
        ];

        // eksekusi fungsinya
        $this->validate($request, $rules, $messages);

        // pasangkan ke field tablenya
        $this->kategori->kategori = $request->kategori;

        // lalu simpan ke database
        $this->kategori->save(); // query insert into versi laravel

        Alert::success('Successpull', 'Data Berhasil di Tambahkan',);
        // redirect
        // ini gak pake sweet alert
        // return redirect()->route('kategori')->with('status','Successpul..! Data Berhasil di Simpan');

        // ini yang pake sweet alert
        return redirect()->route('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // lihat data detail
        $kategori = Kategori::findOrFail($id);

        // buat ngecek data kekirim ato nggak
        // dd($kategori);
        return view('kategori/show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // redirect halaman edit
        $data = Kategori::findOrFail($id);
        // return view('kategori.edit');
        return view('kategori/edit', compact('data'));
        // return view('kategori/edit', 'id');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Kategori::find($id);

        // versi kak indra
        // isDirty() buat ngecek ada perubahan ato tidak
        $update->kategori = $request->kategori;
        if ($update->isDirty()) {
            $rules = [
                'kategori' => 'required|min:3|max:20|unique:kategori,kategori'
            ];
            $messages = [
                'required' => ':attribute gak boleh kosong masseeh',
                'min' => ':attribute minimal harus 3 huruf',
                'max' => ':attribute maximal 20 huruf',
                'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            ];
            $this->validate($request, $rules, $messages);
            $update->kategori = $request->kategori;
            $update->save();
            Alert::success('Successpull', 'Data Berhasil di Update');
            return redirect()->route('kategori');
        } else {
            Alert::warning('Why??', 'Data tidak di Ubah');
            return redirect()->route('kategori');
        }

        // versi gua
        //         if ($update->kategori == $request->kategori) {
        //             $rules = [
        //                 'kategori' => 'required|min:3|max:20'
        //             ];
        //         } else {
        //             $rules = [
        //                 'kategori' => 'required|min:3|max:20|unique:kategori,kategori'
        //             ];
        //         }
        // 
        // $messages = [
        //     'required' => ':attribute gak boleh kosong masseeh',
        //     'min' => ':attribute minimal harus 3 huruf',
        //     'max' => ':attribute maximal 20 huruf',
        //     'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
        // ];

        // $this->validate($request, $rules, $messages);
        // $update->kategori = $request->kategori;
        // $update->save();
        // $change = $update->getChanges();
        // if (!empty($change)) {
        //     # code...
        //     Alert::success('Successpull', 'Data Berhasil di Update');
        // } else {
        //     Alert::warning('Why??', 'Data tidak di Ubah');
        // }
        // return redirect()->route('kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ambil data sesuai id
        $kategori = Kategori::find($id);
        // fungsi buat hapus data
        $kategori->delete();
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('kategori');
    }

    public function history()
    {
    }
}
