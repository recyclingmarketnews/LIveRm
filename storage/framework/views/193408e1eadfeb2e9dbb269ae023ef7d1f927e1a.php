
<?php $__env->startSection('content'); ?>
<style>
    #img-preview {
  border: 2px dashed #333;  
  margin-bottom: 20px;
}
#img-preview img {
  width: 100%;
  height: 144px;
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
                                    <h4 class="mb-0">Profile Settings</h4>
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
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">
        <div class="col-lg-6 col-md-6 flex-lg-last flex-md-first">
            <div class="card sales-report mb-5">
                 <form action="<?php echo e(URL::to('/updateprofile')); ?>" method="post" enctype="multipart/form-data" class="">
                     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="card-body">
                       <div class="d-xl-flex d-block align-items-center mb-5">
                          <div class="profile-pic"><label class="-label m-0" for="file"><span>Change Image</span></label><input id="file" name="image" type="file"><img alt="icon" class="img-fluid" src="<?php echo e(asset('uploads/userimg/').'/'.$data->image); ?>" id="output" width="150"></div>
                          <p class="m-0 ml-xl-3 mt-3 mt-xl-0" style="margin-left: 10px !important;">Profile photo</p>
                       </div>
        
                       <div class="row">
                        <div class="col-xl-12 mb-3">
                            <div class="mb-5">
                                <label class="mb-2 fontsize14 form-label">Background photo</label>
                                  <div>
                                    <div id="img-preview"><img src="<?php echo e(asset('uploads/userbimg/').'/'.$data->bimage); ?>" /></div>
                                    <input type="file" id="choose-file" name="bimage" accept="image/*" />
                                    <label for="choose-file">Choose File</label>
                                  </div>                                        
                            </div>
                        </div>                           
                          <div class="col-xl-6 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">First Name</label><input name="fname" required="" type="text" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($data->fname); ?>"></div>
                          </div>
                          <div class="col-xl-6 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Last Name</label><input name="lname" required="" type="text" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($data->lname); ?>"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Facebook Link</label><input name="facebook"  type="text" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($data->facebook); ?>"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Twitter Link</label><input name="instagram"  type="text" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($data->instagram); ?>"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">LinkedIn Link</label><input name="linkedin" type="text" class="transparent_form h-40px form-control inputstyle" value="<?php echo e($data->linkedin); ?>"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                                <div class="m-0 form-group">
                                    <label class="mb-2 fontsize14 form-label">Specialist</label>
                                    <select class="transparent_form h-40px form-select inputstyle" name="specialist">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key->name); ?>" <?php if($key->name == $data->specialist): ?> selected <?php endif; ?>><?php echo e($key->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                          </div>
                          <?php $country = DB::table('country')->get(); ?>
                          <div class="col-xl-12 mb-3">
                                <div class="m-0 form-group">
                                    <label class="mb-2 fontsize14 form-label " >Country</label>
                                    <select name="country" class="transparent_form h-40px form-select inputstyle">
                                            <option value="" >Select Country</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->nicename); ?>" <?php if($key->nicename == $data->country): ?> selected <?php endif; ?>><?php echo e($key->nicename); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                </div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Address</label>
                             <textarea class="form-control" id="address" name="address" rows="2"><?php echo e($data->address); ?></textarea>
                          </div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">About Me</label>
                             <textarea class="form-control" id="bio" name="bio" rows="2"><?php echo e($data->bio); ?></textarea>
                            </div>
                          </div>
                          <div class="col-xl-12"><button type="submit" class="btn btn-primary w-md">Update</button></div>
                       </div>
                    </div>
                 </form>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report mb-5">
                 <form action="<?php echo e(URL::to('/updatepassword')); ?>" method="post">
                     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="card-body">
                       <div class="topmaintitle">Change Password</div>
                       <p class="fontsize14 paragraphtext">We suggest you to keep a strong password that you don???t use for other websites.</p>
                       <div class="mt-4 row">
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group"><label class="mb-2 fontsize14 form-label">Enter current password</label><input name="curpassword" placeholder="***" required="" type="password" id="currentpass" class="transparent_form h-40px form-control inputstyle" value=""><span class="position-absolute " style="top: 50%; right: 10px;"><img id="imgcurrentpass" onclick="onPasswordCurrentClickShow()" class="img-fluid" src="<?php echo e(asset('assets/images/password_hide.svg')); ?>" alt="eye"></span></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group"><label class="mb-2 fontsize14 form-label">Enter new password</label><input name="newpassword" placeholder="***" required="" type="password" id="pass" class="transparent_form h-40px form-control inputstyle" value=""><span class="position-absolute " style="top: 50%; right: 10px;"><img id="imgpass" class="img-fluid" onclick="onPasswordClickShow()" src="<?php echo e(asset('assets/images/password_hide.svg')); ?>" alt="eye"></span></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group"><label class="mb-2 fontsize14 form-label">Confirm new password</label><input name="oldpassword" placeholder="***" required="" type="password" id="passconfirm" class="transparent_form h-40px form-control inputstyle" value=""><span class="position-absolute " style="top: 50%; right: 10px;"><img id="imgpassconfirm" class="img-fluid" onclick="onPasswordConfirmClickShow()" src="<?php echo e(asset('assets/images/password_hide.svg')); ?>" alt="eye"></span></div>
                          </div>
                          <div class="col-xl-12"><button type="submit" class="btn btn-primary w-md">Change Password</button></div>
                       </div>
                    </div>
                 </form>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report mb-5">
                 
                     
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                           <div class="topmaintitle">Education</div>
                           <div>
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Education</button>
                           </div>
                       </div>  
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <td>Sr</td>
                                       <td>Degree</td>
                                       <td>Feild of Study</td>
                                       <td>School</td>
                                       <td>Starting Year</td>
                                       <td>Ending Year </td>
                                       <td>Action </td>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php $__empty_1 = true; $__currentLoopData = $edu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                   <tr>
                                       <td><?php echo e($loop->iteration); ?></td>
                                       <td><?php echo e($key->degree); ?></td>
                                       <td><?php echo e($key->fieldofstudy); ?></td>
                                       <td><?php echo e($key->school); ?></td>
                                       <td><?php echo e($key->start); ?></td>
                                       <td><?php echo e($key->end); ?></td>
                                       <td>
                                           <button onclick="deletebyid(<?php echo e($key->id); ?>)" type="button" class="btn btn-danger btn-sm">Delete</button>
                                           
                                       </td>
                                   </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                   <tr>
                                       <td colspan="7">No Record Found</td>
                                   </tr>
                                   <?php endif; ?>
                               </tbody>
                           </table>
                       </div>                       
                    </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report mb-5">
                 
                     
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                           <div class="topmaintitle">Experience</div>
                           <div>
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">Add Experience</button>
                           </div>
                       </div> 
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <td>Sr</td>
                                       <td>Company</td>
                                       <td>Designation</td>
                                       <td>Industory</td>
                                       <td>Location</td>
                                       <td>Starting Year</td>
                                       <td>Currently </td>
                                       <td>Ending Year </td>
                                       <td>Action </td>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php $__empty_1 = true; $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                   <tr>
                                       <td><?php echo e($loop->iteration); ?></td>
                                       <td><?php echo e($key->company); ?></td>
                                       <td><?php echo e($key->desognation); ?></td>
                                       <td><?php echo e($key->industory); ?></td>
                                       <td><?php echo e($key->responsibility); ?></td>
                                       <td><?php echo e($key->start); ?></td>
                                       <td><?php echo e($key->currently); ?></td>
                                       <td><?php echo e($key->end); ?></td>
                                       <td>
                                           <button onclick="deletebyidd(<?php echo e($key->id); ?>)" type="button" class="btn btn-danger btn-sm">Delete</button>
                                           
                                       </td>
                                   </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                   <tr>
                                       <td colspan="7">No Record Found</td>
                                   </tr>
                                   <?php endif; ?>
                               </tbody>
                           </table>
                       </div>
                    </div>
            </div>
        </div>
        </div>        

</div>
</section>

				</div>
			</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Education Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo e(URL::to('/addeducation')); ?>" method="post">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="modal-body">
                       
                       <div class="mt-4 row">
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">School / University *</label>
                                 <input name="school" placeholder="Ex: Boston University" required="" type="text" id="school" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Degree / Qualification *</label>
                                 <input name="degree" placeholder="Ex: Bachelor???s" required="" type="text" id="degree" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Field of study *</label>
                                 <input name="fieldofstudy" placeholder="Ex: Business" required="" type="text" id="fieldofstudy" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Starting Year *</label>
                                 <input name="starting" placeholder="Ex: 2014" required="" type="text" id="starting" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Ending Year *</label>
                                 <input name="ending" placeholder="Ex: 2014" required="" type="text" id="ending" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Experience Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo e(URL::to('/addwork')); ?>" method="post">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="modal-body">
                       
                       <div class="mt-4 row">
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Company *</label>
                                 <input name="company" placeholder="Ex: Boston University" required="" type="text" id="company" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Designation *</label>
                                 <input name="designation" placeholder="Ex: Director,Manager.." required="" type="text" id="designation" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Industry *</label>
                                 <input name="industory" placeholder="Add text here" required="" type="text" id="industory" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Location *</label>
                                 <select name="responsibility" id="responsibility" class="form-select">
                                            <option value="" selected="selected">Select Country</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->nicename); ?>"><?php echo e($key->nicename); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Starting Year *</label>
                                 <input name="syear" placeholder="Ex: 2014" required="" type="text" id="syear" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Currently Working </label>
                                 <input name="currently"  type="checkbox" id="currently" class=" " value="yes"> Yes
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Ending Year *</label>
                                 <input name="ending" placeholder="Ex: 2014" required="" type="text" id="ending" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

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
const file = document.getElementById("file");
const output = document.getElementById("output");

file.addEventListener("change", function () {
  getImgData11();
});

function getImgData11() {
  const files = file.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
        $("#output").attr("src",this.result);
    });    
  }
}
</script>
			
<script>
        function onPasswordCurrentClickShow(){
        var x = document.getElementById("currentpass");
        var y = document.getElementById("imgcurrentpass");
        if (x.type === "password") {
            x.type = "text";
            y.src = "<?php echo e(asset('assets/images/password_show.svg')); ?>";
        } else {
            x.type = "password";
            y.src = "<?php echo e(asset('assets/images/password_hide.svg')); ?>";
        }
    }
    function onPasswordClickShow(){
        var x = document.getElementById("pass");
        var y = document.getElementById("imgpass");
        if (x.type === "password") {
            x.type = "text";
            y.src = "<?php echo e(asset('assets/images/password_show.svg')); ?>";
        } else {
            x.type = "password";
            y.src = "<?php echo e(asset('assets/images/password_hide.svg')); ?>";
        }
    }
    function onPasswordConfirmClickShow(){
        var x = document.getElementById("passconfirm");
        var y = document.getElementById("imgpassconfirm");
        if (x.type === "password") {
            x.type = "text";
            y.src = "<?php echo e(asset('assets/images/password_show.svg')); ?>";
        } else {
            x.type = "password";
            y.src ="<?php echo e(asset('assets/images/password_hide.svg')); ?>";
        }
    }
</script>
                        <!-- end page title -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<script src="<?php echo e(asset('assets/js/sweetalert.js')); ?>"></script>
<script>
   function deletebyid(id){
       var url = "<?php echo e(route('deleteedu', ":id")); ?>";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this education record!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "get",
                data: {'_token':'<?php echo csrf_token() ?>'},
                success: function (response) {
                    if(response == 'success'){
                    Swal.fire(
                      'Deleted!',
                      'Education Record has been deleted.',
                      'success'
                    )
					window.location.reload();
                        
                    }else{
                          Swal.fire(
                      'Oops!',
                      'something went wrong try again.',
                      'error'
                    ) 
                    }
                }
            });  
          }
        })
    }
   function deletebyidd(id){
       var url = "<?php echo e(route('deletework', ":id")); ?>";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this work record!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "get",
                data: {'_token':'<?php echo csrf_token() ?>'},
                success: function (response) {
                    if(response == 'success'){
                    Swal.fire(
                      'Deleted!',
                      'Work Record has been deleted.',
                      'success'
                    )
					window.location.reload();
                        
                    }else{
                          Swal.fire(
                      'Oops!',
                      'something went wrong try again.',
                      'error'
                    ) 
                    }
                }
            });  
          }
        })
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/profile.blade.php ENDPATH**/ ?>