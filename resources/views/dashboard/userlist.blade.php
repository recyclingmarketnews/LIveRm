@extends('dashboard.layouts.app')
@section('content')
@if(Request::routeIs('userlist'))
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
				'timeOut': '0',
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
@endif
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
    height: 18px;
}



#view_type_sorting{
  font-family:"FontAwesome";
  font-size:14px;
}
#view_type_sorting::before{
  vertical-align:middle;
}



</style>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
     <div class="filterm">
             <button class="btnStats btn-success" style="border: none;"><i class="fa fa-filter" style="padding-right: 8px;" aria-hidden="true"></i>Filter</button>
             <a href="{{ URL::to('addpost') }}" class="btn-dark" style="border: none; float:right;padding: 1px 10px;">Add Post</a>
        </div>                       
        <form action="{{ URL::to('userlistt') }}" method="post" class="mainfilter dvStats">
            @csrf

        <div class="row mt-2" style="background:<?php if($mode == 'light'){ echo '#fff'; }else{ echo '##061e2c'; } ?>; text-align:center;margin:auto;padding: 7px 0px;">
            <div class="col-xl-1 col-lg-1">
                 <a href="{{ URL::to('userlist') }}" class="btn btn-danger">Clear</a>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="m-0 form-group">
                    <select name="rating" class="form-select"  id="view_type_sorting" aria-haspopup="true" aria-expanded="false">
                        <option value="all" @if('all' == $rating) selected @endif>Rating</option>
                        <option value="1" @if('1' == $rating) selected @endif>&#xf005;</option> 
                        <option value="2"  @if('2' == $rating) selected @endif>&#xf005; &#xf005;</option>  
                        <option value="3" @if('3' == $rating) selected @endif>&#xf005; &#xf005; &#xf005;</option>  
                        <option value="4" @if('4' == $rating) selected @endif>&#xf005; &#xf005; &#xf005; &#xf005;</option> 
                        <option value="5" @if('5' == $rating) selected @endif>&#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</option> 
                    </select>
                </div>
            </div>
            	<?php $countryy = DB::table('country')->get(); ?>
            <div class="col-xl-3 col-lg-3">
                <div class="m-0 form-group">
                    <select name="country" class="form-select">
                        <option value="all" @if('all' == $country) selected @endif>Country</option>
                        
                    @foreach($countryy as $key)
                    <option value="{{ $key->nicename }}" @if($key->nicename == $country) selected @endif>{{ $key->nicename }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="m-0 form-group">
                    <select name="specialist" class="form-select">
                        <option value="all" @if('all' == $specialist) selected @endif>Specialist</option>
                        
                        @forelse($specialists as $key)
                            <option value="{{ $key->name }}" @if($key->name == $specialist) selected @endif>{{ $key->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2">
                <button class="btn btn-success" type="submit">Apply Filter </button>
            </div>
        </div>            
        </form>
                        <!-- start page title -->
                        
				<!-- breadcrumb -->
				@if ($alertFm = Session::get('message'))
                    <div class="alert alert-{{Session::get('type')}} alert-block">
                        <strong>{{ $alertFm }}</strong>
                    </div>
                @endif
				<!-- row -->
                        <div class="row mb-4">
                            <div class="col-lg-12">
        <div class="row">
            <div class="col-xl-12 col-lg-12 p-3" id="results">
                @forelse($userlist as $key)
                        <?php $uid = $key->id; $rating = DB::select("SELECT ifnull(round(avg(ifnull(rating.value,0)),1),0) as ratingval FROM news_list
                                                    join rating on rating.postid = news_list.id
                                                    WHERE news_list.userid ='$uid'"); ?>  
                           <div class="card me-2 p-3 results"   style="width:100%; margin-top:10px;">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12" style="margin-bottom: 5px; padding-left: 0;">
                                        <div class="d-flex  align-items-center">
                                                <span style="margin-right:12px;">
                                                <a href="{{ URL::to('viewprofile/'.$key->id) }}"><img src="{{ asset('uploads/userimg/'.$key->image) }}" class="imagefff img-fluid" /></a>
                                                </span>
                                           <span><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 14px;font-weight: bold;" href="{{ URL::to('viewprofile/'.$key->id) }}" class="mb-1">{{ $key->fname.' '.$key->lname }} </a> </span>
                                            <span style="margin-left: 10px;" class="stars me-1 font-size-10" data-rating="{{ $rating[0]->ratingval }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $rating[0]->ratingval }} out of 5"></span> <span class="font-size-10">({{ $rating[0]->ratingval }})</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12" style="padding-left: 0;">
                                        <div class="d-flex  align-items-center">
                                            <span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" >{{ $key->country }}</span>
                                            <span class="badge badge-soft-primary tooltipp  font-size-10" style="margin-left: 10px;">
                                                @php $specialarray = json_decode($key->specialist); $c = count($specialarray); @endphp
                                                
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
                                            
                                                                                                     @if (Auth::id() != $uid)
                                                        @if(in_array($uid, $followsarray))
                                                        <a href="{{ URL::to('unfollow/'.$uid) }}" style="margin-left: 10px;"><span class="badge badge-soft-success font-size-10" >Unfollow</span></a>
                                                        @else
                                                         <a href="{{ URL::to('savefollow/'.$uid) }}" style="margin-left: 10px;"><span class="badge badge-soft-success font-size-10" >Add Follow</span></a>
                                                        @endif
                                                        @endif
                                            <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
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
var style = $('<style>.ellipsis { height: '+((parseInt($('.ellipsis').css('line-height')) * 2)+'px')+' }</style>');
$('html > head').append(style);

$('#read_more').click(function(){
    $('#my_text').toggleClass('ellipsis');
});
        </script>
<script>
$(document).ready(function(){
    $(".myInput").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results div').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });
});

// $("#btnStats").click($("#dvStats").style.display="block");
$(".btnStats").click(function() {
  
   var lable = $(".btnStats").text().trim();

   if(lable == "Hide") {
     $(".btnStats").text("Filter");
     $(".dvStats").hide();
   }
   else {
     $(".btnStats").text("Hide");
     $(".dvStats").show();
   }
    
  });
</script>			

@endsection