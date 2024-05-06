@extends('master.app')
@section('navigasi')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                Kategori
            </a>
        </li>
        @foreach ($buku as $item)
        <li class="breadcrumb-item active" aria-current="page">Detail buku : {{$item->judul}}</li>
        @endforeach
    </ol>
</nav>
@endsection
@section('konten')
<div class="page-heading">
    <div class="page-content mt-4"> 
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                {{-- <h3> {{ $buku['judul']}}</h3> --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="text-primary">Detail Buku</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('buku.index') }}">
                                            <button class="btn btn-warning mt-2 float-end">
                                                <i class="fa fa-arrow-circle-left"></i> Kembali
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                @foreach ($buku as $item)
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('upload') . "/" . $item->sampul }}" width="90%">
                                    </div>
                                    <div class="col-md-9">
                                        <p><b>Judul :</b> {{$item->judul}}</p>
                                        <br>
                                        <p><b>Penulis :</b>{{$item->penulis}}</p>
                                        <br>
                                        <p><b>Kategori :</b>{{$item->category->kategori}}</p>
                                        <br>
                                        <p><b>Tanggal :</b>{{$item->created_at}}</p>
                                        <br>
                                        <p><b>Deskripsi :</b>{{$item->deskripsi}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection