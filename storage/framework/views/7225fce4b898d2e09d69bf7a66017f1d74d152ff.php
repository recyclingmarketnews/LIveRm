
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
</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Add New Post</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
                <section class="dashboard-header section-padding">
                    <div class="container-fluid">
                        <div class="row d-flex align-items-md-stretch">
                        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first">
                            <div class="card sales-report">
                                <form action="<?php echo e(URL::to('/submiteditpost')); ?>" method="post" enctype="multipart/form-data" class="">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                    <div class="card-body">
               
               
                                    <div class="row">
                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-5">
                                            <label class="mb-2 fontsize14 form-label">Post Image1</label>
                                              <div>
                                                <div id="img-preview"><img src="<?php echo e(asset('uploads/post/'.$postdata->image)); ?>" /></div>
                                                <input type="file" id="choose-file" name="image" accept="image/*" />
                                                <label for="choose-file">Choose File</label>
                                              </div>                                        
                                            <!--<div class="profile-pic"><label class="-label m-0" for="file"><span>Change Image</span></label><input required="" id="file" name="image" type="file"><img alt="icon" class="img-fluid fffff" src="" id="output" width="150"></div>-->
                                            <!--<p class="m-0 ml-xl-3 mt-3 mt-xl-0" style="margin-left:10px !important">Choose Post Image</p>-->
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-5">
                                            <label class="mb-2 fontsize14 form-label">Post Image2</label>
                                              <div>
                                                <div id="img-preview1"><img src="<?php echo e(asset('uploads/post/'.$postdata->image1)); ?>" /></div>
                                                <input type="file" id="choose-file1" name="image1" accept="image/*" />
                                                <label for="choose-file1">Choose File</label>
                                              </div>                                        
                                            <!--<div class="profile-pic"><label class="-label m-0" for="file"><span>Change Image</span></label><input required="" id="file" name="image" type="file"><img alt="icon" class="img-fluid fffff" src="" id="output" width="150"></div>-->
                                            <!--<p class="m-0 ml-xl-3 mt-3 mt-xl-0" style="margin-left:10px !important">Choose Post Image</p>-->
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-5">
                                            <label class="mb-2 fontsize14 form-label">Post Image3</label>
                                              <div>
                                                <div id="img-preview2"><img src="<?php echo e(asset('uploads/post/'.$postdata->image2)); ?>" /></div>
                                                <input type="file" id="choose-file2" name="image2" accept="image/*" />
                                                <label for="choose-file2">Choose File</label>
                                              </div>                                        
                                            <!--<div class="profile-pic"><label class="-label m-0" for="file"><span>Change Image</span></label><input required="" id="file" name="image" type="file"><img alt="icon" class="img-fluid fffff" src="" id="output" width="150"></div>-->
                                            <!--<p class="m-0 ml-xl-3 mt-3 mt-xl-0" style="margin-left:10px !important">Choose Post Image</p>-->
                                        </div>
                                    </div>                                        
                                        <div class="col-xl-4 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Heading</label>
                                            <input type="hidden" name="postid" id="postid" value="<?php echo e($postdata->id); ?>" />
                                            <input name="heading" required="" type="text" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($postdata->heading); ?>"></div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Link</label><input name="link" required="" type="url" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($postdata->link); ?>"></div>
                                        </div>
										<div class="col-lg-4 mb-3">
										    <label class="form-label">News Type</label>
											<select class="form-select" required name="category_id"> 
												<option value="">Select Type</option>
												<?php $__empty_1 = true; $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<option value="<?php echo e($key->id); ?>" <?php if($key->id == $postdata->category_id): ?> selected <?php endif; ?>><?php echo e($key->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
													N/A
												<?php endif; ?>
											</select> 
										</div>	                                        
                                        <div class="col-xl-12 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Short Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="2"><?php echo e($postdata->description); ?></textarea>
                                            </div>
                                        </div>
                          
                                        <div class="col-xl-12"><button type="submit" class="btn btn-primary w-md">Re Submit</button></div>
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
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

chooseFile.addEventListener("change", function () {
  getImgData();
});

function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.display = "block";
      imgPreview.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}
</script>
<script>
const chooseFile1 = document.getElementById("choose-file1");
const imgPreview1 = document.getElementById("img-preview1");

chooseFile1.addEventListener("change", function () {
  getImgData1();
});

function getImgData() {
  const files = chooseFile1.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview1.style.display = "block";
      imgPreview1.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}
</script>
<script>
const chooseFile2 = document.getElementById("choose-file2");
const imgPreview2 = document.getElementById("img-preview2");

chooseFile2.addEventListener("change", function () {
  getImgData2();
});

function getImgData2() {
  const files = chooseFile2.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview2.style.display = "block";
      imgPreview2.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/posts/edit.blade.php ENDPATH**/ ?>