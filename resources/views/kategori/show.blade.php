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
                                <h3> {{ $kategori['kategori']}}</h3>
                                <a href="{{route('kategori')}}"><button class="btn btn-success">Back To Home</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection