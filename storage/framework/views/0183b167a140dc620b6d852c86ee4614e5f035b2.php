<ul class="navbar-nav">
    <?php if(config('app.ordering')): ?>
       <?php if(in_array("poscloud", config('global.modules',[]))): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('home')); ?>">
                    <i class="ni ni-tv-2 text-primary"></i> <?php echo e(__('POS')); ?>

                </a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="/live">
                <i class="ni ni-basket text-success"></i> <?php echo e(__('Live Orders')); ?><div class="blob red"></div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">
                <i class="ni ni-basket text-orangse"></i> <?php echo e(__('Orders')); ?>

            </a>
        </li>
    <?php endif; ?>
    <?php $__currentLoopData = auth()->user()->getExtraMenus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route($menu['route'],isset($menu['params'])?$menu['params']:[])); ?>">
                    <i class="<?php echo e($menu['icon']); ?>"></i> <?php echo e(__($menu['name'])); ?>

                </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
<?php /**PATH D:\projects\www\eatsmart\resources\views/layouts/navbars/menus/staff.blade.php ENDPATH**/ ?>