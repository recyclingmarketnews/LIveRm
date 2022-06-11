<?php $__env->startSection('content'); ?>

<?php echo $__env->make('Chatify::layouts.headLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel='stylesheet'>
<div class="main-content">

    <div class="page-content">
       
<div class="messenger">
    
    <div class="messenger-listView">
        
        <div class="m-header">
            <nav>
                <a href="#"><i class="fa fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                
                <nav class="m-header-right">
                    <a href="#" style=" padding: 0 5px;"><i class="fa fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x" style=" padding: 0 5px;"><i class="fa fa-times"></i></a>
                </nav>
            </nav>
            
            <input type="text" class="messenger-search" placeholder="Search Recycler" />
            
            <div class="messenger-listView-tabs">
                <a href="#" <?php if($type == 'user'): ?> class="active-tab" <?php endif; ?> data-view="users">
                    <span class="fa fa-user"></span> People</a>
                <!-- <a href="#" <?php if($type == 'group'): ?> class="active-tab" <?php endif; ?> data-view="groups">
                    <span class="fa fa-users"></span> Groups</a> -->
            </div>
        </div>
        
        <div class="m-body contacts-container">
           
           
           <div class="<?php if($type == 'user'): ?> show <?php endif; ?> messenger-tab users-tab app-scroll" data-view="users">

               
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               
               <!--<?php echo view('Chatify::layouts.listItem', ['get' => 'saved']); ?>-->

               
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           
           <div class="<?php if($type == 'group'): ?> show <?php endif; ?> messenger-tab groups-tab app-scroll" data-view="groups">
                
                <p style="text-align: center;color:grey;margin-top:30px">
                    <a target="_blank" style="color:<?php echo e($messengerColor); ?>;" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                </p>
             </div>

             
           <div class="messenger-tab search-tab app-scroll" data-view="search">
                
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
             </div>
        </div>
    </div>

    
    <div class="messenger-messagingView">
        
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fa fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name" style="color:#606679;" id="seletedusername"><?php echo e(config('chatify.name')); ?></a>
                </div>
                
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fa fa-star font-size-18 me-2"></i></a>
                    <a href="<?php echo e(URL::to('/allactivepost')); ?>"><i class="fa fa-home font-size-18 me-2"></i></a>
                    <a href="#" class="show-infoSide"><i class="fa fa-info-circle font-size-18 me-2"></i></a>
                </nav>
            </nav>
        </div>
        
        <div class="internet-connection">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            
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
            
            <?php echo $__env->make('Chatify::layouts.sendForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    
    
    <div class="messenger-infoView app-scroll">
        
        <nav>
            <a href="#"><i class="fa fa-times"></i></a>
        </nav>
        <?php echo view('Chatify::layouts.info')->render(); ?>

    </div>
</div>
</div>
			</div>
<?php echo $__env->make('Chatify::layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Chatify::layouts.footerLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wu6wt82f25ae/public_html/recyclingmarketnews.com/resources/views/vendor/Chatify/pages/app.blade.php ENDPATH**/ ?>