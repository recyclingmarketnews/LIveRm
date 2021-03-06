
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Email Verifcation | Recycling Market News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    </head>

    <body data-layout="horizontal" data-topbar="dark">

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="text-center mb-4">
                            <a href="{{ URL::to('/') }}">
                                <img src="{{ asset('assets/images/logo.png')}}" alt="" height="50"> 
                            </a>
                       </div>

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-success">Email Verification</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    @if ($alertFm = Session::get('message'))
                                        <div class="alert alert-{{Session::get('type')}} alert-block text-center small mb-4" role="alert">
                                            <strong>{{ $alertFm }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ URL::to('submitemailverify') }}" method="post" id="CodeForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Enter Code</label>
                                            <input type="hidden" id="email" name="email" value="{{ $email }}"> 
                                            <input type="hidden" id="precode" name="precode" value="{{ $code }}"> 
                                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter code">
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-success w-sm waves-effect waves-light" type="submit">Submit</button>
                                        </div>
                
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">If verification code is not received, click <a href="{{ URL::to('resendemailverify/'.$email) }}" class="fw-medium text-success">Resend</a></p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center text-muted p-4">
                            <p class="text-white-50">?? <script>document.write(new Date().getFullYear())</script> Recycling Market News.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
	<script>
	    $('#CodeForm').on('submit', function(e){
    if ($('#code').val() != $('#precode').val()) {
        e.preventDefault();
         alert('Plz Enter Correct Code Thanku!');
    }else{
    }
});
// $(document).bind("contextmenu",function(e) {
//      e.preventDefault();
// });
	</script>
    </body>
</html>
