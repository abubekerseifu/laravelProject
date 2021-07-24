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
  @media only screen and (min-width:360px) and (max-width:768px){
        #left{
            margin-top:-5.3%;
        }
     }
</style>

@section('content')
   <div class="mainContent">
           
    <div class="container-fluid" id="profile-edit">
        <div class="row">

                   <!--         <div class="col-lg-4 col-xl-3 order-lg-last">

                    <div class="card border-light mb-5">
                        <h3 class="card-header">Job status</h3>
                        <div class="card-body">
                             <p class="text-danger">Please note that this job is private and will therefore not appear in the search results.</p>
                                <p><a href="/dashboard/profile/?visibility=public" class="btn btn-primary w-100">Make public</a></p>
                                                    </div>
                    </div>

                </div> -->
            

            
<div class="col-lg-8 col-xl-12" id="left">
                <form method="post" enctype="multipart/form-data" action="{{route('j.post')}}">
                @csrf
                    <div class="mb-5 pb-5 border-bottom">
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input type="file" name="image" class="my_file" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])">
        
        <img src="/uploads/Profile/av.png" id="i"></div>
</div>
</div>     
<div class="mb-5 pb-5 border-bottom">

  <h2 class="required">Provide your details</h2>
                                     

<div class="row g-3">
  <div class="col-sm-3">
    <input type="text" name="fname" class="form-control" placeholder="Your First Name" aria-label="firstname">
  </div>
  <div class="col-sm-3">
    <input type="text" name="lname" class="form-control" placeholder="Your Last Name" aria-label="lastname">
  </div>
  <div class="col-sm-5">
    <input type="text" name="phnumber" class="form-control" placeholder="Your Phone Number" aria-label="phone">
  </div>
  </div>
    <h2 class="required">
        Your Address
    </h2>
    
                <div class="row g-3">
                <div class="col-sm-11">
                <input class="form-control" name="address" autocomplete="off" type="text" placeholder="Enter your address"></div>
                </div>
                <div class="row g-3">
                <div class="col-sm-4">
                <input type="text" name="country" class="form-control" placeholder="Country" aria-label="country">
                </div>
                <div class="col-sm-7">
                <input type="text" name="city" class="form-control" placeholder="city" aria-label="city">
  </div>
  </div>
   <h2 class="required">
        Number of children
    </h2>
      <div class="row g-3">
  <div class="col-sm-11">
    <input type="text" name="num_children" class="form-control" placeholder="Number of children" aria-label="n-children">
  </div></div> 
  
  <h2 class="required">
       Children Age Range
    </h2>
    <div class="row g-3">
  <div class="col-sm-4">
    <input type="text" class="form-control" name="lower_age" placeholder="From -  " aria-label="n-children">
    <span style="font-size:15px;">For 1 child specify '0' here </span></div>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="upper_age" placeholder="to - " aria-label="n-children">
  </div>  </div></div>
<div class="mb-5 pb-5 border-bottom">

                        
                                                <h2 class="required">Gender</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" id="gender" style="font-size:20px;" name="gender" data-validation="empty" data-error="Select gender">
                                <option value="f" selected>Female</option>
                                <option value="m">Male</option>
                                <option value="other">Other</option>
                            </select>
                        </div></div></div>
                        

                                    <div class="mb-5 pb-5 border-bottom">            
<h2 class="required">Living Condition</h2>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                            <select class="form-control" style="font-size:20px;" id="living" name="living_condition">
                                <option value="back_forth">Back and Forth</option>
                                <option value="live_in">Live In</option>
                                <option value="" selected>Choose living preference</option>
                            </select>
                        </div></div></div>
                        <div class="mb-5 pb-5 border-bottom">
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
        <h2 class="required">Is there Extra work to be covered</h2>
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
 <p id="collapse">
                       <i class="fa fa-info-circle" style="color:#563d7c;"></i><span style="font-size:15px;"> Some hint on pricing<br/>
                       Most parents pay $1000 for 1 child only, $1200 for 2 children only and $1500 or above for 3 to 4  children and everything(chores)
 
</span>

</p>
<h2 class="required">Pricing</h2>
                 <div class="row g-3">
               
                <div class="col-sm-11">

               
                        <div class="input-group">
                         <span class="input-group-text" style="font-size: 20px">$</span>
                           <input name="price" class="form-control" autocomplete="off" type="text" placeholder="Enter prefered Price">

                            <span class="input-group-text" style="font-size: 20px">total</span>
                        </div></div></div>
                           
<h2 class="required">Specify Starting Date</h2>
     <div class="row g-3">
  
    <div class="col-sm-11">
      <div class="mt-3">
     
                            <div class="birthdate">
                                <div class="input-group">
    <script>
    document.getElementById('start').value = new Date().toDateInputValue();
    </script>
    <input type="date" id="start" class="form-control" name="start_date"
                                  max="2050-1-1">
                            
  </div></div> </div>  </div> </div>                                                       
                                                              <h2>Social Media Contact</h2>
                 <div class="row g-3">
                <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 20px">Facebook</span>
                <input class="form-control" name="facebook" type="text" placeholder="Facebook username">
    
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 20px">Telegram</span>
               <input class="form-control" name="telegram" type="text" placeholder="Telegram UserName or Number">
               
            </div></div></div>
             <div class="row g-3">
            <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 20px">WhatsUp</span>
                <input class="form-control" name="whatsup" type="text" placeholder="WhatsUp Number">
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text" style="font-size: 20px">Viber</span>
                <input class="form-control" name="viber" type="text" placeholder="Viber Number">
            </div></div></div>
            <h2>Description</h2>
                 <div class="row g-3">
                <div  class="col-sm-11">
                 <div class="input-group">
            <textarea rows = "5" class="form-control" cols = "126" maxlength = "100" style="font-size: 20px" name ="description" placeholder="Provide description here to increase the chance of your selectivity..."></textarea></div>
            
                                        <div class="save">
    <button type="submit" class="btn btn-warning btn-lg w-100" style="font-size : 30px;color:#563d7c; height: 50px;">
        Post Job
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
</div></div></div>

@endsection
