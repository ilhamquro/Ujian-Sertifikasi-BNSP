@extends('master.app')
@section('navigasi')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
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
            {{-- @if (session('status')) --}}
                {{-- <div class="alert alert-success alert-dismissible show fade">
                <i class="fa fa-check-circle"></i>  {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> --}}
            {{-- @endif --}}
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9 order-md-1 order-last">
                                            <h3>Data Kategori</h3>
                                            <a href="{{ route('kategori.create') }}">
                                            <button class="btn btn-success mt-2">
                                               <i class="fa fa-plus-circle"></i> Tambah Data
                                            </button>
                                            </a>
                                    </div>
                                    <div class="col-3 order-last">
                                        <form class="d-flex mt-5" action="" method="get" role="search">
                                            <input class="form-control me-1" type="search" name="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-success d-flex" type="submit"><i class="fa fa-search px-1 pt-1"></i>Cari</button>
                                          </form>
                                          {{-- {{ $cari }} --}}
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-lg table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Kategori</th>
                                                <th style="width: 20%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @php
                                                $no = 1;
                                            @endphp --}}
                                            @foreach ($data as $kategori)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td class="text-bold-500">{{ $kategori->kategori }}</td>
                                                <td>
                                                    <div class="buttons">

                                                        {{-- ini tombol detail --}}
                                                        <a href="{{ route('kategori.show', $kategori->id) }}" class="btn icon btn-primary">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>

                                                        {{-- ini tombol edit --}}
                                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn icon btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>

                                                        {{-- ini tombol hapus --}}
                                                        <a href="{{ route('kategori.destroy', $kategori->id)}}" class="btn icon btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>{{$data->withQueryString()->links()}}</td>
                                            </tr>
                                        </tfoot>
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