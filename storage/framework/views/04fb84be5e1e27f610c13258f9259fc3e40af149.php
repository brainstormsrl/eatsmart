<div class="container-fluid py-2" id="floorTabs">
    <div class="row">
      <div class="col-12 col-xl-12">
        <div class="card h-100">
          <div class="card-body p-3">
            <div class="nav-wrapper position-relative end-0">
                  <div class="tab-content" id="floorTabsContent" >
                    <?php $__currentLoopData = $vendor->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade  <?php echo e($key==0?"show active":""); ?>" id="area-<?php echo e($area->id); ?>" role="tabpanel" aria-labelledby="area-<?php echo e($area->id); ?>-tab">
                          <div class="card card-frame" style="text-align: center; justify-content: center; align-items: center;" >
                            <div class="card-body ">
                              <div class="canva " id="canvaHolder">
  
                                <?php $__currentLoopData = $area->tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                          
                                            $whString="";
                                            if($table->w||$table->h){
                                                $whString="width: ".$table->w."px; height: ".$table->h."px;";
                                            }
                                            ?>
                                            <div 
                                            id="drag-<?php echo e($table->id); ?>" 
                                            data-id="<?php echo e($table->id); ?>" 
                                            data-x="<?php echo e($table->x); ?>"
                                            data-y="<?php echo e($table->y); ?>"
                                            data-name="<?php echo e($table->name); ?>"
                                            data-rounded="<?php echo e($table->rounded?$table->rounded:"no"); ?>"
                                            data-size="<?php echo e($table->size); ?>"
                                            class="resize-drag <?php echo e($table->rounded=="yes"?"circle":""); ?>" style="transform: translate(<?php echo e($table->x); ?>px, <?php echo e($table->y); ?>px); <?php echo e($whString); ?>" >
                                                <p> <?php echo e($table->name); ?> </p>
                                                <span><?php echo e($table->size); ?></span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
           
    </div>
  </div>
  </div>
      </div>
  </div>
  </div><?php /**PATH C:\xampp\htdocs\restaurant\modules\Poscloud\Providers/../Resources/views/pos/floor.blade.php ENDPATH**/ ?>