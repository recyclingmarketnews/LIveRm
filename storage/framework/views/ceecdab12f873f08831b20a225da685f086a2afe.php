<!DOCTYPE html>

<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8" />




    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />



    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/ac-globalnav.built.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/ac-localnav.built.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('front/ac-globalfooter.built.css')); ?>" />
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
ul.bottom_links .nav-item .nav-link{
    color: white !important;
}

.wrapper{
    z-index: 999999999;
  position: fixed;
  bottom: 30px;
  left: 30px;
  max-width: 365px;
  background: #fff;
  padding: 25px 25px 30px 25px;
  border-radius: 15px;
  box-shadow: 1px 7px 14px -5px rgba(0,0,0,0.15);
  text-align: center;
}
.wrapper.hide{
  opacity: 0;
  pointer-events: none;
  transform: scale(0.8);
  transition: all 0.3s ease;
}
::selection{
  color: #fff;
  background: #FCBA7F;
}
.wrapper img{
  max-width: 90px;
}
.content header{
  font-size: 25px;
  font-weight: 600;
}
.content{
  margin-top: 10px;
}
.content p{
  color: #858585;
  margin: 5px 0 20px 0;
}
.content .buttons{
  display: flex;
  align-items: center;
  justify-content: center;
}
.buttons button{
  padding: 10px 20px;
  border: none;
  outline: none;
  color: #fff;
  font-size: 16px;
  font-weight: 500;
  border-radius: 5px;
  background: #FCBA7F;
  cursor: pointer;
  transition: all 0.3s ease;
}
.buttons button:hover{
  transform: scale(0.97);
}
.buttons .item{
  margin: 0 10px;
}
.buttons a{
  color: #FCBA7F;
}
    </style>
</head>

<body class="page-overview ac-gn-current-overview">
  <div class="wrapper">
    <img src="<?php echo e(asset('front/images/cookie.png')); ?>" alt="">
    <div class="content">
      <header>Cookies Consent</header>
      <p>This website use cookies to ensure you get the best experience on our website.</p>
      <div class="buttons">
        <button class="item">Accept</button>
      </div>
    </div>
  </div>

    <meta name="ac-gn-store-key" content="SFX9YPYY9PPXCU9KH" />
    <aside id="ac-gn-segmentbar" class="ac-gn-segmentbar" lang="en-US" dir="ltr" data-strings="{ 'exit': 'Exit', 'view': '{%STOREFRONT%} Store Home', 'segments': { 'smb': 'Business Store Home', 'eduInd': 'Education Store Home', 'other': 'Store Home' } }"></aside>
    <input type="checkbox" id="ac-gn-menustate" class="ac-gn-menustate" />
    <header class="pt-4 header">
        <div class="container">
            <div class="text-center mb-4">
                <a href="#" class=""><img class="img-fluid" src="<?php echo e(asset('front/images/logo.png')); ?>" width="380px" /></a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand d-block d-lg-none" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-center w-100">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo e(URL::to('/')); ?>">Home</a>
                            </li>
                         
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(URL::to('term')); ?>">Terms & Condition</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(URL::to('contact')); ?>">Contact Us</a>
                            </li>
                            <li class="nav-item" style="background: #1abf7f;border-radius: 8px 8px 0 0;">
                                <?php if(Auth::user() != ''): ?>
                                    <?php if(Auth::user()->user_type == 1 || Auth::user()->user_type == 2): ?>
                                        <a class="nav-link" style="color:#fff;font-weight:bold;" href="<?php echo e(URL::to('dash')); ?>">Dashobard</a>
                                    <?php else: ?>
                                        <a class="nav-link" style="color:#fff;font-weight:bold;" href="<?php echo e(URL::to('allactivepost')); ?>">Dashobard</a>
                                    <?php endif; ?>
                                <?php else: ?>
                                <a class="nav-link" style="color:#fff;font-weight:bold;" href="<?php echo e(URL::to('login')); ?>">Login</a>
                                <?php endif; ?>
                         
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
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
        <section class="section section-hero pb-5" data-analytics-section-engagement="name:hero">
            <div class="hero-top d-block" data-component-list="HeroTop" data-anim-scroll-group='HeroTop'>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="hero-top-content section-content">
                        <div class="carousel-inner">
                            <div class="hero-copy large-10 large-centered medium-12">
                                <div class="carousel-item active">
                                    <figure style="height: 100px;" role="presentation"></figure>
                                    <h1 class="hero-title typography-body-bold">Recycling Market News</h1>
                                    <h2 class="hero-headline typography-section-headline">News for Recyclers,<br /> by Recyclers!</h2>
                                    <a href="<?php echo e(URL::to('signup')); ?>" style="color:white;"><button class="button-news button-grand button-trial-download">
	Try 14 days free</button></a>
                                    <a href="<?php echo e(URL::to('signup')); ?>" style="color:white;"><button class="button-news button-grand button-trial-modal">
	Try 14 days free</button></a>
                                </div>
                                <div class="carousel-item">
                                    <figure style="height: 100px;" role="presentation"></figure>
                                    <h1 class="hero-title typography-body-bold">Recycling Market News</h1>
                                    <h2 class="hero-headline typography-section-headline">Industry news,<br />Insights and opinions <br />by Recyclers.</h2>
                        <a href="<?php echo e(URL::to('signup')); ?>" style="color:white;"><button class="button-news button-grand button-trial-download"  
                                        >
	Try 14 days free</button></a>
                                    <a href="<?php echo e(URL::to('signup')); ?>" style="color:white;"><button class="button-news button-grand button-trial-modal">
	Try 14 days free</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-bottom red-bg" data-anim-scroll-group='HeroBottom'>
                <div class="hero-bottom-content">
                    <div data-component-list="MarqueeGalleryController">
                        <div class="device-gallery row p-3">
                            <div class="col-lg-6">
                                <figure class="device">
                                    <div class="device-hardware image-hero-hardware"></div>
                                    <div class="device-screen">
                                        <div class="device-screen-image image-hero-screen-vogue" ></div>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <p data-component-list="Callout" class="hero-callout typography-hero-callout large-11 small-12">About Us</span>
                                    </p>
                                    <p class="fontsize14" style="text-align: justify;">
                                    We're not just another news site. We're Recycling Market News, its <span style="font-weight: 700;">Run by recyclers, for recyclers.</span>
                                    </p> 
                                    <p class="fontsize14" style="text-align: justify;">
                                    Recycling Market News is a platform that brings industry news, insights, and opinions from the people who know it best: <span style="font-weight: 700;">Recyclers.</span>
                                    </p> 
									<p class="fontsize14" style="text-align: justify;">
                                      Our platform works by allowing recyclers to publish their opinions directly onto our site, in the form of a news article, and allows our readers to rate those articles or recyclers those who published it and decide for themselves if a given market update is trustworthy or not.
                                    </p>
                                    <p class="fontsize14" style="text-align: justify;">
                                    With Recycling market news here to help you identify trustworthy sources and spot bogus information quickly and easily, you won't have to worry about missing out on an opportunity (or being taken advantage of) ever again!
                                    </p>
                                    <p class="fontsize14" style="text-align: justify;">
                                    And when it comes to deciding who's trustworthy and who isn't, we make it easy: each user has their own ratings so you can see at a glance how reliable that person is as an information source or business partner.
                                    </p>
                                </div>
                            </div>
                        </div>
     
           
                    </div>
                    <div class="section-content">
                        <div class="hero-callouts" data-anim-scroll-group="Callouts">
                            <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="hero-callout  typography-hero-callout large-11 small-12">The latest news and insights<span class="select"> on recycling markets by reputable Recyclers!</span></p>
                            <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout  typography-hero-callout large-10 small-12">Discover the most <span class="select">impactful news in your industry directly from source</span></p>
                            <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout  typography-hero-callout large-10 small-12"><span class="select">No more text messages</span>about market update!</p>
                            <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout  typography-hero-callout large-10 small-12">Publish your own opinion about supply, <span class="select"> demand, pricing, and forecast, and let the recyclers rate your market opinion</span></p>
                            <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout  typography-hero-callout ">Build and tell<span class="select"> the world about your reputation in the recycling market from your ratings</span></p>
                            <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout typography-hero-callout large-11 small-12"><span role="text">Are you a recycler? <span class="select"> What’s your rating in the industry?</span></span>
                                <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout  typography-hero-callout large-11 small-12"><span role="text">Use your ratings to<span class="select"> secure your future career, and build more contacts in the industry</span></span>
                                    <p data-component-list="Callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  class="hero-callout typography-hero-callout large-11 small-12"><span role="text">Become a news publisher<span class="select"> and build your reputation as industry’s reputable professional</span></span>
                                    </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="py-5" style="    background: #1bbf8052;">
            <div class="section-content">
                <div class="row topproducts-slidee owl-carousel">
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post-slide">
                        <div class="post-img">
                            <img src="<?php echo e(asset('front/images/homenewscard.jpg')); ?>" alt="">
                            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="#"><?php echo Str::limit($list->heading,50); ?></a>
                            </h3>
                            <?php $categories= DB::table('product_category')
    ->where('id',$list->category_id)
    ->get(); 
    foreach($categories as $categories){
        $cname=$categories->name;
    }
    
    ?>
                            <!--<p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>-->
                            <span class="post-date"><i class="fa fa-clock-o"></i><?php echo $cname; ?></span>
                            <!--<a href="#" class="read-more">read more</a>-->
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                </div>
            </div>
        </section>
        <!--  -->
     <!--   <div class="red-bg">-->
     <!--       <section style="padding-bottom: 200px;" class="section section-audio" data-component-list='Audio' data-anim-scroll-group='Audio' data-analytics-section-engagement='name:audio'>-->
     <!--           <div class="section-content">-->
     <!--               <div class="headline-lockup">-->
     <!--                   <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="eyebrow typography-eyebrow-bold">RecyclingMarket News</p>-->
     <!--                   <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="typography-section-headline large-12 large-centered">About Us</h2>-->
     <!--               </div>-->
					<!--<p class="mt-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom">-->
					<!--Recycling Market News is a news aggregator in the waste management and recycling industry. -->
					<!--We give you all the latest headlines from major news publishers and trusted sources in one place, as soon as they are published. You don't have to go anywhere else to keep up with the latest news—we bring it right to your screen, as soon as it happens, 24/7. So, you can be confident you’ll never miss anything important!-->
					<!--</p>-->
     <!--           </div>-->
			

     <!--       </section>-->
     <!--   </div>-->

        <!--<section class="section section-plans" data-analytics-section-engagement="name:plans">-->
        <!--    <div class="section-content">-->
        <!--        <div class="plans-headline large-12">-->
        <!--            <figure class="apple-news-icon"></figure>-->
        <!--            <h2 id="news-plans-headline" class="section-intro-headline typography-section-headline" data-aos="fade-up" data-aos-anchor-placement="top-bottom">RecyclingMarket News delivers more.</h2>-->
        <!--            <p class="intro typography-plans-headline"><span aria-label="$9.99 per month" role="text">$9.99/mo.</span> after 1-month free trial</p>-->
        <!--            <div class="button-container plans">-->

        <!--            </div>-->
        <!--        </div>-->
        <!--        <div role="table" aria-label="Compare Plans">-->
        <!--            <div class="row plans-features" role="row">-->
        <!--                <div class="visuallyhidden" role="columnheader" data-aos="fade-up" data-aos-anchor-placement="top-bottom">Features</div>-->
        <!--                <div class="column column-newsplus large-2 large-offset-8 medium-3 medium-offset-7 small-3 small-offset-7" role="columnheader">-->
        <!--                    <div role="text">-->
        <!--                        <p class="plans-table-columnheader header-title typography-plans-title">RecyclingMarket<br class="small" /> News+</p>-->
        <!--                        <p class="plans-table-columnheader header-price typography-plans-price" aria-label="$9.99 per month" role="columnheader">$9.99/<br class="small" />mo.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="column column-news large-2 medium-2 small-2" role="columnheader">-->
        <!--                    <div role="text">-->
        <!--                        <p class="plans-table-columnheader header-title typography-plans-title"><br class="small" /> News</p>-->
        <!--                        <p class="plans-table-columnheader header-price typography-plans-price">Always<br class="small" /> free</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="plans-detail">-->
        <!--                <div role="row" class="row">-->
        <!--                    <div class="column large-8 medium-7 small-7 title" role="rowheader">-->
        <!--                        <p class="plans-item typography-plans-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-3 small-3 column-newsplus" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-2 small-2 column-news" role="cell">-->
        <!--                        <span role="text" class="visuallyhidden">not included</span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div role="row" class="row">-->
        <!--                    <div class="column large-8 medium-7 small-7 title" role="rowheader">-->
        <!--                        <p class="plans-item typography-plans-headline icon-wrapper">-->
        <!--                            <span class="icon-copy"><span class="icon icon-after icon-audio">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></span>-->
        <!--                        </p>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-3 small-3 column-newsplus" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-2 small-2 column-news" role="cell">-->
        <!--                        <span role="text" class="visuallyhidden">not included</span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div role="row" class="row">-->
        <!--                    <div class="column large-8 medium-7 small-7 title" role="rowheader">-->
        <!--                        <p class="plans-item typography-plans-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-3 small-3 column-newsplus" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-2 small-2 column-news" role="cell">-->
        <!--                        <span role="text" class="visuallyhidden">not included</span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div role="row" class="row">-->
        <!--                    <div class="column large-8 medium-7 small-7 title" role="rowheader">-->
        <!--                        <p class="plans-item typography-plans-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-3 small-3 column-newsplus" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-2 small-2 column-news" role="cell">-->
        <!--                        <span role="text" class="visuallyhidden">not included</span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div role="row" class="row">-->
        <!--                    <div class="column large-8 medium-7 small-7 title" role="rowheader">-->
        <!--                        <p class="plans-item typography-plans-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-3 small-3 column-newsplus" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-2 small-2 column-news" role="cell">-->
        <!--                        <span role="text" class="visuallyhidden">not included</span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div role="row" class="row last-row">-->
        <!--                    <div class="column large-8 medium-7 small-7 title" role="rowheader">-->
        <!--                        <p class="plans-item typography-plans-headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-3 small-3 column-newsplus" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                    <div class="column large-2 medium-2 small-2 column-news" role="cell">-->
        <!--                        <i role="presentation" class="icon icon-check" aria-hidden="true"></i>-->
        <!--                        <span role="text" class="visuallyhidden">included</span>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <section class="section section-apple-one" style="margin-bottom: 71px;">
            <div class="section-content">
                <div class="apple-one">
                    <div class="banner-content">
                      <img class="img-fluid" src="<?php echo e(asset('front/images/logo.png')); ?>" width="350px">
                        <div class="banner-copy-container row justify-content-center" style="margin-top: 24px !important;">
                            <p class="banner-headline typography-callout" data-aos="fade-up" data-aos-anchor-placement="top-bottom">Join the community of professional recyclers and get latest <span style="color:#1bbf80;">Updates and Insights</span> of recycling market directly from the source.</p>
                            <a href="<?php echo e(URL::to('signup')); ?>" style="    width: 206px;" class="icon-wrapper button-appleone button-news button-grand"><span class="icon-copy" data-aos="fade-up" data-aos-anchor-placement="top-bottom">Try 14 days free</span></a>                            </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <!--  -->
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-footer footer-one">
                        <!--<h3 class="mb-4">About</h3>-->
                        <div class="footer-logo"><img class="img-fluid" src="<?php echo e(asset('front/images/logo-white.png')); ?>" width="280px" /></div>
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom">Market news by recycler for recyclers! </p>
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom">We're social, connect with us:</p>
                        <div class="footer-social-media-area">
                            <nav>
                                <ul>
                                    <!-- Facebook Icon Here -->
                                    <li><a href="https://facebook.com/recyclingmarketnews"><i class="fa fa-facebook"></i></a></li>
                                    <!-- Google Icon Here -->
                                    <li><a href="https://www.linkedin.com/company/recycling-market-news"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <!-- Twitter Icon Here -->
                                    <li><a href="https://twitter.com/recycling_mnews"><i class="fa fa-twitter"></i></a></li>
                                    <!-- Vimeo Icon Here -->
                                    <li><a href="https://www.instagram.com/recyclingmarketnews"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <!-- Pinterest Icon Here -->
                                    <li><a href="https://www.youtube.com/channel/UCYq0bedZ2B5vUOxKZ6yYFnw"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-footer footer-one">
                        <!--<h3 class="mb-4">Popular Links</h3>-->
                        <ul class="bottom_links list-unstyled m-0">
                            <li class="nav-item"><a href="<?php echo e(URL::to('/')); ?>" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="<?php echo e(URL::to('term')); ?>" class="nav-link">Terms & Condition</a></li>
                            <li class="nav-item"><a href="<?php echo e(URL::to('contact')); ?>" class="nav-link">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="single-footer footer-one">
                        <!--<h3 class="mb-4">From Fliker</h3>-->
                        <p style="text-align: justify;margin: 0;font-size: 13px;">
                        <span style="font-weight: 700;font-size: 14px;">© Global Recycling Market LTD - 2022.</span> The trademarks, logos, and the content appearing therein, is exclusively owned by 
                        <span style="font-weight: 700;">Global Recycling Market LTD</span> and/or its licensors, and are protected. Any unauthorized use or reproduction or distribution, shall attract suitable action under applicable law.</p>
                        <div class="footer-three">
                            <ul class="list-unstyled">
                                <li>
                                    <!--<a href="#"><img class="img-fluid" src="<?php echo e(asset('front/images/1.png')); ?>" alt="flicker photo"></a>-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-bottom">
                        <p> © Copyrights 2022. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script type="text/javascript" src="<?php echo e(asset('front/ac-globalfooter.built.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('front/bootstrap.bundle.js')); ?>"></script>

    <script src="<?php echo e(asset('front/main.built.js')); ?>" type="text/javascript" charset="utf-8"></script>


    <script src="<?php echo e(asset('front/data-relay.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo e(asset('front/auto-relay.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
  AOS.init();
</script>
    <script src="<?php echo e(asset('front/owl.carousel.min.js')); ?>"></script>
    <script>
        $('.topproducts-slidee').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            responsiveClass: true,
            autoplay: true,
            stopOnHover: false,
            autoplayTimeout: 3000,
            nav: false,
            // navText: ["<div class='nav-button owl-prev'><img class='img-fluid' src='./images/right-long-solid.png' alt='icon'/></div>", "<div class='nav-button owl-next'><img class='img-fluid' src='./images/left-long-solid.png' alt='icon'/></div>"],
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 2,
                },
                1200: {
                    items: 2,
                },
                1400: {
                    items: 3,
                },

            }
        });
        $('.audio-slidee').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            center: true,
            responsiveClass: true,
            autoplay: true,
            stopOnHover: false,
            autoplayTimeout: 3000,
            nav: false,
            // navText: ["<div class='nav-button owl-prev'><img class='img-fluid' src='./images/right-long-solid.png' alt='icon'/></div>", "<div class='nav-button owl-next'><img class='img-fluid' src='./images/left-long-solid.png' alt='icon'/></div>"],
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 7,
                },

            }
        });
    </script>
  <script>
    const cookieBox = document.querySelector(".wrapper"),
    acceptBtn = cookieBox.querySelector("button");

    acceptBtn.onclick = ()=>{
      //setting cookie for 1 month, after one month it'll be expired automatically
      document.cookie = "CookieBy=CodingNepal; max-age="+60*60*24*30;
      if(document.cookie){ //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      }else{ //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("CookieBy=CodingNepal"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
  </script>    
</body>

</html><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/home.blade.php ENDPATH**/ ?>