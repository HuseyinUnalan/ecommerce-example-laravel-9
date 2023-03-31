@extends('frontend.main_master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasafya</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="error-content text-center"
            style="background-image: url({{ asset('frontend/images/backgrounds/error-bg.jpg') }})">
            <div class="container">
                <h1 class="error-title">Error 404</h1><!-- End .error-title -->
                <p>Bu Sayfa Bulunamadı.</p>
                <a href="{{ route('/') }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                    <span>Anasayfaya Dönün</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div><!-- End .container -->
        </div><!-- End .error-content text-center -->
    </main><!-- End .main -->
@endsection
