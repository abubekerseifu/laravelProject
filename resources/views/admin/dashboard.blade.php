 @extends('layouts.master')
  <style>
#h{
     color:#fcec5d;
}
.btn{
    margin-right:1%;
}
 </style>
 @section('content')

 <div class="row my-5">
                    <h3 class="fs-4 mb-3" id="h">Users</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr> 
                                    <th scope="col" width="150">User-id</th>
                                    <th scope="col">User-name</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                      @foreach($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                            @if($user->role!='Admin')
                            <a href="{{ route('make.admin',$user->id) }}" class="btn btn-warning">Make Admin</a>
                            @endif<button type="button" class="btn btn-danger">Delete</button>
                            </td>
                            
                            </tr>
                        @endforeach
                                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
