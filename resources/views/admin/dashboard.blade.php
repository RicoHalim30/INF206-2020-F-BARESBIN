@extends('layouts.admin-dashboard')

@section('style')
  <link rel="stylesheet" href="{{url('css/admin-dashboard.css')}}">
@endsection

@section('content')
<div class="container">
  <!-- DATA STATISTIK -->
<p class="h1 text-white mt-3 text-warning"> <i class="fas fa-chart-area  ml-2"></i> Statistik</p>
  <hr class="bg-warning mt-0">
  <div class="row" id="baris">
    <div class="col-md-4 mb-4 " id="kolom">
        <div class="card bg-gradient-warning" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
                <i class="fas fa-trash"></i>
            </div>
            <h5 class="card-title text-white">TOTAL SAMPAH</h5>
            <div class="display-4 text-white mb-1">{{$statistik['berat']}} KG</div>
            <a href="#jumlah-sampah"><p class="card-text text-white">Lihat Detil <i class="fas fa-angle-double-right ml-2"></i></p></a>
          </div>
        </div>
    </div>
        <div class="col-md-4 mb-4 " id="kolom">
          <div class="card bg-gradient-primary" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon">
                  <i class="fas fa-user"></i>
              </div>
              <h5 class="card-title text-white">JUMLAH PENGEPUL</h5>
              <div class="display-4 text-white mb-1">{{$statistik['pengepul']}} Orang</div>
              <a href="{{url('/admin/pengepul')}}"><p class="card-text text-white">Lihat Detil <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>
      </div>
        <div class="col-md-4 mb-4" id="kolom">
          <div class="card bg-gradient-success" style="width: 18rem; ">
            <div class="card-body">
              <div class="card-body-icon">
                  <i class="fas fa-clipboard-list"></i>
              </div>
              <h5 class="card-title text-white"> JUMLAH PENGUMPUL</h5>
              <div class="display-4 text-white mb-1">{{$statistik['pengumpul']}} Orang</div>
              <a href="{{url('/admin/pengumpul')}}"><p class="card-text text-white">Lihat Detil <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>
      </div>
  </div>
  <!-- END DATA STATISTIK -->

<!-- JUMLAH SAMPAH -->
<div class="row" id="jumlah-sampah">
	<div class="col-md">
		<p class="h1 text-white mt-4 text-primary"> <i class="fas fa-chart-area  ml-2"></i> Jumlah Sampah</p>
		  <hr class="bg-primary mt-0">
		   <table class="table table-striped table-light " id="tabel">
		      <thead>
		        <tr class="bg-gradient-success">
		          <th scope="col" style="width: 10%;">No</th>
		          <th scope="col" style="width: 35%;">Hari</th>
		          <th scope="col" style="width: 35%;">Tanggal</th>
		          <th scope="col" style="width: 20%;"> Jumlah Sampah</th>
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
		          <td><?php
			            $time = strtotime($item->day);
			            $day = date('N', $time);
			            $hari = "Minggu";
			            switch($day){
			            	case 1: $hari = "Senin"; break;
			            	case 2: $hari = "Selasa"; break;
			            	case 3: $hari = "Rabu"; break;
			            	case 4: $hari = "Kamis"; break;
			            	case 5: $hari = "Jumat"; break;
			            	case 6: $hari = "Sabtu"; break;
			            }
			            echo $hari;
		            ?></td>
		          <td>{{$item->day}}</td>
		          <td>{{$item->tot}} Kg</td>
		        </tr>
		        @endforeach
            @endif
		      </tbody>
		    </table>
		</div>
	</div>
<!-- END JUMLAH SAMPAH -->

</div>
@endsection
