@extends('dashboard.layouts.app')
@section('content')
<script>
$(document).ready(function() {
	toastr.options = {
		'closeButton': true,
		'debug': false,
		'newestOnTop': false,
		'progressBar': true,
		'positionClass': 'toast-bottom-right',
        "preventDuplicates": false,
        "onclick": null,
		'showDuration': '10000',
		'hideDuration': '5000',
		'timeOut': '8000',
		'extendedTimeOut': '0',
		'tapToDismiss': false,
		'showEasing': 'swing',
		'hideEasing': 'linear',
		'showMethod': 'fadeIn',
		'hideMethod': 'fadeOut',
	}
    @if($completeprofile < 100 && Auth::user()->profilepopup == 1)
	toastr.error("Dear {{ Auth::user()->fname }}, Please complete your profile. Your profile completion progress is <span class='popupspan'>{{ $completeprofile }}%</span>  <br><a href='{{URL::to('noagainprofilepopup')}}' class='skipancher'>Skip for 5 days</a><a href='{{ URL::to('profile') }}' class='popupeditprofilebtn'>Edit Profile</a>");
    @endif
    @if($totalpost == 0 && Auth::user()->firstpostpopup == 1)
	toastr.error("Dear {{ Auth::user()->fname }}, You don't have upload any post yet.Please upload your first post thanks. <br><a href='{{URL::to('noagainfirstpostpopup')}}' class='skipancher'>Skip for 5 days</a><a href='{{ URL::to('addpost') }}' class='popupeditprofilebtn'>Publish Post</a>");
    @endif
    
});        

</script> 

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Dashboard View</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    @if(Auth::user()->user_type == 1)
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ URL::to('manageUser') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total User</p>
                                                <h4 class="mt-1 mb-0">{{ $tuser }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=pending') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="mdi mdi-note-multiple-outline text-primary font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Post</p>
                                                <h4 class="mt-1 mb-0">{{ $tpost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=approve') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-checkbox-multiple-outline text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Approved</p>
                                                <h4 class="mt-1 mb-0">{{ $tapost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=rejected') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-danger rounded">
                                                        <i class="mdi mdi-close-box-multiple text-danger font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Rejected</p>
                                                <h4 class="mt-1 mb-0">{{ $trpost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <a href="{{ URL::to('managepost') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-warning rounded">
                                                        <i class="mdi mdi-account-clock-outline text-warning font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Pending</p>
                                                <h4 class="mt-1 mb-0">{{ $tppost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endif
                                @if(Auth::user()->user_type == 2)
                        

                                    <div class="col-lg-3 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=approve') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="mdi mdi-note-multiple-outline text-primary font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Post</p>
                                                <h4 class="mt-1 mb-0">{{ $tpost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=approve') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-checkbox-multiple-outline text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Approved</p>
                                                <h4 class="mt-1 mb-0">{{ $tapost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=rejected') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-danger rounded">
                                                        <i class="mdi mdi-close-box-multiple text-danger font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Rejected</p>
                                                <h4 class="mt-1 mb-0">{{ $trpost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=pending') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-warning rounded">
                                                        <i class="mdi mdi-account-clock-outline text-warning font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Total Pending</p>
                                                <h4 class="mt-1 mb-0">{{ $tppost }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=pending') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-primary rounded">
                                                        <i class="mdi mdi-thumb-up text-primary font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Posts Like</p>
                                                <h4 class="mt-1 mb-0">{{ $postlike }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=pending') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-success rounded">
                                                        <i class="mdi mdi-star-circle text-success font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Posts Rating</p>
                                                <h4 class="mt-1 mb-0">{{ $postrating }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>                              
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ URL::to('managepost?tab=pending') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar">
                                                    <span class="avatar-title bg-soft-warning rounded">
                                                        <i class="mdi mdi-wechat text-warning font-size-24"></i>
                                                    </span>
                                                </div>
                                                <p class="text-muted mt-4 mb-0">Posts Comment</p>
                                                <h4 class="mt-1 mb-0">{{ $postcomment }}</h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>                              
                                @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Pending Posts</h4>
                                </div>
                            </div>
                        </div>
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
                                                @if($key->approval == 0)
                                                    <a href="{{ URL::to('editpost/'.$key->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                @endif
                                                <!--<a href="#" onclick="deletebyid({{ $key->id }})" class="btn btn-danger btn-sm">Delete</a>-->
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
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection


