@extends('layouts.master')

@section('title', 'Beranda - Baresbin')

@section('style')
   <link rel="stylesheet" href="{{url('css/master.css')}}">
@endsection

@section('content')
<div class="jumbotron bg-graient-dark">
  <div class="container landing">
  <p class="lead mb-0 pt-5">SELAMAT DATANG DI</p>
  <p class="nama">BARESBIN</p>
  <hr class="my-4">
  <p class="lead"><span class="font-weight-bold">Mengumpulkan, Mengelola</span> dan <span class="font-weight-bold">Mendaur Ulang</span>Sampah <br> Menjadi Hal yang <span class="font-weight-bold">Lebih Berguna</span></p>
    <a class="btn bg-gradient-primary btn-lg text-white" href="{{ route('login') }}" role="button"><i class="fas fa-user-plus mr-2"></i>AYO <span class="font-weight-bold">BERGABUNG</span></a>
</div>
</div>
@endsection
