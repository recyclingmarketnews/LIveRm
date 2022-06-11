
<?php $__env->startSection('content'); ?>
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
</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">User Details</h4>
                                </div>
                            </div>
                        </div>
				<!-- breadcrumb -->
				<?php if($alertFm = Session::get('message')): ?>
                    <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">
                        <strong><?php echo e($alertFm); ?></strong>
                    </div>
                <?php endif; ?>
				<!-- row -->
                        <div class="row mb-4">
                            <div class="col-lg-7">
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="profile-user" style="padding:0 !important;">  <img src="<?php echo e(asset('uploads/userbimg/'.$data->bimage)); ?>" alt="" style="width: 950px;padding:0 !important;" class="avatar-lg img-fluid"> </div>
                                    <div class="card-body">
                                        <div class="profile-content">
                                            <div class="profile-user-img">
                                                <img src="<?php echo e(asset('uploads/userimg/'.$data->image)); ?>" alt="" class="avatar-lg img-thumbnail">
                                            </div>
                                            <?php $uid = $data->id; $rating = DB::select("SELECT ifnull(round(avg(ifnull(rating.value,0)),1),0) as ratingval FROM news_list
                                                                                        join rating on rating.postid = news_list.id
                                                                                        WHERE news_list.userid ='$uid'"); ?>
                                            <div class="d-flex align-items-center justify-content-between">                                            
                                            <h5 class="mt-3 mb-1 me-2"><?php echo e($data->fname.' '.$data->lname); ?> (<?php echo e($data->user_value); ?>) <span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" ><?php echo e($data->country); ?></span>
                                             <span class="badge badge-soft-primary tooltipp font-size-10" style="margin-left: 10px;" >
                                            <?php $specialarray = json_decode($data->specialist); $c = count($specialarray); ?>
                                                
                                                <?php $i = 0; ?>
                                                <?php $__currentLoopData = $specialarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($i < 1): ?>
                                                    <?php echo e($v); ?> 
                                                    <?php endif; ?>
                                                    <?php $i++ ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php $i = 0; ?>
                                                <?php if(count($specialarray)>1): ?>
                                                <div class="tooltipp">+<span class="tooltiptext"><?php $__currentLoopData = $specialarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php $i++?> <?php echo e($v); ?>, <?php if($i==2): ?>
                                                    <br> 
                                                    <?php endif; ?>  
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
                                            </div>
                                            <?php endif; ?>
                                             </span>  
                                            
                                            </h5> 
                                            <div>
                                                <span class="stars mt-3 me-1" data-rating="<?php echo e($rating[0]->ratingval); ?>" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="<?php echo e($rating[0]->ratingval); ?> out of 5"></span> <span class="mt-3">(<?php echo e($rating[0]->ratingval); ?>)</span>
                                            </div>
                                            
                                            </div>
                                            
                                            <?php if($data->user_type == 1): ?>
                                                <p class="text-muted"><?php echo e(count($followerlist)); ?> Follower . <?php echo e(count($followlist)); ?> Following</p>
                                            <?php elseif($data->user_type == 2): ?>
                                                <p class="text-muted"><?php echo e(count($followerlist)); ?> Follower . <?php echo e(count($followlist)); ?> Following</p> 
                                            <?php else: ?>
                                                <p class="text-muted"><?php echo e(count($followerlist)); ?> Follower . <?php echo e(count($followlist)); ?> Following</p>
                                            <?php endif; ?>
                                            
                                            
                                                <p class="text-muted mb-1"><?php echo e($data->bio); ?></p>
                                             
                                                    <?php if(Auth::id() != $data->id): ?>
                                                    <?php if(in_array($data->id, $followsarray)): ?>
                                                    <a href="<?php echo e(URL::to('unfollow/'.$data->id)); ?>" class="btn btn-primary btn-sm" style="border-radius:34px">Unfollow</a>
                                                    <?php else: ?>
                                                     <a href="<?php echo e(URL::to('savefollow/'.$data->id)); ?>" class="btn btn-primary btn-sm" style="border-radius:34px">+ Follow</a>
                                                    <?php endif; ?>  
                                                    <?php endif; ?>
                                        
                                               <?php if($data->facebook): ?> <a target="_blank" href="<?php echo e($data->facebook); ?>"><i class="fa fa-facebook-official" aria-hidden="true" style="float: right;font-size: 28px;color: #3980c0; padding: 0 5px;"></i></a><?php endif; ?>
                                                <?php if($data->instagram): ?><a target="_blank" href="<?php echo e($data->instagram); ?>"><i class="fa fa-twitter-square" aria-hidden="true" style="float: right;font-size: 28px;color: #3980c0; padding: 0 5px;"></i></a><?php endif; ?>
                                                <?php if($data->linkedin): ?><a target="_blank" href="<?php echo e($data->linkedin); ?>"><i class="fa fa-linkedin-square" aria-hidden="true" style="float: right;font-size: 28px;color: #3980c0; padding: 0 5px;"></i></a><?php endif; ?>
                                                
                                            
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            <?php if($data->user_value == 'individual'): ?>
                            <div class="col-xl-12 mb-2">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->

                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">Education</h5>

                                                    <ul class="activity-feed mb-0 ps-2">
                                                        <?php $__empty_1 = true; $__currentLoopData = $edu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <li class="feed-item">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1"><?php echo e($key->start); ?> - <?php echo e($key->end); ?></p>
                                                                <h5 class="font-size-15"><?php echo e($key->degree); ?></h5>
                                                                <p><?php echo e($key->school); ?></p>
                                                                <p class="text-muted"><?php echo e($key->fieldofstudy); ?></p>
                                                            </div>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-xl-12">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->

                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">Work History</h5>

                                                    <ul class="activity-feed mb-0 ps-2">
                                                        <?php $__empty_1 = true; $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <li class="feed-item">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1"><?php echo e($key->start); ?> - <?php if($key->currently != ''): ?> Currently Working <?php else: ?> <?php echo e($key->end); ?> <?php endif; ?></p>
                                                                <h5 class="font-size-15"><?php echo e($key->desognation); ?></h5>
                                                                <p><?php echo e($key->company); ?></p>
                                                                <p class="text-muted"><?php echo e($key->responsibility); ?></p>
                                                            </div>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <?php endif; ?>
                            <?php if($data->user_value == 'company'): ?>
                            <div class="col-xl-12 mb-2">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->

                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">We are Specialist in </h5>

                                                    <ul class="activity-feed mb-3 ps-2 d-xl-flex d-block">
                                                        <?php $__currentLoopData = $specialarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="com-feed-item mb-2"><?php echo e($v); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="com-feed-item">Glass</li>
                                                        <li class="com-feed-item">Cardboard</li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Marketing Contact Details </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:flex;">
                                                        <li class="feed-item border-0"><?php echo e($data->marketing_contact_detail); ?></li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Press Contact Details </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:flex;">
                                                        <li class="feed-item border-0"><?php echo e($data->press_contact_detail); ?></li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Sales Contact Details </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:block;">
                                                        <li class="feed-item border-0"><?php echo e($data->sales_contact_details); ?></li>
                                                        <li class="feed-item border-0"><?php echo e($data->saleperson_name); ?></li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Website Address </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:flex;">
                                                        <li class="feed-item border-0"><?php echo e($data->website_address); ?></li>
                                                    </ul>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php endif; ?>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
            <div class="col-xl-12 col-lg-12 card p-3" style="margin-top: 10px;">
                <h5 class="font-size-16 ">User Posts</h5>
                <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php $totalrating = DB::table('rating')->where('postid',$key->id)->count(); ?>
                           <div class="card me-2 p-3" style="width:100%; margin-top:10px;    padding-bottom: 5px !important;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <div style="margin-right:12px;">
                                                    <a href="<?php echo e(URL::to('viewprofile/'.$userdata->id)); ?>"><img src="<?php echo e(asset('uploads/userimg/'.$userdata->image)); ?>" class="imagefff img-fluid" /></a>
                                                    </div>
                                               <div class="textwrapp"><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 15px;font-weight: bold;" href="<?php echo e(URL::to('singlenews/'.$key->id)); ?>" class="mb-1"><?php echo e($key->heading); ?> </a> </div>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
                                            </div>
                
                                            <div class="d-flex flex-row" style="    margin-top: 0.75rem!important;"> 
                                            <?php $pid = $key->id; $rating = DB::select("SELECT AVG(value) as value FROM rating WHERE postid='$pid'"); ?>
                                                <span class="stars" data-rating="<?php echo e($rating[0]->value); ?>" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="<?php echo e($rating[0]->value); ?> out of 5"></span> (<?php echo e($totalrating); ?>) 
                                                <div class="d-flex flex-column" style="margin-left:10px;">
                                                     <span class="days-ago"><?php echo e(Carbon\Carbon::parse($key->created_at)->diffForHumans()); ?></span>
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
        <div class="row">
            <div class="col-xl-12 col-lg-12 card p-3">
            <h5>My Following (<?php echo e(count($followlist)); ?>)</h5>
                <?php $__empty_1 = true; $__currentLoopData = $followlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                           <div class="card me-2 p-3" style="width:100%; margin-top:10px;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->publisherid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <div style="margin-right:12px;">
                                                    <a href="<?php echo e(URL::to('viewprofile/'.$userdata->id)); ?>"><img src="<?php echo e(asset('uploads/userimg/'.$userdata->image)); ?>" class="imagefff img-fluid" /></a>
                                                    </div>
                                               <div><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 14px;font-weight: bold;" href="<?php echo e(URL::to('viewprofile/'.$userdata->id)); ?>" class="mb-1"><?php echo e($userdata->fname.' '.$userdata->lname); ?> </a> </div>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
                                            </div>

                                            
                               
                                        </div>
                                    </div>
                                </div>
                            </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>                                  
                            </div>
                          
                        </div>

				</div>
			</div>



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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnewstrial.com/resources/views/dashboard/profileview.blade.php ENDPATH**/ ?>