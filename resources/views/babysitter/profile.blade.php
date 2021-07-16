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
      margin-left:25%;
      
      background:grey;
      padding-top:2%;
      margin-top:-1.3%;
      font-family:serif;
      font-size:10px;
  }
form{
    margin-left:5%;
}
form .g-3{
    margin-left:7%;
}
form .g-3 h1,h2,h3,label{
        margin-left:10%;
        color:#fcec5d!important;
        
}
.form-check-label{
    margin-left:50%;
}
.save{
    margin-top:5%;
    margin-left:25%;
    width:35%;
}
</style>

@section('content')

   <div class="mainContent">
            <div class="container-fluid">
            
        </div>
    <div class="container-fluid" id="profile-edit">
        <div class="row">

            
<div class="col-lg-8 col-xl-6" id="left">
                <form method="post" action="{{route('p.post')}}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-5 pb-5 border-bottom">
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input name="image" accept="image/*" type="file" class="my_file" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])"><img src="/image/2.jpg" id="i"></div>
</div>
</div>     
                    <div class="mb-5 pb-5 border-bottom">

                        <h2>About me</h2>


                        
                                                
<div>
<div class="row g-3">
  <div class="col-sm-3">
    <input name="fname" type="text" class="form-control" placeholder="First Name" aria-label="firstname">
  </div>
  <div class="col-sm-3">
    <input name="lname" type="text" class="form-control" placeholder="Last Name" aria-label="lastname">
  </div>
  <div class="col-sm-5">
    <input type="number" name="numbers" class="form-control" placeholder="Phone Number" aria-label="phone">
  </div>
  </div>
    <label class="col-form-label pt-0" for="area-address-suggest">
        Address
    </label>
    
                <div class="row g-3">
                <div class="col-sm-11">
                <input name="address" class="form-control" autocomplete="off" type="text" placeholder="Enter your address"></div>
                </div>
                <div class="row g-3">
                <div class="col-sm-4">
                <input type="text"name="country" class="form-control" placeholder="Country" aria-label="country">
                </div>
                <div class="col-sm-7">
                <input type="text" name="city" class="form-control" placeholder="city" aria-label="city">
  </div>
  </div>
                
</div>     
                                                <label class="col-form-label mt-2" for="gender">Gender</label>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" id="gender" name="gender" data-validation="empty" data-error="Select gender">
                                <option value="f" selected>Female</option>
                                <option value="m">Male</option>
                                <option value="other">Other</option>
                            </select>
                        </div></div></div>
                        <label class="col-form-label mt-2" for="birthdate_day">Date of birth</label>
                        <div class="row g-3">
                        <div class="col-sm-11">                                                 
                        <div class="mt-3">
                            
                            
                            <div class="birthdate">
                                <div class="input-group">
                                    <input type="date" id="start" name="birth_date"
                                    value="2018-07-22"
                                    min="1900-01-01" max="2021-1-1">
                                </div>
                            </div> </div> </div>
                       </div>
                         <label class="col-form-label mt-2" for="experience">Experience</label>
                         <div class="mb-5 pb-5 border-bottom">
                                                 <div class="row g-3">
                <div class="col-sm-11">
                        <div class="input-group">
                            <select class="form-control" name="experience">
                                <option value="0" selected="selected">&lt; 1 year</option>
                                <option value="1">&gt; 1 year</option>
                                                                    <option value="2">&gt; 2 years</option>
                                                                    <option value="3">&gt; 3 years</option>
                                                                    <option value="4">&gt; 4 years</option>
                                                                    <option value="5">&gt; 5 years</option>
                                                                    <option value="6">&gt; 6 years</option>
                                                                    <option value="7">&gt; 7 years</option>
                                                                    <option value="8">&gt; 8 years</option>
                                                                    <option value="9">&gt; 9 years</option>
                                                                    <option value="10">&gt; 10 years</option>
                                                                    <option value="11">&gt; 11 years</option>
                                                            </select>
                            
                        </div></div></div></div>
<h2>Pricing</h2>
                 <div class="row g-3">
               
                <div class="col-sm-11">

                <p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
  </div>
</div>
</p>
                        <div class="input-group">
                         <span class="input-group-text">$</span>
                            <select class="form-control" id="living" name="price">
                             <option value="1500" selected>Price</option>
                              <option value="1000">1000</option>
                               
                            </select>
                            <span class="input-group-text">/child</span>
                        </div></div></div>
                                    <div class="mb-5 pb-5 border-bottom">            
<label class="col-form-label mt-2" for="living">Living Condition</label>
                                                 <div class="row g-3">
                <div class="col-sm-11">
                            <select class="form-control" id="living" name="living_condition">
                                <option value="back_forth">Back and Forth</option>
                                <option value="live_in">Live In</option>
                                <option value="" selected>Choose living preference</option>
                            </select>
                        </div></div></div>
                        
                           <div class="row g-3">
                           <div class="col-sm-7">
                           <label class="col-form-label mt-2" for="living">Break For Weekend</label><div>
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="yes" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="weekend_break" value="no" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    No
  </label></div>
</div></div></div></div>

       <div class="row g-3">
                           <div class="col-sm-7">
                           <label class="col-form-label mt-2" for="living"> Comfortable with chores</label><div>
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="yes" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="chores" value="no" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    No
  </label></div>
</div></div></div></div>
                                                              </div>
                                                              <h2>Social Media Contact</h2>
                 <div class="row g-3">
                <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text">Facebook</span>
                <input class="form-control" name="facebook" type="text" placeholder="Facebook username">
    
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text">Telegram</span>
               <input class="form-control" name="telegram" type="text" placeholder="Telegram UserName or Number">
               
            </div></div></div>
             <div class="row g-3">
            <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text">WhatsUp</span>
                <input class="form-control" name="whatsup" type="text" placeholder="WhatsUp Number">
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text">Viber</span>
                <input class="form-control" name="viber" type="text" placeholder="Viber Number">
            </div></div></div>
            <h2>Description</h2>
                 <div class="row g-3">
                <div  class="col-sm-11">
                
            <textarea rows = "5" cols = "116" maxlength = "100" name = "description" placeholder="Provide description here to increase the chance of your selectivity...">
         </textarea></div></div>
                                        <div class="save">
    <button type="submit" class="btn btn-danger btn-lg w-100">
        Post profile
    </button>
</div>


                   <input type="hidden" name="_csrf_token" value="39d3ef52.h5djrZI1dYxxlFnFmd6KQya06JE6XNmu0xuui9lqMU8.xOU0mdZ-HvUI5S_3rrTPKWmZset9EODbvlP_8bEzcnvJ0TL-wFIUyDz-YQ">
                    <input type="text" class="d-none" name="spamvalidation">
                    
                    <div class="mb-5 pb-5"></div>
                 
                </form>
            </div>
            </div>
            </div>
</div></div>
@endsection
