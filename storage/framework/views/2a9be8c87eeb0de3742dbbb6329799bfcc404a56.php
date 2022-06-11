
<?php $__env->startSection('content'); ?>
<style>
    .project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Manage Posts</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
                        <?php if($alertFm = Session::get('message')): ?>
                            <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo e($alertFm); ?></strong>
                            </div>
                        <?php endif; ?>  
                        <div class="row d-flex align-items-md-stretch">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link <?php if($activetab == 'pending'): ?> active <?php endif; ?>" id="nav-home-tab" data-bs-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-home" aria-selected="true">Pending</a>
                                <a class="nav-item nav-link <?php if($activetab == 'approve'): ?> active <?php endif; ?>" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-approve" role="tab" aria-controls="nav-profile" aria-selected="false">Approved</a>
                                <a class="nav-item nav-link <?php if($activetab == 'rejected'): ?> active <?php endif; ?>" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-reject" role="tab" aria-controls="nav-contact" aria-selected="false">Rejected</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade <?php if($activetab == 'pending'): ?> show active <?php endif; ?>" id="nav-pending" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                <a href="#!" onclick="deletebyid(<?php echo e($key->id); ?>)" class="btn btn-danger btn-sm">Delete</a>
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
                            </div>
                            <div class="tab-pane fade <?php if($activetab == 'approve'): ?> show active <?php endif; ?>" id="nav-approve" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                        <?php $__empty_1 = true; $__currentLoopData = $approvelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                            </td>
                                            
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td><?php echo e($catename->name); ?></td>
                                            <td><?php echo e($key->heading); ?></td>
                                            <td>                                                <?php if($key->approval == 0): ?>
                                                    <p>Waiting For Approval</p>
                                                <?php elseif($key->approval == 1): ?>
                                                    <p>Approved</p>
                                                <?php else: ?>
                                                    <p>Rejected</p>
                                                <?php endif; ?></td>
                                            <td>
                                                <?php if($key->approval == 0): ?>
                                                    <a href="<?php echo e(URL::to('editpost/'.$key->id)); ?>" class="btn btn-success btn-sm">Edit</a>
                                                <?php endif; ?>
                                                <a href="#!" onclick="deletebyid(<?php echo e($key->id); ?>)" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr >
                                            <td colspan="6" class="text-center">No Record Found</td>
                                        </tr> 
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="tab-pane fade <?php if($activetab == 'rejected'): ?> show active <?php endif; ?>" id="nav-reject" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Heading</th>
                                            <th>Rejection Reason</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $rejectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                            </td>
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td><?php echo e($catename->name); ?></td>                                            
                                            <td><?php echo e($key->heading); ?></td>
                                            <td><?php echo e($key->reason); ?></td>
                                            <td>                                                <?php if($key->approval == 0): ?>
                                                    <p>Waiting For Approval</p>
                                                <?php elseif($key->approval == 1): ?>
                                                    <p>Approved</p>
                                                <?php else: ?>
                                                    <p>Rejected</p>
                                                <?php endif; ?></td>
                                            <td>
                                                
                                                <a href="<?php echo e(URL::to('editpost/'.$key->id)); ?>" class="btn btn-success btn-sm">Edit</a>
                                               
                                               <a href="#!" onclick="deletebyid(<?php echo e($key->id); ?>)" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr >
                                            <td colspan="6" class="text-center">No Record Found</td>
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
            <!-- end page title -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
<script src="<?php echo e(asset('assets/js/sweetalert.js')); ?>"></script>
<script>
   function deletebyid(id){
       var url = "<?php echo e(route('deletepost', ":id")); ?>";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this post!",
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
                      'Post has been deleted.',
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
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/posts/manage.blade.php ENDPATH**/ ?>