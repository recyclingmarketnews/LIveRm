
<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Add New Card</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
						   <form action="<?php echo e(URL::to('InsertCard')); ?>" method="post">
						       <?php echo csrf_field(); ?>
						    <div class="card-body">
									<div class="row">
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Name</label>
											<input class="form-control" name="cardname" required placeholder="Enter name of card" type="text">
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Card No.</label>
											<input class="form-control" name="cardno" required placeholder="Enter card no" type="text">
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Csv</label>
											<input class="form-control" name="csv" required placeholder="Enter card csv" type="text">
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Exp. Month</label>
                                            <select class="form-select" required name="month">
                                                <option value="">Select Month</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
										</div>
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Exp. Year</label>
                                            <select class="form-select" required name="year">
                                                <option value="">Select Year</option>
                                                <?php for($i = 2020; $i < 2050; $i++ ){ ?>
                                                    <option><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
											
										</div>
									
									
                                        <div class="col-lg-12 mt-3"><button class="btn btn-primary btn-inline-block">Save</button></div>
                                     
										</div>
										
									</div>
								 </form>
							</div>
						</div>
					</div>
				</div>

				</div>
			</div>
            <!-- end page title -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnewstrial.com/resources/views/dashboard/payment/add.blade.php ENDPATH**/ ?>