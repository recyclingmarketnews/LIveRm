<!DOCTYPE html>

<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8" />




    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />


<link rel="shortcut icon" href="{{ asset('front/images/favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/owl.carousel.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/ac-globalnav.built.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/ac-localnav.built.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/ac-globalfooter.built.css')}}" />
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>


    <title>Recycling Market News</title>
    <meta name="Description" content="" />



    <link rel="stylesheet" href="/wss/fonts?families=SF+Pro,v3|SF+Pro+Icons,v3">
    <link rel="stylesheet" href="{{ asset('front/main.built.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/overview.built.css')}}" type="text/css" />
    <script src="{{ asset('front/head.built.js')}}" type="text/javascript" charset="utf-8"></script>
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



.pricingTable{
    color: #383e4a;
    text-align: center;
    padding: 0 25px 25px;
    position: relative;
    z-index: 1;
}
.pricingTable:before{
    content: "";
    background: linear-gradient(to right, #1abf7f, #22af36);
    width: 250px;
    height: 350px;
    border-radius: 10px 10px 10px 20px;
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: -1;
}
.pricingTable .pricing-content{
    background-color: #fff;
    padding: 35px 15px 30px;
    border-radius: 20px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1),10px -10px 0 rgba(0,0,0,0.05);
}
.pricingTable .title{
    font-size: 30px;
    font-weight: 700;
    
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 0 0 20px;
    position: relative;
}
.pricingTable .pricing-content ul{
    text-align: left;
    padding: 0;
    margin: 0 0 30px;
    list-style: none;
    display: inline-block;
 
}
.pricingTable .pricing-content ul li{
    color: #999;
    font-size: 14px;
    line-height: 25px;
    padding: 8px 0 8px 35px;
    border-bottom: 1px solid #ccc;
    position: relative;
}
.pricingTable .pricing-content ul li:first-child{ border-top: 1px solid #ccc; }
.pricingTable .pricing-content ul li:before{
    color: #6cc13d;
    content: "\f00c";
    font-family: "FontAwesome";
    font-size: 15px;
    font-weight: 900;
    position: absolute;
    top: 8px;
    left: 0;
}
.pricingTable .pricing-content ul li.disable:before{
    color: #525963;
    content: "\f00d";
}
.pricingTable .price-value { margin: 0 0 25px; }
.pricingTable .price-value .amount{
    font-size: 40px;
    line-height: 50px;
    display: block;
}
.pricingTable .price-value .duration{
    font-size: 15px;
    line-height: 20px;
    font-weight: 400;
    display: block;
}
.pricingTable .pricingTable-signup a{
    color: #fff;
    background-color:#1abf7f;
    font-size: 20px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 8px 14px;
    transition: all 0.5s ease 0s;
}
.pricingTable .pricingTable-signup a:hover{ text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.4); }
.pricingTable.purple:before{ background: linear-gradient(to right,#1abf7f, #22af36); }
.pricingTable.purple .pricing-content ul li:before { color: #6cc13d; }
.pricingTable.purple .pricing-content ul li.disable:before{ color: #525963; }
.pricingTable.purple .pricingTable-signup a{background-color:#1abf7f;); }
.pricingTable.orange:before{ background: linear-gradient(to right, #1abf7f, #22af36); }
.pricingTable.orange .pricing-content ul li:before{ color: #6cc13d; }
.pricingTable.orange .pricing-content ul li.disable:before{ color: #525963; }
.pricingTable.orange .pricingTable-signup a{background-color:#1abf7f;); }
@media only screen and (max-width: 990px){
    .pricingTable{ margin-bottom: 40px; }
    </style>
</head>

<body class="page-overview ac-gn-current-overview">


    <meta name="ac-gn-store-key" content="SFX9YPYY9PPXCU9KH" />
    <aside id="ac-gn-segmentbar" class="ac-gn-segmentbar" lang="en-US" dir="ltr" data-strings="{ 'exit': 'Exit', 'view': '{%STOREFRONT%} Store Home', 'segments': { 'smb': 'Business Store Home', 'eduInd': 'Education Store Home', 'other': 'Store Home' } }"></aside>
    <input type="checkbox" id="ac-gn-menustate" class="ac-gn-menustate" />
    @include('partial/header')
    <!--<div class="ac-gn-blur"></div>-->
    <div id="ac-gn-curtain" class="ac-gn-curtain"></div>
    <!-- <div id="ac-gn-placeholder" class="ac-nav-placeholder"></div> -->

    <script type="text/javascript" src="{{ asset('front/ac-globalnav.built.js')}}"></script>



    <script src="{{ asset('front/ac-analytics.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('front/auto-init.js')}}" type="text/javascript" charset="utf-8"></script>

    <input type="checkbox" id="ac-ln-menustate" class="ac-ln-menustate" />

    <label id="ac-ln-curtain" for="ac-ln-menustate"></label>
    <script type="text/javascript" src="{{ asset('front/ac-localnav.built.js')}}"></script>

    <main id="main" class="main" role="main" data-page-type="overview">
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-center">
                            <div class="page-title-heading">
                                <h1 class="title">Subscription</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ URL::to('/') }}" style="color: #2b996d;"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; : : &nbsp;</span>
                                <span>Subscription</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div>
                        @if ($alertFm = Session::get('message'))
                            <div class="alert alert-{{Session::get('type')}} alert-block">
                                <strong>{{ $alertFm }}</strong>
                            </div>
                        @endif     
                        
<section class="ttm-row zero-padding-section clearfix">
            <div class="container">
                        <div class="row" style="    margin: 0;">
                            <div class="col-md-4 col-sm-6">
                                <div class="pricingTable">
                                    <div class="pricing-content">
                                        <div class="pricingTable-header">
                                            <h3 class="title">Free Trial</h3>
                                        </div>
                                        <ul>
                                             
                                            
                                             
                                             
                                             
                                            
                                            <li>Access to all News</li>
                                            <li>Give Ratings</li>
                                            <li>Publish your own News</li>
                                            <li>Exchange rates USD</li>
                                            <li>Grow your network</li>
                                            <li class="disable">Marketing of products and services</li>
                                        </ul>
                                        <div class="price-value">
                                            <span class="amount">$0.00</span>
                                            <span class="duration" >14 days trial</span>
                                            <span class="duration" style="    font-size: 13px;">No credit card required</span>
                                        </div>
                                        <div class="pricingTable-signup">
                                            <a href="{{ URL::to('signupselect') }}">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="pricingTable purple">
                                    <div class="pricing-content">
                                        <div class="pricingTable-header">
                                            <h3 class="title">Individual</h3>
                                        </div>
                                        <ul>
                                            <li>Access to all News</li>
                                            <li>Give Ratings</li>
                                            <li>Publish your own News</li>
                                            <li>Exchange rates USD</li>
                                            <li>Grow your network</li>
                                            <li class="disable">Marketing of products and services</li>
                                        </ul>
                                        <div class="price-value">
                                            <span class="amount">$19.99</span>
                                            <span class="duration" style="    padding-bottom: 21px;">per month</span>
                                        </div>
                                        <div class="pricingTable-signup">
                                            <a href="{{ URL::to('signupselect') }}">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="pricingTable purple">
                                    <div class="pricing-content">
                                        <div class="pricingTable-header">
                                            <h3 class="title">Commercial</h3>
                                        </div>
                                        <ul>
                                            <li>Access to all News</li>
                                            <li>Give Ratings</li>
                                            <li>Publish your own News</li>
                                            <li>Exchange rates USD</li>
                                            <li>Grow your network</li>
                                            <li>Marketing of products and services</li>
                                        </ul>
                                        <div class="price-value">
                                            <span class="amount">$180</span>
                                            <span class="duration" style="    padding-bottom: 21px;">per month</span>
                                        </div>
                                        <div class="pricingTable-signup">
                                            <a href="{{ URL::to('signupselect') }}">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <section class=" zero-padding-section clearfix">
            <div class="container">
                        <div class="row" style=" font-size: 15px; margin: 0; text-align: justify;">
                            <div class="co-lg-12 col-md-12 col-sm-12">
                                <h6>What can I publish?</h6>
                                <p>Whether you are an individual expert sharing valuable insights with fellow recyclers or a company looking to promote your products and services directly to the industry at large, there is no limit to what can be published on a platform dedicated to industry’s transparency, sustainable development and resource conservation.</p>
                                <p>There are many different topics that can be published on a recycling market news platform, depending on your area of expertise and your goals, we have 25 plus different categories to choose from.</p>
                                <p>For example, if you are an individual recycler with extensive knowledge of the Waste Management and recycling industry or you are a key stakeholder in other services which supports the recycling industry -  you may be interested in publishing opinions about Market trends, price fluctuations, future demand for specific materials, key regulations, compliance schemes, virgin polymers demand and pricing situation, freight and transport update, packaging, climate change, ocean clean-up initiatives, forex or any other current issues affecting the industry.</p>
                                <p>But, what If you are a company, environmental agency or an organisation, are you looking for an effective way to reach the entire recycling industry? and looking to increase awareness within the recycling industry at a monthly cost that won't break your budget about your products, services or your initiatives within the recycling industry?</p>
                                <p>You may wish to publish announcements about new product launches, business updates, business acquisition or investment announcement, upcoming tender, close loop partnerships, market update to other recyclers as a company, regulation update or any other relevant information related to your company's work in the field.</p>
                                <p>In either case, a recycling market news platform is an ideal place to share this information with a broad audience of like-minded individuals and businesses and grow your ratings.</p>
                                <p>At Recycling market news, we are proud to offer a wide range of publishing possibilities, our publishing options are categorised into two categories: <span style="font-weight: bold;">Individual</span> and <span style="font-weight: bold;">Commercial</span></p>
                                <br>
                                <p><span style="font-weight: bold;">Individual:</span> Publish your own opinion about supply, demand, pricing forecast, climate change, ocean clean-up initiatives, currency effects on market, freight updates, regulation and compliance scheme update etc. In simple terms you can publish anything which doesn’t include any sort of marketing of any product or services.</p>
                                
                                <p style="font-style: italic; padding-left:30px;">Conditions: Follow our basic community guidelines, No repetitive post within 14 days of same topic, photos used in your post should be of your own ownership or purchased with license to protect the copyrights of the owner, any legal or government related updates requires a valid web link to be included in your post.</p>
                                <br>
                                <p><span style="font-weight: bold;">Commercial:</span> Publish everything as an individual package. Additionally, any marketing such as press releases, announcements about new product launches, business updates, business acquisition or investments announcement, upcoming tender, close loop partnerships or any other relevant information related to your company's work in the field.</p>
                                
                                <p style="font-style: italic; padding-left: 30px;">Conditions: Follow our basic community guidelines, No repetitive post within 14 days of same topic, maximum 4 marketing related post is allowed monthly for promoting your business or product, photos used in your post should be of your own ownership or purchased with license to protect the copyrights of the owner, any legal or government related updates requires a valid web link to be included in your post.</p>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
            </section>
    </main>

    @include('partial/footer')
    <!--  -->
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header p-3">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Search Bar</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="col-lg-11 mx-auto">
                <form>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    <script type="text/javascript" src="{{ asset('front/ac-globalfooter.built.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('front/main.built.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('front/data-relay.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('front/auto-relay.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
  AOS.init();
</script>
</body>

</html>