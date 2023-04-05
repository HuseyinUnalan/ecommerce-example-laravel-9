@extends('frontend.main_master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Şifremi Unuttum</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url({{ asset('frontend/images/demos/demo-4/bg-login-img.png') }})">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">


                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="singin-email-2">E-mail *</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div><!-- End .form-group -->


                            <div class="form-footer">
                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>Gönder</span>
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


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
