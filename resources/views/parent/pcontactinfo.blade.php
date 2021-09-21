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
  </tr>
  <tr>
  <td></td>
  <td><image src="{{asset('uploads/ParentImage/'. $job->image)}}" alt="image" width="100px" height="100px"></td>
  <td><b>Phone Number : {{$job->phnumber}}</b><br/><b>Address : </b>{{$job->address}}<br/><b> city : </b>{{$job->city}} <br/><b> facebook : </b> {{$job->facebook}}</td>
      
      </tr>
    
  </tbody>
</table>
</div>
</div>
@endsection
