 @extends('layouts.master')
 <style>
#h{
     color:#fcec5d;
}
 </style>
 @section('content')

 <div class="row my-5">
                    <h3 class="fs-4 mb-3" id="h">Babysitters</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="100">profile-id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Profile-Status</th>
                                    <th scope="col">Approvement-Status</th>
                                    <th scope="col">Payment-Status</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($profiles as $profile)
                            <tr>
                            <td>{{$profile->profile_id}}</td>
                            <td>{{$profile->fname}} {{$profile->lname}}</td>
                            <td>{{$profile->numbers}}</td>
                            <td>{{$profile->price}}</td>
                            @if($profile->approved=='no' and $profile->profile_status=='public')
                           <td>waiting for Approval</td><td><a href="{{route('approve.profile',$profile->profile_id)}}" class="btn btn-warning">Approve</a></td>
                            @elseif($profile->approved=='no' and $profile->profile_status=='private')
                           <td>Public not requested</td><td> Not Approved</td>                                                      
                            @else
                           <td>{{$profile->profile_status}}</td><td>Approved <a href="{{route('disapprove.profile',$profile->profile_id)}}" class="btn btn-primary">Disapprove</a></td>
                            @endif
                            <td>{{$profile->paymet_status}}</td>
                            </tr>
                        @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
