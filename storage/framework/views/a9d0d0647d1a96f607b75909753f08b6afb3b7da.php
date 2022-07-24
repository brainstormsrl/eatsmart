<div class="row">
    <div class="col-md-6 mt-3">
        <h6 class="heading-small text-muted mb-4"><?php echo e(__('Plugins')); ?></h6>
        <label for="pluginsSelector"><?php echo e(__('Select available plugins or leave empty for all')); ?></label><br />
        <select style="height: 200px" name="pluginsSelector[]" multiple="multiple" class="form-control noselecttwo"  id="pluginsSelector">
            <?php
                $perviousPlans=isset($plan)?json_decode($plan->getConfig('plugins','[]'),false):[];
                
            ?>
            <?php $__currentLoopData = $allplugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(is_array($perviousPlans)&&in_array($plugin->alias,$perviousPlans)): ?>
                    selected
                <?php endif; ?> id="plugin<?php echo e($plugin->alias); ?>" value="<?php echo e($plugin->alias); ?>"><?php echo e(strlen($plugin->name)>0?$plugin->name:ucfirst($plugin->alias)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurant\resources\views/plans/plugins.blade.php ENDPATH**/ ?>