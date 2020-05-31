@extends('layouts.admin-dashboard')

@section('style')
  <link rel="stylesheet" href="{{url('css/admin-dashboard.css')}}">
@endsection

@section('content')
<div class="container">
<!-- MODAL UBAH SALDO -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-gradient-primary">
	        <h5 class="modal-title text-white" id="staticBackdropLabel"><i class="fas fa-share-square"></i> Penarikan Saldo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
  			<form method="POST" action="{{ url('admin/tarik')}}">
                        @csrf
                        <label for="kolom-saldo">Masukkan Jumlah Yang Ingin Ditarik</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-wallet"></i></div>
                                </div>
                                <input  type="number" class="input form-control saldo" name="saldo" required id="kolom-saldo" min="1" max="1000000">
                                <a class="btn btn-primary mx-1 rounded-circle tambah"><i class="fas fa-plus"></i></a>	
                                <a class="btn btn-primary rounded-circle kurang"><i class="fas fa-minus"></i></a>
                            </div>
                        </div>
						<input type="hidden" name="user_id" class="kolom-id">

                        <button type="submit" class="btn bg-gradient-primary w-50 text-white">SELESAI</button>
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
		<p class="h1 text-white mt-4 text-warning"> <i class="fas fa-user  ml-2"></i> Cek Pengumpul</p>
		  <hr class="bg-warning	 mt-0">
		   <table class="table table-striped table-light" id="tabel">
		      <thead>
		        <tr class="bg-gradient-warning text-white">
		          <th scope="col" style="width: 10%;">No</th>
		          <th scope="col" style="width: 20%;">Username</th>
		          <th scope="col" style="width: 35%;">Nama</th>
		          <th scope="col" style="width: 20%;"> Saldo</th>
		          <th scope="col" style="width: 10%;"> Aksi</th>
		        </tr>
		      </thead>
		      <tbody>
          @if($pengumpul->isEmpty())
                <tr>
                  <td class="text-center" colspan="5">Tidak Ada data</td>
                </tr>
            @else
		      	@foreach($pengumpul as $i => $item)
		        <tr>
		          <td style="text-align: center;">{{++$i}}</td>
		          <td>{{$item->username}}</td>
		          <td>{{$item->name}}</td>
		          <td>@currency($item->saldo)</td>
		          <td>
					<a href="" class="badge badge-primary px-2 py-2 btn-edit" data-toggle="modal" data-target="#staticBackdrop" data-id="{{$item->id}}" data-saldo="{{$item->saldo}}"><i class="fas fa-share-square"></i> Tarik</a>
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
<script>
let id = 0;
let saldo

 $('.btn-edit').on('click', function(e){
	id = jQuery(this).data('id');
	saldo = jQuery(this).data('saldo');
    	// preventDefault();
	    $('.saldo').val(saldo);
	    $('.saldo').attr('max',saldo);
	    $('.kolom-id').val(id);
	});

 $('.tambah').on('click', function(e){
 	saldo += 5000;
	$('.saldo').val(saldo);
 });

  $('.kurang').on('click', function(e){
 	if((saldo - 5000) >= 0){
 		saldo -= 5000;
		$('.saldo').val(saldo);
 	}
 });

</script>
@endsection