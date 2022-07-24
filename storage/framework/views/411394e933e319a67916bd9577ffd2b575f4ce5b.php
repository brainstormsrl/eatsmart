<?php $__env->startSection('floorPlan'); ?>
  <?php echo $__env->make('poscloud::pos.floor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('orders'); ?>
  <?php echo $__env->make('poscloud::pos.orders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('orderDetails'); ?>
  <?php echo $__env->make('poscloud::pos.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('poscloud::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restaurant\modules\Poscloud\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>