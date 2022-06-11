@extends('dashboard.layouts.app')

@section('content')
<div class="main-content">

                <div class="page-content">
<div class="container-fluid">

					
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<h4 class="mb-0">Manage Category</h4>
						</div>
					</div>
				</div>
				@if ($alertFm = Session::get('message'))
                    <div class="alert alert-{{Session::get('type')}} alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $alertFm }}</strong>
                    </div>
                @endif
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card p-3">
						    <div class="table-responsive">
		                    <table class="table table-bordered">
		                        <thead>
		                            <tr>
		                                <th>Sr. No</th>
		                                <th>Name</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                           
		                            @foreach($category as $cat)
		                            <tr>
		                                <td>{{$loop->iteration}}</td>
		                                <td>{{$cat['name']}}</td>
                                        <td>
											<a onclick="deletebyid({{ $cat->id }})" href="#" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-white">Delete</a>
										    <a href="{{ url('UpdateCategoryForm/'.$cat->id) }}" class="btn btn-info btn-sm text-white">Update</a>
									    </td>
		                            </tr>
		                           
		                            @endforeach
		                        </tbody>
		                        
		                    </table>
						</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
<script>
   function deletebyid(id){
       var url = "{{ route('DeleteCategory', ":id") }}";
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
						'Category has been deleted.',
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
@endsection