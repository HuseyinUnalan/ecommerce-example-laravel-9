@extends('frontend.main_master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giriş Yap</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url({{ asset('frontend/images/demos/demo-4/bg-login-img.png') }})">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">


                        <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="singin-email-2">E-mail *</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="singin-password-2">Şifre *</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>LOG IN</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="signin-remember-2"
                                        name="remember">
                                    <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                </div><!-- End .custom-checkbox -->

                                <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
                            </div><!-- End .form-footer -->
                        </form>


                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
    <br><br>
@endsection
