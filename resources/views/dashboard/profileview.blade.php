@extends('dashboard.layouts.app')
@section('content')
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    ?>
<style>


.user-timing {
    right: 9px;
    bottom: 9px;
    color: #fff
}

.views-content {
    color: #606271
}

.views {
    font-size: 12px
}

.dots {
    display: flex;
    height: 10px;
    width: 10px;
    background-color: green;
    border-radius: 50%;
    margin-left: 5px;
    margin-bottom: 6px
}

.days-ago {
   
    color: #606271
}

.snipimage img {
    height: 150px
}

.imagefff{
    border-radius: 86px;
    width: 18px;
    max-width: 18px;
    height: 18px;
}
   .textwrapp{
    position: relative;
    height: 22px; 
    font-size: 14px; 
    line-height: 1.42857; 
    overflow: hidden;
           overflow-wrap: normal;
        text-overflow: ellipsis;
        white-space: nowrap;
    margin-bottom: 0;
} 
</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">User Details</h4>
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
                        <div class="row mb-4">
                            <div class="col-lg-7">
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="profile-user" style="padding:0 !important;">  <img src="{{ asset('uploads/userbimg/'.$data->bimage) }}" alt="" style="width: 950px;padding:0 !important;height:auto;" class="avatar-lg img-fluid"> </div>
                                    <div class="card-body">
                                        <div class="profile-content">
                                            <div class="profile-user-img">
                                                <img src="{{ asset('uploads/userimg/'.$data->image) }}" alt="" class="avatar-lg img-thumbnail">
                                            </div>
                                            <?php $uid = $data->id; $rating = DB::select("SELECT ifnull(round(avg(ifnull(rating.value,0)),1),0) as ratingval FROM news_list
                                                                                        join rating on rating.postid = news_list.id
                                                                                        WHERE news_list.userid ='$uid'"); ?>
                                            <div class="d-flex align-items-center justify-content-between">                                            
                                            <h5 class="mt-3 mb-1 me-2">{{ $data->fname.' '.$data->lname }} ({{ $data->user_value }}) <span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" >{{ $data->country }}</span>
                                             <span class="badge badge-soft-primary tooltipp font-size-10" style="margin-left: 10px;" >
                                            @php $specialarray = json_decode($data->specialist); $c = count($specialarray); @endphp
                                                
                                                <?php $i = 0; ?>
                                                @foreach($specialarray as $row => $v)
                                                    @if($i < 1)
                                                    {{ $v }} 
                                                    @endif
                                                    @php $i++ @endphp
                                                @endforeach
                                                <?php $i = 0; ?>
                                                @if(count($specialarray)>1)
                                                <div class="tooltipp">+<span class="tooltiptext">@foreach($specialarray as $row => $v)@php $i++@endphp {{ $v }}, @if($i==2)
                                                    <br> 
                                                    @endif  
                                                    @endforeach</span>
                                            </div>
                                            @endif
                                             </span>  
                                            
                                            </h5> 
                                            <div>
                                                <!--<span><a class="badge badge-soft-success" href="{{ URL::to('chat/'.$data->id) }}">Message</a></span>-->
                                                <span class="stars mt-3 me-1" data-rating="{{ $rating[0]->ratingval }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $rating[0]->ratingval }} out of 5"></span> <span class="mt-3">({{ $rating[0]->ratingval }})</span>
                                            </div>
                                            
                                            </div>
                                            
                                            @if($data->user_type == 1)
                                                <p class="text-muted">{{ count($followerlist) }} Follower . {{ count($followlist) }} Following</p>
                                            @elseif($data->user_type == 2)
                                                <p class="text-muted">{{ count($followerlist) }} Follower . {{ count($followlist) }} Following</p> 
                                            @else
                                                <p class="text-muted">{{ count($followerlist) }} Follower . {{ count($followlist) }} Following</p>
                                            @endif
                                            
                                            
                                                <p class="text-muted mb-1">{{ $data->bio }}</p>
                                             
                                                    @if (Auth::id() != $data->id)
                                                    @if(in_array($data->id, $followsarray))
                                                    <a href="{{ URL::to('unfollow/'.$data->id) }}" class="btn btn-primary btn-sm" style="border-radius:34px">Unfollow</a>
                                                    <a href="{{ URL::to('chat/'.$data->id) }}" class="btn btn-success btn-sm" style="border-radius:34px">Message</a>
                                                    @else
                                                     <a href="{{ URL::to('savefollow/'.$data->id) }}" class="btn btn-primary btn-sm" style="border-radius:34px">+ Follow</a>
                                                     <a href="{{ URL::to('chat/'.$data->id) }}" class="btn btn-success btn-sm" style="border-radius:34px">Message</a>
                                                    @endif  
                                                    @endif
                                                    
                                                    
                                        
                                               @if($data->facebook) <a target="_blank" href="{{ $data->facebook }}"><i class="fa fa-facebook-official" aria-hidden="true" style="float: right;font-size: 28px;color: #3980c0; padding: 0 5px;"></i></a>@endif
                                                @if($data->instagram)<a target="_blank" href="{{ $data->instagram }}"><i class="fa fa-twitter-square" aria-hidden="true" style="float: right;font-size: 28px;color: #3980c0; padding: 0 5px;"></i></a>@endif
                                                @if($data->linkedin)<a target="_blank" href="{{ $data->linkedin }}"><i class="fa fa-linkedin-square" aria-hidden="true" style="float: right;font-size: 28px;color: #3980c0; padding: 0 5px;"></i></a>@endif
                                                
                                            
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            @if($data->user_value == 'individual')
                            <div class="col-xl-12 mb-2">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->

                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">Education</h5>

                                                    <ul class="activity-feed mb-0 ps-2">
                                                        @forelse($edu as $key)
                                                        <li class="feed-item">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1">{{ $key->start }} - {{ $key->end }}</p>
                                                                <h5 class="font-size-15">{{ $key->degree }}</h5>
                                                                <p>{{ $key->school }}</p>
                                                                <p class="text-muted">{{ $key->fieldofstudy }}</p>
                                                            </div>
                                                        </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-xl-12">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->

                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">Work History</h5>

                                                    <ul class="activity-feed mb-0 ps-2">
                                                        @forelse($works as $key)
                                                        <li class="feed-item">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1">{{ $key->start }} - @if($key->currently != '') Currently Working @else {{ $key->end }} @endif</p>
                                                                <h5 class="font-size-15">{{ $key->desognation }}</h5>
                                                                <p>{{ $key->company }}</p>
                                                                <p class="text-muted">{{ $key->responsibility }}</p>
                                                            </div>
                                                        </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            @endif
                            @if($data->user_value == 'company')
                            <div class="col-xl-12 mb-2">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->

                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">We are Specialist in </h5>

                                                    <ul class="activity-feed mb-3 ps-2 d-xl-flex d-block">
                                                        @foreach($specialarray as $row => $v)
                                                        <li class="com-feed-item mb-2">{{ $v }}</li>
                                                        @endforeach
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Marketing Contact Details </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:flex;">
                                                        <li class="feed-item border-0">{{ $data->marketing_contact_detail }}</li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Press Contact Details </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:flex;">
                                                        <li class="feed-item border-0">{{ $data->press_contact_detail }}</li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Sales Contact Details </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:block;">
                                                        <li class="feed-item border-0">{{ $data->sales_contact_details }}</li>
                                                        <li class="feed-item border-0">{{ $data->saleperson_name }}</li>
                                                    </ul>
                                                    <h5 class="font-size-16 mb-4">Website Address </h5>
                                                    <ul class="activity-feed mb-0 ps-2" style="display:flex;">
                                                        <li class="feed-item border-0"><a href="{{ $data->website_address }}" target="_blank">{{ $data->website_address }}</a></li>
                                                    </ul>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endif
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
            <div class="col-xl-12 col-lg-12 card p-3" style="margin-top: 10px;">
                <h5 class="font-size-16 ">User Posts ({{ $totalpostcount }})</h5>
                @forelse($list as $key)
                <?php $totalrating = DB::table('rating')->where('postid',$key->id)->count(); ?>
                           <div class="card me-2 p-3" style="width:100%; margin-top:10px;    padding-bottom: 5px !important;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <div style="margin-right:12px;">
                                                    <a href="{{ URL::to('viewprofile/'.$userdata->id) }}"><img src="{{ asset('uploads/userimg/'.$userdata->image) }}" class="imagefff img-fluid" /></a>
                                                    </div>
                                               <div class="textwrapp"><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 15px;font-weight: bold;" href="{{ URL::to('singlenews/'.$key->id) }}" class="mb-1">{{ $key->heading }} </a> </div>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
                                            </div>
                
                                            <div class="d-flex flex-row" style="    margin-top: 0.75rem!important;"> 
                                            <?php $pid = $key->id; $rating = DB::select("SELECT round(AVG(value),1) as value FROM rating WHERE postid='$pid'"); ?>
                                                <span class="stars" data-rating="{{ $rating[0]->value }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $rating[0]->value }} out of 5"></span> ({{ $totalrating }}) 
                                                <div class="d-flex flex-column" style="margin-left:10px;">
                                                     <span class="days-ago">{{ Carbon\Carbon::parse($key->created_at)->diffForHumans()}}</span>
                                                    <!--<div style="bottom:0; right:0; position:absolute;">-->
                                                    <!--    <a target="_blank" href="{{ $key->link }}"><strong style="color: #1abe7f;">Read More</strong></a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                               
                                        </div>
                                    </div>
                                </div>
                            </div> 
                @empty
                @endforelse
                <div class="col-lg-12 mb-2" style="float:right;">
                    {!! $list->appends(Request::all())->links() !!}
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 card p-3">
            <h5>My Following ({{ count($followlist) }})</h5>
                @forelse($followlist as $key)
                           <div class="card me-2 p-3" style="width:100%; margin-top:10px;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->publisherid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <div style="margin-right:12px;">
                                                    <a href="{{ URL::to('viewprofile/'.$userdata->id) }}"><img src="{{ asset('uploads/userimg/'.$userdata->image) }}" class="imagefff img-fluid" /></a>
                                                    </div>
                                               <div><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 14px;font-weight: bold;" href="{{ URL::to('viewprofile/'.$userdata->id) }}" class="mb-1">{{ $userdata->fname.' '.$userdata->lname }} </a> </div>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
                                            </div>

                                            
                               
                                        </div>
                                    </div>
                                </div>
                            </div> 
                @empty
                @endforelse
            </div>
        </div>                                  
                            </div>
                          
                        </div>

				</div>
			</div>



	        <script>
        $.fn.stars = function() {
            return $(this).each(function() {
                var rating = $(this).data("rating");
                if(rating == 5.0){
                    var fullStar = new Array(Math.floor(5+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(rating == 3.0){
                    var fullStar = new Array(Math.floor(3+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }
                else if(rating == 4.0){
                    var fullStar = new Array(Math.floor(4+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(rating == 2.0){
                    var fullStar = new Array(Math.floor(2+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(rating == 1.0){
                    var fullStar = new Array(Math.floor(1+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else{
                        var fullStar = new Array(Math.floor(rating + 1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }  
                var halfStar = ((rating%1) !== 0) ? '<i style="color: #d7b50e;" class="fa fa-star-half-o"></i>': '';
                var noStar = new Array(Math.floor($(this).data("numStars") + 1 - rating)).join('<i style="color: #d7b50e;" class="fa fa-star-o"></i>');
                $(this).html(fullStar + halfStar + noStar);
            });
        }
            $(function(){
                $('.stars').stars();
            });
        </script>		

@endsection