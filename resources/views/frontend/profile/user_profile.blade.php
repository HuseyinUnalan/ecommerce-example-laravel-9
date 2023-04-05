@extends('frontend.main_master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil Güncelle</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url({{ asset('frontend/images/demos/demo-4/bg-login-img.png') }})">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">


                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="singin-password-2">Şifre *</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="singin-email-2">E-mail *</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div><!-- End .form-group -->

                            {{-- <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Fotoğraf <span> </span></label>
                                <input type="file" name="profile_photo_path" class="form-control">
                            </div> --}}


                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>Güncelle</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>


                            </div><!-- End .form-footer -->
                        </form>


                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
    <br><br>
@endsection


