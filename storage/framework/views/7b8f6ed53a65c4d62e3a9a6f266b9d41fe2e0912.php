    <header class="pt-4 header">
        <div class="container">
            <div class="text-center mb-4">
                <a href="<?php echo e(URL::to('/')); ?>" class=""><img class="img-fluid" src="<?php echo e(asset('front/images/logo.png')); ?>" width="380px" /></a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand d-block d-lg-none" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-center w-100">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo e(URL::to('/')); ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(URL::to('about')); ?>">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(URL::to('pricing')); ?>">Subscription</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(URL::to('contact')); ?>">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(URL::to('term')); ?>">T&C</a>
                            </li>
                            <li class="nav-item" style="background: #1abf7f;border-radius: 8px 8px 0 0;">
                                <?php if(Auth::user() != ''): ?>
                                    <?php if(Auth::user()->user_type == 1 || Auth::user()->user_type == 2): ?>
                                        <a class="nav-link" style="color:#fff;font-weight:bold;" href="<?php echo e(URL::to('dash')); ?>">Dashboard</a>
                                    <?php else: ?>
                                        <a class="nav-link" style="color:#fff;font-weight:bold;" href="<?php echo e(URL::to('allactivepost')); ?>">Dashboard</a>
                                    <?php endif; ?>
                                <?php else: ?>
                                <a class="nav-link" style="color:#fff;font-weight:bold;" href="<?php echo e(URL::to('login')); ?>">Login</a>
                                <?php endif; ?>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header><?php /**PATH C:\xampp\htdocs\liverm\resources\views/partial/header.blade.php ENDPATH**/ ?>