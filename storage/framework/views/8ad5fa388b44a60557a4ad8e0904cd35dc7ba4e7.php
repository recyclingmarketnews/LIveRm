
<?php $__env->startSection('content'); ?>
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    ?>
<style>
    .carddddd {
        padding:12px;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: <?php if($mode == 'light'){ echo '#fff'; }else{ echo '#fff0'; } ?>;
    background-clip: border-box;
   
    border-radius: .25rem;
        box-shadow: 3px 3px 19px 7px rgb(0 0 0 / 11%);
}

.carddddd>hr {
    margin-right: 0;
    margin-left: 0
}

.carddddd>.list-group:first-child .list-group-item:first-child {
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem
}

.carddddd>.list-group:last-child .list-group-item:last-child {
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem
}
.px-1 {
    padding-right: .25rem!important
}
.forminput{
    border-radius: 8px;
    padding: 11px;
    width: 100%;
    border: 1px solid gray;
}
.card-comment {
    border: none;
    box-shadow: 3px 3px 19px 7px rgb(0 0 0 / 11%);
    border-radius: 4px;
    background: <?php if($mode == 'light'){ echo '#fff'; }else{ echo '#fff0'; } ?>;
}
/** rating **/
div.stars {
  display: inline-block;
}

input.star { display: none; }

label.star {
    float:right;
  padding: 10px;
  font-size: 20px;
  color: 
#444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: "\f005";
  color: 
#e74c3c;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: 
#e74c3c;
  text-shadow: 0 0 5px 
#7f8c8d;
}

input.star-1:checked ~ label.star:before { color: 
#F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: "\f005";
  font-family: FontAwesome;
}


.horline > li:not(:last-child):after {
    content: " |";
}
.horline > li {
  font-weight: bold;
  color: 
#ff7e1a;

}
/** end rating **/
</style>
<div>
                <div style="    padding-top: 39px;">
                    <div class="container-fluid">

         
                        <div class="row d-flex align-items-md-stretch">
                        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first">
                            <div class="card sales-report p-3">
                                <div class="p-t-60 p-b-60">
                                    <div class="main-container">
                                        <div class="row">
                                            <div class="col-lg-5 text-center overflow-hidden borderradius10 mb-lg-0 mb-5">
                                            <div>
                                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                      <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                                <?php if($newsdetails->image!="p.png"): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$newsdetails->image)); ?>">
                                                                <?php elseif(!$newsdetails->image): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$newsdetails->image)); ?>">
                                                                <?php else: ?>
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('front/images/homenewscard.jpg')); ?>">
                                                                <?php endif; ?>                                                            
                                                        </div>
                                                        <?php if($newsdetails->image1 != ''): ?>
                                                        <div class="carousel-item">
                                                                <?php if($newsdetails->image1!="p.png"): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$newsdetails->image1)); ?>">
                                                                <?php elseif(!$newsdetails->image1): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$newsdetails->image1)); ?>">
                                                                <?php else: ?>
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('front/images/homenewscard.jpg')); ?>">
                                                                <?php endif; ?> 
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if($newsdetails->image2 != ''): ?>
                                                        <div class="carousel-item">
                                                                <?php if($newsdetails->image2!="p.png"): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$newsdetails->image2)); ?>">
                                                                <?php elseif(!$newsdetails->image2): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$newsdetails->image2)); ?>">
                                                                <?php else: ?>
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('front/images/homenewscard.jpg')); ?>">
                                                                <?php endif; ?> 
                                                        </div>
                                                        <?php endif; ?>
                                                      </div>
                                                      
                                                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                      </button>
                                                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                      </button>
                                                    </div>                                               

                                            </div>   
                                                                   
                                            </div>  
                                    
                                           
                                            <div class="col-lg-7">
                                                <div class="title">
                                                    <?php $userdata = DB::table('users')->where('id',$newsdetails->userid)->first();  ?>
                                             <small class="paragraphcolortext d-block"><?php echo e($userdata->fname.' '.$userdata->lname); ?></small>
                                                   
                                                    <h4 class="fontsize24 mb-4 fontwieghtbold blackcolortext"><?php echo e($newsdetails->heading); ?></h4>
                                                    <p class="fontsize14"><?php echo e($newsdetails->description); ?></p>
                                                    <div class="mb-3">
                                                        <a target="_blank" href="<?php echo e($newsdetails->link); ?>"><strong style="color: #1abe7f;">Read More</strong></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
        <!-- Comment System -->
        <div class="py-4">
            <div class="main-container">
                <div class="d-flex mb-3 align-items-center">
                    <h4 class="fontsize16 mr-5 blackcolortext"><img width="30" class="img-fluid mr-2" src="https://tecmyer.com.au/projects/pickshare/assets/images/chat.svg" alt="" data-pagespeed-url-hash="2584459795" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> <?php echo e($totalcomment); ?> Comment</h4>
                </div>
            </div>
            <!---->
            <div class="main-container mt-5">
                <div class="row d-flex justify-content-center">
                    <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php $userdataa = DB::table('users')->where('id',$com->userid)->first();  ?>
                    <div class="col-md-12">
                        <div class="card-comment mb-4 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user-comment d-inline-flex flex-row align-items-center">
                                    <img width="35" class="user-img-comment rounded-circle me-3" src="<?php echo e(asset('uploads/userimg/'.$userdataa->image)); ?>">
                                    <small class="d-block font-weight-bold text-primary"><?php echo e($userdataa->fname.' '.$userdataa->lname); ?></small>
                                </div>
                                <small><?php echo e(Carbon\Carbon::parse($com->created_at)->diffForHumans()); ?></small>
                            </div>
                            <p class="px-5 d-block fontsize14"><?php echo e($com->comment); ?></p>
                        </div>                        
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
            <!---->
        </div>
        <!--  -->                                
                            </div>
                        </div>
                    </div>        
         

				</div>
			</div>
            <!-- end page title -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <script>
    $('#addStar').change('.star', function(e) {
    $(this).submit();
    });
</script>
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.appp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnewstrial.com/resources/views/dashboard/posts/sharesinglenews.blade.php ENDPATH**/ ?>