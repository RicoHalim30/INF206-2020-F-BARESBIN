@extends('layouts.pengumpul-dashboard')

@section('style')
   <style>
		#tabel img{
			width: 150px;
			height: 100px;
			object-fit: cover;
		}
   </style>
@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md">
		<p class="h1 text-white mt-4 text-primary"> <i class="fas fa-trash  ml-2"></i> Cek Transaksi Sampah</p>
		  <hr class="bg-primary	 mt-0">
	</div>
</div>

<div class="row">
	<div class="col-md">
		   <table class="table table-striped table-light" id="tabel">
		      <thead>
		        <tr class="bg-gradient-primary text-white">
		          <th scope="col" style="width: 10%;">No</th>
		          <th scope="col" style="width: 20%;">Foto</th>
		          <th scope="col" style="width: 20%;">Username Pengumpul</th>
		          <th scope="col" style="width: 10%;">Berat</th>
		          <th scope="col" style="width: 20%;"> Harga</th>
		          <th scope="col" style="width: 20%;"> Tanggal Transaksi</th>
		        </tr>
		      </thead>
		      <tbody>
          @if($transaksi->isEmpty())
                <tr>
                  <td class="text-center" colspan="5">Tidak Ada data</td>
                </tr>
            @else
		      	@foreach($transaksi as $i => $item)
		        <tr>
		          <td style="text-align: center;">{{++$i}}</td>
         		 <td><img src="{{asset('img/'.$item->gambar)}}" alt="makanan" class="img-fluid"></td>
		          <td>{{$item->pengumpul}}</td>
		          <td>{{$item->berat." Kg"}}</td>
		          <td>@currency($item->harga)</td>
		          <td>{{$item->created_at}}</td>
		        </tr> 
		        @endforeach
		        @endif
		      </tbody>
		    </table>
	</div>
</div>
</div>
@endsection
