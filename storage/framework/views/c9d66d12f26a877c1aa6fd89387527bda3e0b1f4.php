

<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
<div class="container-fluid">
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="mb-0">Add User</h4>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
						   <form action="<?php echo e(URL::to('/InsertUser')); ?>" method="post" enctype="multipart/form-data">
						       <?php echo csrf_field(); ?>
						    <div class="card-body">
									<div class="row">
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Firstname</label>
											<input class="form-control" name="f_name" placeholder="First Name" type="text" required>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Last Name</label>
											<input class="form-control" name="l_name" placeholder="Last Name" type="text" required>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Email</label>
											<input class="form-control" name="email" placeholder="@gmail.com" type="email" required>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Password</label>
											<input class="form-control" name="password" placeholder="Enter your password" type="password" required> 
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">User Type</label>
											<select class="form-select" required name="usertype"> 
												<option value="">Select Type</option>
												<option value="2">Publisher</option>
												<option value="3">Front User</option>
											</select> 
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">User Value</label>
                                            <select class="form-select" name="uservalue">
                                                    <option>Select User Value</option>
                                                    <option value="individual">Individual</option>
                                                    <option value="company">Company</option>
                                            </select> 
										</div>
										<?php $country = DB::table('country')->get(); ?>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label" for="userpassword">Select Country</label>
                                             <select name="country" class="form-select">
                                            <option value="" selected="selected">Select Country</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->nicename); ?>"><?php echo e($key->nicename); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>										
										<div class="col-lg-6 mb-3">
										     <label class="form-label">User Image</label>
											<input class="form-control" id="image" name="image"  type="file" required>
										</div>

										<div class="col-lg-6 mb-3">
										     <label class="form-label">Address</label>
                                                <textarea class="form-control" id="w3review" name="address" rows="2" required ></textarea>
										</div>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Bio</label>
										     <textarea class="form-control" id="bio" name="bio" rows="2" ></textarea>
										</div>						
										<?php $country = DB::table('country')->get(); ?>
										<div class="col-lg-6 mb-3">
										     <label class="form-label">Country</label>
                 <select name="country" class="form-select">
<option value="" selected="selected">Select Country</option>
<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($key->nicename); ?>"><?php echo e($key->nicename); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
										</div>										
										
										<!--<div class="col-lg-6 mb-3">-->
										<!--    <label class="form-label">User Category Access</label>-->
										<!--	<select class="form-select" required name="usertype"> -->
										<!--		<option value="">Select User Category Access</option>-->
										<!--		<?php $__empty_1 = true; $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>-->
										<!--		<option value="<?php echo e($key->id); ?>"><?php echo e($key->name); ?></option>-->
										<!--		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>-->
										<!--			N/A-->
										<!--		<?php endif; ?>-->
										<!--	</select> -->
										<!--</div>										-->
                                        <div class="col-lg-12 mt-12"><button class="btn btn-primary btn-inline-block">Save</button></div>
                                     
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
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnews.com/resources/views/dashboard/users/addUser.blade.php ENDPATH**/ ?>