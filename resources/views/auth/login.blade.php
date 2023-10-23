@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container" style="border-radius: 20px; background-color: white; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.3);">
    <div class="row" style="margin: 50px 0 50px;">
        <div class="col-md-6" style="margin-top: 50px;">
            <div class="appearance">
                <img src="../asset/image.svg" alt="Gambar" style="width: 100%; height: 100%;">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-content">
                <div class="card" style=" background-color: #505ABB; color: white; border-radius: 20px;">
                <div class="title" style="text-align: center; margin-top: 30px;">
                <h2>Login</h2>
                <a>Please enter your Login and your Password</a>
                </div>
                
                <div class="card-body" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder= "Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="height: 25%; width: 73%; background-color: #4CAF50;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <br><br>
                        <b>Atau Login dengan akun:</b><br><br>
                        <a class="ml-1 btn btn-primary btn-sm" href="{{ url('auth/google') }}" style="margin-top: 0px !important;background: rgb(243, 5, 5);color: #ffffff;padding: 5px;border-radius:7px;" id="btn-glogin">
                        <i class="fab fa-google" aria-hidden="true"></i>&nbsp;Google</a>

                        <a class="ml-1 btn btn-primary btn-sm" href="{{ url('auth/twitter') }}" style="margin-top:0px !important;background: rgb(29, 161, 242); color:#ffffff; padding:5px; border-radius:7px" id="btn-twlogin">
                            <i class="fab fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection



