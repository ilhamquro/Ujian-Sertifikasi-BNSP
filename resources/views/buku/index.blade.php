@extends('master.app')
@section('navigasi')
    <nav class="mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Buku</li>
        </ol>
    </nav>
@endsection
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
            </div>
        </div>
        <div class="page-content mt-4">
            <section class="section">
                {{-- @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <i class="fa fa-check-circle"></i> {{session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-9 order-md-1 order-last">
                                        <h3>Data Buku</h3>
                                        <a href="{{ route('buku.create') }}">
                                            <button class="btn btn-primary mt-2">
                                                <i class="fa fa-plus-circle"></i> Tambah Data
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-3 order-last">
                                        <form class="d-flex mt-5" role="search">
                                            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-success d-flex" type="submit"><i class="fa fa-search px-1 pt-1"></i>Cari</button>
                                          </form>
                                    </div>
                                </div>
                                    <div class="table-responsive">
                                        {{-- {{$tes}} --}}
                                        <table class="table table-lg table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sampul</th>
                                                    <th>Judul Buku</th>
                                                    <th>Penulis</th>
                                                    <th>Kategori</th>
                                                    <th style="width: 30%"> Deskripsi</th>
                                                    <th style="width: 20%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($buku as $item)
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <div class="avatar avatar-lg">
                                                                <img src="{{ asset('upload') . "/" . $item->sampul }}">
                                                                {{-- <span class="avatar-status bg-success"></span> --}}
                                                            </div>
                                                        </td>
                                                        <td>{{$item->judul}}</td>
                                                        <td>{{$item->penulis}}</td>
                                                        <td>{{$item->category->kategori}}</td>
                                                        <td>{{ Str::limit($item->deskripsi, 100, ' (...)')}}</td>
                                                        <td>
                                                            <div class="buttons">
                                                                <a href="{{ route('buku.show', $item->id) }}" class="btn icon btn-primary">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>
                                                                <a href="#" class="btn icon btn-warning">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="#" class="btn icon btn-danger" onclick="return confirm('Apakah yakin ingin di hapus?')">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection