<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Habeshababysitters') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
          <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <style>
    html,body
                {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
                overflow-x: hidden;
                font-family:Poppins-Regular; 
                }
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
        navbar .active{background-color:grey;color:#fcec5d!important;}
        .navbar-brand{font-family:'Brush Script MT','cursive';font-size:25px;
                     color:#fcec5d!important;}
        .navbar-brand:hover{color:#fff!important;}
        
   .footer-top p{
        color:#999;
        font-size:15px;
        line-height:25px;
        font-family:serif;
    }
    h2,h3{
        color:#fff;
    }
    h2{
        font-size:18px;
    }
    .footer-top{
          background:#563d7c;
          padding:80px 0;
    }
    .segment-one h3{
        font-family:Courgette;
        color:#fcec5d;
        letter-spacing:3px;
        margin:10px 0;
        font-size:20px;
    }
    .segment-two h2{
        font-family:Poppins;
        color:#fff;
        text-transform:uppercase;
    }
    .segment-two h2:before{
        content:'|';
        color:#fcec5d;
        padding-right:10px;
    }
    .segment-two ul{
        margin:0;
        padding:0;
        list-style:none;
    }
    .segment-two ul li{
        border-bottom:1px solid #fcec5d;
        line-height:40px;
    }
    .segment-two ul li a{
        color:#fff!important;
        text-decoration:none;
    }
    .segment-three h2{
        color:#fff;
        font-family:Poppins;
        text-transform:uppercase;
    }
    .segment-three h2:before{
        content:'|';
        color:#fcec5d;
        padding-right:10px;
    }
    .segment-three a{
        background:#fcec5d;
        width:30px;
        height:30px;
        display:inline-block;
        border-radius:50%;
    }
    .segment-three a i{
        font-size:15px;
        color:black;
        padding: 7px 8px;
    }
    .segment-three a:hover{
        background:#fff;
        color:#563d7c;
    }.segment-four h2{
        color:#fff;
        font-family:Poppins;
        text-transform:uppercase;
    }
    .segment-four h2:before{
        content:'|';
        color:#fcec5d;
        padding-right:10px;
    }
    .segment-four form input[type=submit]{
        background:#fcec5d;
        border:none;
        padding:3px 15px;
        margin-left:-5px;
        color:#563d7c;
        text-transform:uppercase;
     }
     .footer-bottom-text{
         text-align:center;
         background:#000;
         line-height:75px;
     }
     /*responsive css */
     @media only screen and (min-width:768px) and (max-width:991px){
        .md-mb-30{
            margin-bottom:30px;
        }
     }
     @media only screen and (max-width:991px){
         .sm-mb-30{
             margin-bottom:30px;
         }
         .footer-top{
             padding:50px 0;
         }
     }
     footer{
         margin-bottom:-70px;
         width:100%;
        
     }
nav a{
    font-size:15px;
}
.segment-four li a{
     font-size:15px;
}
    </style>
  
    
    </head>
    <body>
      <script type="text/javascript">
       $(".nav a").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
</script>
   
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--left side-->
    <div class="collapse navbar-collapse navigation-menu">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('babysitters.list') }}">Babysitters <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ url('joblist') }}">Babysitting Jobs</a>
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
                                   <a class="dropdown-item" href="{{ route('admin.homedashboard') }}">
                                      Dashboard
                                    </a>
                                @else
                                <a class="dropdown-item" href="{{ url('/') }}">
                                       Home
                                    </a>
                                @endif
                                @if(Auth::user()->hasRole('Admin'))
                                    <a class="dropdown-item" href="{{ route('v.setting',Auth::user()) }}">Setting </a>
                                @endif
                                @if(Auth::user()->hasRole('Babysitter'))
                                @if(Auth::user()->hasProfile('yes'))
                                    <a class="dropdown-item" href="{{route('babysitter.detail',Auth::user()) }}">Edit Profile</a>
                                
                                @else
                                <a class="dropdown-item" href="{{url('/babysitter/profile')}}">Edit Profile</a>
                                @endif
                                @endif
                                @if(Auth::user()->hasRole('Parent'))
                                @if(Auth::user()->hasJob('yes'))
                                    <a class="dropdown-item" href="{{route('job.detail',Auth::user())}}">Edit Job</a>
                                
                                @else
                                <a class="dropdown-item" href="{{url('/parent/job')}}">Edit Job</a>
                                @endif
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
        
            @yield('content')
    <footer>
        <div class="footer-top">
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 segment-one md-mb-30 sm-mb-30">
                <h3>Habeshababysitters</h3>
                <p>We strive to make your life easy do not hesitate to contact us</p>
                <p>myfavorday@gmail.com</p>
                <p>+1-972-343-8025</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 segment-two md-mb-30 sm-mb-30">
                <h2>links</h2>
                 <ul>
                 <li><a>About Us</a></li>
                 <li><a>Contact Us</a></li>
                 <li><a>Privacy Policy</a></li>
                 <li><a>Terms</a></li>
                 </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 segment-three sm-mb-30">
            <h2>Follow us</h2><br/>
            <p>On socila media</p>
            <a href="https://www.facebook.com/Habesha-Babysitters-100826808840119/"><i class="fa fa-facebook"></i></a>
            <a href="https://www.youtube.com/embed/Xr7Siy8NIQw"><i class="fa fa-youtube"></i></a>
            <a href="https://t.me/Habeshababysitters"><i class="fa fa-telegram"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 segment-four sm-mb-30">
            <h2>Our newsletter</h2>
            <p>subscribe for latest updates</p>
            <form action="">
                <input>
                <input type="submit" value="subscribe">
                </form>
                <ul>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Our Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" target="_blank" href="//www.edelala.com">Edelala</a>
          <a class="dropdown-item" target="_blank" href={{'//www.ethiozewaj.com'}}>Ethiozewaj</a>
          <a class="dropdown-item" target="_blank" href="//www.roomdelala.com">Roomdelala</a>
                        <a class="dropdown-item" target="_blank" href="//www.trustguardsecurity.com">Trustguardsecurity</a>
                        <a class="dropdown-item" target="_blank" href="//www.richardsonstaffing.com">Richardsonstaffing</a>

        </div>
      </li></ul>
            </div>
            </div>
            </div>
            </div>
            <p class="footer-bottom-text">All Right reserved by &copy;Habeshababysitter.2021</p>
    </footer>

</body>
</html>
</body>
</html>

