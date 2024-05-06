<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public $peserta;
    public function __construct()
    {
        $this->peserta = new Peserta();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 
        $cari = $request->get('search');
        $data = DB::table('peserta')
        ->where('nama', 'like', "%$cari%")
        // ->orWhere('id', '>', "%$cari%")
                ->Paginate(5);
        // $data = Kategori::findOrFail($cari)->Paginate(5);


        $no = 5 * ($data->currentPage() - 1);
        return view('peserta.index', compact('data', 'no','cari'));
    }

    // public function count(Request $request)
    // {
    //     $peserta = Peserta::all();

    //     return view('dashboard',compact('data'));
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            // format penulisan untuk field yang unil = unique:nama_tabel,field_tabel
            'nama' => 'required|min:3|max:20',
            'email' => 'required|min:3|max:20',
            'alamat' => 'required|min:10|max:100',
            'handphone' => 'required|min:3|max:14',
        ];

        // bikin pesan error
        $messages = [
            'required' => ':attribute tidak boleh kosong ',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => ':nama sudah ada, silahkan gunakan yang lain'
        ];

        // eksekusi fungsi
        $this->validate($request, $rules, $messages);

        // pasangkan ke field tablenya
        $this->peserta->nama = $request->nama;
        $this->peserta->email = $request->email;
        $this->peserta->alamat = $request->alamat;
        $this->peserta->handphone = $request->handphone;

        // lalu simpan ke database
        $this->peserta->save(); // query insert into versi laravel

        Alert::success('Successfull', 'Anda Berhasil Mendaftar',);
        // redirect
        // ini gak pake sweet alert
        // return redirect()->route('kategori')->with('status','Successpul..! Data Berhasil di Simpan');

        // ini yang pake sweet alert
        return redirect()->route('peserta');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // lihat data detail
        $peserta = Peserta::findOrFail($id);

        // buat ngecek data kekirim ato nggak
        // dd($peserta);
        return view('peserta/show', compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // redirect halaman edit
        $data = Peserta::findOrFail($id);
        // return view('peserta.edit');
        return view('peserta/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $update = Peserta::find($id);

        // versi kak indra
        // isDirty() buat ngecek ada perubahan ato tidak
            $update->nama = $request->nama;
            $update->email = $request->email;
            $update->alamat = $request->alamat;
            $update->handphone = $request->handphone;
        if ($update->isDirty()) {
            $rules = [
                'nama' => 'required|min:3|max:20',
                'email' => 'required|min:3|max:20',
                'alamat' => 'required|min:10|max:100',
                'handphone' => 'required|min:3|max:14',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong ',
                'min' => ':attribute minimal harus 3 huruf',
                'max' => ':attribute maximal 20 huruf'
            ];
            $this->validate($request, $rules, $messages);
            $update->nama = $request->nama;
            $update->email = $request->email;
            $update->alamat = $request->alamat;
            $update->handphone = $request->handphone;
            $update->save();
            Alert::success('Successfull', 'Anda Berhasil Mengubah',);
            return redirect()->route('peserta');
        } else {
            Alert::warning('Warning', 'Tidak Ada Data Yang Berubah');
            return redirect()->route('peserta');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $peserta = Peserta::find($id);
        // fungsi buat hapus data
        $peserta->delete();
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('peserta');
    }
}
