@extends('dashboard.layouts.app')
@section('content')
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
                        @if ($alertFm = Session::get('message'))
                            <div class="alert alert-{{Session::get('type')}} alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $alertFm }}</strong>
                            </div>
                        @endif  
                        <div class="row d-flex align-items-md-stretch">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link @if($activetab == 'pending') active @endif" id="nav-home-tab" data-bs-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-home" aria-selected="true">Pending</a>
                                <a class="nav-item nav-link @if($activetab == 'approve') active @endif" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-approve" role="tab" aria-controls="nav-profile" aria-selected="false">Approved</a>
                                <a class="nav-item nav-link @if($activetab == 'rejected') active @endif" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-reject" role="tab" aria-controls="nav-contact" aria-selected="false">Rejected</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade @if($activetab == 'pending') show active @endif" id="nav-pending" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                        @forelse($pendinglist as $key)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="{{asset('uploads/post/'.$key->image)}}">
                                            </td>
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td>{{$catename->name}}</td>
                                            <td>{{$key->heading}}</td>
                                            <td>
                                                @if ($key->approval == 0)
                                                    <p>Waiting For Approval</p>
                                                @elseif ($key->approval == 1)
                                                    <p>Approved</p>
                                                @else
                                                    <p>Rejected</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if(Auth::id() ==1)
                                                    <a href="{{ URL::to('editpost/'.$key->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                @endif
                                                <a href="#!" onclick="deletebyid({{ $key->id }})" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Record Found</td>
                                        </tr> 
                                        @endforelse
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="tab-pane fade @if($activetab == 'approve') show active @endif" id="nav-approve" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Heading</th>
                                            <th>Status</th>
                                            <th>Likes</th>
                                            <th>Rating</th>
                                            <th>Comments</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($approvelist as $key)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="{{asset('uploads/post/'.$key->image)}}">
                                            </td>
                                            
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td>{{$catename->name}}</td>
                                            <td>{{$key->heading}}</td>
                                            <td>           
                                                @if ($key->approval == 0)
                                                    <p>Waiting For Approval</p>
                                                @elseif ($key->approval == 1)
                                                    <p>Approved</p>
                                                @else
                                                    <p>Rejected</p>
                                                @endif</td>
                                            @php $likes = DB::table('likes')->where('postid',$key->id)->count()  @endphp   
                                            @php $comments = DB::table('comments')->where('postid',$key->id)->count()  @endphp    
                                            <td>{{ $likes }}</td>
                                            <?php $pid = $key->id; $rating = DB::select("SELECT IFNULL(round(AVG(value),1),0) as value FROM rating WHERE postid='$pid'"); ?>  
                                            <td>{{ $rating[0]->value }}</td>
                                            <td>{{ $comments }}</td>
                                            
                                            
                                            <td>
                                                @if(Auth::id() ==1)
                                                    <a href="{{ URL::to('editpostadmin/'.$key->id) }}" class="btn btn-success btn-sm mb-2 me-2">Edit</a>
                                                @endif
                                                
                                                <a href="#!" onclick="deletebyid({{ $key->id }})" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr >
                                            <td colspan="6" class="text-center">No Record Found</td>
                                        </tr> 
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="tab-pane fade @if($activetab == 'rejected') show active @endif" id="nav-reject" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                        @forelse($rejectlist as $key)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img width="60px" height="60px" alt="avatar" class="rounded-circle" src="{{asset('uploads/post/'.$key->image)}}">
                                            </td>
                                            <?php
                                                $catename = DB::table('product_category')->where('id',$key->category_id)->first();
                                            ?>
                                            <td>{{$catename->name}}</td>                                            
                                            <td>{{$key->heading}}</td>
                                            <td>{{$key->reason}}</td>
                                            <td>                                                @if ($key->approval == 0)
                                                    <p>Waiting For Approval</p>
                                                @elseif ($key->approval == 1)
                                                    <p>Approved</p>
                                                @else
                                                    <p>Rejected</p>
                                                @endif</td>
                                            <td>
                                                
                                                <a href="{{ URL::to('editpost/'.$key->id) }}" class="btn btn-success btn-sm">Edit</a>
                                               
                                               <a href="#!" onclick="deletebyid({{ $key->id }})" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr >
                                            <td colspan="6" class="text-center">No Record Found</td>
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
       var url = "{{ route('deletepost', ":id") }}";
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
@endsection