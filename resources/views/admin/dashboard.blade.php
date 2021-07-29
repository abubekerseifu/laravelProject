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
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#newUserModal" style="margin-bottom:10px;">Register New User</button>
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
                            @endif<a type="button" href="{{route('delete.user',$user->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                            
                            </tr>
                        @endforeach
                                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
    <div class="modal fade" id="newUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register New User</h5>
        <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
     <form method="POST" action="{{ route('r.user') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Register as:</label>
                        <div class="col-md-6">
                         <select class="form-select form-control" name="role">
                            <option selected valu="Babysitter">Babysitter</option>
                            <option value="Parent">Parent</option>
                            
                        </select></div></div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>
                        </div></div>
                        </div>
@endsection
