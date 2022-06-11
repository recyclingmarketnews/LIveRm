
<?php $__env->startSection('content'); ?>
<style>
    #img-preview {
  display: none;
  width: 155px;
  border: 2px dashed #333;  
  margin-bottom: 20px;
}
#img-preview img {
  width: 100%;
  height: auto;
  display: block;
}
[type="file"] {
  height: 0;  
  width: 0;
  overflow: hidden;
}
[type="file"] + label {
    background: #1a4547;
    padding: 10px 30px;
    border: 2px solid #003032;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    transition: all 0.2s;
}
[type="file"] + label:hover {
  background-color: #fff;
  color: #003032;
}

#imgpre1 img{
        width: 100%;
    height: auto;
    display: block;
}
#imgpre2 img{
        width: 100%;
    height: auto;
    display: block;
}
#imgprewwwwww img{
        width: 100%;
    height: auto;
    display: block;
}


</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Publish new post</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
                <section class="dashboard-header section-padding">
                    <div class="container-fluid">
                        <div class="row d-flex align-items-md-stretch">
                        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first">
                            <div class="card sales-report">
                                <form action="<?php echo e(URL::to('/submitpost')); ?>" method="post" enctype="multipart/form-data" class="">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                    <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-5">
                                            <label class="mb-2 fontsize14 form-label">Add Image 1 (Optional) </label>
                                              <div>
                                                <!--  <div id="img-preview"></div>-->
                                                <!--<input type="file" id="" name="image" accept="image/*" />-->
                                                <!--<label for="choose-file">Choose File</label>-->
                                                <!--<div>-->
                                                <div id="imgpre2" style="display: none;width: 155px;border: 2px dashed #333;margin-bottom: 20px;"></div>
                                                <input type="file" id="file2" name="image" accept="image/*" />
                                                <label for="file2">Choose File</label>
                                              </div> 
                                              </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-5">
                                            <label class="mb-2 fontsize14 form-label">Add Image 2 (Optional) </label>
                                              <div>
                                                <div id="imgpre1" style="display: none;width: 155px;border: 2px dashed #333;margin-bottom: 20px;"></div>
                                                <input type="file" id="file11" name="image1" accept="image/*" />
                                                <label for="file11">Choose File</label>
                                              </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-5">
                                            <label class="mb-2 fontsize14 form-label">Add Image 3 (Optional) </label>
                                              <div>
                                                <div id="imgprewwwwww" style="display: none;width: 155px;border: 2px dashed #333;margin-bottom: 20px;"></div>
                                                <input type="file" id="filessss" name="image2" accept="image/*" />
                                                <label for="filessss">Choose File</label>
                                              </div>                                        
                                        </div>
                                    </div>
                                        <?php if(Auth::id() == 1 || Auth::id() == 61): ?>
                                          <div class="col-xl-12 mb-3">
                                              <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Image Ref Link</label><input name="image_ref_link" type="text" class="transparent_form h-40px form-control inputstyle" value=""></div>
                                          </div>
                                        <?php endif; ?>                               
                                        <?php if(Auth::id() == 1 || Auth::id() == 61): ?>
                                          <div class="col-xl-12 mb-3">
                                              <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Other Site Link</label><input name="other_site_link" type="text" class="transparent_form h-40px form-control inputstyle" value=""></div>
                                          </div>
                                        <?php endif; ?>                               

                                        <div class="col-xl-12 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Video Embed Link</label><input name="videolink" type="text" class="transparent_form h-40px form-control inputstyle" value=""></div>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Main News Heading *</label><input name="heading" pattern="[a-zA-Z0-9\s]+" title="Special charactors are not allowed" id="heading" required="" type="text" class="transparent_form h-40px form-control inputstyle" value=""></div>
                                        </div>
                                        <div class="col-xl-8 mb-3" style="display:none;">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Link</label><input name="link" type="url" class="transparent_form h-40px form-control inputstyle" value=""></div>
                                        </div>
                                        <div class="row">
    										<div class="col-lg-6 mb-3">
    										    <label class="form-label">News Category *</label>
    											<select class="form-select" required name="category_id"> 
    												<option value="">Select News Category</option>
    												<?php $__empty_1 = true; $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    												<option value="<?php echo e($key->id); ?>"><?php echo e($key->name); ?></option>
    												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    													N/A
    												<?php endif; ?>
    											</select> 
    										</div>
    										<div class="col-lg-6 mb-3">
    										    <label class="form-label">News Country</label>
    											<select class="form-select" name="country"> 
    												<option value="">News Country</option>
    												<?php $__empty_1 = true; $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    												<option value="<?php echo e($key->nicename); ?>"><?php echo e($key->nicename); ?></option>
    												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    													N/A
    												<?php endif; ?>
    											</select> 
    										</div>
										</div>
                                        <div class="col-xl-12 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">News Content</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                            <?php $totalcredit = DB::table('news_list')->where('credit',1)->where('userid',Auth::id())->count(); 
                                                $firstdate = date('Y-m-01');
                                                $lastdate = date('Y-m-t');
                                                $todaydate = date('Y-m-d');
                                            ?> 
                                            <?php if(Auth::user()->user_value == 'company' and $totalcredit < 4 and $todaydate >= $firstdate and $todaydate <= $lastdate ): ?>
                                            <input type="checkbox" id="creditpost" name="creditpost" value="1">
                                            <input type="hidden" value="<?php echo e(Auth::user()->subscription_id); ?>" id="subsid">
                                            <label for="vehicle1" style="margin-top:10px;">Marketing Post<span class="badge badge-soft-success font-size-10" style="margin-left: 10px;"><?php echo e($totalcredit); ?>/4 monthly credits used.</span><?php if(Auth::user()->subscription_id ==1): ?><a href="<?php echo e(URL::to('stripe')); ?>"><span class="badge badge-soft-warning font-size-10" style="margin-left: 10px;">Upgrade</span></a><?php endif; ?></label>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if(Auth::id() == 1): ?>
                                        <div class="col-xl-12 mb-3">
                                            <input type="checkbox" id="sendemail" name="sendemail" value="1">
                                            <label for="sendemail" style="margin-top:10px;">Send Email Notification
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="col-xl-12"><button type="submit" class="btn btn-primary w-md"></i>Submit</button></div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>        
                </div>
                </section>

				</div>
			</div>
            <!-- end page title -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
<script>
    $("#creditpost").change(function(){
          var value = $("#subsid").val();
          if(value == 1){
              alert("Please upgrade your trial version to paid version before using marketing credit. Thanks.");
              $("#creditpost").prop("checked", false);
          }
    });
</script>
<script>
ClassicEditor.create( document.querySelector( '#description' ) )

</script>
<script>
const file11 = document.getElementById("file11");
const imgpre1 = document.getElementById("imgpre1");

file11.addEventListener("change", function () {
  getImgData1();
});

function getImgData1() {
  const files = file11.files[0];
  if (files) {
    const fileReader1 = new FileReader();
    fileReader1.readAsDataURL(files);
    fileReader1.addEventListener("load", function () {
      imgpre1.style.display = "block";
      imgpre1.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}
</script>
<script>
const file2 = document.getElementById("file2");
const imgpre2 = document.getElementById("imgpre2");

file2.addEventListener("change", function () {
  getImgData2();
});

function getImgData2() {
  const files = file2.files[0];
  if (files) {
    const fileReader1 = new FileReader();
    fileReader1.readAsDataURL(files);
    fileReader1.addEventListener("load", function () {
      imgpre2.style.display = "block";
      imgpre2.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}
</script>
<script>
const filessss = document.getElementById("filessss");
const imgprewwwwww = document.getElementById("imgprewwwwww");

filessss.addEventListener("change", function () {
  getImg2();
});

function getImg2() {
  const files = filessss.files[0];
  if (files) {
    const fileReader2 = new FileReader();
    fileReader2.readAsDataURL(files);
    fileReader2.addEventListener("load", function () {
      imgprewwwwww.style.display = "block";
      imgprewwwwww.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}

</script>
<script>
//     $('#heading').on('keypress', function (event) {
//     var regex = new RegExp("[a-zA-Z0-9\s]+");
//     // var regex = new RegExp("^[a-zA-Z0-9]+$");
//     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
//     if (!regex.test(key)) {
//       event.preventDefault();
//       return false;
//     }
// });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnews.com/resources/views/dashboard/posts/add.blade.php ENDPATH**/ ?>