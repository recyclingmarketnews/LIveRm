<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>SignUp | Recycling Market News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    </head>

    <body data-layout="horizontal" data-topbar="dark">

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-12 col-lg-12 col-xl-12">

                       <div class="text-center mb-4">
                            <a href="<?php echo e(URL::to('/')); ?>">
                                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="50"> 
                            </a>
                       </div>

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-success">Welcome !</h5>
                                    <p class="text-muted">Sign up to access to Recycling Market News Portal.</p>
                                </div>
                                <?php if($alertFm = Session::get('message')): ?>
                                    <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">
                                        
                                        <strong><?php echo e($alertFm); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <div class="p-2 mt-4">
                                    <form action="<?php echo e(URL::to('submit_registerind')); ?>" id="submitform" method="post">
                                        <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="username">First Name</label>
                                            <input type="text" required name="fname" required="" class="form-control" id="fname" placeholder="Enter your first name">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="username">Last Name</label>
                                            <input type="text" required name="lname" required="" class="form-control" id="lname" placeholder="Enter your last name">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="email" required name="email" class="form-control" id="username" placeholder="Enter email">
                                        </div>
                                        	<?php $country = DB::table('country')->get(); ?>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="userpassword">Select Country</label>
                                             <select name="country" class="form-select" required>
                                            <option value="" selected="selected">Select Country</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->nicename); ?>"><?php echo e($key->nicename); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" required name="password" class="form-control" id="password" placeholder="Enter password">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="userpassword">Confirm Password</label>
                                            <input type="password" required name="cpassword" class="form-control" id="confirmpassword" placeholder="Enter confirm password">
                                        </div>
                                        <p>Please see our <a href="<?php echo e(URL::to('pricing')); ?>" class="fw-medium text-success">subscription page</a> for subscription plan options</p>
                                    
                                    </div>
                                   
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-success w-sm waves-effect waves-light" type="submit">Sign Up</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Already have an account ? <a href="<?php echo e(URL::to('login')); ?>" class="fw-medium text-success"> Login </a> </p>
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
        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenujs/metismenujs.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>
        <script>
       
            $(document).ready(function(){
                $( "#submitform" ).submit(function( event ) {
                    if ($('#confirmpassword').val() !=  $('#password').val()) {
                        event.preventDefault();
                        alert("Confirm Password Is Not Match With Password")
                        return false;
                    }
                    
                });
            });            
        </script>
    </body>
</html>
<?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnews.com/resources/views/individualsignup.blade.php ENDPATH**/ ?>