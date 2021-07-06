@extends('layouts.app')
<style>
.subnav-wrapper {
    background: #fff;
    border-bottom: 1px solid #ddd;
    margin-top:30px;
}
.sticky-top {
    position: sticky;
    top: 0;
    z-index: 1020;
}
.container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: 1300px;
    padding-left: calc(24px + env(safe-area-inset-left, 0));
    padding-right: calc(24px + env(safe-area-inset-right, 0));
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    margin-left: auto;
    margin-right: auto;
    padding-left: var(--bs-gutter-x,.75rem);
    padding-right: var(--bs-gutter-x,.75rem);
    width: 100%;
}
.subnav-wrapper .subnav {
    position: relative;
}
*, :after, :before {
    box-sizing: border-box;
}
.subnav-wrapper .nav-tabs .nav-item.active a, .subnav-wrapper .nav-tabs .nav-item.active a:hover {
    text-decoration: underline;
}
.subnav-wrapper .nav-tabs .nav-item a {
    border-bottom: .3rem solid transparent;
    color: #222;
    display: block;
    padding: .5rem 1rem .2rem;
    text-decoration: none;
}
a {
    font-weight: 700;
}
a {
    color: #222;
    text-decoration: underline;
}
*, :after, :before {
    box-sizing: border-box;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
.subnav-wrapper .nav-tabs.full-width .nav-item {
    display: inline-block;
    white-space: nowrap;
}

user agent stylesheet
li {
    text-align: -webkit-match-parent;
}
.mainContent {
    margin-top: 1rem;
    min-height: 100vh;
}
.container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: 1300px;
    padding-left: calc(24px + env(safe-area-inset-left, 0));
    padding-right: calc(24px + env(safe-area-inset-right, 0));
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    margin-left: auto;
    margin-right: auto;
    padding-left: var(--bs-gutter-x,.75rem);
    padding-right: var(--bs-gutter-x,.75rem);
    width: 100%;
}
#profile-edit {
    margin-bottom: 30px;
}
@media (min-width: 768px)
#profile-edit .profile-photo .profile-photo-select {
    height: 150px;
    width: 150px;
}
#profile-edit .profile-photo .profile-photo-select {
    align-items: center;
    border: 1px solid #717171;
    border-radius: .5rem;
    display: flex;
    height: 120px;
    justify-content: center;
    overflow: hidden;
    position: relative;
    width: 120px;
}
#profile-edit .profile-photo .profile-photo-input {
    clip: rect(1px,1px,1px,1px);
    height: 1px;
    overflow: hidden;
    position: absolute!important;
    width: 1px;
}
#profile-edit .profile-photo .profile-photo-select .profile-photo-preview {
    position: absolute;
    width: 100%;
}
img {
    height: auto;
    max-width: 100%;
}
img, svg {
    vertical-align: middle;
}

img[Attributes Style] {
    width: 350px;
    aspect-ratio: auto 350 / 350;
    height: 350px;
}
#profile-edit .profile-photo .profile-photo-select .overlay {
    background: #000;
    border-radius: .5rem;
    height: 100%;
    opacity: .2;
    position: absolute;
    width: 100%;
}
.far {
    font-weight: 400;
}
.input-group>.form-control, .input-group>.form-select {
    flex: 1 1 auto;
    min-width: 0;
    position: relative;
    width: 1%;
}
.autocomplete, .autocomplete .input-wrapper {
    position: relative;
}
#profile-edit .birthdate {
    display: flex;
}
.form-select {
    -moz-padding-start: calc(.75rem - 3px);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url(data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3E%3C/svg%3E);
    background-position: right .75rem center;
    background-repeat: no-repeat;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: .4rem;
    color: #222;
    display: block;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    padding: .375rem 2.25rem .375rem .75rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    width: 100%;
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
    
</style>

@section('content')
<div class="subnav-wrapper sticky-top">
    <div class="container-fluid">
        <div class="subnav">
            <nav>
                <ul class="nav nav-tabs full-width">
                    <li class="nav-item  active"><a href="/dashboard/profile/"><i class="far fa-edit"></i> Edit profile</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
   <div class="mainContent">
            <div class="container-fluid">
            
        </div>
    <div class="container-fluid" id="profile-edit">
        <div class="row">

                            <div class="col-lg-4 col-xl-3 order-lg-last">

                    <div class="card border-light mb-5">
                        <h3 class="card-header">Profile status</h3>
                        <div class="card-body">
                             <p class="text-danger">Please note that your profile is private and will therefore not appear in the search results.</p>
                                <p><a href="/dashboard/profile/?visibility=public" class="btn btn-primary w-100">Make public</a></p>
                                                    </div>
                    </div>

                </div>
            

            
<div class="col-lg-8 col-xl-9">
                <form method="post" action="{{route('p.post')}}">
                @csrf
                    <div class="mb-5 pb-5 border-bottom">
                        <div class="row justify-content-center" id="image_c">

        <div class="wrapper"><input name="image" type="file" class="my_file" id="file"onchange="document.getElementById('i').src = window.URL.createObjectURL(this.files[0])"><img src="/image/2.jpg" id="i"></div>
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
                        <div class="row g-3">
                        <div class="col-sm-11">                                                 
                        <div class="mt-3">
                            <label class="col-form-label" for="birthdate_day">Date of birth</label>
                            
                            <div class="birthdate">
                                <div class="input-group">
                                    <input type="date" id="start" name="birth_date"
                                    value="2018-07-22"
                                    min="1900-01-01" max="2021-1-1">
                                </div>
                            </div> </div> <span class="col-form-label mt-2">Ask for permission from your parents if you are under 18 years old.</span></div>
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
                                        <div class="save">
    <button type="submit" class="btn btn-primary btn-lg w-100">
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
{{View::make('footer')}}
@endsection
