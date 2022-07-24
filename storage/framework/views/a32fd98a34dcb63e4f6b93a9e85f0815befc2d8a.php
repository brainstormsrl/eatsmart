<?php echo $__env->make('restorants.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('poscloud::pos.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
?>
<div style="display: none" class="container-fluid py-2" id="orderDetails" >
   
    <div class="row" style="height: calc(100vh - 110px);" >
        <div class="col-sm-4 d-inline-block" style="background-color:#e9ecef; height:100%; overflow:auto;">
            <?php echo $__env->make('poscloud::pos.cartSideMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div id="start" class="col-sm-8 d-inline-block" style="height:100%;">
        
            <!-- Navbar Dark -->
                <div class="mt--3  navbar-expand-lg navbar-dark bg-gradient-dark z-index-3 py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-8">
                                <div class="field mt--3">
                                
                                    <select class="select2init noselecttwo" id="itemsSelect" placeholder="<?php echo e(__('Search for item')); ?>">
                                        <option></option>
                                        <?php if(!$restorant->categories->isEmpty()): ?>
                                        <?php $__currentLoopData = $restorant->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!$category->items->isEmpty()): ?>
                                                    <optgroup label="<?php echo e($category->name); ?>" >
                                                        <?php $__currentLoopData = $category->aitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>" ><?php echo e($item->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        
                                                    </optgroup>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                       
                                        
                                        
                                    </select>
                                
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modalCategories"><?php echo e(__('Categories')); ?></button> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            <!-- End Navbar -->

            <div class="row mt-3 px-5" style="height:90%; overflow:auto;">
                <?php if(!$vendor->categories->isEmpty()): ?>
                    
                    <?php $__currentLoopData = $vendor->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$category->aitems->isEmpty()): ?>
                            
                            <div class="mt-4" id="<?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>" class="<?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>">
                                <h1><?php echo e($category->name); ?></h1>
                            </div>
                        <?php endif; ?>
                    

                    <?php $__currentLoopData = $category->aitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div  onClick="setCurrentItem(<?php echo e($item->id); ?>)" class="col-xl-3 col-md-6 mb-3 mt-3">
                            <div class="card">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                <img src="<?php echo e($item->logom); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-2 pb-1">
                                <span class="badge bg-gradient-light"><?php echo money($item->price, config('settings.cashier_currency'),config('settings.do_convertion')); ?></span><br />
                                <strong  class="text-dark mb-2 text"><?php echo e($item->name); ?></strong>
                                
                            </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
                
            </div>

        </div>
    </div>
  </div>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('custom')); ?>/js/order.js"></script>
    <?php echo $__env->make('restorants.phporderinterface', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\restaurant\modules\Poscloud\Providers/../Resources/views/pos/order.blade.php ENDPATH**/ ?>