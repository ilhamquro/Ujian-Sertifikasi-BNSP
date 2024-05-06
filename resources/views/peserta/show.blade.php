@extends('master.app')
@section('navigasi')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Peserta</li>
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
                                <h5>Nama : </h5><p>{{ $peserta['nama']}}</p>
                                <h5>Email : </h5><p>{{ $peserta['email']}}</p>
                                <h5>Alamat : </h5><p>{{ $peserta['alamat']}}</p>
                                <h5>No Handphone : </h5><p>{{ $peserta['handphone']}}</p>
                                <a href="{{route('peserta')}}"><button class="btn btn-success">Back To Home</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection