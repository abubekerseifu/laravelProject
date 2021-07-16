 @extends('layouts.master')
  <style>
#h{
     color:#fcec5d;
}
 </style>
 @section('content')

 <div class="row my-5">
                    <h3 class="fs-4 mb-3" id="h">Parents</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                            <tr>
                                 <th scope="col" width="100">job-id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Start-Date</th>
                                    <th scope="col">job-Status</th>
                                    <th scope="col">Approvement-Status</th>
                                    <th scope="col">Payment-Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($jobs as $job)
                            <tr>
                            <td>{{$job->job_id}}</td>
                            <td>{{$job->fname}} {{$job->lname}}</td>
                            <td>{{$job->phnumber}}</td>
                            <td>{{$job->price}}</td>
                            <td>{{$job->start_date}}</td>                            
                             @if($job->approved=='no' and $job->job_status=='public')
                           <td>waiting for Approval</td><td><a href="{{route('approve.job',$job->job_id)}}" class="btn btn-warning">Approve</a></td>
                            @elseif($job->approved=='no' and $job->job_status=='private')
                           <td>Public not requested</td><td> Not Approved</td>                                                      
                            @else
                           <td>{{$job->job_status}}</td><td>Approved <a href="{{route('disapprove.job',$job->job_id)}}" class="btn btn-primary">Disapprove</a></td>
                            @endif
                            <td>{{$job->paymet_status}}</td>
                            </tr>
                        @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
