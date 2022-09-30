
 <div class="nav-container"  >
    <div class="mobile-topbar-header"  >
        <div class="">
            <img src="app-/images/logo-icon.png" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Stage</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto toggledbuttom" > <i class="bx bx-menu"  ></i>
        </a>
    </div>

    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-7"><i class='bx bx-briefcase-alt'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Dashboard')); ?></div>
                </a>
            </li>

            
            <li>
                <a href="<?php echo e(route('Employees.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Employees')); ?></div>
                </a>
            </li>
            
            
             
            <li>
                <a href="<?php echo e(route('Coaches.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Coaches')); ?></div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('Courses.index' , auth()->user()->id)); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Courses')); ?></div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('Category.index' ,['type' =>'store'])); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Category')); ?></div>
                </a>
            </li>
            
            <li>
                <a href="<?php echo e(route('Products.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Products')); ?></div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('Order.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Orders')); ?></div>
                </a>
            </li>

            
            

            <?php if(auth()->user()->isAbleTo('users-read')): ?>
            <li>
                <a href="<?php echo e(route('Sections.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-5"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Sections')); ?></div>
                </a>
            </li>
            <?php endif; ?>

            <?php if(auth()->user()->isAbleTo('users-read')): ?>
            <li>
                <a href="<?php echo e(route('Shops.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-5"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Shops')); ?></div>
                </a>
            </li>
            <?php endif; ?>

            <?php if(auth()->user()->isAbleTo('users-read')): ?>
            <li>
                <a href="<?php echo e(route('Bills.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-5"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Bills')); ?></div>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if(auth()->user()->isAbleTo('users-read')): ?>
            <li>
                <a href="<?php echo e(route('Users.index')); ?>" class="has-arrow">
                    <div class="parent-icon icon-color-2"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Users')); ?></div>
                </a>
            </li>
            <?php endif; ?>

           

            <li>
                <a class="has-arrow" href="#">
                    <div class="parent-icon icon-color-3"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('dashboard.Others')); ?></div>
                </a> 
                <ul>
                    <?php if(auth()->user()->isAbleTo('complaints-read')): ?>
                    <li> <a href="<?php echo e(route('Complaints.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.Complaints')); ?></a>
                    </li>
                    <?php endif; ?>
                     
                    <?php if(auth()->user()->isAbleTo('points-read')): ?>
                    <li> <a href="<?php echo e(route('points.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.points')); ?></a>
                    </li>
                    <?php endif; ?>
                     
                    <?php if(auth()->user()->isAbleTo('license-read')): ?>
                    <li> <a href="<?php echo e(route('Licenses.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.Licenses')); ?></a>
                    </li>
                    <?php endif; ?>
                        
                    <?php if(auth()->user()->isAbleTo('banners-read')): ?>
                    <li> <a href="<?php echo e(route('Banners.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.Banners')); ?></a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->isAbleTo('notifications-read')): ?>
                    <li> <a href="<?php echo e(route('Notification.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.Notification')); ?></a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->isAbleTo('news-read')): ?>
                    <li> <a href="<?php echo e(route('News.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.News')); ?></a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->isAbleTo('socials-read')): ?>
                    <li> <a href="<?php echo e(route('Social.index')); ?>"><i class="bx bx-right-arrow-alt"></i><?php echo e(__('dashboard.social')); ?></a>
                    </li>
                    <?php endif; ?>
                </ul> 
            </li> 

        </ul>
    </nav>
 </div>

 <?php $__env->startPush('script'); ?>
 <script>

       $(".toggledbuttom").click(function(){
           $("#toggled").toggleClass("toggled");
       });
   
</script>
<?php $__env->stopPush(); ?>





<?php /**PATH G:\Laravel\Creative-Project-Company\Services\StageNew\resources\views/include/nav.blade.php ENDPATH**/ ?>