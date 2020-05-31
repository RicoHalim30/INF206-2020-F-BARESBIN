@extends('layouts.pengepul-dashboard')
@section('title', 'Kirm Data Pengepul | Baresbin')
@section('style')
   <!-- <link rel="stylesheet" href="{{url('css/register.css')}}"> -->
@endsection

@section('content')
@if(Auth::user()->status=='aktif')
<div class="container">
<div class="row">
	<div class="col-md">
		<p class="h1 text-white mt-4 text-primary"> <i class="fas fa-paper-plane  ml-2"></i> Kirim Data</p>
		  <hr class="bg-primary	 mt-0">
	</div>
</div>
<div class="row">
		<div class="col-md-8 px-5">
		  <form action="{{url('pengepul/kirim')}}" enctype="multipart/form-data" method="POST">
		  	@csrf
			  <div class="form-group">
			    <label for="pengumpul"><span class="fas fa-user"></span> Username Akun Tujuan</label>
			    <input type="text" class="form-control @error('pengumpul') is-invalid @enderror" id="pengumpul" placeholder="contoh : mawar" name="pengumpul" required>
                @error('pengumpul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			  </div>

			  <div class="form-group">
			    <label for="berat"><span class="fas fa-balance-scale-right"></span> Berat Sampah (kg)</label>
			    <input type="text" class="form-control" id="berat" placeholder="contoh : 10" name="berat" required>
			  </div>

			    <label for="pengumpul"><span class="fas fa-user"></span> Harga Total <br></label>
		      <div class="input-group">
		        <div class="input-group-prepend">
		          <span class="input-group-text" id="inputGroupPrepend2">Rp</span>
		        </div>
		        <input type="number" class="form-control" id="harga" placeholder="contoh : 10000" aria-describedby="inputGroupPrepend2" required name="harga" min="0">
	      </div>

		 <label for="pengumpul" class="mt-3"><span class="fas fa-camera"></span> Unggah Bukti Foto <br></label>
		<div class="custom-file">
		  <input type="file" class="custom-file-input" id="customFile" name="gambar" required>
		  <label class="custom-file-label" for="customFile">Pilih File</label>
		</div>

		<input type="hidden" name="pengepul" value="{{Auth::user()->id}}">

		<button type="submit" class="btn bg-gradient-primary text-white font-weight-bold mt-3 btn-lg"><span class="fas fa-paper-plane"></span> KIRIM DATA</button>
		  </form>
	</div>
</div>
</div>
@else
<div class="row text-center mt-4">
	<div class="col-md">
		<div class="h3 alert alert-light">
		<span class="fas fa-user-slash fa-6x"></span>
		<p class="h1 mt-2">Akun Kamu Tidak Aktif</p>
		<p class="small">Hubungi admin untuk mengaktifkan akun kamu!</p>
	</div>
	</div>
</div>
@endif
@endsection
