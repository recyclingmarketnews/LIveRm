@extends('dashboard.layouts.app')

@section('content')
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
				@if ($alertFm = Session::get('message'))
                    <div class="alert alert-{{Session::get('type')}} alert-block">
                        <strong>{{ $alertFm }}</strong>
                    </div>
                @endif
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
										
											@forelse($users as $key)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td><img width="50px" alt="avatar" class="rounded-circle" src="{{asset('uploads/userimg/'.$key->image)}}"></td>
												<td>{{ $key->fname.' '.$key->lname}}</td>
												<td>{{ $key->email }}</td>
												<td>{{ $key->user_type == 2 ? 'Publisher' : 'Front User'}}</td>
												<td>
													<a href="#" onclick="deletebyid({{ $key->id }})" class="btn btn-danger btn-sm text-white">Delete</a>
													<a href="{{URL::to('edit_user/'.$key->id)}}" class="btn btn-info btn-sm text-white">Update</a>
												</td>
											</tr>
											@empty

											@endforelse
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
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
<script>
   function deletebyid(id){
       var url = "{{ route('deleteuser', ":id") }}";
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
		@endsection
		<!-- Internal Sweet-Alert js-->