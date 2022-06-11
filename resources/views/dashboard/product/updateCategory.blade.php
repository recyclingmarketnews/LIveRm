@extends('dashboard.layouts.app')
@section('content')
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Update Category</h4>
                                </div>
                            </div>
                        </div>
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
						   <form action="{{route('updateCategory')}}" method="post">
						       @csrf
						    <div class="card-body">
									<div class="row">
										<div class="col-lg-6 mb-3">
										    <label class="form-label">Category Name</label>
											<input class="form-control" name="cat_name" value="{{$category->name}}" placeholder="Category Name" type="text">
											<input class="form-control" name="cat_id" value="{{$category->id}}" placeholder="Category Name" type="hidden">
										</div>
									
									
                                        <div class="col-lg-12 mt-3"><button type="submit" class="btn btn-success btn-inline-block">Update</button></div>
                                     
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

@endsection