
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
    height: 18px;
}
</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">My Follower List</h4>
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
                            <div class="col-lg-12">
        <div class="row">
            <div class="col-xl-12 col-lg-12 p-3">
                <?php $__empty_1 = true; $__currentLoopData = $followlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $uid = $key->id; $rating = DB::select("SELECT ifnull(round(avg(ifnull(rating.value,0)),1),0) as ratingval FROM news_list
                                                    join rating on rating.postid = news_list.id
                                                    WHERE news_list.userid ='$uid'"); ?>                  
                           <div class="card me-2 p-3" style="width:100%; margin-top:10px;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                            <div class="d-flex  align-items-center">
                                                    <span style="margin-right:12px;">
                                                    <a href="<?php echo e(URL::to('viewprofile/'.$userdata->id)); ?>"><img src="<?php echo e(asset('uploads/userimg/'.$userdata->image)); ?>" class="imagefff img-fluid" /></a>
                                                    </span>
                                               <span><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 14px;font-weight: bold;" href="<?php echo e(URL::to('viewprofile/'.$key->id)); ?>" class="mb-1"><?php echo e($userdata->fname.' '.$userdata->lname); ?> </a> </span>
                                               &nbsp&nbsp&nbsp  <span class="stars me-1 font-size-10" data-rating="<?php echo e($rating[0]->ratingval); ?>" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="<?php echo e($rating[0]->ratingval); ?> out of 5"></span> <span class="font-size-10">(<?php echo e($rating[0]->ratingval); ?>)</span>
                                               <span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" ><?php echo e($userdata->country); ?></span>
                                               <span class="badge badge-soft-primary  font-size-10" style="margin-left: 10px;" ><?php echo e($userdata->specialist); ?></span>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
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
var style = $('<style>.ellipsis { height: '+((parseInt($('.ellipsis').css('line-height')) * 2)+'px')+' }</style>');
$('html > head').append(style);

$('#read_more').click(function(){
    $('#my_text').toggleClass('ellipsis');
});
        </script>

			

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/myfollower.blade.php ENDPATH**/ ?>