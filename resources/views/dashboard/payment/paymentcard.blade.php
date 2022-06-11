@extends('dashboard.layouts.app')

@section('content')
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
				@if ($alertFm = Session::get('message'))
                    <div class="alert alert-{{Session::get('type')}} alert-block">
                        <strong>{{ $alertFm }}</strong>
                    </div>
                @endif
				<!-- breadcrumb -->
                <div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 mb-2 ">
                        <a href="{{URL::to('addcard')}}" class="btn btn-primary">Add New Card</a>
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
		                                <th>Exp. Month/Year</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                           
		                            @foreach($cards as $card)
		                            <tr>
		                                <td>{{$loop->iteration}}</td>
		                                <td>{{$card->name}}</td>
		                                <td>{{$card->number}}</td>
		                                
		                                <td>{{$card->month.'/'.$card->year}}</td>
		                           
                                        <td>
											<a onclick="deletebyid({{ $card->id }})" href="#" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-white">Delete</a>
										    <!-- <a href="{{ url('UpdateCategoryForm/'.$card->id) }}" class="btn btn-info btn-sm text-white">Update</a> -->
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
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
<script>
   function deletebyid(id){
       var url = "{{ route('DeleteCard', ":id") }}";
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
@endsection