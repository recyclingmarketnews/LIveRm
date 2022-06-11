
<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Pending Approval Posts</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
                        <?php if($alertFm = Session::get('message')): ?>
                            <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">

                                <strong><?php echo e($alertFm); ?></strong>
                            </div>
                        <?php endif; ?>  
                        <div class="row d-flex align-items-md-stretch">
                        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first">
                            <div class="card sales-report p-3">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Publisher Details</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Heading</th>
                                            <th>Full View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                            <td>Name : <?php echo e($userdata->fname.' '.$userdata->lname); ?> <br>
                                                Email: <?php echo e($userdata->email); ?>

                                            </td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                            </td>
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td><?php echo e($catename->name); ?></td>                                               
                                            <td><?php echo e($key->heading); ?></td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modaldemo<?php echo e($key->id); ?>">
                                            View In Details
                                            </button>
                                            <!-- Modal effects -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="modaldemo<?php echo e($key->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e($key->heading); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                    <div class="text-center overflow-hidden borderradius10 mb-lg-0 mb-5">
                                                    <div>
                                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                                <?php if($key->image!="p.png"): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                                                <?php elseif(!$key->image): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">
                                                                <?php else: ?>
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('front/images/$key.jpg')); ?>">
                                                                <?php endif; ?>                                                            
                                                        </div>
                                                        <?php if($key->image1 != ''): ?>
                                                        <div class="carousel-item">
                                                                <?php if($key->image1!="p.png"): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$key->image1)); ?>">
                                                                <?php elseif(!$key->image1): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$key->image1)); ?>">
                                                                <?php else: ?>
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('front/images/$key.jpg')); ?>">
                                                                <?php endif; ?> 
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if($key->image2 != ''): ?>
                                                        <div class="carousel-item">
                                                                <?php if($key->image2!="p.png"): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$key->image2)); ?>">
                                                                <?php elseif(!$key->image2): ?>
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('uploads/post/'.$key->image2)); ?>">
                                                                <?php else: ?>
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="<?php echo e(asset('front/images/$key.jpg')); ?>">
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
                                                        <!--<img width="100%" height="60px" alt="avatar" class="img-fluid" src="<?php echo e(asset('uploads/post/'.$key->image)); ?>">-->
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <?php echo e($userdata->fname.' '.$userdata->lname); ?> 
                                                    </div>
                                              
                                                    <div class="col-lg-12">
                                                        <?php echo $key->description; ?>

                                                    </div>
                                                    <!--<div class="col-lg-12">-->
                                                    <!--    <a target="_blank"><?php echo e($key->link); ?></a>-->
                                                    <!--</div>-->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- End Modal effects-->
                                            </td>
                                            <td>
                                                <a href="#" onclick="deletebyid(<?php echo e($key->id); ?>)" class="btn btn-success btn-sm">Approve</a>
                                                
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalrejetion<?php echo e($key->id); ?>">
                                                    Reject
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalrejetion<?php echo e($key->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Rejection Reason Form</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo e(URL::to('rejectsubmit')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                    <div class="modal-body">
                                                     
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="m-0 form-group">
                                                                        <label class="mb-2 fontsize14 form-label">Enter Reason</label>
                                                                        <input type="hidden" id="rejid" name="rejid" value="<?php echo e($key->id); ?>" />
                                                                        <textarea class="form-control" id="reason" name="reason" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td  colspan="7" style="text-align:center">No Record Found</td>
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
       var url = "<?php echo e(route('postapprove', ":id")); ?>";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "get",
                data: {'_token':'<?php echo csrf_token() ?>'},
                success: function (response) {
                    if(response == 'success'){
                    Swal.fire(
                      'Approved!',
                      'Post Approved And Live Successfully.',
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
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/test.recyclingmarketnews.com/resources/views/dashboard/posts/manageforapproval.blade.php ENDPATH**/ ?>