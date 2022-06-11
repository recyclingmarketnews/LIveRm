
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dashboard | Recycling Market News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('front/images/favicon.png')); ?>">
        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/bootstrap-select.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/materialdesignicons.min.css')); ?>">
        <link href="<?php echo e(asset('assets/css/boxicons.min.css')); ?>" rel='stylesheet'>
        <link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="<?php echo e(asset('assets/js/jquery.carouselTicker.js')); ?>"></script>
        
        
        <style>
        @media  only screen and (max-width: 1068px) {
    .footer-text{
    text-align: center !important;
    }
}
@media  only screen and (min-width: 1068px) {
    .filterm{
    display:none;
    }
}
@media  only screen and (max-width: 1068px) {
    .filterm{
    display:block;
    }
    .forfilterm{
        margin:5px 0;
    }
    .hideaddnews{
        display:none;
    }
    .mainfilter{
        display:none;
    }
}
        .blink {
        animation: blink-animation 1s steps(9, start) infinite;
        -webkit-animation: blink-animation 1s steps(10, start) infinite;
      }
            @keyframes  blink-animation {
        to {
          visibility: hidden;
        }
      }
      @-webkit-keyframes blink-animation {
        to {
          visibility: hidden;
        }
      }
      
      .scroll {
  -ms-overflow-style: none; /* for Internet Explorer, Edge */
  scrollbar-width: none; /* for Firefox */
  overflow-y: scroll; 
}

.scroll::-webkit-scrollbar {
  display: none; /* for Chrome, Safari, and Opera */
}
/*//tooltip style//*/
.tooltipp {
  position: relative;
  display: inline-block;
}

.tooltipp .tooltiptext {
  visibility: hidden;
  background-color: #003032;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltipp:hover .tooltiptext {
  visibility: visible;
}

/*////////*/
        </style>
    </head>
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    
    ?>
    <body data-layout="vertical" data-layout-mode="<?php echo e($mode); ?>" data-topbar="<?php echo e($mode); ?>" data-sidebar="dark" >

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <header id="page-topbar" class="isvertical-topbar">
                <!--<?php echo e(Request::routeIs('allactivepost') ? 'd-none' : ''); ?>-->
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo e(URL::to('allactivepost')); ?>" class="logo logo-dark" >
                                <span class="logo-sm">
                                    <img src="<?php echo e(asset('assets/images/smlogo.png')); ?>" alt="" height="26">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="26"> 
                                </span>
                            </a>

                            <a href="<?php echo e(URL::to('allactivepost')); ?>" class="logo logo-light" >
                                <span class="logo-sm">
                                    <img src="<?php echo e(asset('assets/images/smlogo.png')); ?>" alt="" height="26">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="26"> 
                                </span>
                            </a>
                
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <?php if(Request::routeIs('allactivepost') || Request::routeIs('allactivepostt') ): ?>
                        <h2 style="    text-align: center;
                        align-items: center;
                        display: flex;
                        margin-left: 14px;">News</h2>
                        <?php endif; ?>
                        <?php if(Request::routeIs('userlist')): ?>
                        <h2 style="    text-align: center;
                        align-items: center;
                        display: flex;
                        margin-left: 14px;">Recyclers</h2>
                        <?php endif; ?>
                        <!-- Search -->
                        
                        <?php if(Request::is('allactivepost') || Request::routeIs('allactivepostt') || Request::routeIs('userlist') || Request::routeIs('allactiveposttt')): ?>
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text"  class="form-control myInput" placeholder="Search...">
                                <span class="bx bx-search"></span>
                            </div>
                        </form>
                        <?php endif; ?>
            
                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block d-lg-none">
                            <button type="button" class="btn header-item"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-sm" data-feather="search"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                                <form class="p-2">
                                    <div class="search-box">
                                        <div class="position-relative">
                                            <input type="text" class="form-control rounded bg-light myInput border-0" placeholder="Search...">
                                            <i class="mdi mdi-magnify search-icon"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
<?php if(Auth::user()->user_type == 2): ?>
<?php $noticount = DB::table('notifications')->where('userid',Auth::user()->id)->where('read',0)->count(); ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell icon-sm"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            <span class="noti-dot bg-danger rounded-pill"><?php echo e($noticount); ?></span>
                        </button>
                        
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-15"> Notifications </h5>
                                        </div>
                                        <div class="col-auto">
                                            <a href="<?php echo e(URL::to('markallasread')); ?>" class="small"> Mark all as read</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar="init" style="max-height: 250px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden; padding: 7px !important;" ><div class="simplebar-content" style="padding: 0px;">
                                    <?php $notilist = DB::table('notifications')->where('userid',Auth::user()->id)->where('read',0)->orderBy('id','desc')->get(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $notilist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <a href="" class="text-reset notification-item">
                                        <?php $userdata = DB::table('users')->where('id',$key->fromuserid)->first(); ?>
                                        <div class="d-flex border-bottom align-items-start" style="padding: 10px;">
                                            <div class="flex-shrink-0">
                                                <img src="<?php echo e(asset('uploads/userimg/'.$userdata->image)); ?>" class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-1"><?php echo e($userdata->fname.' '.$userdata->lname); ?></h6>
                                                    <a href="<?php echo e(URL::to('markasread/'.$key->id)); ?>">Mark read</a>
                                                </div>
                                                
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13"><?php echo e($key->message); ?></p>
                                                    <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> <?php echo e(Carbon\Carbon::parse($key->created_at)->diffForHumans()); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                     
                                            <div class="flex-grow-1">
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">No Notification Yet!</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif; ?>
          
  


                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div></div>
                                <!--<div class="p-2 border-top d-grid">-->
                                <!--    <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">-->
                                <!--        <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>-->
                                <!--    </a>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <?php endif; ?>

           

        

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo e(asset('uploads/userimg/').'/'.Auth::user()->image); ?>"
                                alt="d">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <a class="dropdown-item" href="<?php echo e(URL::to('profile')); ?>"><i class='bx bx-user-circle text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">My Profile</span></a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('logout')); ?>"><i class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?php echo e(URL::to('allactivepost')); ?>" class="logo logo-dark" >
                        <span class="logo-sm">
                            <img src="<?php echo e(asset('assets/images/smlogo.png')); ?>" alt="" height="26"> 
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="26">
                        </span>
                    </a>

                    <a href="<?php echo e(URL::to('allactivepost')); ?>" class="logo logo-light" >
                        <span class="logo-lg">
                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="26"> 
                        </span>
                        <span class="logo-sm">
                            <img src="<?php echo e(asset('assets/images/smlogo.png')); ?>" alt="" height="26">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
	
	<?php echo $__env->make('dashboard.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>

			<footer class="footer">
                    <div class="container-fluid">
                        <div class="row footer-text">
                            <div class="col-sm-5">
                                <script>document.write(new Date().getFullYear())</script> &copy; Recycling Market News.
                            </div>
                            <div class="col-sm-7 ">
                               <?php $userdata= DB::table('users')->where('id',Auth::id())->first();  ?>
                               <?php if($userdata->subscription_id == 1 && Auth::id() != 1): ?>
                                    <p class="footer-text" style="color:#575757;text-align:right">Dear <?php echo e($userdata->fname); ?>, your trial version ends in <?php echo e(\Carbon\Carbon::now()->diffInDays($userdata->e_date, false)); ?> days, please update your <a href="<?php echo e(URL::to('stripe')); ?>" >payment</a> method.</p>
                               <?php endif; ?>
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
          <script src="<?php echo e(asset('assets/js/bootstrap-select.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenujs/metismenujs.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>

        <!-- apexcharts -->
        <script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
        <!-- Chart JS -->
        <script src="<?php echo e(asset('assets/js/pages/chartjs.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/pages/dashboard.init.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/jquery.autoscroll.js')); ?>" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
window.OneSignal = window.OneSignal || [];

OneSignal.push(function() {
    OneSignal.init({
        autoResubscribe:true,
        isPushNotificationsEnabled: true,
        appId: "b257c473-e3bf-4b19-a946-9fd86eb042b3",
        notifyButton: {
            enable: true,
        },

    });
    if(!localStorage.getItem('player_id')){

        OneSignal.getUserId().then(function(userId) {
            localStorage.setItem('player_id',userId)
            let xhttp = new XMLHttpRequest();
            console.log("OneSignal User ID:", userId);
            let data = new FormData();
            data.append('player_id', userId);
            data.append('_token', "<?php echo e(csrf_token()); ?>");
            xhttp.open('POST','/onesignal/save-player-id',true)
            xhttp.send(data);
        });
    }
});
</script>

    </body>
</html>
<?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnewstrial.com/resources/views/dashboard/layouts/app.blade.php ENDPATH**/ ?>