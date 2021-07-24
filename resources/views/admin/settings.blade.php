 @extends('layouts.master')
  <style>
#h{
     color:#fcec5d;
}
/* Rounded sliders */

.form-check-input:checked {
    background-color: #563d7c!important;
    border-color: #563d7c!important;
}

.form-check-input[type=radio] {
    font-size: 25px!important;
    
}
#btn{
  margin-top:15px;
}
 </style>
 @section('content')

 <div class="row my-5">
                    <h3 class="fs-4 mb-3" id="h">Settings</h3>
                    <div class="col">
                     <form method="post" action="{{route('s.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                           
                                <p class="fs-5">Enable Babysitters payment</p>
                                </div>
                                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center">
                         
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="babysitter_make_p" value="yes" id="flexRadioDefault1"<?php if($setting->babysitter_make_p== 'yes') { ?> checked="checked"<?php } ?>>
  <h3 style="color: #563d7c!important;font-size:25px;">
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="babysitter_make_p" value="no" id="flexRadioDefault2"<?php if($setting->babysitter_make_p== 'no') { ?> checked="checked"<?php } ?>>
  <h3 style="color: #563d7c!important;font-size:25px;">
    No
  </h3></div>
</div></div>
                    </div></div></div>
                    <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center">
                           
                                <p class="fs-5">Always approve jobs and profiles to be posted</p>
                      </div>
                                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center">
                         
                <div class="col-sm-2">
                <div class="input-group">
  <input class="form-check-input" type="radio" name="always_approve" value="yes" id="flexRadioDefault1"<?php if($setting->always_approve== 'yes') { ?> checked="checked"<?php } ?>>
  <h3 style="color: #563d7c!important;font-size:25px;">
    Yes
  </h3>
</div></div>
 <div class="col-sm-2">
 <div class="input-group">
  <input class="form-check-input" type="radio" name="always_approve" value="no" id="flexRadioDefault2" <?php if($setting->always_approve== 'no') { ?> checked="checked"<?php } ?>>
  <h3 style="color: #563d7c!important;font-size:25px;">
    No
  </h3></div>
  
</div></div> <button id="btn" type="submit" class="btn btn-warning btn-lg w-100" style="font-size : 20px;color:#563d7c; height: 50px;">
        Update Setting
    </button>
                            
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
@endsection
