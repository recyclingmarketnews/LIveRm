@extends('dashboard.layouts.app')
@section('content')
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Settings</h4>
                                </div>
                            </div>
                        </div>
                        @if ($alertFm = Session::get('message'))
                            <div class="alert alert-{{Session::get('type')}} alert-block">
                                <strong>{{ $alertFm }}</strong>
                            </div>
                        @endif 
				<!-- row -->
                <section class="dashboard-header section-padding">
                    <div class="">
                        <div class="row d-flex align-items-md-stretch">
                        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first">
                            <div class="card sales-report">
                                <form action="{{ URL::to('/submitsettings')}}" method="post">
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                            <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Theme Mode</label>
                                                <select name="mode" class="form-select">
                                                    <option value="light" <?php if($settingdata->mode == 'light'){ echo 'selected';} ?>>Light Mode</option>
                                                    <option value="dark" <?php if($settingdata->mode == 'dark'){ echo 'selected';} ?>>Dark Mode</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12"><button type="submit" class="btn btn-success w-md">Submit</button></div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>        
                </div>
                </section>

				</div>
			</div>
            <!-- end page title -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection