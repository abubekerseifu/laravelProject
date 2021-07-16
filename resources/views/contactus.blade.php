@extends('layouts.app')
<style>
#c{
    margin-top:100px;
    margin-left:550px;
    width:600px;
    height:300px;
    border:1px solid #563d7c;
    padding-top:10px;
    padding-left:75px;
    background:#F5F7F9;
    border-radius:20px;
    font-size:20px;
}
#s{
    margin-top:10px;
}
#l{
    color:#563d7c;
    margin-left:130px;
    padding-bottom:10px;
}
.btn-primary{
    border-radius:10px;
    background-color:#563d7c!important;
    border-color:#F5F7F9!important;
    height:40px;
}
.btn-primary:hover{
        background-color:black!important;
        border-radius:10px;
        border-color:#F5F7F9!important;
}
.btn-primary:onclick{
        background-color:black!important;
        border-radius:10px;
        border-color:#F5F7F9!important;

}
#d{
    border-bottom:1px solid #563d7c;
    margin-left:-75px;
    margin-top:-8px;
    margin-bottom:15px;
}
</style>
@section('content')
<div id="c">
  <label class="col-md-4 col-form-label text-md-right" id="l"><h3>Contact Us</h3></label>
  <div class="divider" id="d"></div>
<div class="row g-3">
  <div class="col-sm-4">
    <input type="text" class="form-control" placeholder="Name" aria-label="Name">
  </div>
  <div class="col-sm-7">
    <input type="email" class="form-control" placeholder="Email" aria-label="Email">
  </div>
  </div>
  <div class="row g-3" id="s">
  <div class="col-sm-11">
      <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea2" style="height: 100px"></textarea>
  </div>

 </div>
 <div class="row g-3" id="s">
 <div class="col-12">
    <button type="submit" class=" btn-primary col-sm-11">Submit</button>
  </div>
    </div>
</div>
  
@endsection
