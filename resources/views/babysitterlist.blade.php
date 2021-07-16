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
<table class="table table-borderless table-stripped table-hover table-secondary">
    <thead>
    
  </thead>
  <tbody>
  @foreach($profiles as $profile)
    <tr>
      <th><image src="{{asset('uploads/profile/'. $profile->image)}}" alt="image" width="100px" height="100px"></th>
      <td>{{$profile->fname}} {{$profile->lname}}</td>
      <td>{{$profile->address}}</td>
      <td><button type="button" class="btn btn-danger"><a href="{{ route('viewbabysitter.detail',$profile->profile_id) }}">View Detail</a></button>
    </td>
    <td><button type="button" class="btn btn-warning">Hire</button></td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
</div>
@endsection
