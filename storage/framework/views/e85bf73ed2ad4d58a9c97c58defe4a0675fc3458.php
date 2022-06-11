
<?php $__env->startSection('content'); ?>
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    ?>
<style>

.scroll {
  -ms-overflow-style: none; /* for Internet Explorer, Edge */
  scrollbar-width: none; /* for Firefox */
  overflow-y: scroll; 
}

.scroll::-webkit-scrollbar {
  display: none; /* for Chrome, Safari, and Opera */
}


.user-timing {
    right: 9px;
    bottom: 9px;
    color: #fff
}

.views-content {
    color: #606271
}

.views {
    font-size: 12px
}

.dots {
    display: flex;
    height: 10px;
    width: 10px;
    background-color: green;
    border-radius: 50%;
    margin-left: 5px;
    margin-bottom: 6px
}

.days-ago {
   
    color: #606271
}

.snipimage img {
    height: 150px
}

.imagefff{
    border-radius: 86px;
    width: 18px;
    
    max-width: 18px;

    height: 18px;
}
nav{
    margin-bottom: 42px;
    float:right;
}

   .textwrapp{
    position: relative;
    height: 22px; 
    font-size: 14px; 
    line-height: 1.42857; 
    overflow: hidden;
           overflow-wrap: normal;
        text-overflow: ellipsis;
        white-space: nowrap;
    margin-bottom: 0;
} 
.blink {
        animation: blink-animation 1s steps(10, start) infinite;
        -webkit-animation: blink-animation 1s steps(10, start) infinite;
      }
.blinkdown {
        animation: blink-animation 1s steps(5, start) infinite;
        -webkit-animation: blink-animation 1s steps(5, start) infinite;
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

/**
 * CSS style for carouselTicker
 **/

.carouselTicker__list {
  margin: 10px 0;
  padding: 0;
  list-style-type: none;
  overflow: hidden;
}

.carouselTicker__item {
margin: 0 0 0 8px;
  float: left;
border-radius: 8px;
background-color:#003032;
color: white;
width: 150px;
  height: 60px;
  line-height: 26px;
  text-align: center;
padding: 3px;
}

.carouselTicker__loader {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: #fff url("../images/loader.gif") center center no-repeat;
}

/**
 * CSS style for vertical direction
 **/

.carouselTicker_vertical .carouselTicker__list {
  margin: 0;
}

.carouselTicker_vertical .carouselTicker__item {
  margin: 0 0 8px 0;
  border-radius: 8px;
  background-color:#003032;
  color: white;
  width: 150px;
  height: 60px;
  line-height: 60px;
  text-align: center;
}

#carouselTicker .carouselTicker__item,
#carouselTicker-destructor-example .carouselTicker__item,
#carouselTicker-buttons-controls-example .carouselTicker__item {
  width: auto;
  height: auto;
  line-height: normal;
}

.carouselTicker__item img {
  vertical-align: top;
}


</style>
<div class="main-content">

<div class="page-content" style="padding: 25px 0 24px 0;">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Latest News</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <form action="<?php echo e(URL::to('allactivepostt')); ?>" method="post">
            <?php echo csrf_field(); ?>

        <div class="row mt-2" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '##061e2c'; } ?>; text-align:center;margin:auto;padding: 7px 0px;">
            <div class="col-xl-1 col-lg-1">
                 <a href="<?php echo e(URL::to('allactivepost')); ?>" class="btn btn-danger">Clear</a>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="m-0 form-group">
                    <select name="rating" class="form-select">
                        <option value="all" <?php if('all' == $rating): ?> selected <?php endif; ?>>Rating</option>
                        <option value="1" <?php if('1' == $rating): ?> selected <?php endif; ?>>1</option> 
                        <option value="2"  <?php if('2' == $rating): ?> selected <?php endif; ?>>2</option>  
                        <option value="3" <?php if('3' == $rating): ?> selected <?php endif; ?>>3</option>  
                        <option value="4" <?php if('4' == $rating): ?> selected <?php endif; ?>>4</option> 
                        <option value="5" <?php if('5' == $rating): ?> selected <?php endif; ?>>5</option> 
                    </select>
                </div>
            </div>
            	<?php $countryy = DB::table('country')->get(); ?>
            <div class="col-xl-3 col-lg-3">
                <div class="m-0 form-group">
                    <select name="country" class="form-select">
                        <option value="all" <?php if('all' == $country): ?> selected <?php endif; ?>>Country</option>
                        
<?php $__currentLoopData = $countryy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($key->nicename); ?>" <?php if($key->nicename == $country): ?> selected <?php endif; ?>><?php echo e($key->nicename); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="m-0 form-group">
                    <select name="category" class="form-select">
                        <option value="all" <?php if('all' == $country): ?> selected <?php endif; ?>>Category</option>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($key->id); ?>" <?php if($key->id == $category): ?> selected <?php endif; ?>><?php echo e($key->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2">
                <button class="btn btn-success" type="submit">Apply Filter </button>
            </div>
        </div>            
        </form>
        <div class="row">
            <div class="col-xl-12 col-lg-12" style="height: 70px; overflow:hidden">
                <div class="carouselTicker carouselTicker-start">
                    <ul class="carouselTicker__list">
					    <?php $__currentLoopData = $exchangeRatesOil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="carouselTicker__item">

											<p class="mb-1 tx-13"><?php echo e($key); ?></p>
											<div class="m-0 tx-13 text-warning"><?php echo e(round($value,3)); ?></div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
               <div class="row">
                               <div class="col-xl-12 col-lg-12" id="results">
                <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php $totalrating = DB::table('rating')->where('postid',$key->id)->count(); ?>
                           <div class="card me-2 p-3 results" style="width:100%; margin-top:10px;    padding-bottom: 5px !important;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <span style="margin-right:12px;">
                                                    <a href="<?php echo e(URL::to('viewprofile/'.$userdata->id)); ?>"><img src="<?php echo e(asset('uploads/userimg/'.$userdata->image)); ?>" class="imagefff img-fluid" /></a>
                                                    </span>
                                               <div class="textwrapp"><a  style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 15px;font-weight: bold;" href="<?php echo e(URL::to('singlenews/'.$key->id)); ?>" class="mb-1"><?php echo e($key->heading); ?> </a> 
                </div>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
                                            </div>
                                            <div class="modal fade" id="modaldemo<?php echo e($key->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e($key->heading); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 mb-3">
                                                        <img width="100%" height="60px" alt="avatar" class="img-fluid" src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                                    </div>
                                                    <div class="col-lg-12 mb-1">
                                                        <?php echo e($userdata->fname.' '.$userdata->lname); ?>

                                                        
                                                        <?php if(in_array($userdata->id, $followsarray)): ?>
                                                        <a href="<?php echo e(URL::to('unfollow/'.$userdata->id)); ?>"><span class="badge badge-soft-success font-size-14" >Unfollow</span></a>
                                                        <?php else: ?>
                                                         <a href="<?php echo e(URL::to('savefollow/'.$userdata->id)); ?>"><span class="badge badge-soft-success font-size-14" >Add Follow</span></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <p><?php echo e($key->description); ?></p>
                                                    </div>
                                                    <div class="col-lg-12 mb-3" >
                                                        <a style="position: absolute;right: 18px;bottom: 9px;" target="_blank" href="<?php echo e($key->link); ?>"><strong style="color: #1abe7f;">Read More</strong></a>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>                                            
                                            </div>                                            
                                            <!-- <div class="d-flex justify-content-md-start justify-content-between views-content mt-2">
                                                <div class="d-flex flex-row align-items-center"> <i class="fa fa-eye"></i> <span class="ms-1 views">453674</span> </div>
                                                <div class="d-flex flex-row align-items-center ms-2"> <i class="fa fa-heart"></i> <span class="ms-1 views">4565</span> </div>
                                            </div>
                                             -->
                                            <!-- <div style="overflow: hidden;height:50px; text-overflow: ellipsis;">-->
                                            <!--    <?php echo e($key->description); ?>-->
                                            <!--</div>-->
                                            <?php $pid = $key->id; $rating = DB::select("SELECT AVG(value) as value FROM rating WHERE postid='$pid'"); ?>
                                            <div class="d-flex flex-row" style="    margin-top: 0.75rem!important; font-size:10px"> 
                        
                                                <span class="stars" data-rating="<?php echo e($rating[0]->value); ?>" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="<?php echo e($rating[0]->value); ?> out of 5"></span> (<?php echo e($totalrating); ?>)
                                                <div class="d-flex align-items-center" style="margin-left:10px;">
                                                     <span class="days-ago font-size-10"><?php echo e(Carbon\Carbon::parse($key->created_at)->diffForHumans()); ?></span>
                                                     <?php $totallike = DB::table('likes')->where('postid',$key->id)->count(); ?>                               
                                               <a href="#"><span class="badge badge-soft-success font-size-10" style="margin-left: 10px;" ><?php echo e($totallike); ?> Like</span></a>
                                               <?php $cid = $key->category_id; $catdata = DB::table('product_category')->where('id',$cid)->first(); ?>
                                               <a href="#"><span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" ><?php echo e($catdata->name); ?></span></a>
                                               <a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" ><?php echo e($userdata->country); ?></span></a>
                                                    <!--<div style="bottom:0; right:0; position:absolute;">-->
                                                    <!--    <a target="_blank" href="<?php echo e($key->link); ?>"><strong style="color: #1abe7f;">Read More</strong></a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                               
                                        </div>
                                    </div>
                                </div>
                            </div> 
     

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                <div class="col-lg-12 mb-2" style="float:right;">
                    <?php echo $list->appends(Request::all())->links(); ?>

                </div> 
            </div>
               </div> 
            </div>
            <div class="col-3">
                <div class="row">
                <?php if($curlist != ''): ?>
                <div class="card scroll col-xl-12 col-lg-12" style="margin-top:10px; margin-bottom:0; padding-bottom:10px; border-radius: 5px;">
                
                <?php $__currentLoopData = $exchangeRateswatchend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="owl-item" style="margin-top: 10px;" >
                    <div class="pricing-item item" style="display: flex;align-items: center;border-radius: 5px;background-color: #003032;padding: 10px 10px;margin: 0 auto;">
                        <!--<smal class=""><img width="35" class="img-fluid" src="https://hamhab.com/gsp/public/front/images/decred.svg" alt="icon"></smal>-->
                            <p style="color:white;margin: 0;">USD/<?php echo e($key); ?></p> 
                            <?php $va = $value - $exchangeRatesstart[$key]; ?>
                           <?php $colorsss = '#08c18d'; $charup='inline'; $chardown='inline';
                            if ( $va < 0 ) {
                                   $colorsss = '#ff2a15';
                                   $charup='none';
                                }else{
                                   $chardown='none';
                                };
                                ?>
                            <span class="blink" style="display:<?php echo $charup; ?>; color: <?php echo $colorsss; ?>; margin-left: 2px;">▲</span></p>
                            <span class="blinkdown" style="display:<?php echo $chardown; ?>; color: <?php echo $colorsss; ?>; margin-left: 2px;">▼</span></p>
                            
                            
                            <p style="color:white;margin: auto;" ><?php echo e(round($value,2)); ?></p>
                            <?php $perc = $va / $value*100; ?>
                            <?php $color = '#08c18d'; $finalperc = 100 -  $perc;
                            if ( $perc < 0 ) {
                                   $color = '#ff2a15';
                                };
                            
                            ?>
                            <a style="background: #ff2a15;border-radius: 27px;padding: 3px 12px;color:#fff;margin-right:7px;" href="<?php echo e(URL::to('addtowatchlistremove/'.$key)); ?>">-</a>
                            <p class="m-0 fontsize14 " style="width: 80px; text-align: center; padding: 3px 0;background: <?php echo $color; ?>;border-radius: 15px;color: white!important"><?php echo e(round($perc,4)); ?>%</p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>                    
                <?php endif; ?>
                <div class="card scroll col-xl-12 col-lg-12" style="height:1351px; margin-top:10px;border-radius: 5px;">
                
                <?php $__currentLoopData = $exchangeRatesend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $cur = $key;
                    $curcheckexist = DB::table('watch_list')->where('userid',Auth::id())->where('currency',$key)->first();
                ?>
                <div class="owl-item" style="margin-top: 10px;" >
                    <div class="pricing-item item" style="display: flex;align-items: center;border-radius: 5px;background-color: #003032;padding: 10px 10px;margin: 0 auto;">
                        <!--<smal class=""><img width="35" class="img-fluid" src="https://hamhab.com/gsp/public/front/images/decred.svg" alt="icon"></smal>-->
                            <p style="color:white;margin: 0;">USD/<?php echo e($key); ?></p> 
                            <?php $va = $value - $exchangeRatesstart[$key]; ?>
                           <?php $colorsss = '#08c18d'; $charup='inline'; $chardown='inline';
                            if ( $va < 0 ) {
                                   $colorsss = '#ff2a15';
                                   $charup='none';
                                }else{
                                   $chardown='none';
                                };
                                ?>
                            <span class="blink" style="display:<?php echo $charup; ?>; color: <?php echo $colorsss; ?>; margin-left: 2px;">▲</span></p>
                            <span class="blinkdown" style="display:<?php echo $chardown; ?>; color: <?php echo $colorsss; ?>; margin-left: 2px;">▼</span></p>
                            
                            
                            <p style="color:white;margin: auto;" ><?php echo e(round($value,2)); ?></p>
                            <?php $perc = $va / $value*100; ?>
                            <?php $color = '#08c18d'; $finalperc = 100 -  $perc;
                            if ( $perc < 0 ) {
                                   $color = '#ff2a15';
                                };
                            
                            ?>
                            <?php if($curcheckexist == ''): ?>
                            <a style="background: #08c18d;border-radius: 27px;padding: 3px 12px;color:#fff;margin-right:7px;" href="<?php echo e(URL::to('addtowatchlist/'.$key)); ?>">+</a>
                            <?php endif; ?>
                            <p class="m-0 fontsize14 " style="width: 80px; text-align: center; padding: 3px 0;background: <?php echo $color; ?>;border-radius: 15px;color: white!important"><?php echo e(round($perc,4)); ?>%</p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                </div>                
            </div>

            
        </div>    

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

        <script>
        
        $.fn.stars = function() {
            return $(this).each(function() {
                var rating = $(this).data("rating");
                var fullStar = new Array(Math.floor(rating + 1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                var halfStar = ((rating%1) !== 0) ? '<i style="color: #d7b50e;" class="fa fa-star-half-o"></i>': '';
                var noStar = new Array(Math.floor($(this).data("numStars") + 1 - rating)).join('<i style="color: #d7b50e;" class="fa fa-star-o"></i>');
                $(this).html(fullStar + halfStar + noStar);
            });
        }
            $(function(){
                $('.stars').stars();
            });
        </script>
        <script>
$(document).ready(function(){
    $(".myInput").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results div').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });
});
</script>
<script>
    (function ($, undefined) {
  $(window).on("load", function () {
    $("#carouselTicker").carouselTicker();

    var carouselForDescructor = $(
      "#carouselTicker-destructor-example"
    ).carouselTicker();

    var destroyBtn = $("#destory-carouselTicker");
    var carouselForDescructorRunning = true;

    destroyBtn.on("click", function () {
      if (carouselForDescructorRunning) {
        carouselForDescructor.destructor();
        carouselForDescructorRunning = false;
        $(this).text("Start");
      } else {
        carouselForDescructor = $(
          "#carouselTicker-destructor-example"
        ).carouselTicker();
        carouselForDescructorRunning = true;
        $(this).text("Destroy");
      }
    });
  });

  $(".carouselTicker-start").carouselTicker({
    direction: "next",
  });

  var carouselTickerWidthResize = $(
    "#carouselTicker-width-resize"
  ).carouselTicker();

  $(window).on("resize", function () {
    carouselTickerWidthResize.resizeTicker();
  });

  $("#carouselTicker-vertical").carouselTicker({
    mode: "vertical",
    direction: "prev",
  });

  $("#carouselTicker-vertical-with-callback").carouselTicker({
    mode: "vertical",
    direction: "next",
    onCarouselTickerLoad: function () {
      console.log("callback");
    },
  });

  /**
   * Start Carousel with buttons control
   */
  var carouselTickerButtonsControls = $(
    "#carouselTicker-buttons-controls-example"
  ).carouselTicker();

  var buttonPrev = $("#carouselTicker-buttons-controls-prev");
  var buttonNext = $("#carouselTicker-buttons-controls-next");
  var buttonStop = $("#carouselTicker-buttons-controls-stop");

  buttonPrev.on("click", function () {
    carouselTickerButtonsControls.prev();
  });

  buttonNext.on("click", function () {
    carouselTickerButtonsControls.next();
  });

  buttonStop.on("click", function () {
    carouselTickerButtonsControls.stop();
  });
  /**
   * End Carousel with buttons control
   */
})(jQuery);

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/posts/viewallpost.blade.php ENDPATH**/ ?>