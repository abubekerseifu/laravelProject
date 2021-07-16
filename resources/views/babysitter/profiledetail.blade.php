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
    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profile</button>
    @if($profile->profile_status=='public')
    <a href="{{route('makeprivate.profile',$profile->profile_id)}}" class="btn btn-danger">Make Profile Private</a>
    @endif
    @if($profile->profile_status=='private')
    <a href="{{route('makepublic.profile',$profile->profile_id)}}" class="btn btn-danger">Make Profile Public</a>
    @endif
    @if($profile->profile_status=='public' and $profile->approved=='no')
    <a class="btn btn-success">Waiting for approval</a>
    @endif
   <a href="{{route('delete.profile',$profile->profile_id)}}" class="btn btn-primary">Delete Profile</a></td>
  </tr>
  <tr>
  <td></td>
  <td><image src="{{asset('uploads/Profile/'. $profile->image)}}" alt="image" width="100px" height="100px"></td>
  <td><b>Name : </b>{{$profile->fname}} {{$profile->lname}}<br/><b> Gender : </b>{{$profile->gender}} <br/><b>Phone Number : </b>{{$profile->numbers}}<br/><b> Birth-Date : </b>{{$profile->birth_date}}</td>
      
      </tr>
    <tr>
      <td></td><td></td>
      <td><b>Address : </b>{{$profile->address}} <b><br/>City : </b>{{$profile->city}} <b>Country : </b>{{$profile->country}}</td>
    </tr>
    <tr>
      <td></td><td></td>
      <td><b>Experience : </b> {{$profile->experience}} years<br/><b>Price/Child : </b>{{$profile->price}}
      <br/><b>Living Condition : </b> {{$profile->living_condition}} <br/><b>Break for weekend : </b>{{$profile->weekend_break}}</td>
    </tr>
    <tr>
    <td></td><td></td>
      <td><b>Extra Work For Adults : </b> {{$profile->chores}} <br/><b>Profile Status : </b>{{$profile->profile_status}}</td>
    </tr>
    <tr>
    <td></td><td></td>
       <td><b>Socila Contacts <br/></b><b>Facebook : </b> {{$profile->facebook}}<br/>
       <b>Whatsup : </b>{{$profile->whatsup}} <br/>
       <b>Viber : </b>{{$profile->viber}}<br/>
       <b>Tekegram : </b>{{$profile->telegram}}</td>
    </tr><tr><td></td><td></td>
    <td><b>Description : </b>{{$profile->description}}</td></tr>
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
