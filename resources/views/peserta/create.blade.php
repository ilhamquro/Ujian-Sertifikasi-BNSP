{{-- @extends('welcome')
@section('daftar') --}}

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('startup') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('startup') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('startup') }}/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('startup') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('startup') }}/css/style.css" rel="stylesheet">
</head>

<body>
    
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                    <h1 class="mb-0">The Best IT Solution With 10 Years of Experience</h1>
                </div>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet</p>
                <div class="row g-0 mb-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">+012 345 6789</h4>
                    </div>
                </div>
                <a href="{{ asset('startup') }}/quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('startup') }}/img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-12">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div id="auth-left">
                        <h1 class="auth-title">Daftar Pelatihan Gratis</h1>
                        <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                        <form method="POST" action="{{ route('peserta.store') }}">
                            @csrf
                            {{-- Nama Peserta --}}
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="basicInput" class="form-label">Nama</label>
                                <input type="text" id="nama" class="form-control form-control-xl" name="nama" placeholder="Nama">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('nama')
                                  <p class="text-danger">{{ $message }}</p>  
                                @enderror
                            </div>
                            {{-- Email Peserta --}}
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="basicInput" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control form-control-xl" name="email" placeholder="Email">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                @error('email')
                                  <p class="text-danger">{{ $message }}</p>  
                                @enderror
                            </div>
                            {{-- Alamat Peserta --}}
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="basicInput" class="form-label">Alamat</label>
                                <input type="text" id="alamat" class="form-control form-control-xl" name="alamat" placeholder="alamat">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('alamat')
                                  <p class="text-danger">{{ $message }}</p>  
                                @enderror
                            </div>
                            {{-- No Handphone Peserta --}}
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="basicInput" class="form-label">No Handphone</label>
                                <input type="number" id="handphone" class="form-control form-control-xl" name="handphone" placeholder="handphone">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('handphone')
                                  <p class="text-danger">{{ $message }}</p>  
                                @enderror
                            </div>
                            {{-- Tombol Kirim --}}
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                                Daftar
                            </button>
                            {{-- Tombol Kembali --}}
                            <a href="{{url('/')}}" class="btn btn-primary btn-block btn-lg shadow-lg mt-5"> Kembali</a>
                        </form>
                        <div class="text-center mt-5 text-lg fs-4">
                            <p class='text-gray-600'>
                                Lihat Daftar Peserta 
                                <a href="{{route('login')}}" class="font-bold">
                                    Lihat
                                </a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

</body>
{{-- @endsection --}}