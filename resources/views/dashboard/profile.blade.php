@extends('dashboard.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/croppie.css') }} ">
<script src="{{ asset('assets/js/croppie.js') }}"></script>

<style>
    #img-preview {
  border: 2px dashed #333;  
  margin-bottom: 20px;
}
#img-preview img {
  width: 100%;
  height: 144px;
  display: block;
}
[type="file"] {
  height: 0;  
  width: 0;
  overflow: hidden;
}
[type="file"] + label {
    background: #1a4547;
    padding: 10px 30px;
    border: 2px solid #003032;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    transition: all 0.2s;
}
[type="file"] + label:hover {
  background-color: #fff;
  color: #003032;
}
/*//.....tooltip style....../*/
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn){ width:100%;padding: 0px !important;}
</style>
<style type="text/css">
img {
  display: block;
  max-width: 100%;
}
.preview {
  overflow: hidden;
  width: 160px; 
  height: 160px;
  margin: 10px;
  border: 1px solid red;
}
.modal-lg{
  max-width: 1000px !important;
}
</style>
<script>
    $(window).bind('beforeunload', function() {
    if(unsaved){
        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
    }
});

// Monitor dynamic inputs
$(document).on('change', ':input', function(){ //triggers change in all input fields including text type
    unsaved = true;
});
</script>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Profile Settings</h4>
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
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">
        @if(Auth::user()->user_value == 'company')
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first">
        @else
            <div class="col-lg-6 col-md-6 flex-lg-last flex-md-first">
        @endif
            <div class="card sales-report mb-5">
                 <form action="{{ URL::to('/updateprofile')}}" method="post" enctype="multipart/form-data" class="">
                     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="card-body">
                       <div class="d-xl-flex d-block align-items-center mb-5">
                          <div class="profile-pic"><label class="-label m-0" for="file"><span>Change Image</span></label><input id="file" class="image" name="image" type="file"><img alt="icon" class="img-fluid" src="{{ asset('uploads/userimg/').'/'.$data->image}}" id="output" width="150"></div>
                          <p class="m-0 ml-xl-3 mt-3 mt-xl-0" style="margin-left: 10px !important;">Profile photo</p>
                       </div>
        
                       <div class="row">
                        <div class="col-xl-12 mb-3">
                            <div class="mb-5">
                                <label class="mb-2 fontsize14 form-label">Background photo</label><span class="tooltip">!<span class="tooltiptext">you need to uplaod 700px by 150px size of banner. Otherwise banner will not looking good. Thanks</span></span>
                                  <div>
                                    <div><img id="img-preview" src="{{ asset('uploads/userbimg/').'/'.$data->bimage}}" /></div>
                                    <input type="file" id="choose-file" name="bimage" accept="image/*" />
                                    <label for="choose-file">Choose File</label>
                                  </div>                                        
                            </div>
                        </div>                           
                          <div class="col-xl-6 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">@if(Auth::user()->user_value == 'company') Company Name @else First Name @endif</label><input name="fname" required="" type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->fname}}"></div>
                          </div>
                          @if(Auth::user()->user_value == 'company')
                          <div class="col-xl-6 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Registered Address</label><input name="registered_address" required="" type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->registered_address}}"></div>
                          </div>
                          @else
                          <div class="col-xl-6 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Last Name</label><input name="lname" required="" type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->lname}}"></div>
                          </div>
                          @endif
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Facebook Link</label><input name="facebook"  type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->facebook}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Twitter Link</label><input name="instagram"  type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->instagram}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">LinkedIn Link</label><input name="linkedin" type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->linkedin}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                                <div class="m-0 form-group">
                                    <label class="mb-2 fontsize14 form-label">Specialist</label>
                          
                          
                                      <select class="selectpicker transparent_form h-40px form-select inputstyle" multiple name="specialist[]" data-live-search="true">
                                        <?php 
                                            $specialistarray = json_decode($data->specialist);
                                        ?>
                                        @foreach($categories as $key)
                                        <option value="{{ $key->name }}" @if(in_array($key->name, $specialistarray)) selected @endif>{{ $key->name }} </option>
                                        @endforeach
                                      </select>                                   
                                </div>
                          </div>
                          <?php $country = DB::table('country')->get(); ?>
                          <div class="col-xl-12 mb-3">
                                <div class="m-0 form-group">
                                    <label class="mb-2 fontsize14 form-label " Address>Country</label>
                                    <select name="country" class="transparent_form h-40px form-select inputstyle">
                                            <option value="" >Select Country</option>
                                            @foreach($country as $key)
                                            <option value="{{ $key->nicename }}" @if($key->nicename == $data->country) selected @endif>{{ $key->nicename }}</option>
                                            @endforeach
                                            </select>
                                </div>
                          </div>

                          <!--<div class="col-xl-12 mb-3">-->
                          <!--   <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Address</label>-->
                          <!--   <textarea class="form-control" id="address" name="address" rows="2">{{$data->address}}</textarea>-->
                          <!--</div>-->
                          <!--</div>-->
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">About @if(Auth::user()->user_value == 'company') Company @else Me @endif</label>
                             <textarea class="form-control" id="bio" name="bio" rows="2">{{$data->bio}}</textarea>
                            </div>
                          </div>
                          @if(Auth::user()->user_value == 'company')
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Marketing Contact Details</label><input name="marketingcontact"  type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->marketing_contact_detail}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Press Contact Details</label><input name="presscontact"  type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->press_contact_detail}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Sales Contact Details</label><input name="salecontact"  type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->sales_contact_details}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Sales Person Name</label><input name="saleperson"  type="text" class="transparent_form h-40px form-control inputstyle" value="{{$data->saleperson_name}}"></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 form-group"><label class="mb-2 fontsize14 form-label">Website Address</label><input name="websiteaddress"  type="url" class="transparent_form h-40px form-control inputstyle" value="{{$data->website_address}}"></div>
                          </div>
                          @endif
                          <div class="col-xl-12"><button type="submit" class="btn btn-primary w-md">Update</button></div>
                       </div>
                    </div>
                 </form>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report mb-5">
                 <form action="{{ URL::to('/updatepassword')}}" method="post">
                     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="card-body">
                       <div class="topmaintitle">Change Password</div>
                       <p class="fontsize14 paragraphtext">We suggest you to keep a strong password that you don’t use for other websites.</p>
                       <div class="mt-4 row">
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group"><label class="mb-2 fontsize14 form-label">Enter current password</label><input name="curpassword" placeholder="***" required="" type="password" id="currentpass" class="transparent_form h-40px form-control inputstyle" value=""><span class="position-absolute " style="top: 50%; right: 10px;"><img id="imgcurrentpass" onclick="onPasswordCurrentClickShow()" class="img-fluid" src="{{ asset('assets/images/password_hide.svg')}}" alt="eye"></span></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group"><label class="mb-2 fontsize14 form-label">Enter new password</label><input name="newpassword" placeholder="***" required="" type="password" id="pass" class="transparent_form h-40px form-control inputstyle" value=""><span class="position-absolute " style="top: 50%; right: 10px;"><img id="imgpass" class="img-fluid" onclick="onPasswordClickShow()" src="{{ asset('assets/images/password_hide.svg')}}" alt="eye"></span></div>
                          </div>
                          <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group"><label class="mb-2 fontsize14 form-label">Confirm new password</label><input name="oldpassword" placeholder="***" required="" type="password" id="passconfirm" class="transparent_form h-40px form-control inputstyle" value=""><span class="position-absolute " style="top: 50%; right: 10px;"><img id="imgpassconfirm" class="img-fluid" onclick="onPasswordConfirmClickShow()" src="{{ asset('assets/images/password_hide.svg')}}" alt="eye"></span></div>
                          </div>
                          <div class="col-xl-12"><button type="submit" class="btn btn-primary w-md">Change Password</button></div>
                       </div>
                    </div>
                 </form>
            </div>
        </div>
        @if($data->user_value == 'individual')
        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report mb-5">
                 
                     
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                           <div class="topmaintitle">Education</div>
                           <div>
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Education</button>
                           </div>
                       </div>  
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <td>Sr</td>
                                       <td>Degree</td>
                                       <td>Feild of Study</td>
                                       <td>School</td>
                                       <td>Starting Year</td>
                                       <td>Ending Year </td>
                                       <td>Action </td>
                                   </tr>
                               </thead>
                               <tbody>
                                   @forelse($edu as $key)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{ $key->degree }}</td>
                                       <td>{{ $key->fieldofstudy }}</td>
                                       <td>{{ $key->school }}</td>
                                       <td>{{ $key->start }}</td>
                                       <td>{{ $key->end }}</td>
                                       <td>
                                           <button onclick="deletebyid({{ $key->id }})" type="button" class="btn btn-danger btn-sm">Delete</button>
                                           
                                       </td>
                                   </tr>
                                   @empty
                                   <tr>
                                       <td colspan="7">No Record Found</td>
                                   </tr>
                                   @endforelse
                               </tbody>
                           </table>
                       </div>                       
                    </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report mb-5">
                 
                     
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                           <div class="topmaintitle">Experience</div>
                           <div>
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">Add Experience</button>
                           </div>
                       </div> 
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <td>Sr</td>
                                       <td>Company</td>
                                       <td>Designation</td>
                                       <td>Industry</td>
                                       <td>Location</td>
                                       <td>Starting Year</td>
                                       <td>Currently </td>
                                       <td>Ending Year </td>
                                       <td>Action </td>
                                   </tr>
                               </thead>
                               <tbody>
                                   @forelse($works as $key)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{ $key->company }}</td>
                                       <td>{{ $key->desognation }}</td>
                                       <td>{{ $key->industory }}</td>
                                       <td>{{ $key->responsibility }}</td>
                                       <td>{{ $key->start }}</td>
                                       <td>{{ $key->currently }}</td>
                                       <td>{{ $key->end }}</td>
                                       <td>
                                           <button onclick="deletebyidd({{ $key->id }})" type="button" class="btn btn-danger btn-sm">Delete</button>
                                           
                                       </td>
                                   </tr>
                                   @empty
                                   <tr>
                                       <td colspan="9">No Record Found</td>
                                   </tr>
                                   @endforelse
                               </tbody>
                           </table>
                       </div>
                       <div style="text-align: right;font-size: 10px;color: red;">
                           <p>To delete your account please send us an <a href="mailto:info@recyclingmarketnews.com">email</a></p> 
                        </div>
                    </div>
            </div>
        </div>
        @endif
        </div>        

</div>
</section>

				</div>
			</div>

<!-- Modal -->
<div class="modal fade" id="croppies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crop Profile Banner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="col-md-12 text-center" style="overflow-x: scroll;">
				<div id="upload-image"></div>
	  		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary cropped_image">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="sss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crop Profile Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="crop">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Education Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ URL::to('/addeducation')}}" method="post">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="modal-body">
                       
                       <div class="mt-4 row">
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">School / University *</label>
                                 <input name="school" placeholder="Ex: Boston University" required="" type="text" id="school" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Degree / Qualification *</label>
                                 <input name="degree" placeholder="Ex: Bachelor’s" required="" type="text" id="degree" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Field of study *</label>
                                 <input name="fieldofstudy" placeholder="Ex: Business" required="" type="text" id="fieldofstudy" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Starting Year *</label>
                                 <input name="starting" placeholder="Ex: 2014" required="" type="text" id="starting" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Ending Year *</label>
                                 <input name="ending" placeholder="Ex: 2014" required="" type="text" id="ending" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Experience Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ URL::to('/addwork')}}" method="post">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="modal-body">
                       
                       <div class="mt-4 row">
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Company *</label>
                                 <input name="company" placeholder="Ex: Boston University" required="" type="text" id="company" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Designation *</label>
                                 <input name="designation" placeholder="Ex: Director,Manager.." required="" type="text" id="designation" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Industry *</label>
                                 <input name="industory" placeholder="Add text here" required="" type="text" id="industory" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Location *</label>
                                 <select name="responsibility" id="responsibility" class="form-select">
                                            <option value="" selected="selected">Select Country</option>
                                            @foreach($country as $key)
                                            <option value="{{ $key->nicename }}">{{ $key->nicename }}</option>
                                            @endforeach
                                            </select>
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Starting Year *</label>
                                 <input name="syear" placeholder="Ex: 2014" required="" type="text" id="syear" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Currently Working </label>
                                 <input name="currently"  type="checkbox" id="currently" class=" " value="yes"> Yes
                            </div>
                          </div>
                            <div class="col-xl-12 mb-3">
                             <div class="m-0 position-relative form-group">
                                 <label class="mb-2 fontsize14 form-label">Ending Year</label>
                                 <input name="ending" placeholder="Ex: 2014" type="text" id="ending" class="transparent_form h-40px form-control inputstyle" value="">
                            </div>
                          </div>
                       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>








</div>
</div>



			
<script>
        function onPasswordCurrentClickShow(){
        var x = document.getElementById("currentpass");
        var y = document.getElementById("imgcurrentpass");
        if (x.type === "password") {
            x.type = "text";
            y.src = "{{ asset('assets/images/password_show.svg')}}";
        } else {
            x.type = "password";
            y.src = "{{ asset('assets/images/password_hide.svg')}}";
        }
    }
    function onPasswordClickShow(){
        var x = document.getElementById("pass");
        var y = document.getElementById("imgpass");
        if (x.type === "password") {
            x.type = "text";
            y.src = "{{ asset('assets/images/password_show.svg')}}";
        } else {
            x.type = "password";
            y.src = "{{ asset('assets/images/password_hide.svg')}}";
        }
    }
    function onPasswordConfirmClickShow(){
        var x = document.getElementById("passconfirm");
        var y = document.getElementById("imgpassconfirm");
        if (x.type === "password") {
            x.type = "text";
            y.src = "{{ asset('assets/images/password_show.svg')}}";
        } else {
            x.type = "password";
            y.src ="{{ asset('assets/images/password_hide.svg')}}";
        }
    }
</script>
                        <!-- end page title -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
<script>
   function deletebyid(id){
       var url = "{{ route('deleteedu', ":id") }}";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this education record!",
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
                      'Education Record has been deleted.',
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
   function deletebyidd(id){
       var url = "{{ route('deletework', ":id") }}";
        url = url.replace(':id', id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to recover this work record!",
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
                      'Work Record has been deleted.',
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
    var $modal = $('#sss');
    var image = document.getElementById('image');
    var cropper;
        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
        width: 160,
        height: 160,
    });
    canvas.toBlob(function(blob) {
    url = URL.createObjectURL(blob);
    var reader = new FileReader();
    reader.readAsDataURL(blob); 
    reader.onloadend = function() {
            var base64data = reader.result; 
            $(".loader").css("display","block");
            $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "crop-image-upload",
                    data: {'_token': "{{ csrf_token() }}", 'image': base64data},
                    success: function(data){
                    console.log(data);
                    $modal.modal('hide');
                    $("#output").attr("src", base64data);
                    $(".loader").css("display","none");
                }
            });
        }
    });
});
</script>
<script>
    $(document).ready(function(){    
    	$image_crop = $('#upload-image').croppie({
    		enableExif: true,
    		viewport: {
    			width: 930,
    			height: 150,
    			type: 'square'
    		},
    		boundary: {
    			width: 1000,
    			height: 300
    		}
    	});
    	$('#choose-file').on('change', function () { 
    	    	
    		var reader = new FileReader();
    		reader.onload = function (e) {
    			$image_crop.croppie('bind', {
    				url: e.target.result
    			}).then(function(){
    			    $('.cr-slider').attr({'min':0.5000, 'max':1.4000});
    				console.log('jQuery bind complete');
    			});			
    		}
    		reader.readAsDataURL(this.files[0]);
    	$("#croppies").modal('show');
    	});
    	$('.cropped_image').on('click', function (ev) {
    		$image_crop.croppie('result', {
    			type: 'canvas',
    			size: 'viewport'
    		}).then(function (response) {
    		    $(".loader").css("display","block");
    			$.ajax({
    			     type: "POST",
                    dataType: "json",
                    url: "crop-bimage-upload",
                    data: {'_token': "{{ csrf_token() }}", 'image': response},
    				success: function (data) {
			            $("#img-preview").attr("src", response);
    				    $("#croppies").modal('hide');
                        $(".loader").css("display","none");
    				}
    			});
    		});
    	});	
    });
</script>
@endsection