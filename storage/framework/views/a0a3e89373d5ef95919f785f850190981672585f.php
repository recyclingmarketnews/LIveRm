
<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Add New Category</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
						   <form action="InsertCategory" method="post">
						       <?php echo csrf_field(); ?>
						    <div class="card-body">
									<div class="row">
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Category Name</label>
											<input class="form-control" name="cat_name" placeholder="Category Name" type="text">
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
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/product/addCategory.blade.php ENDPATH**/ ?>