<!DOCTYPE html>
<html>
<head>
    <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('front/images/favicon.png')}}">
	<title>Recycling Market News Subscription Renew</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
    </style>
</head>
<body style="background: linear-gradient(#000000, #0f704c);height: 100%;">
  
<div class="container" style="margin-top:12px;">
@if(Auth::id() != '')  
    
   <div class="row">
       <div class="text-center mb-4" style="margin-bottom:15px;">
                            <a href="{{ URL::to('/') }}" >
                                <img src="{{ asset('assets/images/logo.png')}}" alt="" height="50"> 
                            </a>
                       </div>
        <div class="col-md-6 col-md-offset-3">
            <!--<p style="text-align: center; color:white;">Dear {{ Auth::user()->fname }} , Your trial period has ended. In order to access the platform please purchase our subscription package. Thanks</p>-->
           <h3 style="text-align: center; color:white; margin-top:0;">Subscription Required </h3>
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >User Details</h3>
                        <a href="{{ URL::to('logout') }}" style="margin-left: 10px;">Logout</a>
                    </div>                    
                </div>
                <div class="panel-body">
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>User Name</label> 
                                <p>{{ Auth::user()->fname }}</p>
                            </div>
                        </div>                    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Subscription Expire Day</label> 
                                <p>{{ Auth::user()->e_date }}</p>
                            </div>
                        </div>                    
                </div>
            </div>        
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                    
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf
  
                        <div class='form-row row'>
                            
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Select Subscription Type</label> 
                                <input type="hidden" name="userid" value="{{ Auth::id() }}">
                                <?php $ddata = DB::table('subscriptions')->where('id','!=',1)->where('sub_type',Auth::user()->user_value)->get();  ?>
                                <select name="stype" class="form-control" id="stype">
                                    @foreach($ddata as $tow)
                                    <option value="{{ $tow->id }}" data-price="{{ $tow->price }}">{{ $tow->name }} - ${{ $tow->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($<span id="pprc">{{ $ddata[0]->price }}</span>)</button>
                            </div>
                            
                        </div>
                        <p style="text-align: center;margin-top: 10px;color: #337ab7;" >For your security, your billing information will be encrypted.</p>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    Please login before renew your subscription thanks</h2>
                <div class="error-actions">
                    <a href="{{ URL::to('login') }}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Go to Login </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
</div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
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
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
    $("#stype").change(function(){
        var price = $(this).find(':selected').attr('data-price');
        $("#pprc").text(price);
    })
</script>
</html>