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
    margin-left:20%;
    width:35%;
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
            

            
<div class="col-lg-8 col-xl-6" id="left">
                <form method="post" enctype="multipart/form-data" action="{{route('j.post')}}">
                @csrf
                    <div class="mb-5 pb-5 border-bottom">
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input type="file" name="image" class="my_file" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])"><img src="/image/2.jpg" id="i"></div>
</div>
</div>     
<div class="mb-5 pb-5 border-bottom">

  <h3>Provide your details</h3><br/>


                        
                                                

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
    <label class="col-form-label pt-0" for="area-address-suggest">
        Your Address
    </label>
    
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
   <label class="col-form-label pt-0" for="area-address-suggest">
        Other
    </label>
      <div class="row g-3">
  <div class="col-sm-11">
    <input type="text" name="num_children" class="form-control" placeholder="Number of children" aria-label="n-children">
  </div></div> 
  
  <label class="col-form-label pt-0" for="area-address-suggest">
       Children Age Range
    </label>
    <div class="row g-3">
  <div class="col-sm-4">
    <input type="text" class="form-control" name="lower_age" placeholder="From -  " aria-label="n-children">
    <span class="col-form-label mt-2"> </span></div>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="upper_age" placeholder="to - " aria-label="n-children">
  </div>  </div></div>
<div class="mb-5 pb-5 border-bottom">

                        <h3>Job Criteria</h3> 
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
                        
                        
<label class="col-form-label mt-2" for="gender">Pricing</label>
                 <div class="row g-3">
               
                <div class="col-sm-11">
                        <div class="input-group">
                         <span class="input-group-text">$</span>
                            <select class="form-control" id="living" name="price">
                             <option value="" selected>Price</option>
                              <option value="1000">1000</option>
                              <option value="1500" >1500</option>
                               
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
                        <div class="mb-5 pb-5 border-bottom">
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
                           <label class="col-form-label mt-2" for="living">Extra work for adults</label><div>
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
</div></div></div></div></div>
<label class="col-form-label pt-0" for="area-address-suggest">
Specify Starting Date<br/>
    </label>
     <div class="row g-3">
  
    <div class="col-sm-11">
    <script>
    document.getElementById('start').value = new Date().toDateInputValue();
    </script>
    <input type="date" id="start" name="start_date"
                                  max="2050-1-1">
                            
  </div></div> </div>                                                         
                                                              <h2>Social Media Contact</h2>
                 <div class="row g-3">
                <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text">Facebook</span>
                <input class="form-control" name="facebook" placeholder="Facebook username">
    
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text">Telegram</span>
               <input class="form-control" name="telegram" placeholder="Telegram UserName or Number">
               
            </div></div></div>
             <div class="row g-3">
            <div  class="col-sm-5">
                <div class="input-group">
                <span class="input-group-text">WhatsUp</span>
                <input class="form-control" name="whatsup" placeholder="WhatsUp Number">
            </div></div>
            <div  class="col-sm-6">
                <div class="input-group">
                <span class="input-group-text">Viber</span>
                <input class="form-control" name="viber" placeholder="Viber Number">
            </div></div>
            <h2>Description</h2>
                 <div class="row g-3">
                <div  class="col-sm-11">
                
            <textarea rows = "5" cols = "116" maxlength = "100" name = "description" placeholder="Provide description here to clarify more about the job...">
         </textarea></div></div>
                                        <div class="save">
    <button type="submit" class="btn btn-danger btn-lg w-100">
        Post Job
    </button>



                    <input type="hidden" name="_csrf_token" value="39d3ef52.h5djrZI1dYxxlFnFmd6KQya06JE6XNmu0xuui9lqMU8.xOU0mdZ-HvUI5S_3rrTPKWmZset9EODbvlP_8bEzcnvJ0TL-wFIUyDz-YQ">
                    <input type="text" class="d-none" name="spamvalidation">
                    
                    <div class="mb-5 pb-5"></div>
                </form>
            </div>
            </div>
            </div>
</div></div></div>

@endsection
