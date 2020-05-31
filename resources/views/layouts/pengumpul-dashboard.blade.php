<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>@yield('title', 'Baresbin')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

  <!-- My Css -->
  <link rel="stylesheet" href="{{url('css/master.css')}}">
  <link rel="stylesheet" href="{{url('css/dash-style.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  
  <!-- Icons -->
  <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <!-- Argon CSS -->
 <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

@yield('style')
</head>

<body id="body">

  <!-- Navbar -->
  
<!-- End Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary shadow-sm fixed-top">
      <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

            <!-- <div class="container"> -->
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
                    <i class="fas fa-recycle"></i> BARESBIN
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fas fa-user"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ml-2">
                                <a class="btn btn-outline-light " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ml-2">
                                    <a class="btn btn-outline-light " href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                     <li class="nav-item">
                       <a href="{{ url('/home') }}" class="btn bg-gradient-success ml-2"><i class="fas fa-home"></i></a>
                    </li>
                    </ul>
                </div>
            <!-- </div> -->
        </nav>

<!-- Side Panel -->
    <div class="wrapper d-flex">
      <div class="sideMenu bg-gradient-primary2" style="width: 260px">
        <div class="sidebar">
          <ul class="navbar-nav">
            <li class="text-center">
              <p class="h1 text-center my-0 text-white" style="font-size: 7rem;"><i class="fas fa-user-circle"></i></p>
                <p class="lead text-white text-center my-0">{{ Auth::user()->username }}</p>
                <div class="badge badge-success px-4 py-2 text-center mt-2  " style="font-size: 1.2rem; font-weight: 400;"><span class="fas fa-wallet"></span> @currency(Auth::user()->saldo)</div> 
                <hr>
            </li>

            <li class="nav-item p-2">
              <a href="{{url('/pengumpul/dashboard')}}" class="nav-link px-2 text-light">
                <i class="fas fa-trash fa-2x mr-2"></i>
                <span class="text-white font">Cek Sampah</span>
              </a>
            </li>

            <li class="nav-item p-2">
              <a href="{{url('/pengumpul/histori')}}" class="nav-link px-2 text-light">
                <i class="fas fa-history fa-2x mr-2"></i>
                <span class="text-white font">Cek Histori</span>
              </a>
            </li>


          </ul>
        </div>
      </div>
      <div class="content">
        <main>

         @yield('content')
         
        </main>
      </div>
    </div>
<!-- End Side Panel -->
  
          <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
              <div class="modal-content bg-gradient-success">
                <div class="modal-header">
                  <h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="py-3 text-center">
                    <i class="fas fa-check-circle fa-7x"></i>
                    <h1 class="h2 mt-4 font-weight-bold">
                       @if(session('status'))
                              {{session('status')}}
                        @endif  
                    </h1>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
<!-- End Modal -->

  <!-- Core -->
  <script src="{{asset('bootstrap/js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- My Script -->
  <script src="{{asset('js/script.js')}}"></script>

    @if(session('status'))
      <script>
          $(document).ready(function(){
            $('#modal-notification').modal('show');
          });
      </script>
    @endif

  </body>
</html>