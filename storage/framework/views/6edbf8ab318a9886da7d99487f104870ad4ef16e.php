<!DOCTYPE html>

<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8" />




    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />


<link rel="shortcut icon" href="<?php echo e(asset('front/images/favicon.png')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/ac-globalnav.built.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/ac-localnav.built.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/ac-globalfooter.built.css')); ?>" />

<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>


    <title>Recycling Market News</title>
    <meta name="Description" content="" />



    <link rel="stylesheet" href="/wss/fonts?families=SF+Pro,v3|SF+Pro+Icons,v3">
    <link rel="stylesheet" href="<?php echo e(asset('front/main.built.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('front/overview.built.css')); ?>" type="text/css" />
    <script src="<?php echo e(asset('front/head.built.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <style>
        .scrollFade {
  opacity: 1;
  pointer-events: all;
}
.scrollFade--hidden {
  opacity: 0;
  pointer-events: none;
}
.scrollFade--visible {
  opacity: 1;
  pointer-events: all;
}
.scrollFade--animate {
  transition: opacity 0.4s ease-in-out;
}
/* ===============================================
    Page-Title-Row
------------------------*/

.ttm-page-title-row { 
    position: relative;
    background: #c8f0e0;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
div.ttm-page-title-row > .ttm-bg-layer { background-color: rgba(24,35,51,0.85); }
.ttm-page-title-row { 
    display: block;
    padding: 70px 0;
    z-index: 11;
}
.title-box .page-title-heading h1 {
    text-transform: capitalize;
    font-size: 40px;
    line-height: 48px;
    margin-bottom: 10px;
    display: inline-block;
    font-weight: 700;
}
.title-box .page-title-heading{ position: relative; }
.breadcrumb-wrapper span {
    font-weight: 400;
    text-transform: capitalize;
    font-size: 16px;
    line-height: 25px;
}

.ttm-row{ padding: 90px 0;}
.ttm-search-overlay,
.ttm-rounded-shadow-box, div.product ul.tabs li.active a:before,
.coupon_toggle .coupon_code,
#payment .payment_box,
.tooltip-top:before, .tooltip:before, [data-tooltip]:before,
.section-title.with-desc .title-header:before,
#site-header-menu #site-navigation .menu > ul{
    border-top-color: #2d4a8a !important; 
}
.section-title .title-desc{
    font-weight: 400;
    font-size: 15px;
    line-height: 25px;
    margin-bottom: 15px;
    color: #6e6e6e;
}
.section-title.with-desc .title-header{margin-bottom: 52px;}
.section-title .title-header{ 
    margin-bottom: 30px;
    position: relative;
}.section-title{ position: relative; }
.section-title h5{
    font-weight: 500;
    text-transform: capitalize;
    font-size: 16px;
    line-height: 23px;
    margin-bottom: 5px;
    margin-top: -5px;
}
.section-title h2.title{
    font-size: 34px;
    line-height: 44px;
    margin-bottom: 0;
}
.section-title h2.title span{
    font-style: italic;  
    font-weight: 700; 
    font-family: 'Playfair Display', serif; 
    letter-spacing: 1.2px;
}
.list-style-disc {list-style-type: disc !important;}
.list-style-decimal {list-style-type: decimal!important;}
ul.ttm-list {
    list-style: none;
    padding: 0;
    padding-left: 0;
}
.ttm-list.ttm-list-style-icon li i {
    position: absolute;
    left: 0px;
    top: 5px;
}
.ttm-list.ttm-list-style-icon li {
    padding-left: 22px;
    list-style: none; 
    position: relative;
    padding-bottom: 10px; 
    font-weight: 500;
}
.ttm-list.ttm-list-textsize-medium li{font-size: 16px;padding-bottom: 9px;}
.spacing-9 {
    padding: 80px 60px 80px 0px;
}
/* ===============================================
    12.featured-icon-box ( only contents )
------------------------*/
.featured-icon-box { position: relative;}
.featured-icon-box .ttm-icon{ margin-bottom: 0px; }
.featured-icon-box.top-icon .featured-content{ padding-top: 14px; }
.featured-icon-box.left-icon .featured-icon:not(.ttm-icon_element-border),
.featured-icon-box.left-icon .featured-icon, 
.featured-icon-box.left-icon .featured-content{
    display: table-cell;
    vertical-align: middle; 
}

.featured-icon-box.iconalign-before-heading .featured-content{ display: table; }
.featured-icon-box.iconalign-before-heading .ttm-icon.ttm-icon_element-size-md { height: auto; width: auto; }
.featured-icon-box.iconalign-before-heading .ttm-icon,
.featured-icon-box.iconalign-before-heading .featured-title{ display: table-cell; vertical-align: middle; padding-left: 20px;}
.iconalign-before-heading .ttm-icon.style1{width: 40px; height: 50px;}
.iconalign-before-heading .ttm-icon.style1 .ttm-num:before{font-size: 20px;font-weight: 600; color: #1e2637;}
.featured-icon-box.iconalign-before-heading .featured-desc{padding-top: 10px;}

.featured-icon-box.left-icon.icon-align-top .featured-icon{ vertical-align: top; padding-top: 5px; }
.featured-icon-box.left-icon .featured-content { padding-left: 24px; }
.featured-title h5{ font-size: 19px; line-height: 26px; margin-bottom: 0px;}
.featured-desc p{margin-bottom: 0;}

body{ counter-reset: section; }
.ttm-num:before{ 
    counter-increment: section; 
    content: counter(section, decimal-leading-zero) " " ;
    font-size: 14px;
    font-family: "Poppins",Arial,Helvetica,sans-serif;
} 
/*  style1 */
.featured-icon-box-style1-row{margin-top: -35px;padding-left: 10px;padding-right: 10px;}
.featured-icon-box.style1{ padding: 28px 20px;}
.featured-icon-box.style1 .featured-title h5{font-weight: 500;}
.featured-icon-box.style1 .featured-desc p{font-weight: 300;}
/*  style2 */
.featured-icon-box.style2 .ttm-icon.ttm-icon_element-size-md i { font-size: 24px;}
.featured-icon-box.style2 .featured-title h5{margin-bottom: 5px;}
/*  style3 */
.featured-icon-box.style3 .ttm-icon.ttm-icon_element-size-lg{
    height: 45px;
    width: 45px;
    line-height: 45px;
}
.featured-icon-box.style3 {padding-top: 15px;}
.featured-icon-box.style3 .featured-content{padding-left: 12px;}
/*  without-icon */
.featured-icon-box.without-icon .featured-title h5{padding-left: 26px;position: relative;}
.featured-icon-box.without-icon .featured-title h5:before{
    content: "";
    position: absolute;
    width: 18px;
    height: 1px;
    margin: auto;
    top: 50%;
    left: 0;
}
/*  style4 */
.featured-icon-box.style4 .ttm-icon.ttm-icon_element-size-md{
    height: 35px;
    width: 35px;
    line-height: 35px;
}
.featured-icon-box.style4 .ttm-icon.ttm-icon_element-size-md i{font-size: 35px;}
.featured-icon-box.style4 .featured-content{padding-left: 12px;}

/*  style5 */
.featured-icon-box.style5{position: relative;z-index: 1;overflow: hidden;}
.featured-icon-box.style5{
    border:1px solid rgba(255,255,255,0.15) !important;
    padding: 40px 35px;
    border-radius: 5px;
}
.featured-icon-box.style5 .ttm-icon.ttm-icon_element-size-lg{height: 45px;width: 45px; line-height: 45px;}
.featured-icon-box.style5 .featured-content{padding-top: 10px;}
.featured-icon-box.style5 .featured-title h5{margin-bottom: 10px;}
.featured-icon-box.style5:before{
    position: absolute;
    content: '';
    bottom: 100%;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    -webkit-transition: .55s cubic-bezier(.68,1.55,.265,.55);
    -moz-transition: .55s cubic-bezier(.68,1.55,.265,.55);
    -ms-transition: .55s cubic-bezier(.68,1.55,.265,.55);
    -o-transition: .55s cubic-bezier(.68,1.55,.265,.55);
    transition: .55s cubic-bezier(.68,1.55,.265,.55);
}
.featured-icon-box.style5:hover:before{
    bottom: 0;
}
/*  style6 */
.featured-icon-box.style6{
    border: 1px solid #ebeef0;
    padding: 30px 30px 30px 30px;
    height: 100%;
    position: relative;
    background-color: #fff;
    margin-right: -1px;
    -webkit-transition: all 0.5s ease-in-out 0s;
    -moz-transition: all 0.5s ease-in-out 0s;
    -ms-transition: all 0.5s ease-in-out 0s;
    -o-transition: all 0.5s ease-in-out 0s;
    transition: all 0.5s ease-in-out 0s;
}
.featured-icon-box.style6 .ttm-icon.ttm-icon_element-size-lg {
    height: 50px;
    width: 50px;
    line-height: 50px;
}
.featured-icon-box.style6 .ttm-icon.ttm-icon_element-size-lg i{font-size: 50px;}

/*  style7 */
.featured-icon-box.style7{padding: 30px 20px;border:1px solid #ebedf2 !important;}
.featured-icon-box.style7 .ttm-icon.ttm-icon_element-size-md{
    height: 70px;
    width: 70px;
    line-height: 70px;
}
.featured-icon-box.style7 .ttm-icon.ttm-icon_element-size-md i{font-size: 58px;}
.featured-icon-box.style7 .featured-title h5{margin-bottom: 5px;}

/*  style8 */
.featured-icon-box.style8{
    padding: 60px 30px 40px;
    background-color: #fff;
    position: relative;
}
.featured-icon-box.style8 .ttm-icon{
    position: absolute;
    top: -32px;
    left: 50%;
    margin-left: -33px;
    background-color: #fff;
    -webkit-box-shadow: 0 0 12px 0 rgba(32,46,60,.06);
    -moz-box-shadow: 0 0 12px 0 rgba(32,46,60,.06);
    box-shadow: 0 0 12px 0 rgba(32,46,60,.06);
    text-align: center;
    height: 70px;
    width: 70px;
    line-height: 70px;
}

/* style9 */
.ttm-boxes-quickservicebox:before {
    content: '';
    position: absolute;
    left: -335px;
    right: -100%;
    height: 100%;
    display: block;
    background: url(../images/vector_page/quick-services-bg.png) center left no-repeat;
}
.featured-icon-box.style9{
    padding: 55px 30px;
    margin: 5px 0;
    background-color: #fff;
    position: relative;
    text-align: center;
    box-shadow: 0 0 12px 0 rgba(32,46,60,.06);
}
.featured-icon-box.style9 .featured-title h5 {
    font-size: 20px;
    line-height: 30px;
    margin-bottom: 20px;
    padding-top: 20px;
}
.featured-icon-box.style9:before,
.featured-icon-box.style9:after{
    position: absolute;
    left: 0;
    top: 0;
    display: block;
    content: '';
}
.featured-icon-box.style9:before {
    width: 105px;
    height: 40px;
    background-image: url(../images/vector_page/ser_bg_shape1.png);
    background-repeat: no-repeat;
}
.featured-icon-box.style9:after {
    left: auto;
    top: auto;
    right: 0;
    height: 140px;
    width: 140px;
    background-image: url(../images/vector_page/ser_bg_shape2.png);
    background-repeat: no-repeat;
}
.featured-icon-box.style9 .ttm-icon i { font-size: 60px; }
.featured-icon-box.style9 .servicebox-number {
    color: rgb(39 57 107 / .10);
    font-size: 80px;
    position: absolute;
    top: 90px;
    left: 50%;
}
.featured-icon-box.style9:hover .featured-icon .ttm-icon{
    transform: rotateY(180deg);
}

.featured-icon-box.style10 {
    background-color: #fff;
    padding: 30px 30px 0;
    margin: 15px 0;
    transition: all .4s;
}
.featured-icon-box.style10:hover{
    box-shadow: rgb(255 255 255 / 30%) 5px 5px, rgb(255 255 255 / 20%) 10px 10px, rgb(255 255 255 / 10%) 15px 15px;
}
.featured-icon-box.style10 .featured-title h5 {
    font-size: 20px;
    margin-bottom: 8px;
}
.featured-icon-box.style10 .featured-icon i { font-size: 40px; }
.featured-icon-box.style10 .footer-bottom {
    margin: 0 -30px;
    margin-top: 20px;
    border-top: 1px solid #e7e7e7;
    padding: 15px 30px;
    transition: all .4s;
}
.featured-icon-box.style10 .ttm-btn{
    display: flex;
    font-size: 15px;
    color: inherit;
    justify-content: space-between;
    align-items: center;
}
.featured-icon-box.style10 .ttm-btn i {font-size: 13px;}


.featured-icon-box.style11 {
    background-color: #fff;
    padding: 10px 20px 10px 10px;
    text-align: left;
    position: absolute;
    bottom: 90px;
    right: 0;
}
.featured-icon-box.left-icon.style11 .featured-content {
    padding-left: 18px;
}
.featured-icon-box.style11 .featured-title h5 {
    font-size: 30px;
    margin-bottom: 5px;
    font-weight: 700;
}


/* ===============================================
    13.featured-imagebox ( contents with image)
------------------------*/
.featured-imagebox .featured-thumbnail{position: relative;overflow: hidden;}
.form-control {
    padding: 17px 24px;
    height: auto;
    border-radius: 0;
    border: 1px solid transparent;
    font-size: 14px;
    background-color: transparent;
}
.form-control:focus {
  background-color: transparent;
  box-shadow: none;
}
textarea.form-control,
textarea, input[type="text"], 
input[type="password"], 
input[type="datetime"], 
input[type="datetime-local"], 
input[type="date"], 
input[type="month"], 
input[type="time"], 
input[type="week"], 
input[type="number"], 
input[type="email"], 
input[type="url"], 
input[type="search"], 
input[type="tel"], 
input[type="color"], 
select{
    font-family: inherit;
    -webkit-transition: border linear .2s,box-shadow linear .2s;
    -moz-transition: border linear .2s,box-shadow linear .2s;
    -o-transition: border linear .2s,box-shadow linear .2s;
    transition: border linear .2s,box-shadow linear .2s;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    vertical-align: middle;
    width: 100%;
    color: #8093a8;
    padding: 10px 15px;
    border-radius: 0;
    font-weight: 400;
    text-transform: inherit;
    border: 1px solid rgba(0, 43, 92, 0.08);
    font-size: 15px;
    outline: none;
    line-height: inherit;
    letter-spacing: 0px;
}

textarea:focus, 
input[type="text"]:focus, 
input[type="password"]:focus, 
input[type="datetime"]:focus, 
input[type="datetime-local"]:focus, 
input[type="date"]:focus, 
input[type="month"]:focus, 
input[type="time"]:focus, 
input[type="week"]:focus, 
input[type="number"]:focus, 
input[type="email"]:focus, 
input[type="url"]:focus, 
input[type="search"]:focus, 
input[type="tel"]:focus, 
input[type="color"]:focus {
    border: 1px solid #fda02b;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

textarea:-moz-placeholder,
textarea::-moz-placeholder,
input:-moz-placeholder,
input::-moz-placeholder,
input:-ms-input-placeholder ,
input::-ms-input-placeholder,
textarea::-webkit-input-placeholder,
input::-webkit-input-placeholde  {   
  color: #fff;
}
/* ===============================================
    19.Wrap-Form
------------------------*/
/* quote-form */
.ttm-quote-form .form-group{margin-bottom: 30px;}
.form-group .input-group-icon{ position: absolute; top: 8px; left: 17px; font-size: 16px; color: #4d5257;}
.ttm-quote-form .form-control.with-white-bg{border:none;background-color: #fff;}
.ttm-quote-form .form-control.with-grey-bg{border:none;background-color: #f7f9fb;}

.ttm-contact-form .form-group{
    margin-bottom: 20px;
    display: block;
    padding-top: 0;
}
.ttm-contact-form input[type="text"], 
.ttm-contact-form input[type="email"], 
.ttm-contact-form textarea {
    background-color: #f7f9fe;
    border: 1px solid #f7f9fe;
    color: #242424;
    padding: 11px 15px;
}

.quote_form {
    padding: 45px 25px 45px 25px;
    margin: 0;
    background-color: rgba(255,255,255,.06);
}
.quote_form .form-group {
    margin-bottom: 30px;
}
.quote_form .form-control {
    padding: 12px 20px 12px;
    border: 1px solid #fff;
    color: #fff;
}
.quote_form .form-control:focus {
    border-color: #fff !important;
}
.quote_form textarea.form-control { height: 100px; }
.quote_form button { height: 50px; cursor: pointer; }

.section-title h2.title{
    font-size: 34px;
    line-height: 44px;
    margin-bottom: 0;
}
.ttm-search-overlay,
.ttm-rounded-shadow-box, div.product ul.tabs li.active a:before,
.coupon_toggle .coupon_code,
#payment .payment_box,
.tooltip-top:before, .tooltip:before, [data-tooltip]:before,
.section-title.with-desc .title-header:before,
#site-header-menu #site-navigation .menu > ul{
    border-top-color: #2d4a8a !important; 
}
ul.bottom_links .nav-item .nav-link{
    color: white !important;
}
    </style>
</head>

<body class="page-overview ac-gn-current-overview">


    <meta name="ac-gn-store-key" content="SFX9YPYY9PPXCU9KH" />
    <aside id="ac-gn-segmentbar" class="ac-gn-segmentbar" lang="en-US" dir="ltr" data-strings="{ 'exit': 'Exit', 'view': '{%STOREFRONT%} Store Home', 'segments': { 'smb': 'Business Store Home', 'eduInd': 'Education Store Home', 'other': 'Store Home' } }"></aside>
    <input type="checkbox" id="ac-gn-menustate" class="ac-gn-menustate" />
    <?php echo $__env->make('partial/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--<div class="ac-gn-blur"></div>-->
    <div id="ac-gn-curtain" class="ac-gn-curtain"></div>
    <!-- <div id="ac-gn-placeholder" class="ac-nav-placeholder"></div> -->

    <script type="text/javascript" src="<?php echo e(asset('front/ac-globalnav.built.js')); ?>"></script>



    <script src="<?php echo e(asset('front/ac-analytics.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo e(asset('front/auto-init.js')); ?>" type="text/javascript" charset="utf-8"></script>

    <input type="checkbox" id="ac-ln-menustate" class="ac-ln-menustate" />

    <label id="ac-ln-curtain" for="ac-ln-menustate"></label>
    <script type="text/javascript" src="<?php echo e(asset('front/ac-localnav.built.js')); ?>"></script>

    <main id="main" class="main" role="main" data-page-type="overview">
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-center">
                            <div class="page-title-heading">
                                <h1 class="title">Contact Us</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="<?php echo e(URL::to('/')); ?>" style="color: #2b996d;"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; : : &nbsp;</span>
                                <span>Contact Us</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div>
                        <?php if($alertFm = Session::get('message')): ?>
                            <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">
                                <strong><?php echo e($alertFm); ?></strong>
                            </div>
                        <?php endif; ?>          
<section class="ttm-row zero-padding-section clearfix">
                <div class="container">
                    <div class="row no-gutters"><!-- row -->
                        <div class="col-lg-12">
                            <div class="spacing-10 ttm-bgcolor-grey ttm-bg ttm-col-bgcolor-yes ttm-right-span">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-bg-layer-inner"></div>
                                </div>
                                <!-- section title -->
                                <div class="section-title with-desc clearfix">
                                    <div class="title-header">
                                        <h5>Get in touch with us</h5>
                                    </div>
                                </div><!-- section title end -->
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="<?php echo e(URL::to('submitcontact')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control bg-white" placeholder="Full Name*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="phone" type="text" placeholder="Phone Number*" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Email" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="subject" type="text" placeholder="Subject" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="massage" rows="5" placeholder="Write A Massage..." required="required" class="form-control bg-white"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" class="btn btn-success" value="">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                    <!-- row -->
                    <div class="row">
                        
                    </div><!-- row end-->
                </div>
            </section>
    </main>

    <?php echo $__env->make('partial/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript" src="<?php echo e(asset('front/ac-globalfooter.built.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('front/bootstrap.bundle.js')); ?>"></script>


    <script type="text/javascript" src="<?php echo e(asset('front/localeswitcher.built.js')); ?>"></script>

    <script src="<?php echo e(asset('front/main.built.js')); ?>" type="text/javascript" charset="utf-8"></script>


    <script src="<?php echo e(asset('front/data-relay.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo e(asset('front/auto-relay.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</body>

</html><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnews.com/resources/views/contact.blade.php ENDPATH**/ ?>