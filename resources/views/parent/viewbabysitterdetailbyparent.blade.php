@extends('layouts.app')
<style>
#container{
   margin-top:10%;
     margin-bottom:-15px;
     margin-left:30%;
     margin-right:30%;
     min-height:50%;
}
</style>
@section('content')
<div class="conatiner" id="container">
<div class="jumbotorn">
<table class="table table-borderless table-stripped table-secondary">
<tbody>
    <tr>
    <td></td><td></td>
    <td><a href="{{route('v.parent.stripe',$profile->profile_id)}}" type="button" class="btn btn-warning">Contact {{$profile->fname}}</a>
  </tr>
  <tr>
  <td></td>
  <td><image src="{{asset('uploads/Profile/'. $profile->image)}}" alt="image" width="100px" height="100px"></td>
  <td><b>Name : </b>{{$profile->fname}} {{$profile->lname}}<br/><b> Gender : </b>{{$profile->gender}} <br/><b> Birth-Date : </b>{{$profile->birth_date}}</td>
      
      </tr>
    <tr>
      <td></td><td></td>
      <td><b> City : </b>{{$profile->city}} <b>Country : </b>{{$profile->country}}</td>
    </tr>
    <tr>
      <td></td><td></td>
      <td><b>Experience : </b> {{$profile->experience}} years<br/><b>Price/Child : </b>{{$profile->price}}
      <br/><b>Living Condition : </b> {{$profile->living_condition}} <br/><b>Break for weekend : </b>{{$profile->weekend_break}}</td>
    </tr>
    <tr>
    <td></td><td></td>
      <td><b>Extra Work For Adults : </b> {{$profile->chores}}</td>
    </tr>
  </tbody>
</table>
</div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
