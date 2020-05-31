@extends('layouts.pengumpul-dashboard')

@section('style')
   <!-- <link rel="stylesheet" href="{{url('css/register.css')}}"> -->
@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md">
		<p class="h1 text-white mt-4 text-primary"> <i class="fas fa-history  ml-2"></i> Cek Histori  Penarikan Saldo</p>
		  <hr class="bg-primary	 mt-0">
	</div>
</div>

<div class="row">
	<div class="col-md">
		   <table class="table table-striped table-light" id="tabel">
		      <thead>
		        <tr class="bg-gradient-primary text-white">
		          <th scope="col" style="width: 10%;">No</th>
		          <th scope="col" style="width: 30%;"> Tanggal Transaksi</th>
		          <th scope="col" style="width: 30%;"> Jumlah penarikan</th>
		          <th scope="col" style="width: 30%;"> Sisa Saldo</th>
		        </tr>
		      </thead>
		      <tbody>
          @if($transaksi->isEmpty())
                <tr>
                  <td class="text-center" colspan="4">Tidak Ada data</td>
                </tr>
            @else
		      	@foreach($transaksi as $i => $item)
		        <tr>
		          <td style="text-align: center;">{{++$i}}</td>
		          <td>{{$item->created_at}}</td>
		          <td>@currency($item->jumlah)</td>
		          <td>@currency($item->sisa_saldo)</td>
		        </tr>
		        @endforeach
		        @endif
		      </tbody>
		    </table>
	</div>
</div>
</div>
@endsection
