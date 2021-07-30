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

  @media only screen and (min-width:360px) and (max-width:768px){
        #left{
            margin-top:-5.3%;
        }
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
    <tr>
    <td></td><td></td>
    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit Job</button>
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
  <td>
  @if($job->image)
        <image src="{{asset('uploads/ParentImage/'. $job->image)}}" alt="image" width="100px" height="100px">
        @else
        <img src="/uploads/Profile/av.png" alt="image" width="100px" height="100px">
        @endif</td>
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
       <b>Telegram : </b>{{$job->telegram}}</td>
    </tr>
    <tr><td></td><td></td>
    <td><b>Description : </b>{{$job->description}}</br>
    @foreach($contacted as $c)
    @if($c)
    
    Contacted : by {{$name->fname}}     <a href="{{route('viewbabysitter.detail',$name->profile_id)}}" class="btn btn-primary">View Detail</a>
</br>

    @endif
    @endforeach
    </td></tr>
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
      <form method="post" enctype="multipart/form-data" action="{{route('j.update', $job->job_id)}}">
                @csrf
                @method('PUT')
                    <div class="mb-5 pb-5 border-bottom">
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input type="file" name="image" class="my_file" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])">
        @if($job->image)
        <img src="{{asset('uploads/ParentImage/'. $job->image)}}" id="i"></div>
        @else
        <img src="/uploads/Profile/av.png" id="i"></div>
        @endif
        
</div>
</div>     
<div class="mb-5 pb-5 border-bottom">

  <h2>Provide your details</h2>
                                     

<div class="row g-3">
  <div class="col-sm-3">
    <input type="text" name="fname" value="{{$job->fname}}" class="form-control" placeholder="Your First Name" aria-label="firstname">
  </div>
  <div class="col-sm-3">
    <input type="text" name="lname" value="{{$job->lname}}" class="form-control" placeholder="Your Last Name" aria-label="lastname">
  </div>
  <div class="col-sm-5">
    <input type="text" name="phnumber" value="{{$job->phnumber}}" class="form-control" placeholder="Your Phone Number" aria-label="phone">
  </div>
  </div>
    <h2 class="required">
        Your Address
    </h2>
    
                <div class="row g-3">
                <div class="col-sm-11">
                <input class="form-control" name="address" value="{{$job->address}}" type="text" placeholder="Enter your address"></div>
                </div>
                <div class="row g-3">
                <div class="col-sm-4">
                <input type="text" name="country" class="form-control" value="{{$job->country}}" placeholder="Country" aria-label="country">
                </div>
                <div class="col-sm-7">
                <input type="text" name="city" class="form-control" value="{{$job->city}}" placeholder="city" aria-label="city">
  </div>
  </div>
   <h2 class="required">
        Number of children
    </h2>
      <div class="row g-3">
  <div class="col-sm-11">
    <input type="text" name="num_children" value="{{$job->num_children}}" class="form-control" placeholder="Number of children" aria-label="n-children">
  </div></div> 
  
  <h2 class="required">
       Children Age Range
    </h2>
    <div class="row g-3">
  <div class="col-sm-4">
    <input type="text" class="form-control" name="lower_age" value="{{$job->lower_age}}" placeholder="From -  " aria-label="n-children">
    <span style="font-size:10px;">For 1 child specify '0' here </span></div>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="upper_age" value="{{$job->upper_age}}" placeholder="to - " aria-label="n-children">
  </div>  </div></div>
<div class="mb-5 pb-5 border-bottom">

                        
                                                <h2 class="required">Gender</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" id="gender" style="font-size:12px;" name="gender" data-validation="empty" data-error="Select gender">
                                <option value="f" <?php if($job->gender== 'f') { ?> selected="selected"<?php } ?>>Female</option>
                                <option value="m"<?php if($job->gender== 'm') { ?> selected="selected"<?php } ?>>Male</option>
                                <option value="other"<?php if($job->gender== 'other') { ?> selected="selected"<?php } ?>>Other</option>
                            </select>
                        </div></div></div>
                        
 

                                    <div class="mb-5 pb-5 border-bottom">            
<h2 class="required">Living Condition</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                            <select class="form-control" style="font-size:12px;" id="living" name="living_condition">
                                 <option value="back_forth" <?php if($job->living_condition== 'back_forth') { ?> selected="selected"<?php } ?>>Back and Forth</option>
                                <option value="live_in" <?php if($job->living_condition== 'live_in') { ?> selected="selected"<?php } ?>>Live In</option>
                                <option value="" <?php if($job->living_condition== '') { ?> selected="selected"<?php } ?>>Choose living preference</option>
                            </select>
                        </div></div></div>
                        <div class="mb-5 pb-5 border-bottom">
                           <h2 class="required">Break For Weekend</h2>
                           <div class="row g-3">
                           
                           
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="yes" id="flexRadioDefault1" <?php if($job->weekend_break== 'yes') { ?> checked="checked"<?php } ?>>
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="no" id="flexRadioDefault2" <?php if($job->weekend_break== 'no') { ?> checked="checked"<?php } ?>>
  <h3>
    No
  </h3></div>
</div></div>
        <h2 class="required">Is there Extra work to be covered</h2>
       <div class="row g-3">
                         
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="yes" id="flexRadioDefault1" <?php if($job->chores== 'yes') { ?> checked="checked"<?php } ?>>
  <h3>
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="no" id="flexRadioDefault2" <?php if($job->chores== 'no') { ?> checked="checked"<?php } ?>>
  <h3>
    No
  </h3></div>
</div></div>
                                                              </div>
<h2 class="required">Pricing</h2>
                 <div class="row g-3">
               
                <div class="col-sm-11">

               
                        <div class="input-group">
                         <span class="input-group-text" style="font-size: 12px">$</span>
                           <input name="price" class="form-control" value="{{$job->price}}" type="text" placeholder="Enter prefered Price">

                            <span class="input-group-text" style="font-size: 12px">/child</span>
                        </div></div></div>  
<h2 class="required">Specify Starting Date</h2>
     <div class="row g-3">
  
    <div class="col-sm-11">
      <div class="mt-3">
     
                            <div class="birthdate">
                                <div class="input-group">
    <script>
    </script>
    <input type="date" id="start" class="form-control" name="start_date" value="{{$job->start_date}}"
                                  max="2050-1-1">
                            
  </div></div> </div>  </div> </div>                                                       
                                                              <h2>Social Media Contact</h2>
                 <div class="row g-3">
                <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Facebook</span>
                <input class="form-control" name="facebook" type="text" value="{{$job->facebook}}" placeholder="Facebook username">
    
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Telegram</span>
               <input class="form-control" name="telegram" type="text" value="{{$job->telegram}}" placeholder="Telegram UserName or Number">
               
            </div></div></div>
             <div class="row g-3">
            <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">WhatsUp</span>
                <input class="form-control" name="whatsup" type="text" value="{{$job->whatsup}}" placeholder="WhatsUp Number">
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 12px">Viber</span>
                <input class="form-control" name="viber" type="text" value="{{$job->viber}}" placeholder="Viber Number">
            </div></div></div>
            <h2>Description</h2>
                 <div class="row g-3">
                <div  class="col-sm-11">
                 <div class="input-group">
            <textarea rows = "5" cols = "116" maxlength = "100" style="font-size: 12px" name ="description" placeholder="Provide description here to increase the chance of your selectivity...">{{$job->description}}</textarea></div>
            
                                        <div class="save">
    <button type="submit" class="btn btn-info btn-lg w-100" style="font-size : 15px;color:#fff; height: 30px;">
        Save Changes
    </button>
</div>
                          <div class="save">
                                              
    <button class="btn btn-info btn-lg w-100" data-dismiss="modal" aria-label="Close" style="font-size : 15px;color:#fff; height: 30px;">
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
</div></div>
            </div>
</div></div>
@endsection
