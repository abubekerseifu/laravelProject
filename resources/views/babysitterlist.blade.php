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
</style>
@section('content')
<div class="container-fluid mt-3 mb-3" id="body">
    <div class="row g-2">
      @foreach($profiles as $profile)

        <div class="col-md-4">
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
                        <span class="text-danger font-weight-bold">{{$profile->fname}} {{$profile->lname}}</span><h5 class="mb-0">{{$profile->address}}</h5> 
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"><span id="d">{{$profile->description}}</span> </div>
                        
                    </div>
                    <div class="mt-3"><a href="{{ route('viewbabysitter.detail',$profile->profile_id) }}" type="button" class="btn btn-danger btn-block">View Detail</a></div>
                </div>
            </div>
        </div>
         @endforeach
    </div>
</div>
@endsection
