@extends('layouts.app')
<style>
.carousel-item{
    height:100vh;
    min-height:300px;
    background:no-repeat scroll center scroll;
    -webkit-background-size:cover;
    background-size:cover;
    
}
.carousel-inner{
margin-top:-22px;

 }
.carousel-item:before{
    content:"";
    display:block;
    position:absolute;
    top:0;
    left:0;
    bottom:0;
    right:0;
    background:black;
    opacity:0.7;
}
.carousel-caption{
    margin-bottom:280px;
    padding-left:140px;
    padding-right:100px;
    
}
.carousel-caption h1{
        font-family:Courgette;
        color:#fcec5d;
        letter-spacing:3px;
        font-size:70px;
        
}
.carousel-caption p{
        font-size:18px;
        top:2rem;
        color:white;
}
.slider-btn{
    margin-top:30px;
}
.slider-btn .btn{
    background-color:#563d7c;
    color:#fcec5d;
    border-radius:none;
    padding:1.5rem 2rem;
    font-size:1rem;
    margin-right:15px;
    font-size:12px;
}
.slider-btn .btn:hover{
    background-color:#fff;
    color:#563d7c;
}
 @media only screen and (min-width 768px) and (max-width:991px){}
     
@media only screen and (max-width:767px){
     
.carousel-caption h1{
        font-size:18px;
        margin-left:-150px;
        
}
.slider-btn{
    margin-top:10px;
}
.slider-btn .btn{
    padding:1rem 1rem;
    font-size:1rem;
    margin-top:15px;
}
}
     @media only screen and (max-width:360px){
        .carousel-caption h1{
        font-size:10px;
        margin-left:-120px;
        font-size:25px;
}
.slider-btn{
    margin-left:-70px;
}
.slider-btn .btn-1{
    margin-left:20px;
}
.carousel-caption p{
        font-size:12px;
        top:1rem;
        display:block;
        
}
     }
#container{
font-size:25px;
color:black;
margin-right:100px;
margin-top:50px;
}
#container h2{
    color:black;
    padding-left:300px;
    font-family:Courgette;
    letter-spacing:2px;
    font-size:30px;
    text-transform:uppercase;
}
#container .g-3{
    margin-top:30px;
}
#container .g-3 p{
    font-size:20px;
}
#container .itdiv{
    margin-left:50px;
}
#container .itdiv i{
    margin-left:20px;
}
#container .itdiv .i-2{
    margin-left:40px;
}
#container .itdiv .i-3{
    margin-left:50px;
}
#v{
    margin-top:30px;
    margin-bottom:30px;
}
</style>
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <!--@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif-->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/image/6.jpg" alt="First slide">
      <div class="carousel-caption">
    <h1>Habeshababysitters</h1>
    <p>Great Babysitter in your area!</p>
    <div class="slider-btn">
     <a href="{{ url('babysitterlist') }}" class="btn btn-1">Babysitters to hire</a>
     <a href="{{ url('joblist') }}" class="btn btn-2">Babysitting jobs to be hired</a>
    </div>
  </div>
    </div>
    
    <div class="carousel-item">
      <img class="d-block w-100" src="/image/5.jpg" alt="Third slide">
      <div class="carousel-caption">
    <h1>Habeshababysitters</h1>
    
    <p>Great Babysitter in your area!</p>
   <div class="slider-btn">
     <a href="{{ url('babysitterlist') }}" class="btn btn-1">Babysitters to hire</a>
     <a href="{{ url('joblist') }}" class="btn btn-2">Babysitting jobs to be hired</a>
    </div>
    </div>
  </div>
  
<div class="carousel-item">
      <img class="d-block w-100" src="/image/6.jpg" alt="Third slide">

      <div class="carousel-caption" >
    <h1>Habeshababysitters</h1>
   
    <p>Great Babysitter in your area!</p>
    <div class="slider-btn">
     <a href="{{ url('babysitterlist') }}" class="btn btn-1">Babysitters to hire</a>
     <a href="{{ url('joblist') }}" class="btn btn-2">Babysitting jobs to be hired</a>
    </div>
    </div>
  </div>
  
</div>
<div class="container justify-content-center" id="container">
<h2>How it works</h2>
<div class="row g-3">
  <div class="col-sm-3">
  <div class="itdiv">
        <i class="inner-icon fa fa-search i-2"></i>
       <div class="title">1. Search</div></div>
                        <p class="description">Read detailed profiles of any babysitter registered on the site.</p>
                    </div>
  <div class="col-sm-3">
  <div class="itdiv">
        <i class="inner-icon fa fa-money"></i>
    <div class="title">2.Pay</div></div>
                        <p class="description">Pay reasonable amount of money for the service.Babysitters register for free.</p>
                    </div>
  <div class="col-sm-3">
  <div class="itdiv">
        <i class="inner-icon fa fa-comments i-3"></i>
    <div class="title">3.Connect</div></div>
                        <p class="description">Babysitter connects with the parent with the provided contact information. </p>
                    </div>
  
            </div>
    </div>
         <div class="row justify-content-center" id="v">
  <iframe width="500" height="300" src="https://www.youtube.com/embed/Xr7Siy8NIQw" title="YouTube video" ng-show="showvideo" allow="encrypted-media"></iframe>
</div>
@endsection

