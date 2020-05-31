@extends('layouts.master')

@section('style')
   <link rel="stylesheet" href="{{url('css/login.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center form">
        <div class="col-md-5 d-flex justify-content-center">
             <div class="card border-0 shadow text-center" id="login-form">
                <div class="card-header bg-transparent">
                    <h3 class="font-weight-bold"><i class="fa-1x fas fa-recycle"></i> Baresbin | Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                </div>
                                <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-check text-left mt-0">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                        <button type="submit" class="btn bg-gradient-primary w-100 text-white">MASUK</button>
                        <label class="text-left reg">Belum punya akun? Daftar <a href="{{url('register')}}">di sini</a></label>
                    </form>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
