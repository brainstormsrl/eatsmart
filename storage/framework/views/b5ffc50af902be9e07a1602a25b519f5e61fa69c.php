<div class="row align-items-center" v-cloak>
    <div :class="item.pulse"></div>
    <div class="col ml--2">
        <small> {{ item.last_status }}</small><br />
        <small> {{ item.time }}</small>
        <h4 class="mb-0">
            <a href="#!">#{{ item.id }} {{ item.restaurant_name }}</a>
        </h4>
        <small>{{ item.client }}</small><br />
        <small>{{ item.price }}</small><br />
    </div>
    <div class="col-auto">
        <button class="btn btn-sm btn-primary" onclick="notifyMe()" id="test"><?php echo e(__('Details')); ?></button>
    </div>
  </div>
<?php /**PATH D:\projects\www\eatsmart\resources\views/orders/partials/liveitem.blade.php ENDPATH**/ ?>