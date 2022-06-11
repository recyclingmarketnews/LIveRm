@extends('dashboard.layouts.app')
@section('content')

@include('Chatify::layouts.headLinks')
<link href="{{ asset('assets/css/font-awesome.min.css')}}" rel='stylesheet'>
<div class="main-content">

    <div class="page-content">
       
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fa fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" style=" padding: 0 5px;"><i class="fa fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x" style=" padding: 0 5px;"><i class="fa fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search Recycler" />
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                    <span class="fa fa-user"></span> People</a>
                <!-- <a href="#" @if($type == 'group') class="active-tab" @endif data-view="groups">
                    <span class="fa fa-users"></span> Groups</a> -->
            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">

               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               {{-- Saved Messages --}}
               <!--{!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}-->

               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           {{-- ---------------- [ Group Tab ] ---------------- --}}
           <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
                {{-- items --}}
                <p style="text-align: center;color:grey;margin-top:30px">
                    <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                </p>
             </div>

             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fa fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name" style="color:#606679;" id="seletedusername">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fa fa-star font-size-18 me-2"></i></a>
                    <a href="{{ URL::to('/allactivepost') }}"><i class="fa fa-home font-size-18 me-2"></i></a>
                    <a href="#" class="show-infoSide"><i class="fa fa-info-circle font-size-18 me-2"></i></a>
                </nav>
            </nav>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- Send Message Form --}}
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <a href="#"><i class="fa fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>
</div>
			</div>
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
@endsection