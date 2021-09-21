@extends('layouts.app')
<style>
#body{
  font-family: "Poppins", sans-serif;
    font-size: 15px;
    min-height:1500px;
    width:70%;
}
.card {
    border: none;
    border-radius: 10px;
    
}

.percent {
    padding: 5px;
    background-color: red;
    border-radius: 5px;
    color: #fff;
    font-size: 14px;
    height: 35px;
    width: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer
}

.wishlist {
    height: 40px;
    width: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: #eee;
    padding: 10px;
    cursor: pointer
}

.img-container {
    position: relative;}

.img-container .first {
    position: absolute;
    width: 100%
}

.img-container img {
    border-top-left-radius: 5px;
    border-top-right-radius: 5px
}

.product-detail-container {
    padding: 10px
}
#d{
  color:grey;
}
h3{
    color:black!important;
}
.button{
  background-color: #563d7c; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button:hover{
    text-decoration: none;
    color:white;
}
.name{
    color:#563d7c;
}
</style>
@section('content')
<div class="container-fluid mt-3 mb-3" id="body">
    <div class="row g-3">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first"><span class="wishlist"><i class="fa fa-heart"></i></span> </div>
                     @if($profile->image)
                     <img src="{{asset('uploads/Profile/'. $profile->image)}}" class="img-fluid">
        @else
        <img src="/uploads/Profile/1625779581.png" class="img-fluid" height="100%" width="100%">
        @endif
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="name font-weight-bold">{{$profile->fname}} {{$profile->lname}}</p><h3 class="mb-0">Address - {{$profile->address}}</h3>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings">{{$profile->description}}</div>
                        
                    </div>
                    <hr>
                     <h3 class="mb-0">Gender - {{$profile->gender}}</h3>
                      <h3 class="mb-0">Birth-Date - {{$profile->birth_date}}</h3>
                        <h3 class="mb-0">City - {{$profile->city}}</h3>
                        <h3 class="mb-0">Country - {{$profile->country}}</h3>
                        <h3 class="mb-0">Experience - {{$profile->experience}} years</h3>
                        <h3 class="mb-0">Price/Child - {{$profile->price}}</h3>
                        <h3 class="mb-0">Living Condition - {{$profile->living_condition}}</h3>
                        <h3 class="mb-0">Break for weekend - {{$profile->weekend_break}}</h3>
                        <h3 class="mb-0">Extra Work For Adults - {{$profile->chores}}</h3>
                    <div class="mt-3">
                    @if($paid=='paid')
      <a href="{{route('v.babysitter.contactinfo',$profile->profile_id)}}" type="button" class="btn btn-warning">Contact {{$profile->fname}}</a>
    @else
            <a href="{{route('v.parent.stripe',$profile->profile_id)}}" type="button" class="button" >Contact {{$profile->fname}}</a>
    @endif
              
                    </div>
                </div>
            </div>
        </div>  

    </div>
</div>
@endsection


