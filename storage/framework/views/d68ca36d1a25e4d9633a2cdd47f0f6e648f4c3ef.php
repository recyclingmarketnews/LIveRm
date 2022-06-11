<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Recycling Market News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('front/images/favicon.png')); ?>">
        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout="horizontal" data-topbar="dark">

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                       <div class="text-center mb-4">
                            <a href="<?php echo e(URL::to('/')); ?>">
                                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="50"> 
                            </a>
                       </div>

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-success">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Recycling Market News Portal.</p>
                                </div>
                                <?php if($alertFm = Session::get('message')): ?>
                                    <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">
                                        
                                        <strong><?php echo e($alertFm); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <div class="p-2 mt-4">
                                    <form action="<?php echo e(URL::to('submit_login')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="email" required name="email" class="form-control" id="username" placeholder="Enter email">
                                        </div>
                
                                        <div class="mb-3">
                                            
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" required name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                            <div class="float-end">
                                                <a href="<?php echo e(URL::to('forgotpassword')); ?>" class="text-muted">Forgot password?</a>
                                            </div>
                                        </div>
                
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-success w-sm waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Don't have an account ?
                                            <select class="text-success" name="sigupvalue" id="signupvalue" style=" padding:0 10px; border:none;-webkit-appearance: none;  -moz-appearance: none;  text-indent: 1px; text-overflow: '';">
                                                <option  value="">Create Account</option>
                                                <option value="<?php echo e(URL::to('individualsignup')); ?>">Individual</option>
                                                <option value="<?php echo e(URL::to('companysignup')); ?>">For Company</option>
                                            </select>
                                            <!--<a href="<?php echo e(URL::to('signup')); ?>" class="fw-medium text-success"> Sign Up now </a> </p>-->
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
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Recycling Market News.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenujs/metismenujs.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>
        <script>
            $(document).ready( function() {
               $('#signupvalue').change( function() {
                  location.href = $(this).val();
               });
            });
        </script>
    </body>
</html>
<?php /**PATH /home/wu6wt82f25ae/public_html/test.recyclingmarketnews.com/resources/views/login.blade.php ENDPATH**/ ?>