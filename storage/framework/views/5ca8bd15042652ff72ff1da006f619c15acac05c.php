

<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
<div class="container-fluid">

					
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="mb-0">Manage Payment Card</h4>
						</div>
					</div>
				</div>
				<?php if($alertFm = Session::get('message')): ?>
                    <div class="alert alert-<?php echo e(Session::get('type')); ?> alert-block">
                        <strong><?php echo e($alertFm); ?></strong>
                    </div>
                <?php endif; ?>
				<!-- breadcrumb -->
                <div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 mb-2 ">
                        <a href="<?php echo e(URL::to('addcard')); ?>" class="btn btn-primary">Add New Card</a>
                    </div>
                </div>
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card p-3">
		                    <table class="table table-bordered">
		                        <thead>
		                            <tr>
		                                <th>Sr. No</th>
		                                <th>Card Name</th>
		                                <th>Card No</th>
		                                <th>Card Csv</th>
		                                <th>Exp. Month/Year</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                           
		                            <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                            <tr>
		                                <td><?php echo e($loop->iteration); ?></td>
		                                <td><?php echo e($card->name); ?></td>
		                                <td><?php echo e($card->number); ?></td>
		                                <td><?php echo e($card->csv); ?></td>
		                                <td><?php echo e($card->month.'/'.$card->year); ?></td>
		                           
                                        <td>
											<a onclick="deletebyid(<?php echo e($card->id); ?>)" href="#" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-white">Delete</a>
										    <!-- <a href="<?php echo e(url('UpdateCategoryForm/'.$card->id)); ?>" class="btn btn-info btn-sm text-white">Update</a> -->
									    </td>
		                            </tr>
		                           
		                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                        </tbody>
		                        
		                    </table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="<?php echo e(asset('assets/js/sweetalert.js')); ?>"></script>
<script>
   function deletebyid(id){
       var url = "<?php echo e(route('DeleteCard', ":id")); ?>";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this card!",
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
						'card has been deleted.',
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
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/globalrecyclingnews.net/resources/views/dashboard/payment/paymentcard.blade.php ENDPATH**/ ?>