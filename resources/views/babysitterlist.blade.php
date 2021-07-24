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
      <th>
      @if($profile->image)
      <image src="{{asset('uploads/Profile/'. $profile->image)}}" alt="image" width="100px" height="100px">
        @else
        <img src="/uploads/Profile/av.png" alt="image" width="100px" height="100px">
        @endif
      </th>
      <td>{{$profile->fname}} {{$profile->lname}}</td>
      <td>{{$profile->address}}</td>
      <td><a href="{{ route('viewbabysitter.detail',$profile->profile_id) }}" type="button" class="btn btn-danger">View Detail</a>
    </td>
    <td><button type="button" class="btn btn-warning">Hire</button></td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
</div>
@endsection
