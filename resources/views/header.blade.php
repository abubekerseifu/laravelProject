
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Habeshababysitters') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @media(min-width:992px){
            .navbar-expand-lg .navbar-collapse{
                width:100%;
            }
        }
        .bg-light{
            background-color:#563d7c!important;
        }
        .nav-link{color:#f8f9fa!important;}
        .nav-link:hover{background-color:grey;color:#fcec5d!important;}
        .navbar-brand{font-family:'Brush Script MT','cursive';font-size:25px;
                     color:#fcec5d!important;}
        .navbar-brand:hover{color:#fff!important;}
</style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: black;">
    <!--left side-->
    <div class="collapse navbar-collapse navigation-menu">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('babysitterlist') }}">Babysitters <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ url('joblist') }}">Babysitting Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('') }}">Packages</a>
      </li>
    </ul>
    
  </div>
    <!--left side end-->
  <a class="navbar-brand mr-l-g0 navigation-menu" href="{{ url('/') }}"> hBs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navigation-menu" 
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--right side-->
  <div class="collapse navbar-collapse navigation-menu">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Our Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
     @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
      @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                 @if(Auth::user()->hasRole('Admin'))
                                   <a class="dropdown-item" href="#">
                                       Home
                                    </a>
                                @endif
                                @if(Auth::user()->hasRole('Babysitter'))
                                   <a class="dropdown-item" href="{{ route('babysitter.home') }}">
                                       Home
                                    </a>
                                @endif
                                @if(Auth::user()->hasRole('Parent'))
                                   <a class="dropdown-item" href="{{ route('parent.home') }}">
                                       Home
                                    </a>
                                @endif
                                

                                @if(Auth::user()->hasRole('Admin'))
                                    <a class="dropdown-item" href="#">Setting </a>
                                @endif
                                @if(Auth::user()->hasRole('Babysitter'))
                                    <a class="dropdown-item" href="{{url('/babysitter/profile')}}">Edit Profile</a>
                                @endif
                                @if(Auth::user()->hasRole('Parent'))
                                    <a class="dropdown-item" href="{{url('/parent/job')}}">Edit Job</a>
                                @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
    
  </div>
  <!--right side end-->
</nav>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>