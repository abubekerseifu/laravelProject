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
    <td>
    @if($n_payment=='yes')
    <a href="{{route('v.babysitter.stripe',$job->job_id)}}" type="button" class="btn btn-warning">Contact {{$job->fname}}</a>
  @else
  @if($contacted=='no')
  <a href="{{route('contact.parent',$job->job_id)}}" type="button" class="btn btn-warning">Contact {{$job->fname}}</a>
    @else
        <span style="background:white">Interest sent,waiting to be contacted</span>
    @endif
    @endif
  </tr>
  <tr>
  <td></td>
  <td>
  @if($job->image)
<image src="{{asset('uploads/ParentImage/'. $job->image)}}" alt="image" width="100px" height="100px">        @else
        <img src="/uploads/Profile/av.png" alt="image" width="100px" height="100px">
        @endif</td>
  <td><b>Name : </b>{{$job->fname}} {{$job->lname}}<br/><b> Gender : </b>{{$job->gender}} <br/><b> Birth-Date : </b>{{$job->start_date}}</td>
      
      </tr>
    <tr>
      <td></td><td></td>
      <td><b> City : </b>{{$job->city}} <b>Country : </b>{{$job->country}}</td>
    </tr>
    <tr>
      <td></td><td></td>
      <td><b>Number Of Children : </b> {{$job->num_children}}<br/><b>Children Age Range : </b>From {{$job->lower_age}} to {{$job->upper_age}}
      <br/><b>Living Condition : </b> {{$job->living_condition}} <br/><b>Break for weekend : </b>{{$job->weekend_break}}</td>
    </tr>
    <tr>
    <td></td><td></td>
      <td><b>Extra Work For Adults : </b> {{$job->chores}}</td>
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
