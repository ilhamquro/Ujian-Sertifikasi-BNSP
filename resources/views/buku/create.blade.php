@extends('master.app')
@section('navigasi')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item" aria-current="page">
           <a href="{{ route('buku.index') }}">Buku</a> </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 order-md-1 order-last">
                <div style="float: right">
                    <a href="{{ route('buku.index') }}">
                    <button class="btn btn-warning mt-2">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                    </button>
                    </a>
                </div>
                <h3>Tambah Data</h3>
            </div>
        </div>
    </div>
    <div class="page-content mt-4"> 
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <small class="text-danger">(*) wajib Di isi</small>
                                <form action="{{ route('buku.store')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Judul Buku</label>
                                                <small class="text-danger">*</small>
                                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul">
                                                @error('judul')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <label class="mt-2" for="">Kategori</label>
                                                <small class="text-danger">*</small>
                                                <select class="form-select" id="basicSelect" name="kategori">
                                                    <option hidden></option>
                                                    @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Penulis</label>
                                                <small class="text-danger">*</small>
                                                <input class="form-control @error('penulis') is-invalid @enderror" type="text" name="penulis">
                                                @error('penulis')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <label for="formFile" class="form-label mt-2 mb-0">Sampul Buku</label>
                                                <small class="text-danger">*</small>
                                                <input class="form-control @error('sampul') is-invalid @enderror" type="file" id="formFile" name="sampul">
                                                @error('sampul')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <label for="exampleFormControlTextarea1" class="form-label mt-1 mb-0">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="deskripsi"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <button class="btn btn-primary mt-3" type="submit">
                                    <i class="fa fa-save"></i> Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection