@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid">

					
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pricing Updation</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Manage Pricing</span>
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
		                    <table class="table table-bordered">
		                        <thead>
		                            <tr>
		                                <th>Sr. No</th>
		                                <th>Name</th>
		                                <th>Last Updation</th>
		                                <th>Price</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                           
		                            @foreach($category as $cat)
		                            <tr>
		                                <td>{{$loop->iteration}}</td>
		                                <td>{{$cat->name}}</td>
		                                <td>{{$cat->date ?? 'Not Yet Update'}}</td>
		                                <td>{{$cat->price ?? 'Not Yet Update'}}</td>
                                        <td>
										<!--<a href="{{ url('DeleteCategory/'.$cat->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fe fe-trash"></i></a>-->
										     <!--if($cat->date != date('Y-m-d')) -->
										    <a  class="btn btn-info btn-sm text-white" data-effect="effect-scale" data-toggle="modal" href="#modaldemo{{$cat->id}}" data-toggle="tooltip" data-original-title="Edit">Update</a>
										    
										    		<!-- Modal effects -->
                                            		<div class="modal" id="modaldemo{{$cat->id}}">
                                            			<div class="modal-dialog modal-dialog-centered" role="document">
                                            				<div class="modal-content modal-content-demo">
                                            					<div class="modal-header">
                                            						<h6 class="modal-title">{{ $cat->name }} Price Update</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            					</div>
                                            					<form action="{{ URL::to('priceupdate')}}" method="post">
                                            					    @csrf
                                            					<div class="modal-body">
                                    								<div class="row">
                                    										<div class="col-lg-12 mb-3">
                                    										    <label class="form-label">Price</label>
                                    										    <input type="hidden" value="{{ $cat->id }}" name="catid">
                                    											<input class="form-control" name="price" value="{{ $cat->price }}" type="text">
                                    										</div>
                                									</div>                            					    
                                            					</div>
                                            					<div class="modal-footer">
                                            						<button class="btn ripple btn-primary" type="submit">Update</button>
                                            						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                                            					</div>
                                            					</form>
                                            				</div>
                                            			</div>
                                            		</div>
                                            		<!-- End Modal effects-->
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
			


		@endsection
		
		