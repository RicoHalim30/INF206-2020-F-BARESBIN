@extends('layouts.admin-dashboard')

@section('style')
  <link rel="stylesheet" href="{{url('css/admin-dashboard.css')}}">
  <link rel="stylesheet" href="{{url('css/admin-pengepul.css')}}">

@endsection

@section('content')
<div class="container">
<!-- MODAL TAMBAH DATA -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-gradient-primary">
	        <h5 class="modal-title text-white" id="staticBackdropLabel"><i class="fas fa-user-plus"></i> Tambah Data Pengepul</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
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
                        <input type="hidden" name="jenis" value="pengepul">
                        <input type="hidden" name="is_admin" value="true">

                        <button type="submit" class="btn bg-gradient-primary w-50 text-white">REGISTER</button>
					 <button type="button" class="btn btn-danger text-white w-25" data-dismiss="modal">BATAL</button>
                    </form>
	      </div>
	    </div>
	  </div>
	</div>
<!-- END MODAL TAMBAH DATA -->

<!-- CEK PENGEPUL -->
<div class="row">
	<div class="col-md">
		<p class="h1 text-white mt-4 text-primary"> <i class="fas fa-edit  ml-2"></i> Cek Pengepul</p>
		<button class="btn bg-gradient-success" id="tambah" data-toggle="modal" data-target="#staticBackdrop"> <span class="fas fa-plus-circle"></span> Tambah</button>
		  <hr class="bg-primary mt-0">
		   <table class="table table-striped table-light" id="tabel">
		      <thead>
		        <tr class="bg-gradient-primary text-white">
		          <th scope="col" style="width: 10%;">No</th>
		          <th scope="col" style="width: 30%;">Username</th>
		          <th scope="col" style="width: 40%;">Nama</th>
		          <th scope="col" style="width: 20%;"> Status</th>
		        </tr>
		      </thead>
		      <tbody>
          @if($pengepul->isEmpty())
                <tr>
                  <td class="text-center" colspan="4">Tidak Ada data</td>
                </tr>
            @else
		      	@foreach($pengepul as $i => $item)
		        <tr>
		          <td style="text-align: center;">{{++$i}}</td>
		          <td>{{$item->username}}</td>
		          <td>{{$item->name}}</td>
		          <td>
					<div class="dropdown show">
					  <a class="btn btn-@if($item->status == 'aktif'){{'success'}}@else{{'danger'}}@endif w-50 dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    {{$item->status}}
					  </a>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					  	<form action="{{url('admin/status/'.$item->id)}}" method="POST">
					  		@csrf
					  		<input type="hidden" value="{{$item->status}}" name="status_sekarang">
					    	<button type="submit" class="dropdown-item">@if($item->status == 'aktif'){{'Non-aktifkan'}}@else{{'Aktifkan'}}@endif</button>
					  	</form>
					  </div>
					</div>
		          </td>
		        </tr> 
		        @endforeach
                @endif
		      </tbody>
		    </table>
		</div>
	</div>
<!-- END CEK PENGEPUL -->
</div>
@endsection

@section('script')
	@if($errors->any()) 
	      <script>
	          $(document).ready(function(){
	            $('#staticBackdrop').modal('show');
	          });
	      </script>
	@endif
@endsection
