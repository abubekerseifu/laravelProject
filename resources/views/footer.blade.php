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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    p{
        color:#999;
        line-height:25px;
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
        color:#fff;
        padding: 7px 8px;
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
     @media only screen and (min-width 768px) and (max-width:991px){
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

    </style>
    </head>
    <body>
    <footer>
        <div class="footer-top">
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 segment-one md-mb-30 sm-mb-30">
                <h3>Habeshababysitters</h3>
                <p>hdggggggggggggggggggggggg</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 segment-two md-mb-30 sm-mb-30">
                <h2>usefullinks</h2>
                 <ul>
                 <li><a>event</a></li>
                 <li><a>support</a></li>
                 </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 segment-three sm-mb-30">
            <h2>Follow us</h2>
            <p>please follow us</p>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-telegram"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 segment-four sm-mb-30">
            <h2>Our Newletter</h2>
            <p>subscribe</p>
            <form action="">
                <input type="email">
                <input type="submit" value="subscribe">
                </form>
            </div>
            </div>
            </div>
            </div>
            <p class="footer-bottom-text">All Right reserved by &copy;Habeshababysitter.2021</p>
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>