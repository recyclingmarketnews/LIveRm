<div data-simplebar class="sidebar-menu-scroll">

<!--- Sidemenu -->
<div id="sidebar-menu">
	<!-- Left Menu Start -->
	<ul class="metismenu list-unstyled" id="side-menu">
		<li class="menu-title" data-key="t-menu">Menu</li>
	    <?php if(Auth::user()->user_type == 2): ?>
		<li>
			<a href="<?php echo e(URL::to('addpost')); ?>">
				<i class='bx bx-edit icon nav-icon'></i>
				<span class="menu-item" data-key="t-calendar">Publish News</span>
			</a>
		</li>
		<li>
			<a href="<?php echo e(URL::to('allactivepost')); ?>">
				<i class="bx bx-news icon nav-icon"></i>
				<span class="menu-item" data-key="t-calendar">News</span>
			</a>
		</li>
		<?php endif; ?>
		<?php if(Auth::user()->user_type == 1): ?>
		<li>
			<a href="javascript: void(0);" class="has-arrow">
				<i class="bx bx-category icon nav-icon"></i>
				<span class="menu-item" data-key="t-email">News by Category</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
	    		<?php 
        			$catlistt = DB::table('product_category')->get();
        		?>
        		<?php $__empty_1 = true; $__currentLoopData = $catlistt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				    <li><a href="<?php echo e(URL::to('allactiveposttt/'.$key->id)); ?>" data-key="t-inbox"><?php echo e($key->name); ?></a></li>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        		<?php endif; ?>				
				
			</ul>
		</li>
		<?php endif; ?>
		
		<?php if(Auth::user()->user_type == 1): ?>
		<li>
			<a href="<?php echo e(URL::to('dash')); ?>">
				<i class="bx bx-tachometer icon nav-icon"></i>
				<span class="menu-item" data-key="t-dashboards">Dashboard</span>
			</a>
		</li>
		<?php endif; ?>
		<?php if(Auth::user()->user_type == 1): ?>
		<li>
			<a href="javascript: void(0);" class="has-arrow">
				<i class="bx bxs-user-detail icon nav-icon"></i>
				<span class="menu-item" data-key="t-email">User Management</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
				<li><a href="<?php echo e(URL::to('addUser')); ?>" data-key="t-inbox">Add User</a></li>
				<li><a href="<?php echo e(URL::to('manageUser')); ?>" data-key="t-read-email">Manage Users</a></li>
			</ul>
		</li>

		<li>
			<a href="javascript: void(0);" class="has-arrow">
				<i class="bx bx-receipt icon nav-icon"></i>
				<span class="menu-item" data-key="t-email">Category</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
				<li><a href="<?php echo e(URL::to('viewCategory')); ?>" data-key="t-inbox">Add Category</a></li>
				<li><a href="<?php echo e(URL::to('manageCategory')); ?>" data-key="t-read-email">Manage Category</a></li>
			</ul>
		</li>
		<?php endif; ?>

		<?php 
			$count = DB::table('news_list')->where('approval',0)->count();
		?>
		<?php if(Auth::user()->user_type == 1 || Auth::user()->user_type == 3): ?>

		<li>
			<a href="<?php echo e(URL::to('publisherpost')); ?>">
				<i class="bx bx-calendar icon nav-icon"></i>
				<span class="menu-item" data-key="t-calendar">Publisher Post</span>
				<span class="badge rounded-pill bg-danger" data-key="t-hot"><?php echo e($count); ?></span>
			</a>
		</li>
		<?php endif; ?>
		<?php if(Auth::user()->user_type == 1): ?>
		<li>
			<a href="<?php echo e(URL::to('allactivepost')); ?>">
				<i class="bx bx-news icon nav-icon"></i>
				<span class="menu-item" data-key="t-calendar">News</span>
			</a>
		</li>
		<?php endif; ?>
		<?php if(Auth::user()->user_type == 2 || Auth::user()->user_type == 1): ?>
	    <li>
			<a href="<?php echo e(URL::to('userlist')); ?>">
				<i class="bx bxs-user-detail icon nav-icon"></i>
				<span class="menu-item" data-key="t-calendar">Find Recycler</span>
			</a>
		</li>
		<?php endif; ?>
		
        <li>
			<a href="<?php echo e(URL::to('chat')); ?>">
			    <i class='bx bx-message-rounded-dots icon nav-icon'></i>
				<span class="menu-item" data-key="t-calendar">Chat</span>
			</a>
		</li>

		<li>
			<a href="javascript: void(0);" class="has-arrow">
				<i class="bx bx-color icon nav-icon"></i>
				<span class="menu-item" data-key="t-email">Settings</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
				<li><a href="<?php echo e(URL::to('profile')); ?>" data-key="t-inbox">Profile</a></li>
				<li><a href="<?php echo e(URL::to('managepost')); ?>" data-key="t-read-email">Manage Post</a></li>
				<li><a href="<?php echo e(URL::to('settings')); ?>" data-key="t-read-email">Theme settings</a></li>
			    <!--<li><a href="<?php echo e(URL::to('paymentcard')); ?>">Payment Method</a></li>-->
			    <li><a href="<?php echo e(URL::to('subscriptionplan')); ?>">Subscription Plan</a></li>
			    <li><a href="<?php echo e(URL::to('dash-how-work')); ?>">How does it work</a></li>
			    <li><a href="<?php echo e(URL::to('dash-what-can-publish')); ?>">What can I publish?</a></li>
        		<li>
        			<a href="javascript: void(0);" class="has-arrow">
        				<span class="menu-item" data-key="t-email">Term & Con.</span>
        			</a>
        			<ul class="sub-menu" aria-expanded="false">
        			    <li><a href="<?php echo e(URL::to('dash-terms-conditions')); ?>" data-key="t-read-email">Terms & Conditions</a></li>
        				<li><a href="<?php echo e(URL::to('dash-privacy-policy')); ?>" data-key="t-inbox">Privacy Policy</a></li>
        				<li><a href="<?php echo e(URL::to('dash-cookie-policy')); ?>" data-key="t-read-email">Cookie Policy</a></li>
        				<li><a href="<?php echo e(URL::to('dash-content-takedown-policy')); ?>" data-key="t-read-email">Content Takedown Policy</a></li>
        				<li><a href="<?php echo e(URL::to('dash-refund-policy')); ?>" data-key="t-read-email">Refund Policy</a></li>
        				<li><a href="<?php echo e(URL::to('dash-disclaimer')); ?>" data-key="t-read-email">Disclaimer</a></li>
        				<li><a href="<?php echo e(URL::to('dash-community-guidelines')); ?>" data-key="t-read-email">Community Guidelines</a></li>
        				<li><a href="<?php echo e(URL::to('dash-copyright')); ?>" data-key="t-read-email">Copyright</a></li>
        			</ul>
		        </li>
			</ul>
		</li>		 

		

    
      

  <!--      <li>-->
		<!--	<a href="<?php echo e(URL::to('currencyexchange')); ?>">-->
		<!--	    <i class="bx bx-info-circle icon nav-icon"></i>-->
		<!--		<span class="menu-item" data-key="t-calendar">Currency Exchange</span>-->
		<!--	</a>-->
		<!--</li>-->

	</ul>
</div>
<!-- Sidebar -->
</div>
</div><?php /**PATH /home/wu6wt82f25ae/public_html/test.recyclingmarketnews.com/resources/views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>