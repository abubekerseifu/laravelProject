<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Habeshababysitters') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,body
                {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
                overflow-x: hidden; 
                }
            .shadow-sm{
                background-color:#563d7c!important;
                height:fixed;}
                
                .nav-link,.navbar-light .navbar-nav .nav-link{
                          color:#f8f9fa;
                          font-size:25px;

                                   
                }
                .navbar-light .navbar-nav .nav-link:hover,.nav-link:hover{
                         text-decoration:none;
                         color:#fcec5d;
                }
                #f{
                    margin-left:-220px;
                    font-family:'Brush Script MT','cursive';
                     font-size:40px;
                     color:#fcec5d;
                     
                }

                #f:hover{text-decoration:none;color:#fff;}
                

    </style>
</head>
<body>
    <div >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a id="f" href="{{ url('/') }}">
                    hBs
                </a>
                

                <a class="nav-link" href="{{ url('babysitterlist') }}">
                    Babysitters
                </a>
                <a class="nav-link" href="{{ url('joblist') }}">

                    Babysitting Jobs
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About us</a></li>
                         <li class="nav-item"><a class="nav-link" href="{{ url('contactus') }}">Contact us</a></li>

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
                                   <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
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
            </div>
        </nav>
        <main class="py-4">
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

