@extends('layouts.master')

@section('style')
   <link rel="stylesheet" href="{{url('css/register.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center form">
        <div class="col-md-5 d-flex justify-content-center">
             <div class="card border-0 shadow text-center" id="login-form">
                <div class="card-header bg-transparent">
                    <h3 class="font-weight-bold"><i class="fa-1x fas fa-recycle"></i> Registrasi Pengumpul</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input id="name" type="name" class="input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama Lengkap">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input id="username" type="username" class="input form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Buat Username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                </div>
                                <input id="password-confirm" type="password" class="input form-control" name="password_confirmation" required autocomplete="current-password" placeholder="Konfirmasi Password">
                            </div>
                        </div>

                        <input type="hidden" name="status" value="aktif">
                        <input type="hidden" name="jenis" value="pengumpul">

                        <button type="submit" class="btn bg-gradient-primary w-100 text-white">REGISTER</button>
                    </form>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
