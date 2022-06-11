

<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
<div class="container-fluid">

					
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="mb-0">Update User</h4>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
						   <form action="<?php echo e(URL::to('/UpdateUser/'.$user->id)); ?>" method="post" enctype="multipart/form-data">
						       <?php echo csrf_field(); ?>
						    <div class="card-body">
									<div class="row">
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Firstname</label>
											<input class="form-control" name="f_name" placeholder="First Name" value="<?php echo e($user->fname); ?>" type="text" required>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Last Name</label>
											<input class="form-control" name="l_name" placeholder="Last Name" value="<?php echo e($user->lname); ?>" type="text" required>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Email</label>
											<input class="form-control" name="email" placeholder="@gmail.com" value="<?php echo e($user->email); ?>" type="email" required>
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">User Type</label>
											<select class="form-select" required name="usertype"> 
												<option value="">Select Type</option>
												<option value="2" <?php if($user->user_type == 2){ echo 'selected'; }  ?> >Publisher</option>
												<option value="3" <?php if($user->user_type == 3){ echo 'selected'; }  ?>>Front User</option>
											</select> 
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">User Value</label>
                                            <select class="form-select" name="uservalue">
                                                    <option>Select User Value</option>
                                                    <option value="individual" <?php if($user->user_value == 'individual'){ echo 'selected'; }  ?>>Individual</option>
                                                    <option value="company" <?php if($user->user_value == 'company'){ echo 'selected'; }  ?>>Company</option>
                                            </select> 
										</div>
										<?php $country = DB::table('country')->get(); ?>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="userpassword">Select Country</label>
                                             <select name="country" class="form-select">
                                            <option value="">Select Country</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->nicename); ?>" <?php if($key->nicename == $user->country){ echo 'selected'; }  ?>><?php echo e($key->nicename); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>										
										<div class="col-lg-4 mb-3">
										     <label class="form-label">User Image</label>
											<input class="form-control" id="image" name="image"  type="file">
										</div>
										<div class="col-lg-2 mb-3">
										    <label class="form-label">Previous Image</label>
											<img src="<?php echo e(asset('uploads/userimg/' . $user->image)); ?>" width="100px" />
										</div>

										<div class="col-lg-6 mb-3">
										     <label class="form-label">Address</label>
                                                <textarea class="form-control" id="w3review" name="address" rows="2" required ><?php echo e($user->address); ?></textarea>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Bio</label>
										     <textarea class="form-control" id="bio" name="bio" rows="2" ><?php echo e($user->bio); ?></textarea>
										</div>			
											<?php $country = DB::table('country')->get(); ?>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Bio</label>
         <select name="country" class="form-select" required>
<option value="">Select Country</option>
<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($key->nicename); ?>" <?php if($key->nicename == $user->country): ?> selected <?php endif; ?>><?php echo e($key->nicename); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
                    </select>
										</div>										
					
						
								
                                        <div class="col-lg-12 mt-12"><button class="btn btn-primary btn-inline-block">Update</button></div>
                                     
										</div>
										
									</div>
								 </form>
							</div>
						</div>
					</div>
				</div>
			</div>
				</div>
			</div>
		<?php $__env->stopSection(); ?>
		
		<script>
        function onPasswordCurrentClickShow(){
        var x = document.getElementById("currentpass");
        var y = document.getElementById("imgcurrentpass");
        if (x.type === "password") {
            x.type = "text";
            y.src = "<?php echo e(asset('images/password_show.svg')); ?>";
        } else {
            x.type = "password";
            y.src = "<?php echo e(asset('images/password_hide.svg')); ?>";
        }
    }
    </script>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnewstrial.com/resources/views/dashboard/users/editUser.blade.php ENDPATH**/ ?>