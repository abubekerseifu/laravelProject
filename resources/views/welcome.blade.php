<<<<<<< HEAD
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <style>
            body {
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                font-size:25px;
                
            }
            h1 { 
              font-size:100px;
              color:white;
              
              font-family:'Brush Script MT','cursive';
            }
           .carousel-item div{
              margin-bottom:70px;
              background-attachment: fixed;
            }
            li{
              margin-bottom:800px;
            }
           nav{
             height:65px;
             
           }
           .carousel-item{
             height:500px;
           }
           a{
             color:#f8f9fa;
            
           }
           a:hover{
                text-decoration:none;
                color:#fcec5d;
                font-size:30px;
           }
           #y:hover{
                  color:#fcec5d;
                  font-size:35px;
           }
           #y{
             color:#fcec5d;
             font-size:40px;
             margin-left:50px;
             font-family:'Brush Script MT','cursive';
=======
@extends('layouts.app')
     <style>
     .carousel-item div{
              margin-bottom:70px;
              background-attachment: fixed;
            }
      .carousel-item{
             height:650px;
>>>>>>> caf6852 (crud)
           }
           .c p{ 
              color:black;
              padding-top:10px;
              
           }
<<<<<<< HEAD
=======
           .carousel-inner h1 { 
              font-size:100px!important;
              color:white;
              font-family:'Brush Script MT','cursive';
            }
>>>>>>> caf6852 (crud)
           .c{
              height:100px;
              width:350px;
              background-color:#fcec5d;
              margin:auto;
              border-radius:20px;
<<<<<<< HEAD
              font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
             font-size: 1.5rem;
              
           }
           .bd-navbar{
             background-color: #563d7c; 
           }
           .btn-primary{
             width:180px;
             height:45px;
             background-color:black;
             border-color:#fcec5d;
             margin-top:-20px;
             font-size:20px;
=======
             font-size: 1.5rem;
              
           }
           .btn-primary{
             width:180px;
             height:45px;
             background-color:black!important;
             border-color:#fcec5d!important;
             margin-top:-20px;
>>>>>>> caf6852 (crud)
             border-radius:20px;
             margin-left:auto;
           }
            .btn-primary:hover{
<<<<<<< HEAD
              background-color:#563d7c;
              border-color:white;
              font-size:22px;
            }
.section-container {
    padding-top: 3rem;
    padding-bottom: 3rem;
}
.how-it-works .h2, .how-it-works .h3, .how-it-works h2, .how-it-works h3 {
    color: #222;
    text-align: center;
    margin-bottom: 2rem;
    margin-top: 0;
}
@media (min-width: 768px)
.col-md-12 {
    flex: 0 0 auto;
    width: 100%;
=======
              background-color:#563d7c!important;
              border-color:white!important;
            }
            .how-it-works .h2, .how-it-works .h3, .how-it-works h2, .how-it-works h3 {
    color: #222;
    text-align: center;
    margin-bottom: 2rem;
    margin-top: 20px;
    font-family: Montserrat,sans-serif;
>>>>>>> caf6852 (crud)
}
.col-9 {
    flex: 0 0 auto;
    width: 75%;
}
<<<<<<< HEAD
.row{
  font-family: Montserrat,sans-serif;
    -webkit-font-smoothing: antialiased;
}
.title{
     color:#563d7c;
 
}
#f{
  margin-left:40px;
}
.description{
  font-size:20px;
}
        </style>
</head>
<body>
    <div id="x">
        <nav class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar >
            <div class="container">
                <a class="navbar-brand" id="y" href="{{ url('/') }}">
                    hBs
                </a>
                 <a class="nav-link" href="{{ url('/') }}">
                    Babysitters
                </a>
                <a class="nav-link" href="{{ url('/') }}">
                    Babysitting Jobs
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
                       @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    @if (Route::has('admin.home'))
                        <a href="{{ url('/admin/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @elseif (Route::has('parent'))
                         <a href="{{ url('/parent') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                       <a href="{{ url('/babysitter') }}" class="text-sm text-gray-700 underline">Home</a>
                       @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                    </ul>
                </div>
            </div>
        </nav>

        
    </div>
=======
.title{
     color:black;
    font-size:25px;
    margin:auto;
}
#v{
    margin:auto;
    padding-top:50px;
   
}
.col-3 {
    width: 25%;
    flex: 0 0 auto;
}
.row{
  font-family: Serif;
    -webkit-font-smoothing:antialiased;
    padding-bottom:-150px;
    width:100%;
}
.row h5{
        color:black!important;
        font-family: Montserrat,sans-serif;
}
.ho1{
     border-right: 1px solid #fcec5d;
     height: 200px;
     margin-top:-170px;
}
#ff{
  margin-left:auto;
   
}
.description{
  font-size:20px;
  color:black;
}
#w{
    margin-left:100px;
}
.col-md-12 .icon,.title{
  margin:auto;
  margin-left:100px;
}
.col-md-12 .icon{
  margin-left:140px;
 
}
        </style>
@section('content')

>>>>>>> caf6852 (crud)
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
<<<<<<< HEAD
      <img class="d-block w-100" src="/image/2.jpg" width="100%" height="auto" alt="First slide">
=======
      <img class="d-block w-100" src="/image/6.jpg" width="100%" height="auto"  alt="First slide">
>>>>>>> caf6852 (crud)
      <div class="carousel-caption d-none d-md-block">
    <h1>Habeshababysitters</h1>
    <div class="c">
    <p>Great Babysitter in your area!</p>
    <a class="btn btn-primary" href="{{ url('/about') }}" role="button">Read More</a>
    </div>
  </div>
    </div>
    
    <div class="carousel-item">
<<<<<<< HEAD
      <img class="d-block w-100" src="/image/4.jpg" width="100%" height="auto" alt="Third slide">
=======
      <img class="d-block w-100" src="/image/5.jpg" width="100%" height="auto" alt="Third slide">
      <div class="carousel-caption d-none d-md-block" >
    <h1>Habeshababysitters</h1>
    <div class="c">
    <p>Great Babysitter in your area!</p>
    <a class="btn btn-primary" href="{{ url('/about') }}" role="button">Read More</a>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="carousel-item">
      <img class="d-block w-100" src="/image/4.jpg" width="100%" height="auto%" alt="Third slide">
>>>>>>> caf6852 (crud)
      <div class="carousel-caption d-none d-md-block" >
    <h1>Habeshababysitters</h1>
    <div class="c">
    <p>Great Babysitter in your area!</p>
    <a class="btn btn-primary" href="{{ url('/about') }}" role="button">Read More</a>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<section class="section-container how-it-works">
            <div class="container-fluid">

        <h2>How it works</h2>

<<<<<<< HEAD
        <div class="row" id="f">

            <div class="col-md-4">
                <div class="row">
                    <div class="col-3 col-md-12">
                        <div class="icon">
                            <i class="inner-icon far fa-search"></i>
                        </div>
                    </div>
=======
        <div class="row justify-content-center" id="ff">

            <div class="col-md-4">
                <div class="row">
                    
>>>>>>> caf6852 (crud)
                    <div class="col-9 col-md-12">
                        <div class="title">1. Search</div>
                        <p class="description">Read detailed profiles of any babysitter registered on the site.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
<<<<<<< HEAD
                    <div class="col-3 col-md-12">
                        <div class="icon">
                            <i class="inner-icon far fa-comments"></i>
                        </div>
                    </div>
=======
                   
>>>>>>> caf6852 (crud)
                    <div class="col-9 col-md-12">
                        <div class="title">2. Pay</div>
                        <p class="description">Pay reasonable amount of money for the service.Babysitters register for free.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
<<<<<<< HEAD
                    <div class="col-3 col-md-12">
                        <div class="icon">
                            <i class="inner-icon far fa-calendar-check"></i>
                        </div>
                    </div>
=======
>>>>>>> caf6852 (crud)
                    <div class="col-9 col-md-12">
                                                    <div class="title">3. Connect</div>
                            <p class="description">Babysitter connects with the parent with the provided contact information. </p>
                                            </div>
                </div>
            </div>

        </div>


            </div>
<<<<<<< HEAD
        </section>
        {{View::make('footer')}}
</body>
</html>
=======
            <div class="row justify-content-center">
  <iframe width="500" height="300" src="https://www.youtube.com/watch?v=Xr7Siy8NIQw" title="YouTube video" allowfullscreen></iframe>
</div>
        </section>
        
{{View::make('footer')}}
@endsection
>>>>>>> caf6852 (crud)
