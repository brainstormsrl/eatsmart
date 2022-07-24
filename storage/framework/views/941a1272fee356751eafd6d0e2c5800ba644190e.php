<div class="card card-profile shadow mt-3 mb-3" id="expedition">
  
    <div class="px-4">
      
      <div class="card-content ">
        <br />

        <label><?php echo e(__('Client name')); ?></label>
        <div class="input-group mb-3">
            <input :value="config.client_name"  type="text" id="client_name" class="form-control" placeholder="<?php echo e(__('Client name')); ?>" aria-label="o" autofocus>
        </div>

        <label><?php echo e(__('Client phone')); ?></label>
        <div class="input-group mb-3">
            <input  :value="config.client_phone" type="text" id="client_phone"  class="form-control" placeholder="<?php echo e(__('Client phone')); ?>" aria-label="phone">
        </div>

       
        
        <label><?php echo e(__('Time')); ?></label><br />
        <div class="input-group mb-3">
          <select name="timeslot" id="timeslot" class="form-control<?php echo e($errors->has('timeslot') ? ' is-invalid' : ''); ?>" required>
            <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value=<?php echo e($value); ?>><?php echo e($text); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div id="client_address_fields">
          <label><?php echo e(__('Client address')); ?></label>
          <div class="input-group mb-3">
           
              <input :value="config.client_address" type="text" id="client_address" class="form-control" placeholder="<?php echo e(__('Client address')); ?>">
          </div>
  
          <label><?php echo e(__('Delivery area')); ?></label>
          <div class="input-group mb-3">
            <select name="delivery_area" id="delivery_area" class="form-control<?php echo e($errors->has('deliveryAreas') ? ' is-invalid' : ''); ?>" >
              <option  value="0"><?php echo e(__('Select delivery area')); ?></option>
              <?php $__currentLoopData = $deliveryAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simplearea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option  value=<?php echo e($simplearea->id); ?>><?php echo e($simplearea->getPriceFormated()); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>

        <div class="input-group mb-3">
          <button onclick="updateExpeditionPOS()" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
        </div>

       

      </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\restaurant\modules\Poscloud\Providers/../Resources/views/pos/expedition.blade.php ENDPATH**/ ?>