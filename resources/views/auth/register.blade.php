@extends('layouts.app')
<style>
#con{
    width:27%;
    height:45%;
    margin-top:8%;
    background:#F5F7F9;
    border:1px solid #563d7c;
    margin-bottom:8%;
    font-family:serif;
    font-size:10px;
}
#inner{
    border:none;
    background:#F5F7F9;
    width:100%;
}
.card-header{
    background:#F5F7F9!important;
    color:#563d7c;
    font-weight:200px;
    font-size:30px;
    margin-left:10%;
    border:none;
}
.card-header p{
    margin-left:25%;
}
</style>
@section('content')
<div class="container" id="con">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="inner">
                <div class="card-header"><p>Register</p></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
            </div>
        </div>
    </div>
</div>
@endsection
