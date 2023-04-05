@extends('frontend.main_master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Şifre Güncelle</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url({{ asset('frontend/images/demos/demo-4/bg-login-img.png') }})">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">


                        <form method="post" action="{{ route('user.password.update') }}">
                            @csrf


                            <div class="form-group">
                                <label for="singin-password-2">Eski Şifre *</label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control">
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="singin-email-2">Yeni Şifre *</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Şifre Tekrar *<span> </span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required>
                            </div>


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
