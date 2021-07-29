@extends('layouts.app')
<style type="text/css">
        input[type="text"]
{
    font-size:18px;
}
.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px;
   
}
.cb{
    min-height:500px;
    margin-top:5%;
}
      </style>
 @section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      
      <div class="container cb">         
         <div class="row">
            <div class="col-md-6 col-md-offset-3 card0">
               <div class="panel-default credit-card-box">
                  <div class="panel-heading" >
                  <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <h3 style="color:black">Payment Details</h3>
                             
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                             
                           </div></div>
                     
                  </div>
                  <div class="panel-body">
                     @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p style="font-size:15px">{{ Session::get('success') }}</p><br>
                     </div>
                     @endif
                     <br>
                     <form role="form" action="{{ route('stripe.babysitter.post',$job->job_id) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                         <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                               <img
                        src="https://www.merchantequip.com/image/?logos=v|m|a|d&height=32" alt="Merchant Equipment Store Credit Card Logos"/>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                             
                           </div></div>
                        <div class='form-group row'>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <h3 class='control-label' style="color:black;">Name</h3> 
                              <input class='form-control' size='4' type='text' placeholder="Enter Name on Card">
                           </div>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <h3 class='control-label' style="color:black;">Card Number</h3> 
                              <input autocomplete='off' class='form-control card-number' placeholder="Enter Card Number" size='20' type='text'>
                           </div>                           
                        </div>                        
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <h3 class='control-label' style="color:black;">CVC</lah3bel> 
                              <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <h3 class='control-label' style="color:black;">Expiration Month</h3> 
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <h3 class='control-label' style="color:black;">Expiration Year</h3> 
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                           </div>
                           
                           
                        </div>
                       
                      {{-- <div class='form-row row'>
                         <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                               again.
                            </div>
                         </div>
                      </div> --}}
                        <div class="form-row row">
                           <div class="col-xs-12">
                              <button class="btn btn-primary btn-lg btn-block" type="submit" style="font-size:15px;">Pay Now</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>

@endsection