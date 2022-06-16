
<?php $__env->startSection('content'); ?>
<?php if(Request::routeIs('allactivepost')): ?>
        <script>
		$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': true,
				'positionClass': 'toast-bottom-right',
                "preventDuplicates": false,
                "onclick": null,
				'showDuration': '10000',
				'hideDuration': '5000',
				'timeOut': '8000',
				'extendedTimeOut': '0',
				'tapToDismiss': false,
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}
		    <?php if($completeprofile < 100 && Auth::user()->profilepopup == 1): ?>
			toastr.error("Dear <?php echo e(Auth::user()->fname); ?>, Please complete your profile. Your profile completion progress is <span class='popupspan'><?php echo e($completeprofile); ?>%</span>  <br><a href='<?php echo e(URL::to('noagainprofilepopup')); ?>' class='skipancher'>Skip for 5 days</a><a href='<?php echo e(URL::to('profile')); ?>' class='popupeditprofilebtn'>Edit Profile</a>");
		    <?php endif; ?>
		    <?php if($totalpost == 0 && Auth::user()->firstpostpopup == 1): ?>
			toastr.error("Dear <?php echo e(Auth::user()->fname); ?>, You don't have upload any post yet.Please upload your first post thanks. <br><a href='<?php echo e(URL::to('noagainfirstpostpopup')); ?>' class='skipancher'>Skip for 5 days</a><a href='<?php echo e(URL::to('addpost')); ?>' class='popupeditprofilebtn'>Publish Post</a>");
		    <?php endif; ?>
		    
		});        
   
        </script> 
<?php endif; ?>
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    ?>
<style>


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
    /*height: 22px; */
    font-size: 14px; 
    line-height: 1.42857; 
    /*overflow: hidden;*/
    /*       overflow-wrap: normal;*/
    /*    text-overflow: ellipsis;*/
    /*    white-space: nowrap;*/
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

.data-list{
    overflow-y: hidden;
}
#view_type_sorting{
  font-family:"FontAwesome";
  font-size:14px;
}
#view_type_sorting::before{
  vertical-align:middle;
}




.filter-buttons {
  display: flex;
  margin-bottom: 10px;
  justify-content: flex-end;
  margin-top: 10px;
 
}


figure {
    border-radius: 5px;
    font-size: 15px;
    font-weight: 600;
    color: white;
    width: 100%;
    height: 250px;
    margin: 0;
    background: linear-gradient(356deg, black, transparent);
    overflow: hidden;
}
figure img {
	/*opacity: .5;*/
	width: 100%;
	    height: 100%;
	    object-fit: cover;
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
figure:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);
}
.like-post{
    color: #3bc0ff;
}
.notlike-post{
    color: #fff;
}
</style>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <!--<div class="row">-->
        <!--    <div class="col-12">-->
        <!--        <div class="page-title-box d-flex align-items-center justify-content-between">-->
        <!--            <h4 class="mb-0">Latest News</h4>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- end page title -->
         <!-- filter -->
        <div class="filterm">
             <button class="btnStats btn-success" style="border: none;"><i class="fa fa-filter" style="padding-right: 8px;" aria-hidden="true"></i>Filter</button>
             <a href="<?php echo e(URL::to('addpost')); ?>" class="btn-dark" style="border: none; float:right;padding: 1px 10px;">Add Post</a>
        </div>
        <form action="<?php echo e(URL::to('allactivepostt')); ?>" method="post" class="mainfilter dvStats" >
            <?php echo csrf_field(); ?>

        <div class="row mt-2" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '##061e2c'; } ?>; text-align:center;padding: 7px 0px;">
            <div class="col-xl-1 col-lg-1 btn-danger">
                 <a style="color: white;" href="<?php echo e(URL::to('allactivepost')); ?>" class="btn ">Clear</a>
            </div>
            <div class="col-xl-3 col-lg-3 forfilterm">
                <div class="m-0 form-group">
                    <select name="rating" class="form-select" id="view_type_sorting" aria-haspopup="true" aria-expanded="false">
                        <option style="color:#495057;" value="all" <?php if('all' == $rating): ?> selected <?php endif; ?>>Rating</option>
                        <option value="1" <?php if('1' == $rating): ?> selected <?php endif; ?>>1 Star</option> 
                        <option value="2"  <?php if('2' == $rating): ?> selected <?php endif; ?>>2 Stars</option>  
                        <option value="3" <?php if('3' == $rating): ?> selected <?php endif; ?>>3 Stars</option>  
                        <option value="4" <?php if('4' == $rating): ?> selected <?php endif; ?>>4 Stars</option> 
                        <option value="5" <?php if('5' == $rating): ?> selected <?php endif; ?>>5 Stars</option> 
                    </select>
                </div>
            </div>
            	<?php $countryy = DB::table('country')->get(); ?>
            <div class="col-xl-3 col-lg-3 forfilterm">
                <div class="m-0 form-group">
                    <select name="country" style=" font-family:FontAwesome;" class="form-select">
                        <option value="all" <?php if('all' == $country): ?> selected <?php endif; ?>>Country</option>
                        
                    <?php $__currentLoopData = $countryy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key->nicename); ?>" <?php if($key->nicename == $country): ?> selected <?php endif; ?>><?php echo e($key->nicename); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 forfilterm">
                <div class="m-0 form-group">
                    <select name="category" style=" font-family:FontAwesome;" class="form-select">
                        <option value="all" <?php if('all' == $country): ?> selected <?php endif; ?>>Category</option>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($key->id); ?>" <?php if($key->id == $category): ?> selected <?php endif; ?>><?php echo e($key->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="col-xl-1 col-lg-1 btn-success">
                <button style="color: white;" class="btn " type="submit">Filter </button>
            </div>
            <div class="col-xl-1 col-lg-1">
                 <a href="<?php echo e(URL::to('addpost')); ?>" class="btn btn-dark hideaddnews">+ Post</a>
            </div>
        </div>            
        </form>
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
            <div class="row mt-2" id="webviewfilter" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '#061e2c'; } ?>;">
                <div class="filter-buttons">
                    <button class="me-2 listview" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '#061e2c'; } ?>;border: none;color: #808087;"><i class="fa fa-bars" aria-hidden="true"></i></button>    
                    <button class="gridview" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '#061e2c'; } ?>;border: none;color: #808087;"><i class="fa fa-th-large" aria-hidden="true"></i></button>    
                </div>
            </div>    
            <div class="row newssearchbyinput" id="gridviewdetails">
                
                    <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <?php $cid = $key->category_id; $catdata = DB::table('product_category')->where('id',$cid)->first(); ?>
                          <div class="col-xl-4 col-lg-4 col-s-12 col-xs-12 mb-2" style="padding-right:0px;">
                            <figure><a href="<?php echo e(URL::to('singlenews/'.$key->id)); ?>"><img src="<?php echo e(asset('uploads/post/'.$key->image)); ?>"></a></figure>
                            <a style="position: absolute;bottom: 5px;font-size: 18px;color: white;padding: 0 10px;background: rgb(0 0 0 / 50%);font-weight: bold;letter-spacing: 0.5px;" href="<?php echo e(URL::to('singlenews/'.$key->id)); ?>"><?php echo e($key->heading); ?></a>
                            <div style="position: absolute;    top: 0;">
                                <a href="#"><span class="badge badge-soft-warning  font-size-10" style="background: #fc931d;color: #fff;margin-left: 10px;" ><?php echo e($key->country); ?></span></a>
                                <a href="#"><span class="badge badge-soft-primary  font-size-10" style="background: #2daae1;color: #fff;" ><?php echo e($catdata->name); ?></span></a>                                
                            </div>
                            <div style="position: absolute;top:3px;right: 8px; padding: 8px;" data-id="<?php echo e($key->id); ?>">
                                    <i id="like<?php echo e($key->id); ?>" class="fa fa-thumbs-up font-size-22 <?php echo e(\App\Helpers\Helper::UserHasLikePost($key->id) ? 'like-post' : 'notlike-post'); ?>"></i>
                            </div>
                          </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="mt-2 text-center" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '#061e2c'; } ?>;padding: 13px;">
                                No Result Found!
                        </div>
                    <?php endif; ?>
                        <div class="col-lg-12 mb-2" style="float:right;">
                            <?php echo $list->appends(Request::all())->onEachSide(1)->links(); ?>

                        </div> 
            </div>
            <div class="row" id="listviewdetails">
                <div class="col-xl-12 col-lg-12 newssearchbyinput" >
                <?php  $forlh=0;?>
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
                                            <?php $pid = $key->id; $rating = DB::select("SELECT round(AVG(value),1) as value FROM rating WHERE postid='$pid'"); ?>
                                            <div class="d-flex flex-row" style="    margin-top: 0.75rem!important; font-size:10px"> 
                        
                                                <span class="stars" data-rating="<?php echo e($rating[0]->value); ?>" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="<?php echo e($rating[0]->value); ?> out of 5"></span> (<?php echo e($totalrating); ?>)
                                                <div class="d-flex align-items-center" style="margin-left:10px;">
                                                     <span class="days-ago font-size-10"><?php echo e(Carbon\Carbon::parse($key->created_at)->diffForHumans()); ?></span>
                                                     <?php $totallike = DB::table('likes')->where('postid',$key->id)->count(); ?>                               
                                               <a href="#"><span class="badge badge-soft-success font-size-10" style="margin-left: 10px;" ><?php echo e($totallike); ?> Like</span></a>
                                               <?php $cid = $key->category_id; $catdata = DB::table('product_category')->where('id',$cid)->first(); ?>
                                               <span class="hideaddnews">
                                                <?php $totalcomment = DB::table('comments')->where('postid',$key->id)->count(); ?>           
                                               <a href="#"><span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" ><?php echo e($totalcomment); ?> <i class="fa fa-comment-o" aria-hidden="true"></i></span></a>
                                               <a href="#"><span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" ><?php echo e($catdata->name); ?></span></a>
                                               <a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" ><?php echo e($key->country); ?></span></a>
                                                </span>
                                                </div>
                                            </div>
                               
                                        </div>
                                    </div>
                                    <div class="col-lg-12 filterm" style="padding-left: 0;">
                                    <a href="#"><span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" ><?php echo e($totalcomment); ?> <i class="fa fa-comment-o" aria-hidden="true"></i></span></a>
                                    <a href="#"><span class="badge badge-soft-primary  font-size-10" ><?php echo e($catdata->name); ?></span></a>
                                    <a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" ><?php echo e($key->country); ?></span></a>
                                    </div>
                                </div>
                            </div> 
     

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="mt-2 text-center" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '#061e2c'; } ?>;padding: 13px;">
                                No Result Found!
                        </div>                
                <?php endif; ?>
                <div class="col-lg-12 mb-2" style="float:right;">
                   <?php echo $list->appends(Request::all())->onEachSide(1)->links(); ?>

                </div> 
            </div>
               </div> 

            <!-- Mobile List view-->
            <div class="row" id="mobilelistviewdetails">
                <div class="card  col-xl-12 col-lg-12 newssearchbyinput" >
            <!--<div class="row">-->
            <!--    <div class="filter-buttons">-->
            <!--        <button class="btn btn-success btn-sm me-2 listview"><i class="fa fa-bars" aria-hidden="true"></i></button>    -->
            <!--        <button class="btn btn-success btn-sm gridview"><i class="fa fa-th-large" aria-hidden="true"></i></button>    -->
            <!--    </div>-->
            <!--</div>-->
                <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
               
                           <div class="me-2 p-2 results" style="width:100%;  padding-bottom: 5px !important;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           <a style="color: gray;font-weight: bold;font-size: 14px;" href="<?php echo e(URL::to('viewprofile/'.$userdata->id)); ?>"><?php echo e($userdata->fname); ?> <?php echo e($userdata->lname); ?></a>
                                            <div>
                                                
                                                <div class="d-flex justify-content-between">
                                                    <a  style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 15px;font-weight: bold;margin-right: 5px;line-height: 1.1;" href="<?php echo e(URL::to('singlenews/'.$key->id)); ?>" class="mb-1"><?php echo e($key->heading); ?></a> 
                                                    <img src="<?php echo e(asset('uploads/post/'.$key->image)); ?>" style="width: 50px;height: auto;border-radius: 5px;" class="img-fluid" />
                                                </div>
        
                                            </div>
                                                               

                           
                               
                                        </div>
                                    </div>
                        
                                </div>
                            </div> 
     

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="mt-2 text-center" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '#061e2c'; } ?>;padding: 13px;">
                                No Result Found!
                        </div>                
                <?php endif; ?>
                <div class="col-lg-12 mb-2" style="float:right;">
                    <?php echo $list->appends(Request::all())->onEachSide(1)->links(); ?>

                </div> 
            </div>
               </div>                
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                <div class="row">
                <?php if($curlist != ''): ?>
                <div id="forhid" class="card scroll col-xl-12 col-lg-12" style="margin-top:10px; margin-bottom:0; padding-bottom:10px; border-radius: 5px;">
                <h6 style="padding: 5px 5px 0 0; zz">Watch List</h6>
                <?php $__currentLoopData = $exchangeRateswatchend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="owl-item" style="margin-top: 10px;">
                    <div class="pricing-item item" style="display: flex;height: 65px;color: white;background-image: linear-gradient(360deg, #003032, #1a4547); padding: 10px;">
                        <div style="width: 50%;">
                            <p style="padding: 0;margin: 0;font-size: 16px;">USD/<?php echo e($key); ?>

                            <?php $va = $value - $exchangeRatesstart[$key]; ?>
                           <?php $colorsss = '#82cc8d'; $charup='inline'; $chardown='inline';
                            if ( $va < 0 ) {
                                   $colorsss = '#c05e64';
                                   $charup='none';
                                }else{
                                   $chardown='none';
                                };
                                $forlh++;
                                ?>
                            <span class="blink" style="display:<?php echo $charup; ?>; color: <?php echo $colorsss; ?>;">▲</span>
                            <span class="blinkdown" style="display:<?php echo $chardown; ?>; color: <?php echo $colorsss; ?>; ">▼</span></p>
                            <a style="font-size: 10px;padding: 1px 4px;margin: auto; color:white; background:#fc931d;" href="<?php echo e(URL::to('addtowatchlistremove/'.$key)); ?>">Remove</a>
                        </div>
                        <div style="width: 50%;text-align: right;">
                            <p style="padding: 0;margin: 0;font-size: 16px;"><?php echo e(round($value,2)); ?></p>
                            <?php $perc = $va / $value*100; ?>
                            <?php $color = '#82cc8d'; $finalperc = 100 -  $perc;
                            if ( $perc < 0 ) {
                                   $color = '#c05e64';
                                };
                            
                            ?>
                            <p style="font-size: 10px; color:<?php echo $color; ?>; margin: 0;"><?php echo e(round($perc,4)); ?>%</p>
                        </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>                    
                <?php endif; ?>
                
                
                <?php $finalh=$forlh*70+60;
                $finalh=1350-$finalh?>
                
                <div id="cdemo"class="card scroll col-xl-12 col-lg-12" style=" height:<?php echo $finalh?>px;margin-top:10px;border-radius: 5px;">
                <h6 style="padding: 5px 5px 0 0;">USD Exchange Rates</h6>
                <ul style="padding:0; margin-bottom:0;" class="data-list" data-autoscroll>   
                <?php $__currentLoopData = $exchangeRatesend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $cur = $key;
                    $curcheckexist = DB::table('watch_list')->where('userid',Auth::id())->where('currency',$key)->first();
                ?>  
                    <li class="owl-item" style="margin-top: 10px;list-style: none;">
                    <div class="pricing-item item" style="display: flex;height: 65px;color: white;background-image: linear-gradient(360deg, #003032, #1a4547); padding: 10px;">
                        <div style="width: 50%;">
                            <p style="padding: 0;margin: 0;font-size: 16px;">USD/<?php echo e($key); ?>

                            <?php $va = $value - $exchangeRatesstart[$key]; ?>
                            
                           <?php $colorsss = '#82cc8d'; $charup='inline'; $chardown='inline';
                            if ( $va < 0 ) {
                                   $colorsss = '#c05e64';
                                   $charup='none';
                                }else{
                                   $chardown='none';
                                };
                                ?>
                            <span class="blink" style="display:<?php echo $charup; ?>; color: <?php echo $colorsss; ?>;">▲</span>
                            <span class="blinkdown" style="display:<?php echo $chardown; ?>; color: <?php echo $colorsss; ?>;">▼</span></p>
                            <?php if($curcheckexist == ''): ?>
                            <a style="color:white; font-size: 10px;padding: 1px 4px;margin: auto;background: #2daae1;" href="<?php echo e(URL::to('addtowatchlist/'.$key)); ?>">Add to watchlist</a>
                            <?php else: ?>
                            <a style="font-size: 10px;padding: 1px 4px;margin: auto; color:white; background:#fc931d;" href="<?php echo e(URL::to('addtowatchlistremove/'.$key)); ?>">Remove</a>
                            <?php endif; ?>
                        </div>
                        <div style="width: 50%;text-align: right;">
                            <p style="padding: 0;margin: 0;font-size: 16px;"><?php echo e(round($value,2)); ?></p>
                            <?php $perc = $va / $value*100; ?>
                            <?php $color = '#82cc8d'; $finalperc = 100 -  $perc;
                            if ( $perc < 0 ) {
                                   $color = '#c05e64';
                                };
                            
                            ?>
                            <p style="font-size: 10px; color:<?php echo $color; ?>; margin: 0;"><?php echo e(round($perc,4)); ?>%</p>
                        </div>
                        </div>
                    </li>    
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <p style="margin: 0;text-align: right;">Delayed   Quote</p>
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
                if(rating == 5.0){
                    var fullStar = new Array(Math.floor(5+1)).join('<i style="color: #d7b50e;" class="fas fa-star"></i>');
                }else if(rating == 3.0){
                    var fullStar = new Array(Math.floor(3+1)).join('<i style="color: #d7b50e;" class="fas fa-star"></i>');
                }
                else if(rating == 4.0){
                    var fullStar = new Array(Math.floor(4+1)).join('<i style="color: #d7b50e;" class="fas fa-star"></i>');
                }else if(rating == 2.0){
                    var fullStar = new Array(Math.floor(2+1)).join('<i style="color: #d7b50e;" class="fas fa-star"></i>');
                }else if(rating == 1.0){
                    var fullStar = new Array(Math.floor(1+1)).join('<i style="color: #d7b50e;" class="fas fa-star"></i>');
                }else{
                        var fullStar = new Array(Math.floor(rating + 1)).join('<i style="color: #d7b50e;" class="fas fa-star"></i>');
                } 
                var halfStar = ((rating%1) !== 0) ? '<i style="color: #d7b50e;" class="fas fa-star-half-alt"></i>': '';
                var noStar = new Array(Math.floor($(this).data("numStars") + 1 - rating)).join('<i style="color: #d7b50e;" class="far fa-star"></i>');
                $(this).html(fullStar + halfStar + noStar);
            });
        }
            $(function(){
                $('.stars').stars();
            });
        </script>
        
        <script>
$(document).ready(function(){
    <?php if($defaultview == 'list'): ?>
        $("#gridviewdetails").hide();
            var w = window.innerWidth;
    if(w > 420){
         $("#listviewdetails").css('display','block');
         $("#mobilelistviewdetails").css('display','none');
    }else{
        $("#listviewdetails").css('display','none');
       $("#mobilelistviewdetails").css('display','block'); 
    }
        
    <?php else: ?>
        $("#listviewdetails").hide();
        $("#mobilelistviewdetails").css('display','none');
        
    <?php endif; ?>
    
    
   
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
        } else {forhid
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });
});
// $("#btnStats").click($("#dvStats").style.display="block");
$(".btnStats").click(function() {
  
   var lable = $(".btnStats").text().trim();

   if(lable == "Hide") {
     $(".btnStats").text("Filter");
     $(".dvStats").hide();
   }
   else {
     $(".btnStats").text("Hide");
     $(".dvStats").show();
   }
    
  });
$(".listview").click(function() {
    var w = window.innerWidth;
    if(w > 420){
         $("#listviewdetails").css('display','block');
    }else{
       $("#mobilelistviewdetails").css('display','block'); 
    }
   
    $("#gridviewdetails").css('display','none');
    $.ajax({
        type:"post",
        url:'<?php echo e(URL::to('savepostview')); ?>',
        data: { "_token": "<?php echo e(csrf_token()); ?>","view": "list"},
        datatype:"html",
        success:function(data)
        {
            
        }
    });      
});  
$(".gridview").click(function() {
    $("#listviewdetails").css('display','none');
    $("#mobilelistviewdetails").css('display','none');
    $("#gridviewdetails").css('display','flex');
    $.ajax({
        type:"post",
        url:'<?php echo e(URL::to('savepostview')); ?>',
        data: { "_token": "<?php echo e(csrf_token()); ?>","view": "grid"},
        datatype:"html",
        success:function(data)
        {
            
        }
    });    
});  
</script>
<script type="text/javascript">
    $(document).ready(function() {     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.like-post', function() {
            var id = $(this).parents("div").data('id');
            $(this).removeClass("like-post");
            $(this).addClass("notlike-post");
            
            $.ajax({
               type:'GET',
               url:'/unlikebyajax/'+id,
               success:function(data){
               }
            });
        });
        $(document).on('click', '.notlike-post', function() {
            var id = $(this).parents("div").data('id');
            $(this).removeClass("notlike-post");
            $(this).addClass("like-post");
            
            $.ajax({
               type:'GET',
               url:'/addlikebyajax/'+id,
               success:function(data){
               }
            });
        });      

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
    }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\liverm\resources\views/dashboard/posts/viewallpost.blade.php ENDPATH**/ ?>