<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Recycling Market News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

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
                                    <h5 class="text-success">Welcome!</h5>
                                    <p class="text-muted">Choose Account type to access Recycling Market News Portal.</p>
                                </div>
                                        <div class="mt-4 text-center">
                                            <label class="form-label" for="userpassword" style="text-align: left;">Account Type</label>
                                            <select class="text-success form-control" name="sigupvalue" id="signupvalue" >
                                                <option  value="">Choose Type</option>
                                                <option value="{{URL::to('individualsignup')}}">Individual</option>
                                                <option value="{{URL::to('companysignup')}}">For Company</option>
                                            </select>
                                            <!--<a href="{{ URL::to('signup') }}" class="fw-medium text-success"> Sign Up now </a> </p>-->
                                        </div>
                                    </form>
                                    <div class="mt-4 text-center">
                                            <p class="mb-0">Already have an account ? <a href="{{ URL::to('login') }}" class="fw-medium text-success"> Login </a> </p>
                                        </div>
                                </div>
            
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center text-muted p-4">
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Recycling Market News.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <script>
            $(document).ready( function() {
               $('#signupvalue').change( function() {
                  location.href = $(this).val();
               });
            });
        </script>
    </body>
</html>
