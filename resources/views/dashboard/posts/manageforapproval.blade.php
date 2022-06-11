@extends('dashboard.layouts.app')
@section('content')
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
                        @if ($alertFm = Session::get('message'))
                            <div class="alert alert-{{Session::get('type')}} alert-block">

                                <strong>{{ $alertFm }}</strong>
                            </div>
                        @endif  
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
                                        @forelse($list as $key)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                            <td>Name : {{$userdata->fname.' '.$userdata->lname}} <br>
                                                Email: {{$userdata->email}}
                                            </td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="{{asset('uploads/post/'.$key->image)}}">
                                            </td>
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td>{{$catename->name}}</td>                                               
                                            <td>{{$key->heading}}</td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modaldemo{{$key->id}}">
                                            View In Details
                                            </button>
                                            <!-- Modal effects -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="modaldemo{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$key->heading}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                    <div class="text-center overflow-hidden borderradius10 mb-lg-0 mb-5">
                                                    <div>
                                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                                @if($key->image!="p.png")
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{asset('uploads/post/'.$key->image)}}">
                                                                @elseif(!$key->image)
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{asset('uploads/post/'.$key->image)}}">
                                                                @else
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{ asset('front/images/$key.jpg')}}">
                                                                @endif                                                            
                                                        </div>
                                                        @if($key->image1 != '')
                                                        <div class="carousel-item">
                                                                @if($key->image1!="p.png")
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{asset('uploads/post/'.$key->image1)}}">
                                                                @elseif(!$key->image1)
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{asset('uploads/post/'.$key->image1)}}">
                                                                @else
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{ asset('front/images/$key.jpg')}}">
                                                                @endif 
                                                        </div>
                                                        @endif
                                                        @if($key->image2 != '')
                                                        <div class="carousel-item">
                                                                @if($key->image2!="p.png")
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{asset('uploads/post/'.$key->image2)}}">
                                                                @elseif(!$key->image2)
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{asset('uploads/post/'.$key->image2)}}">
                                                                @else
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block " src="{{ asset('front/images/$key.jpg')}}">
                                                                @endif 
                                                        </div>
                                                        @endif
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
                                                        <!--<img width="100%" height="60px" alt="avatar" class="img-fluid" src="{{asset('uploads/post/'.$key->image)}}">-->
                                                    </div>
                                                    <div class="col-lg-12">
                                                        {{$userdata->fname.' '.$userdata->lname}} 
                                                    </div>
                                              
                                                    <div class="col-lg-12">
                                                        {!!$key->description!!}
                                                    </div>
                                                    <!--<div class="col-lg-12">-->
                                                    <!--    <a target="_blank">{{ $key->link }}</a>-->
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
                                                <a href="#" onclick="deletebyid({{ $key->id }})" class="btn btn-success btn-sm">Approve</a>
                                                
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalrejetion{{ $key->id }}">
                                                    Reject
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalrejetion{{ $key->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Rejection Reason Form</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ URL::to('rejectsubmit') }}" method="post">
                                                        @csrf
                                                    <div class="modal-body">
                                                     
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="m-0 form-group">
                                                                        <label class="mb-2 fontsize14 form-label">Enter Reason</label>
                                                                        <input type="hidden" id="rejid" name="rejid" value="{{ $key->id }}" />
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
                                        @empty
                                        <tr>
                                            <td  colspan="7" style="text-align:center">No Record Found</td>
                                        </tr> 
                                        @endforelse
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
    <script src="{{asset('assets/js/sweetalert.js')}}"></script>
<script>
   function deletebyid(id){
       var url = "{{ route('postapprove', ":id") }}";
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
@endsection