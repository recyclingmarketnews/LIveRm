

<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
				<!-- container -->
				<div class="container-fluid">

				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="mb-0">Manage Users</h4>
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
				<div class="row" id="results">
						<div class="col-sm-12 col-md-12 col-xl-12" id="mydivinner">
							<div class="card custom-card">
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Sr. No</th>
												<th>Image</th>
												<th>Name</th>
												<th>Email</th>
												<th>User Type</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										
											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td><?php echo e($loop->iteration); ?></td>
												<td><img width="50px" alt="avatar" class="rounded-circle" src="<?php echo e(asset('uploads/userimg/'.$key->image)); ?>"></td>
												<td><?php echo e($key->fname.' '.$key->lname); ?></td>
												<td><?php echo e($key->email); ?></td>
												<td><?php echo e($key->user_type == 2 ? 'Publisher' : 'Front User'); ?></td>
												<td>
													<a href="#" onclick="deletebyid(<?php echo e($key->id); ?>)" class="btn btn-danger btn-sm text-white">Delete</a>
													<a href="<?php echo e(URL::to('edit_user/'.$key->id)); ?>" class="btn btn-info btn-sm text-white">Update</a>
												</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

											<?php endif; ?>
										</tbody>
										
									</table>									
								</div>
							</div>
						</div>
				</div>
				<!-- row closed -->


				</div>
				<!-- Container closed -->

			</div>
			</div>
			</div>
			<!-- main-content closed -->
<script src="<?php echo e(asset('assets/js/sweetalert.js')); ?>"></script>
<script>
   function deletebyid(id){
       var url = "<?php echo e(route('deleteuser', ":id")); ?>";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this user!",
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
                      'User has been deleted.',
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
<script>
    $("#filter").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results div').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show();
          count++;
        }

      });

    });
</script>
		<?php $__env->stopSection(); ?>
		<!-- Internal Sweet-Alert js-->
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/test.recyclingmarketnews.com/resources/views/dashboard/users/manageUser.blade.php ENDPATH**/ ?>