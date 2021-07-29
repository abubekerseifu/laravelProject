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
  @foreach($jobs as $job)
    <tr>
      <th> @if($job->image)
      <image src="{{asset('uploads/ParentImage/'. $job->image)}}" alt="image" width="100px" height="100px">
        @else
        <img src="/uploads/Profile/av.png" alt="image" width="100px" height="100px">
        @endif</th>
      <td>{{$job->fname}} {{$job->lname}}</td>
      <td>{{$job->city}}</td>
      <td><a href="{{ route('viewjob.detail',$job->job_id) }}" type="button" class="btn btn-danger">View Detail</a>
    </td>

    <td>
    @if($n_payment=='yes')
    <a href="{{route('v.babysitter.stripe',$job->job_id)}}" type="button" class="btn btn-warning">contact {{$job->fname}}</a>
    @endif
    </td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
</div>
@endsection
