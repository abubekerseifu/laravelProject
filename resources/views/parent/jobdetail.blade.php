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
    <tr>
    <td></td><td></td>
    <td><button type="button" class="btn btn-warning">Edit Job</button>
    @if($job->job_status=='public')
    <a href="{{route('makeprivate.job',$job->job_id)}}" class="btn btn-danger">Make Job Private</a>
    @endif
    @if($job->job_status=='private')
    <a href="{{route('makepublic.job',$job->job_id)}}" class="btn btn-danger">Make Job Public</a>
    @endif
    @if($job->job_status=='public' and $job->approved=='no')
    <a class="btn btn-success">Waiting for approval</a>
    @endif
    <a href="{{route('delete.job',$job->job_id)}}" class="btn btn-primary">Delete Job</a></td>
  </tr>
  <tbody>
  <tr>
  <td></td>
  <td><image src="{{asset('uploads/ParentImage/'. $job->image)}}" alt="image" width="100px" height="100px"></td>
  <td><b>Name : </b>{{$job->fname}} {{$job->lname}}<br/><b> Gender : </b>{{$job->gender}} <br/><b>Phone Number : </b>{{$job->phnumber}}<br/><b>Starting-Date : </b>{{$job->start_date}}</td>
      
      </tr>
    <tr>
      <td></td><td></td>
      <td><b>Address : </b>{{$job->address}} <b><br/>City : </b>{{$job->city}} <b>Country : </b>{{$job->country}}</td>
    </tr>
    <tr>
      <td></td><td></td>
      <td><b>Number Of Children : </b> {{$job->num_children}}<br/><b>Children Age Range : </b>From {{$job->lower_age}} to {{$job->upper_age}}
      <br/><b>Living Condition : </b> {{$job->living_condition}} <br/><b>Break for weekend : </b>{{$job->weekend_break}}</td>
    </tr>
    <tr>
    <td></td><td></td>
      <td><b>Extra Work For Adults : </b> {{$job->chores}} <br/><b>Job Status : </b>{{$job->job_status}}</td>
    </tr>
    <tr>
    <td></td><td></td>
       <td><b>Socila Contacts <br/><b>Facebook : </b> {{$job->facebook}}<br/>
       <b>Whatsup : </b>{{$job->whatsup}} <br/>
       <b>Viber : </b>{{$job->viber}}<br/>
       <b>Tekegram : </b>{{$job->telegram}}</td>
    </tr>
    <tr><td></td><td></td>
    <td><b>Description : </b>{{$job->description}}</td></tr>
  </tbody>
</table>
</div>
</div>
@endsection
