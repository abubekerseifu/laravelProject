
@extends('layouts.app')
     <style>
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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/image/6.jpg" width="100%" height="auto"  alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h1>Habeshababysitters</h1>
    <div class="c">
    <p>Great Babysitter in your area!</p>
    <a class="btn btn-primary" href="{{ url('/about') }}" role="button">Read More</a>
    </div>
  </div>
    </div>
    
    <div class="carousel-item">
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

        <div class="row" id="f">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-3 col-md-12">
                        <div class="icon">
                            <i class="inner-icon far fa-search"></i>
                        </div>
                    </div>
    
            <div class="col-md-4">
                <div class="row">
                    

                    <div class="col-9 col-md-12">
                        <div class="title">1. Search</div>
                        <p class="description">Read detailed profiles of any babysitter registered on the site.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">

                    <div class="col-3 col-md-12">
                        <div class="icon">
                            <i class="inner-icon far fa-comments"></i>
                        </div>
                    </div>

                   

                    <div class="col-9 col-md-12">
                        <div class="title">2. Pay</div>
                        <p class="description">Pay reasonable amount of money for the service.Babysitters register for free.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">

                    <div class="col-3 col-md-12">
                        <div class="icon">
                            <i class="inner-icon far fa-calendar-check"></i>
                        </div>
                    </div>

                    <div class="col-9 col-md-12">
                                                    <div class="title">3. Connect</div>
                            <p class="description">Babysitter connects with the parent with the provided contact information. </p>
                                            </div>
                </div>
            </div>

        </div>



            <div class="row justify-content-center">
  <iframe width="500" height="300" src="https://www.youtube.com/watch?v=Xr7Siy8NIQw" title="YouTube video" allowfullscreen></iframe>
</div>
        </section>
        
{{View::make('footer')}}
@endsection

