
<?php $__env->startSection('content'); ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Dashboard View</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <?php if(Auth::user()->user_type == 1): ?>
                                    <div class="col-lg-4 col-md-6">
                                        <a href="<?php echo e(URL::to('manageUser')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total User</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tuser); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=pending')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="mdi mdi-note-multiple-outline text-primary font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Post</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tpost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=approve')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-checkbox-multiple-outline text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Approved</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tapost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=rejected')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-danger rounded">
                                                        <i class="mdi mdi-close-box-multiple text-danger font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Rejected</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($trpost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-warning rounded">
                                                        <i class="mdi mdi-account-clock-outline text-warning font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Pending</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tppost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if(Auth::user()->user_type == 2): ?>
                        

                                    <div class="col-lg-3 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=approve')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="mdi mdi-note-multiple-outline text-primary font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Post</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tpost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=approve')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-checkbox-multiple-outline text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Approved</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tapost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=rejected')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-danger rounded">
                                                        <i class="mdi mdi-close-box-multiple text-danger font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Rejected</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($trpost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <a href="<?php echo e(URL::to('managepost?tab=pending')); ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-warning rounded">
                                                        <i class="mdi mdi-account-clock-outline text-warning font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Pending</p>
                                                <h4 class="mt-1 mb-0"><?php echo e($tppost); ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Pending Posts</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Heading</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $pendinglist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                            </td>
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td><?php echo e($catename->name); ?></td>
                                            <td><?php echo e($key->heading); ?></td>
                                            <td>
                                                <?php if($key->approval == 0): ?>
                                                    <p>Waiting For Approval</p>
                                                <?php elseif($key->approval == 1): ?>
                                                    <p>Approved</p>
                                                <?php else: ?>
                                                    <p>Rejected</p>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($key->approval == 0): ?>
                                                    <a href="<?php echo e(URL::to('editpost/'.$key->id)); ?>" class="btn btn-success btn-sm">Edit</a>
                                                <?php endif; ?>
                                                <!--<a href="#" onclick="deletebyid(<?php echo e($key->id); ?>)" class="btn btn-danger btn-sm">Delete</a>-->
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No Record Found</td>
                                        </tr> 
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/dashboard.blade.php ENDPATH**/ ?>