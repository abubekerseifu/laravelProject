@extends('layouts.app')
<style>
html,body
                {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
                overflow-x: hidden; 
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
    font-size:12px;
}
  input[type="date"]
{
    font-size:12px;
}
  input[type="radio"]
{
    font-size:12px;
}
 input[type="number"]
{
    font-size:12px;
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
    margin-left:35%;
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
    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit Profile</button>
    @if($profile->profile_status=='public')
    <a href="{{route('makeprivate.profile',$profile->profile_id)}}" class="btn btn-danger">Make Profile Private</a>
    @endif
    @if($profile->profile_status=='private')
    <a href="{{route('makepublic.profile',$profile->profile_id)}}" class="btn btn-danger">Make Profile Public</a>
    @endif
    @if($profile->profile_status=='public' and $profile->approved=='no')
    <a class="btn btn-success">Waiting for approval</a>
    @endif
   <a href="{{route('delete.profile',$profile->profile_id)}}" class="btn btn-primary">Delete Profile</a></td>
  </tr>
  <tr>
  <td></td>
  <td>
  @if($profile->image)
      <image src="{{asset('uploads/Profile/'. $profile->image)}}" alt="image" width="100px" height="100px">
        @else
        <img src="/uploads/Profile/av.png" alt="image" width="100px" height="100px">
        @endif
  </td>
  <td><b>Name : </b>{{$profile->fname}} {{$profile->lname}}<br/><b> Gender : </b>{{$profile->gender}} <br/><b>Phone Number : </b>{{$profile->numbers}}<br/><b> Birth-Date : </b>{{$profile->birth_date}}</td>
      
      </tr>
    <tr>
      <td></td><td></td>
      <td><b>Address : </b>{{$profile->address}} <b><br/>City : </b>{{$profile->city}} <b>Country : </b>{{$profile->country}}</td>
    </tr>
    <tr>
      <td></td><td></td>
      <td><b>Experience : </b> {{$profile->experience}} years<br/><b>Price/Child : </b>{{$profile->price}}
      <br/><b>Living Condition : </b> {{$profile->living_condition}} <br/><b>Break for weekend : </b>{{$profile->weekend_break}}</td>
    </tr>
    <tr>
    <td></td><td></td>
      <td><b>Extra Work For Adults : </b> {{$profile->chores}} <br/><b>Profile Status : </b>{{$profile->profile_status}}</td>
    </tr>
    <tr>
    <td></td><td></td>
       <td><b>Socila Contacts <br/></b><b>Facebook : </b> {{$profile->facebook}}<br/>
       <b>Whatsup : </b>{{$profile->whatsup}} <br/>
       <b>Viber : </b>{{$profile->viber}}<br/>
       <b>Tekegram : </b>{{$profile->telegram}}</td>
    </tr><tr><td></td><td></td>
    <td><b>Description : </b>{{$profile->description}}</td></tr>
  </tbody>
</table>
</div>
</div>

<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Your Profile</h5>
        <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle" style="font-size:12px;"></i></a>
      </div>
      <div class="modal-body">
     <div class="mainContent">
           
<div class="col-lg-12 col-xl-16" id="left">
                <form method="post" enctype="multipart/form-data" action="{{route('p.update', $profile->profile_id)}}">
                @csrf
                @method('PUT')
                    <div class="mb-5 pb-5 border-bottom">
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input name="image" accept="image/*" type="file" class="my_file" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])">
         @if($profile->image)
      <image src="{{asset('uploads/Profile/'. $profile->image)}}" id="i"></div>
        @else
        <img src="/uploads/Profile/av.png" id="i"></div>
        @endif
       
</div>
</div>     
                    <div class="mb-5 pb-5 border-bottom">

                        <h2 class="required">About me</h2>


                        
                                                
<div>
<div class="row g-3">
  <div class="col-sm-3">
    <input name="fname" type="text" class="form-control" value="{{$profile->fname}}" placeholder="First Name" aria-label="firstname">
  </div>
  <div class="col-sm-3">
    <input name="lname" type="text" class="form-control"  value="{{$profile->lname}}" placeholder="Last Name" aria-label="lastname">
  </div>
  <div class="col-sm-5">
    <input type="number" name="numbers" class="form-control"  value="{{$profile->numbers}}" placeholder="Phone Number" aria-label="phone">
  </div>
  </div>
    <h2 class="required">
        Address
    </h2>
    
                <div class="row g-3">
                <div class="col-sm-11">
                <input name="address" class="form-control" type="text" value="{{$profile->address}}" placeholder="Enter your address"></div>
                </div>
                <div class="row g-3">
                <div class="col-sm-4">
                <input type="text"name="country" class="form-control" value="{{$profile->country}}" placeholder="Country" aria-label="country">
                </div>
                <div class="col-sm-7">
                <input type="text" name="city" class="form-control" value="{{$profile->city}}" placeholder="city" aria-label="city">
  </div>
  </div>
                
</div>     
                                                <h2 class="required">Gender</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" style="font-size:12px;" id="gender" name="gender" data-validation="empty" data-error="Select gender">
                                <option value="f" <?php if($profile->gender== 'f') { ?> selected="selected"<?php } ?>>Female</option>
                                <option value="m"<?php if($profile->gender== 'm') { ?> selected="selected"<?php } ?>>Male</option>
                                <option value="other"<?php if($profile->gender== 'other') { ?> selected="selected"<?php } ?>>Other</option>
                            </select>
                            
                        </div></div></div>
                        <h2 class="required">Date of birth</h2>
                        <div class="row g-3">
                        <div class="col-sm-11">                                                 
                        <div class="mt-3">
                            
                            
                            <div class="birthdate">
                                <div class="input-group">
                                    <input type="date" class="form-control" id="start" name="birth_date"
                                    value="{{$profile->birth_date}}"
                                    min="1900-01-01" max="2021-1-1">
                                </div>
                            </div> </div> </div>
                       </div>
                         <h2 class="required">Experience</h2>
                         <div class="mb-5 pb-5 border-bottom">
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" style="font-size:12px;" name="experience">
                                <option value="0" <?php if($profile->experience== '0') { ?> selected="selected"<?php } ?>>&lt; 1 year</option>
                                <option value="1"<?php if($profile->experience== '1') { ?> selected="selected"<?php } ?>>1 year</option>
                                                                    <option value="2"<?php if($profile->experience== '2') { ?> selected="selected"<?php } ?>> years</option>
                                                                    <option value="3"<?php if($profile->experience== '3') { ?> selected="selected"<?php } ?>>3 years</option>
                                                                    <option value="4"<?php if($profile->experience== '4') { ?> selected="selected"<?php } ?>>4 years</option>
                                                                    <option value="5"<?php if($profile->experience== '5') { ?> selected="selected"<?php } ?>>5 years</option>
                                                                    <option value="6"<?php if($profile->experience== '6') { ?> selected="selected"<?php } ?>>6 years</option>
                                                                    <option value="7"<?php if($profile->experience== '7') { ?> selected="selected"<?php } ?>>7 years</option>
                                                                    <option value="8"<?php if($profile->experience== '8') { ?> selected="selected"<?php } ?>>8 years</option>
                                                                    <option value="9"<?php if($profile->experience== '9') { ?> selected="selected"<?php } ?>>9 years</option>
                                                                    <option value="10"<?php if($profile->experience== '10') { ?> selected="selected"<?php } ?>>10 years</option>
                                                                    <option value=">10"<?php if($profile->experience== '11') { ?> selected="selected"<?php } ?>>&gt; 10 years</option>
                                                            </select>
                            
                        </div></div></div></div>
      
<h2 class="required">Pricing</h2>
                 <div class="row g-3">
               
                <div class="col-sm-11">

               
                        <div class="input-group">
                         <span class="input-group-text" style="font-size: 12px">$</span>
                           <input name="price" value="{{$profile->price}}" class="form-control" autocomplete="off" type="text" placeholder="Enter prefered Price">

                            <span class="input-group-text" style="font-size: 12px">/child</span>
                        </div></div></div>
                        <h2 class="required">Comfortable with more than one child</h2>
                        <div class="row g-3">
                           
                           
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="moc" value="yes" id="flexRadioDefault1" <?php if($profile->moc== 'yes') { ?> checked="checked"<?php } ?>>
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="moc" value="no" id="flexRadioDefault2" <?php if($profile->moc== 'no') { ?> checked="checked"<?php } ?>>
  <h3>
    No
  </h3></div>
</div></div>
                                    <div class="mb-5 pb-5 border-bottom">            
<h2 class="required">Living Condition</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                            <select class="form-control" style="font-size:12px;" id="living" name="living_condition">
                                <option value="back_forth" <?php if($profile->living_condition== 'back_forth') { ?> selected="selected"<?php } ?>>Back and Forth</option>
                                <option value="live_in" <?php if($profile->living_condition== 'live_in') { ?> selected="selected"<?php } ?>>Live In</option>
                                <option value="" <?php if($profile->living_condition== '') { ?> selected="selected"<?php } ?>>Choose living preference</option>
                            </select>
                        </div></div></div>
                        <h2 class="required">Break For Weekend</h2>
                           <div class="row g-3">
       
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="yes" id="flexRadioDefault1" <?php if($profile->weekend_break== 'yes') { ?> checked="checked"<?php } ?>>
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="no" id="flexRadioDefault2" <?php if($profile->weekend_break== 'no') { ?> checked="checked"<?php } ?>>
  <h3>
    No
  </h3></div>
</div></div>
        <h2 class="required"> Comfortable with chores</h2>
       <div class="row g-3">
                         
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="yes" id="flexRadioDefault1" <?php if($profile->chores== 'yes') { ?> checked="checked"<?php } ?>>
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="no" id="flexRadioDefault2" <?php if($profile->chores== 'no') { ?> checked="checked"<?php } ?>>
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
                <input class="form-control" name="facebook" type="text" value="{{$profile->facebook}}" placeholder="Facebook username">
    
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Telegram</span>
               <input class="form-control" name="telegram" type="text" value="{{$profile->telegram}}" placeholder="Telegram UserName or Number">
               
            </div></div></div>
             <div class="row g-3">
            <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">WhatsUp</span>
                <input class="form-control" name="whatsup" type="text" value="{{$profile->whatsup}}" placeholder="WhatsUp Number">
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Viber</span>
                <input class="form-control" name="viber" type="text" value="{{$profile->viber}}" placeholder="Viber Number">
            </div></div></div>
            <h2>Description</h2>
                 <div class="row g-3">
                <div  class="col-sm-11">
                <div class="input-group">
            <textarea rows = "5" cols = "116" maxlength = "100" style="font-size: 12px" name ="description" placeholder="Provide description here to increase the chance of your selectivity...">{{$profile->description}}</textarea></div>
                                              <div class="save">
                                              
    <button type="submit" class="btn btn-info btn-lg w-100" style="font-size : 15px;color:#fff; height: 30px;">
        Save Changes
    </button>
</div>
                                      <div class="save">
                                              
    <button type="submit" class="btn btn-info btn-lg w-100" data-dismiss="modal" aria-label="Close" style="font-size : 15px;color:#fff; height: 30px;">
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
@endsection
