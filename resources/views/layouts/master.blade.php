<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

  <!-- My Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('style')

  <!-- Icons -->
  <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <!--  CSS -->
 <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body >

        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
                    <i class="fas fa-recycle"></i> BARESBIN
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
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
                                   <i class="fas fa-user-circle mr-1"></i>  {{ Auth::user()->name }} <span class="caret"></span>
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
            </div>
        </nav>
<!-- End Navbar -->

<!-- Jumbotron -->
  @yield('content')
<!-- End Jumbotron -->

  <!-- Core -->
  <script src="{{asset('bootstrap/js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('bootstrap/js/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- My Script -->
  <script src="{{asset('js/script.js')}}"></script>


  </body>
</html>
