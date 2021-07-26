@extends('layouts.app')

<style>
#c {
    
    min-height:70%;
      font-size:18px;
      
}

.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #563d7c;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #563d7c;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #563d7c;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
   
}
 input[type="password"]
{
    font-size:18px;
}

  input[type="text"]
{
    font-size:18px;
}
  input[type="email"]
{
    font-size:18px;
}
.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}





button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}


@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
.hbs{font-family:'Brush Script MT','cursive';font-size:45px;
                     color:#563d7c;}
.s{
    color:black;
}
             </style>
@section('content')
<div id="c" class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row justify-content-center"><a class="hbs" href="{{ url('/') }}">hBs</a></div>
                 <div class="row px-3 justify-content-center mt-4 mb-5 border-line"><img src="/uploads/Profile/av.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h2 class=" s mb-0 mr-4 mt-2">Register with</h2>
                        <div class="facebook text-center mr-3">
                            <div class="fa fa-facebook"></div>
                        </div>
                        <div class="twitter text-center mr-3">
                            <div class="fa fa-twitter"></div>
                        </div>
                        <div class="linkedin text-center mr-3">
                            <div class="fa fa-linkedin"></div>
                        </div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <h2 class="s text-center or">Or</h2>
                        <div class="line"></div>
                    </div>
                   <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <h6 for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</h6>

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
                            <h6 for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</h6>

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
                            <h6 for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</h6>

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
                            <h6 for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</h6>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <h6 class="col-md-4 col-form-label text-md-right">Register as:</h6>
                        <div class="col-md-6">
                         <select class="form-select form-control" style="font-size:18px;" name="role" type="text">
                            <option selected valu="Babysitter">Babysitter</option>
                            <option value="Parent">Parent</option>
                            
                        </select></div></div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100" style="font-size:18px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Have an account? <a class="text-danger"  href="{{ route('login') }}">Sign in</a></small> </div>
                </div>
            </div>
           </div>
        </div>
        
    </div>
</div>
@endsection

