 @extends('layouts.master')
 <style>
#h{
     color:#fcec5d;
}
.g-3{
    padding-bottom:10px;
}
#image_c .wrapper{
    height:200px;
    width:200px;
    position:relative;
    border:5px solid #563d7c;
    border-radius:50%;
    background:#563d7c;
    background-size:100% 100%;
    overflow:hidden;
}
#i{
        height:100%;
        width:100%;
    }
.my_file{
    position:absolute;
    bottom:0;
    outline:none;
    color:transparent;
    width:100%;
    box-sizing:border-box;
    padding-top:10px;
    padding-left:65px;
    cursor:pointer;
    transition:0.5s;
    background:rgb(0,0,0,0.5);
    opacity:0;
}
.my_file::-webkit-file-upload-button{
   visibility:hidden;
}

.my_file::before{
    content:'Update';
    font-family:'arial';
    font-weight:bold;
    color:#fff;
    display:block;
    top:10px;
    font-size:14px;
    position:absolute;
    }
    .my_file:hover{
        opacity:1;
    }
    #i{
        height:100%;
        width:100%;
    }
  #left{
      
      background:#F5F7F9;
      padding-top:5%;
      margin-top:-1.3%;
      font-family:serif;
      font-size:25px;
  }
  input[type="text"]
{
    font-size:20px;
}
  input[type="date"]
{
    font-size:20px;
}
  input[type="radio"]
{
    font-size:20px;
}
 input[type="number"]
{
    font-size:20px;
}
#left form{
    margin-left:5%;
}
#left form .g-3{
    margin-left:7%;
}
#left form h2{
        margin-left:10%;
        color:black!important;
        font-size:25px!important;
}
#left form .g-3 h3{
    margin-left:20%;
    color:#563d7c!important;
    font-size:20px!important;
}
.form-check-label{
    margin-left:50%;
}
#collapse{
        margin-left:10%;
}
.save{
   margin-top:2%;
}
span{
    font-size:25%;
}
.required:after {
    content:" *";
    color: red;
  }
.r{
    font-size:15px;
    color: #dc3545;
}
.errors{
     color: red;
     font-size:13px;
}
form h2{
    
  }
  @media only screen and (min-width:360px) and (max-width:768px){
        #left{
            margin-top:-5.3%;
        }
     }
 </style>
 @section('content')

 <div class="row my-5">
                    <h3 class="fs-4 mb-3" id="h">Babysitters</h3>
                    <div class="col">
                   <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#postProfileModal" style="margin-bottom:10px;">Post new Profile</button>
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
<div class="modal fade" id="postProfileModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Your Profile</h5>
        <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
     <div class="mainContent">
           
<div class="col-lg-12 col-xl-16" id="left">
                <form method="post" enctype="multipart/form-data" action="{{ route('p.profile.admin') }}">
                @csrf
                
                    <div class="mb-5 pb-5 border-bottom">
                    <h2 class="required">Select User</h2>
                       <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control @error('user_id') is-invalid @enderror" style="font-size:20px;" id="users" name="user_id" data-validation="empty" data-error="Select user">
                                <option value="" checked>Select Babysitter</option>
                                @foreach($babysitters as $babysitter)
                                <option value="{{$babysitter->id}}">{{$babysitter->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                        </div></div></div>
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input name="image" accept="image/*" type="file" class="my_file @error('image') is-invalid @enderror" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])">
        
        <img src="/uploads/Profile/av.png" id="i"></div>
       
       
</div>
</div>     
                    <div class="mb-5 pb-5 border-bottom">
<div class="container">
  @error('image')
                                    <span class="r" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  </div>
                        <h2 class="required">About me</h2>


                        
                                                
<div>
<div class="row g-3">
  <div class="col-sm-3">
    <input name="fname"  value="{{old('fname')}}" type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="First Name" aria-label="firstname">
     @error('fname')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
  </div>
  <div class="col-sm-3">
    <input name="lname"  value="{{old('lname')}}" type="text" class="form-control @error('lname') is-invalid @enderror" placeholder="Last Name" aria-label="lastname">
     @error('lname')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
  </div>
  <div class="col-sm-5">
    <input type="number"  value="{{old('numbers')}}" name="numbers" class="form-control @error('number') is-invalid @enderror" placeholder="Phone Number" aria-label="phone">
     @error('numbers')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
  </div>
  </div>
    <h2 class="required">
        Address
    </h2>
    
                <div class="row g-3">
                <div class="col-sm-11">
                <input name="address"  value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" type="text"  placeholder="Enter your address"></div>
                 @error('address')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                </div>
                <div class="row g-3">
                <div class="col-sm-4">
                <input type="text"  value="{{old('country')}}" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" aria-label="country">
                 @error('country')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                </div>
                <div class="col-sm-7">
                <input type="text"  value="{{old('city')}}" name="city" class="form-control @error('city') is-invalid @enderror"  placeholder="city" aria-label="city">
                 @error('city')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
  </div>
  </div>
                
</div>     
                                                <h2 class="required">Gender</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" style="font-size:20px;" id="gender" name="gender" data-validation="empty" data-error="Select gender">
                                <option value="f" checked>Female</option>
                                <option value="m">Male</option>
                                <option value="other">Other</option>
                            </select>
                            
                        </div></div></div>
                        <h2 class="required">Date of birth</h2>
                        <div class="row g-3">
                        <div class="col-sm-11">                                                 
                        <div class="mt-3">
                            
                            
                            <div class="birthdate">
                                <div class="input-group">
                                    <input type="date"  value="{{old('birth_date')}}" class="form-control @error('birth_date') is-invalid @enderror" id="start" name="birth_date"
                                    min="1900-01-01" max="2021-1-1">
                                </div>
                            </div> 
                             @error('birth_date')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror </div> </div>
                       </div>
                         <h2 class="required">Experience</h2>
                         <div class="mb-5 pb-5 border-bottom">
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" style="font-size:20px;" name="experience">
                                <option value="0" checked>no experience</option>
                                <option value="1">1 year</option>
                                                                    <option value="2"> years</option>
                                                                    <option value="3">3 years</option>
                                                                    <option value="4">4 years</option>
                                                                    <option value="5">5 years</option>
                                                                    <option value="6">6 years</option>
                                                                    <option value="7">7 years</option>
                                                                    <option value="8">8 years</option>
                                                                    <option value="9">9 years</option>
                                                                    <option value="10">10 years</option>
                                                                    <option value=">10">&gt; 10 years</option>
                                                            </select>
                            
                        </div></div></div></div>
      
<h2 class="required">Pricing</h2>
                 <div class="row g-3">
               
                <div class="col-sm-11">
<div class="input-group">
                         <span class="input-group-text" style="font-size: 12px">$</span>
                           <input name="price"  value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" autocomplete="off" type="text" placeholder="Enter prefered Price">

                            <span class="input-group-text" style="font-size: 12px">/child</span>
                        </div></div>
                         @error('price')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        </div>
                        <h2 class="required">Comfortable with more than one child</h2>
                        <div class="row g-3">
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="moc" value="yes" id="flexRadioDefault1">
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="moc" value="no" id="flexRadioDefault2" checked>
  <h3>
    No
  </h3></div>
</div></div>
                                    <div class="mb-5 pb-5 border-bottom">            
<h2 class="required">Living Condition</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                            <select class="form-control @error('living_condition') is-invalid @enderror" style="font-size:20px;" id="living" name="living_condition">
                                <option value="back_forth">Back and Forth</option>
                                <option value="live_in">Live In</option>
                                <option value="" checked>Choose living preference</option>
                            </select>
                             @error('living_condition')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        </div></div></div>
                        <h2 class="required">Break For Weekend</h2>
                           <div class="row g-3">
       
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="yes" id="flexRadioDefault1">
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="no" id="flexRadioDefault2" checked>
  <h3>
    No
  </h3></div>
</div></div>
        <h2 class="required"> Comfortable with chores</h2>
       <div class="row g-3">
                         
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="yes" id="flexRadioDefault1">
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="no" id="flexRadioDefault2" checked>
  <h3>
    No
  </h3></div>
</div></div>
                                                              </div>
                                                              <h2>Social Media Contact</h2>
                 <div class="row g-3">
                <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Facebook</span>
                <input  value="{{old('facebook')}}" class="form-control @error('facebook') is-invalid @enderror" name="facebook" type="text" placeholder="Facebook username">
                 @error('facebook')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Telegram</span>
               <input  value="{{old('telegram')}}" class="form-control @error('telegram') is-invalid @enderror" name="telegram" type="text" placeholder="Telegram UserName or Number">
                @error('telegram')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
            </div></div></div>
             <div class="row g-3">
            <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">WhatsUp</span>
                <input  value="{{old('whatsup')}}" class="form-control @error('whatsup') is-invalid @enderror" name="whatsup" type="text" placeholder="WhatsUp Number">
                 @error('whatsup')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Viber</span>
                <input  value="{{old('viber')}}" class="form-control @error('viber') is-invalid @enderror" name="viber" type="text" placeholder="Viber Number">
                 @error('viber')
                                    <span class="errors" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
            </div></div></div>
            <h2>Description</h2>
                 <div class="row g-3">
                <div  class="col-sm-11">
                <div class="input-group">
            <textarea rows = "5"  value="{{old('description')}}" cols = "116" type="text" maxlength = "100" style="font-size:20px" name ="description" placeholder="Provide description here to increase the chance of selectivity..."></textarea></div>
                                              <div class="save">
                                              
    <button type="submit" class="btn btn-info btn-lg w-100" style="font-size : 15px;color:#fff; height: 30px;">
        Post Profile
    </button>
</div>
                                      <div class="save">
                                              
    <button type="submit" id="b" class="btn btn-info btn-lg w-100" data-dismiss="modal" aria-label="Close" style="font-size : 15px;color:#fff; height: 30px;">
        Close
    </button>
</div>
            </div>
            </div>
                   <input type="hidden" name="_csrf_token" value="39d3ef52.h5djrZI1dYxxlFnFmd6KQya06JE6XNmu0xuui9lqMU8.xOU0mdZ-HvUI5S_3rrTPKWmZset9EODbvlP_8bEzcnvJ0TL-wFIUyDz-YQ">
                    <input type="text" class="d-none" name="spamvalidation">
                    
                    <div class="mb-5 pb-5"></div>
                 
                </form>
            </div>
            
            </div>
            </div>
</div></div></div></div>
@if (count($errors) > 0)
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#postProfileModal').modal('show');
        });
        
    </script>
  @endif
@endsection
