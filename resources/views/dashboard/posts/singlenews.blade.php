@extends('dashboard.layouts.app')
@section('content')
    <?php 
        $settingdata  = DB::table('settings')->first();
        $mode = $settingdata->mode;
    ?>



<style>


.user-timing {p
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
nav{
    margin-bottom: 42px;
    float:right;
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
<style>
    .carddddd {
        padding:12px;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: <?php if($mode == 'light'){ echo '#fff'; }else{ echo '#fff0'; } ?>;
    background-clip: border-box;
   
    border-radius: .25rem;
        box-shadow: 3px 3px 19px 7px rgb(0 0 0 / 11%);
}

.carddddd>hr {
    margin-right: 0;
    margin-left: 0
}

.carddddd>.list-group:first-child .list-group-item:first-child {
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem
}

.carddddd>.list-group:last-child .list-group-item:last-child {
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem
}
.px-1 {
    padding-right: .25rem!important
}
.forminput{
    border-radius: 8px;
    padding: 11px;
    width: 100%;
    border: 1px solid gray;
}
.card-comment {
    border: none;
    box-shadow: 3px 3px 19px 7px rgb(0 0 0 / 11%);
    border-radius: 4px;
    background: <?php if($mode == 'light'){ echo '#fff'; }else{ echo '#fff0'; } ?>;
}
/** rating **/
div.stars {
  display: inline-block;
}

input.star { display: none; }

label.star {
  float:right;
  padding: 10px;
  font-size: 20px;
  color: #444;
  transition: all .2s;


}

/*@media screen and (max-width: 991px) {*/
/*label.star {*/
/*  float:right;*/
/*  padding: 10px;*/
/*  font-size: 20px;*/
/*  color: #444;*/
/*  transition: all .2s;*/
/*  position: relative;*/
/* right: 80%;*/

/*}*/
/*}*/
/*@media screen and (max-width: 480px) {*/
/*label.star {*/
/*  float:right;*/
/*  padding: 10px;*/
/*  font-size: 20px;*/
/*  color: #444;*/
/*  transition: all .2s;*/
/*  position: relative;*/
/* right: 27%;*/

/*}*/
/*}*/
/*@media screen and (max-width: 576px) {*/
/*label.star {*/
/*  float:right;*/
/*  padding: 10px;*/
/*  font-size: 20px;*/
/*  color: #444;*/
/*  transition: all .2s;*/
/*  position: relative;*/
/* right: 27%;*/

/*}*/
/*}*/
/*@media screen and (min-width: 991px) {*/
/*label.star {*/
/*  float:right;*/
/*  padding: 10px;*/
/*  font-size: 20px;*/
/*  color: #444;*/
/*  transition: all .2s;*/
/*  position: relative;*/
/* right: 27%;*/

/*}*/
/*}*/
input.star:checked ~ label.star:before {
  content: "\f005";
  color: 
#e74c3c;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: 
#e74c3c;
  text-shadow: 0 0 5px 
#7f8c8d;
}

input.star-1:checked ~ label.star:before { color: 
#F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: "\f005";
  font-family: FontAwesome;
}


.horline > li:not(:last-child):after {
    content: " |";
}
.horline > li {
  font-weight: bold;
  color: 
#ff7e1a;

}
#my_text.ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    line-height: 1rem;
}
.imageModal {
  display: none;
  position: fixed;
  z-index: 999999;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.9);
}
.imageModal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}
.imageModal-content {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.15s;
  animation-name: zoom;
  animation-duration: 0.15s;
}

@-webkit-keyframes zoom {
  from {
    -webkit-transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
  }
}
@keyframes zoom {
  from {
    transform: scale(0);
  }
  to {
    transform: scale(1);
  }
}

.imageModal-close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.imageModal-close:hover,
.imageModal-close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/** end rating **/
</style>
<div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <!--<h4 class="mb-0">News Detail</h4>-->
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
                                <div class="p-t-60 p-b-60">
                                    <div class="main-container">
                                        <div class="row">
                                            <div class="col-lg-5 text-center overflow-hidden borderradius10 mb-lg-0 mb-5">
                                            <div>
                                                    <div id="carouselExampleControls" data-bs-interval="false" class="carousel slide" data-bs-ride="carousel">
                                                         <div class="carousel-indicators">
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                          </div>
                                                      <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                                @if($newsdetails->image!="p.png")
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{asset('uploads/post/'.$newsdetails->image)}}">
                                                                @elseif(!$newsdetails->image)
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{asset('uploads/post/'.$newsdetails->image)}}">
                                                                @else
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{ asset('front/images/homenewscard.jpg')}}">
                                                                @endif                                                            
                                                        </div>
                                                        @if($newsdetails->image1 != '')
                                                        <div class="carousel-item">
                                                                @if($newsdetails->image1!="p.png")
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{asset('uploads/post/'.$newsdetails->image1)}}">
                                                                @elseif(!$newsdetails->image1)
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{asset('uploads/post/'.$newsdetails->image1)}}">
                                                                @else
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{ asset('front/images/homenewscard.jpg')}}">
                                                                @endif 
                                                        </div>
                                                        @endif
                                                        @if($newsdetails->image2 != '')
                                                        <div class="carousel-item">
                                                                @if($newsdetails->image2!="p.png")
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{asset('uploads/post/'.$newsdetails->image2)}}">
                                                                @elseif(!$newsdetails->image2)
                                                                <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{asset('uploads/post/'.$newsdetails->image2)}}">
                                                                @else
                                                                 <img style="border-radius:12px;height: 336px;    object-fit: contain;" class="img-fluid object-cover w-100 center-block chat-image" src="{{ asset('front/images/homenewscard.jpg')}}">
                                                                @endif 
                                                        </div>
                                                        @endif
                                                        @if($newsdetails->videolink != '')
                                                        <div class="carousel-item">
                                                            <iframe width="100%" height="315"
                                                                src="{{ $newsdetails->videolink }}">
                                                            </iframe>
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
                                           
                                            <div class="col-lg-7">
                                                <div class="title">
                                                    <?php $userdata = DB::table('users')->where('id',$newsdetails->userid)->first();  ?>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                         <a href="{{ URL::to('viewprofile/'.$userdata->id) }}"><small class="paragraphcolortext d-block">{{ $userdata->fname }} {{ $userdata->lname }}</small></a>
                                                         @if (Auth::id() != $userdata->id)
                                                        @if(in_array($userdata->id, $followsarray))
                                                        <a href="{{ URL::to('unfollow/'.$userdata->id) }}"><span class="badge badge-soft-success font-size-14" >Unfollow</span></a>
                                                        @else
                                                         <a href="{{ URL::to('savefollow/'.$userdata->id) }}"><span class="badge badge-soft-success font-size-14" >Add Follow</span></a>
                                                        @endif
                                                        @endif
                                                    </div>
                                                   <?php $cid = $newsdetails->category_id; $catdata = DB::table('product_category')->where('id',$cid)->first(); ?>
                                                    <?php $i=0;
                                                    $crating=0;?>
                                                    @foreach($currating as $currating)
                                                    <?php 
                                                    $crating=$crating+$currating->value;
                                                    
                                                    $i++;?>
                                                    @endforeach
                                                    @if($i!=0)
                                                    <span class="stars" data-rating="{{ $crating/$i }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $crating/$i }} out of 5"></span>
                                                    @else
                                                    <span class="stars" data-rating="0" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="0 out of 5"></span>
                                                    @endif
                                                    <span class="stars" >({!!$i!!})</span>
                                                   <a href="#"><span class="badge badge-soft-primary mb-5 font-size-10" style="margin:0 !important;" >{{ $catdata->name }}</span></a>
                                                   <a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" >{{ $newsdetails->country }}</span></a>
                                                    
                                                    <h4 class="fontsize24 mb-4 fontwieghtbold blackcolortext">{{ $newsdetails->heading }}</h4>
                                                    @if($newsdetails->other_site_link != '')
                                                    <p>To access this story please click here: <a href="{{ $newsdetails->other_site_link }}" target="abc" id="hideshow2">{{ $newsdetails->other_site_link }}</a></p>
                                                    @endif
                                                    <div class="fontsize14 ellipsis" id="my_text">
                                                        {!!$newsdetails->description!!}</div>
                                                    <div class="mb-3">
                                                        <a id="read_more" href="#!"><strong style="color: #1abe7f;">Read More</strong></a>
                                                    </div>
                                                    <p style="font-size:10px;">Published date: {{ $new_date = date('d-m-Y', strtotime($newsdetails->created_at)); }}</p>
                                                    <ul class="list-unstyled mb-4 d-flex">
                                                        <?php $totallike = DB::table('likes')->where('postid',$newsdetails->id)->count(); ?>   
                                                        @if($like == 1)
                                                     <li class="pr-4 d-flex align-items-center "> <a class="btn btn-primary btn-sm me-3" href="{{ URL::to('unlike/'.$newsdetails->id) }}"><span class="bx bxs-heart"></span> <span>{{ $totallike }}</span> Unlike</a></li>
                                                        @else
                                                        <li class="pr-4 d-flex align-items-center "> <a class="btn btn-primary btn-sm me-3" href="{{ URL::to('addlike/'.$newsdetails->id) }}"><span class="bx bx-heart"></span>
                                                         <span>{{ $totallike }}</span> Like</a></li>
                                                   
                                                    @endif
                                                        <li class="pr-4 d-flex align-items-center "> <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="bx bx-share-alt"></span> Share</a></li>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Share Link</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                              </div>
                                                              <div class="modal-body">
                                                                    @php $newsheading = $newsdetails->heading; 
                                                                    
                                                                    $newsheading = strtolower(str_replace(" ", "-", $newsheading)); 
                                                                    
                                                                    @endphp
                                                                    <!--$newsheading = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $newsheading))))), '-')); -->
                                                                    <input type="text" class="form-control" value="{{ URL::to('share/'.$newsheading) }}" id="myInput">
                                                                    <button class="btn btn-success mt-3" onclick="myFunction()">Copy link</button>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>                                                        
                                                    </ul>
                                                
                                                <!--@if($i!=0)-->
                                                <!--<span class="stars" data-rating="{{ $crating/$i }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $crating/$i }} out of 5"></span>-->
                                                <!--@else-->
                                                <!--<span class="stars" data-rating="0" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="0 out of 5"></span>-->
                                                <!--@endif-->
                                                <!--<span class="stars" >({!!$i!!})</span>-->
                                               <!--<a href="#"><span class="badge badge-soft-primary mb-5 font-size-10" >{{ $catdata->name }}</span></a>-->
                                               <!--<a href="#"><span class="badge badge-soft-warning  font-size-10" style="margin-left: 10px;" >{{ $userdata->country }}</span></a>-->
                                               @if (Auth::id() != $userdata->id)
                                                    <p style="    position: absolute;right: 114px;bottom: 46px;">Give Rating</p>
                                                    <form class="form-horizontal poststars" action="{{route('postStar', $newsdetails->id)}}" id="addStar" method="POST">
                                                      {{ csrf_field() }}
                                                            <div class="form-group required">
                                                              <div class="col-sm-12">
                                                                <input class="star star-5" @if($rating == 5) checked @endif value="5" id="star-5" type="radio" name="star"/>
                                                                <label class="star star-5" for="star-5"></label>
                                                                <input class="star star-4" @if($rating == 4) checked @endif value="4" id="star-4" type="radio" name="star"/>
                                                                <label class="star star-4" for="star-4"></label>
                                                                <input class="star star-3" @if($rating == 3) checked @endif value="3" id="star-3" type="radio" name="star"/>
                                                                <label class="star star-3" for="star-3"></label>
                                                                <input class="star star-2" @if($rating == 2) checked @endif value="2" id="star-2" type="radio" name="star"/>
                                                                <label class="star star-2" for="star-2"></label>
                                                                <input class="star star-1" @if($rating == 1) checked @endif value="1" id="star-1" type="radio" name="star"/>
                                                                <label class="star star-1" for="star-1"></label>
                                                               </div>
                                                            </div>
                                                    </form>
                                                    @endif
                                                @if($prenews)
                                                <a href="{{ URL::to('singlenews/'.$prenews) }}" class="btn btn-sm btn-success" style="position: absolute;bottom: -21px;right: 97px;">Previous News</a>
                                                @endif
                                                @if($nextnews)
                                                <a href="{{ URL::to('singlenews/'.$nextnews) }}" class="btn btn-sm btn-success" style="position: absolute;bottom: -21px;right: 13px;">Next News</a>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-5">
                                                <iframe src="" id="abc" name="abc" width="100%" height="600px" style="display:none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
        <!-- Comment System -->
        <div class="py-4">
            <div class="main-container">
                <div class="d-flex mb-3 align-items-center">
                    <h5 class="fontsize16 mr-5 blackcolortext"><img width="20" class="img-fluid mr-2" src="https://tecmyer.com.au/projects/pickshare/assets/images/chat.svg" alt="" data-pagespeed-url-hash="2584459795" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> {{ $totalcomment }} Comment</h5>
                </div>
                <form action="{{ URL::to('addcomment') }}" method="post">
                    @csrf
                        <div class="carddddd px-1 mb-4 borderradius10">
                            <div class="form-group row m-0 align-items-center">
                                <label class="col-1 col-form-label p-0 text-center"><img width="60" class="img-thumbnail rounded-circle " src="{{ asset('uploads/userimg/').'/'.Auth::user()->image}}" alt=""></label>
                                <div class="col-11">
                                  <input type="text" placeholder="Add a public comment" name="comment" class="forminput" required>
                                  <input type="hidden" name="postid" value="{{ $newsdetails->id }}">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-11 mt-2">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <!--<button type="reset" class="btn btn-danger ml-3">Reset</button>-->
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <!---->
            <div class="main-container mt-5">
                <div class="row d-flex justify-content-center">
                    @forelse($comments as $com)
                    <?php $userdataa = DB::table('users')->where('id',$com->userid)->first();  ?>
        <?php $uid = $userdataa->id; $rating = DB::select("SELECT ifnull(round(avg(ifnull(rating.value,0)),1),0) as ratingval FROM news_list
                                                    join rating on rating.postid = news_list.id
                                                    WHERE news_list.userid ='$uid'"); ?>                    
                    <div class="col-md-12">
                        <div class="card-comment mb-4 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user-comment d-inline-flex flex-row align-items-center">
                                    <a href="{{ URL::to('viewprofile/'.$com->userid) }}"><img width="35" class="user-img-comment rounded-circle me-3" src="{{ asset('uploads/userimg/'.$userdataa->image) }}"></a>
                                    <a href="{{ URL::to('viewprofile/'.$com->userid) }}"><small class="d-block font-weight-bold text-primary">{{ $userdataa->fname.' '.$userdataa->lname }} &nbsp&nbsp&nbsp  <span class="commenterstar mt-3 me-1" data-ratingg="{{ $rating[0]->ratingval }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $rating[0]->ratingval }} out of 5"></span> <span class="mt-3">({{ $rating[0]->ratingval }})</span></small> </a>
                                </div>
                                <small>{{ Carbon\Carbon::parse($com->created_at)->diffForHumans()}}</small>
                            </div>
                            
                            @if(Auth::id() == $com->userid)
                            <div class="d-flex  align-items-center">
                                <p class="px-5 d-block fontsize14">{{ $com->comment }}</p>
                                <a href="{{ URL::to('/deletecomment/'.$com->id) }}" class="btn btn-sm btn-danger" style="padding: 0 0.5rem;position: absolute;right: 21px;bottom: 32px;">Delete</a>
                            </div>
                            @else
                            <div class="d-flex  align-items-center">
                                <p class="px-5 d-block fontsize14">{{ $com->comment }}</p>
                                @if(Auth::id() == $newsdetails->userid)
                                <a href="{{ URL::to('/reportcomment/'.$com->id) }}" class="btn btn-sm btn-primary" style="padding: 0 0.5rem;position: absolute;right: 21px;bottom: 32px;">Report to Admin</a>
                                @endif
                            </div>
                            @endif
                            
                        </div>                        
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <!---->
        </div>
        <!--  -->                                
                            </div>
                        </div>
                    </div>        
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Related Post</h4>
                                </div>
                            </div>
                        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                @forelse($relatedlist as $key)
                           <div class="card me-2 p-3" style="width:100%; margin-top:10px;    padding-bottom: 5px !important;">
                                <div class="row">
                                    <?php $userdata = DB::table('users')->where('id',$key->userid)->first();  ?>
                                    

                                    <div class="col-lg-12" style="padding-left: 0;">
                                        <div>
                                           
                                            <div class="d-flex  align-items-center">
                                                    <div style="margin-right:12px;">
                                                    <a href="{{ URL::to('viewprofile/'.$userdata->id) }}"><img src="{{ asset('uploads/userimg/'.$userdata->image) }}" class="imagefff img-fluid" /></a>
                                                    </div>
                                               <div class="textwrapp"><a style="color:<?php if($mode == 'light'){ echo '#464545'; }else{ echo '#fff'; } ?>;font-size: 15px;font-weight: bold;" href="{{ URL::to('singlenews/'.$key->id) }}" class="mb-1 ">{{ $key->heading }} </a> 
                                            
                                               </div>
                                                <!-- <span><i class="fa fa-heart text-danger"></i> </span> -->
                                            </div>
                           
                                            <?php $pid = $key->id; $rating = DB::select("SELECT round(AVG(value),1) as value FROM rating WHERE postid='$pid'"); ?>
                  <div class="d-flex flex-row" style="    margin-top: 0.75rem!important; font-size:10px"> 
                        <?php $totalrating = DB::table('rating')->where('postid',$key->id)->count(); ?>
                                                <span class="tweststare" data-ratinggg="{{ $rating[0]->value }}" data-num-stars="5" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover focus" data-bs-content="{{ $rating[0]->value }} out of 5"></span> ({{ $totalrating }})
                                                <div class="d-flex align-items-center" style="margin-left:10px;">
                                                     <span class="days-ago font-size-10">{{ Carbon\Carbon::parse($key->created_at)->diffForHumans()}}</span>
                                                     <?php $totallike = DB::table('likes')->where('postid',$key->id)->count(); ?>                               
                                               <a href="#"><span class="badge badge-soft-success font-size-10" style="margin-left: 10px;" >{{ $totallike }} Like</span></a>
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
            </div>
        </div>           

				</div>
			</div>
            <!-- end page title -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>
  
    <script>
    $('#addStar').change('.star', function(e) {
    $(this).submit();
    });
</script>
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

}
</script>
        <script>
        $.fn.stars = function() {
            return $(this).each(function() {
                var rating = $(this).data("rating");
                if(rating == 5.0){
                    var fullStar = new Array(Math.floor(5+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(rating== 3.0){
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
        $.fn.commenterstar = function() {
            return $(this).each(function() {
                var ratingg = $(this).data("ratingg");
                if(ratingg == 5.0){
                    var fullStar = new Array(Math.floor(5+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(ratingg == 3.0){
                    var fullStar = new Array(Math.floor(3+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }
                else if(ratingg == 4.0){
                    var fullStar = new Array(Math.floor(4+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(ratingg == 2.0){
                    var fullStar = new Array(Math.floor(2+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(ratingg == 1.0){
                    var fullStar = new Array(Math.floor(1+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else{
                        var fullStar = new Array(Math.floor(ratingg + 1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }  
                var halfStar = ((ratingg%1) !== 0) ? '<i style="color: #d7b50e;" class="fa fa-star-half-o"></i>': '';
                var noStar = new Array(Math.floor($(this).data("numStars") + 1 - ratingg)).join('<i style="color: #d7b50e;" class="fa fa-star-o"></i>');
                $(this).html(fullStar + halfStar + noStar);
            });
        }
        $(function(){
            $('.commenterstar').commenterstar();
        });       
        $.fn.tweststare = function() {
            return $(this).each(function() {
                var ratinggg = $(this).data("ratinggg");
                if(ratinggg == 5.0){
                    var fullStar = new Array(Math.floor(5+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(ratinggg == 3.0){
                    var fullStar = new Array(Math.floor(3+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }
                else if(ratinggg == 4.0){
                    var fullStar = new Array(Math.floor(4+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(ratinggg == 2.0){
                    var fullStar = new Array(Math.floor(2+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else if(ratinggg == 1.0){
                    var fullStar = new Array(Math.floor(1+1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }else{
                        var fullStar = new Array(Math.floor(ratinggg + 1)).join('<i style="color: #d7b50e;" class="fa fa-star"></i>');
                }  
                var halfStar = ((ratinggg%1) !== 0) ? '<i style="color: #d7b50e;" class="fa fa-star-half-o"></i>': '';
                var noStar = new Array(Math.floor($(this).data("numStars") + 1 - ratinggg)).join('<i style="color: #d7b50e;" class="fa fa-star-o"></i>');
                $(this).html(fullStar + halfStar + noStar);
            });
        }
        $(function(){
            $('.tweststare').tweststare();
        });       
var style = $('<style>.ellipsis { height: '+((parseInt($('.ellipsis').css('line-height')) * 4)+'px')+' }</style>');
$('html > head').append(style);

$('#read_more').click(function(){
    $('#my_text').toggleClass('ellipsis');
});

$(document).ready(function(){
  $('#hideshow2').on('click', function(event) {        
     $('#abc').toggle('show');
  });
});
        </script>
<script>
      // Image modal
  $("body").on("click", ".chat-image", function () {
    let src = $(this).attr('src');
    $("#imageModalBox").show();
    $("#imageModalBoxSrc").attr("src", src);
  });
  $(".imageModal-close").on("click", function () {
    $("#imageModalBox").hide();
  });
</script>
@endsection