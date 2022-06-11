
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <?php echo $__env->yieldContent('title-description'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Recycling Market News Ltd." />
        <meta property="og:title" content="<?php echo e(substr($newsdetails->heading,0,70)); ?>..." />
        <meta property="og:description" content="<?php echo substr(strip_tags($newsdetails->description),0,160); ?>.." />
        <?php
        $userdata = DB::table('users')->where('id',$newsdetails->userid)->first();
        $link = $newsdetails->heading;
        $link = strtolower(str_replace(" ", "-", $link)); 
        ?>
        <meta property="article:publisher" content="<?php echo e($userdata->fname); ?> <?php echo e($userdata->lname); ?>" />
        <meta property="article:published_time" content="<?php echo e($new_date = date('Y-m-d', strtotime($newsdetails->created_at))); ?>" />
        <meta property="og:url" content="<?php echo e(URL::to('share/'.$link)); ?>" />
        <meta property="og:site_name" content="Recycling Market News Ltd." />
        <meta property="og:image" content="<?php echo e(asset('uploads/post/'.$newsdetails->image)); ?>" />     
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('front/images/favicon.png')); ?>">

        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    </head>
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    
    ?>
    <body data-layout="vertical" data-layout-mode="<?php echo e($mode); ?>" data-topbar="<?php echo e($mode); ?>" data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper" style="display:none">
            

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

    </div>
</div>
    <?php echo $__env->yieldContent('content'); ?>

			<footer class="footer" style="    left: 0px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; RecyclingMarket News.
                            </div>
                            <div class="col-sm-6">
                               
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <a href="#" class="" id="right-bar-toggle">
          
        </a>

 
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenujs/metismenujs.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>

        <!-- apexcharts -->
        <script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
        <!-- Chart JS -->
        <script src="<?php echo e(asset('assets/js/pages/chartjs.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/pages/dashboard.init.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>

    </body>
</html>
<?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnews.com/resources/views/dashboard/layouts/appp.blade.php ENDPATH**/ ?>