<!-- Payment Modal -->
<div class="modal  fade " id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default"><?php echo e(__('Payment')); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form role="form text-left">
                            <label><?php echo e(__('Payment method')); ?></label>
                            <div class="input-group mb-3">
                                <select @change="onChange($event)" class="form-control noselecttwo" id="paymentType" >
                                    <option value="cash"><?php echo e(__('Cash')); ?></option>
                                    <option value="cardterminal"><?php echo e(__('Card terminal')); ?></option>
                                    <option value="onlinepayments"><?php echo e(__('Online payments')); ?></option>
                                </select>
                            </div>
                            <label><?php echo e(__('Total')); ?></label>
                            <p class="h2">{{ totalPriceFormat }} </p>


                        </form>
                    </div>
                    <div class="col">
                        <form role="form text-left">
                            <label><?php echo e(__('Received ammount')); ?></label>
                            <div class="input-group mb-3">
                                <input type="text" v-model="received" class="form-control" placeholder="0" aria-label="o" autofocus>
                            </div>
                            <label><?php echo e(__('Change')); ?></label>
                            <p class="h2 text-success">{{ received-totalPrice>0?(received-totalPrice).toFixed(2):0 }}
                            </p>

                            <label><?php echo e(__('Remaining')); ?></label>
                            <p class="h2 text-danger">{{ totalPrice-received>0?(totalPrice-received).toFixed(2):0 }}
                            </p>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer" v-if="received-totalPrice>=0" v-cloak>

                <i id="indicator" style="display: none" class="fas fa-spinner fa-spin"></i>
                <button type="button" id="submitOrderPOS" onclick="submitOrderPOS()" class="btn bg-gradient-primary">
                    <span class="btn-inner--text"><?php echo e(__('Submit')); ?></span>
                    <span class="btn-inner--icon"><i class="ni ni-curved-next"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Payment Modal -->

<!-- Categories Modal -->
<div class="modal  fade " id="modalCategories" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default"><?php echo e(__('Categories')); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if(!$restorant->categories->isEmpty()): ?>



                <?php $__currentLoopData = $restorant->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$category->items->isEmpty()): ?>
                <a onclick="$('#modalCategories').modal('hide')" data-dismiss="modal"
                    id="<?php echo e('nav_'.clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>"
                    href="#<?php echo e(clean(str_replace(' ', '', strtolower($category->name)).strval($key))); ?>" role="button"
                    aria-pressed="true" type="button" class="btn btn-primary btn-lg w-100"><?php echo e($category->name); ?></a>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                <?php endif; ?>


            </div>
            <div class="modal-footer" v-if="received-totalPrice>=0" v-cloak>
                <button type="button" class="btn bg-gradient-primary"><?php echo e(__('Submit')); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- End Categories Modal -->

<!-- Switch Tables Modal -->
<div class="modal  fade " id="modalSwitchTables" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default"><?php echo e(__('Switch table')); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label><?php echo e(__('Move order from')); ?></label>
                        <div class="input-group mb-3">
                            <select class="form-control noselecttwo" id="orderFrom">
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label><?php echo e(__('Move order to')); ?></label>
                        <div class="input-group mb-3">
                            <select class="form-control noselecttwo" id="orderTo">
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="swithTableButton" class="btn bg-gradient-primary"><?php echo e(__('Submit')); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- End Switch Tables Modal -->

<!-- POS invoice Modal -->
<div class="modal  fade " id="modalPOSInvoice" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default"><?php echo e(__('POS Invoice')); ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="posRecipt" class="ml-1">
                    <p class="text-right"><?php echo e(__('Date')); ?> : {{ order?order.time_created:"" }}</p>
                    <center id="header">
                        <div class="name">
                            <h3><?php echo e($vendor->name); ?></h3>
                        </div>
                      </center>
                    <div v-if="order&&order.delivery_method!=3" v-cloak class="blockDelivery">
                      <p v-if="order&&order.delivery_method==1" v-cloak><?php echo e(__('Delivery order')); ?></p>
                      <p v-if="order&&order.delivery_method==2" v-cloak><?php echo e(__('Pickup order')); ?></p>
                      <p><?php echo e(__('Client name')); ?>: {{ order?order.configs.client_name:"" }}</p>
                      <p><?php echo e(__('Client phone')); ?>: {{ order&&order.configs.client_phone?order.configs.client_phone:"" }}</p>
                      <p><?php echo e(__('Time')); ?>: {{ order?order.time_formated:"" }}</p>
                      <p v-if="delivery_method==1" v-cloak><?php echo e(__('Client address')); ?>: {{ order?order.whatsapp_address:"" }}</p>
                    </div>
                    
                    <div v-if="order&&order.delivery_method==3" v-cloak  class="blockDinein">
                      <p><?php echo e(__('Area')); ?>: {{ order&&order.tableassigned&&order.tableassigned[0]?order.tableassigned[0].restoarea.name:"" }}</p>
                      <p><?php echo e(__('Table')); ?>: {{ order&&order.tableassigned&&order.tableassigned[0]?order.tableassigned[0].name:"" }}</p>
                    </div>
                    <div class="table-responsive w-100">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="col-8" scope="col"><?php echo e(__('Item')); ?></th>
                                <th  class="col-2" scope="col"><?php echo e(__('Qty')); ?></th>
                                <th  class="col-2" scope="col"><?php echo e(__('Subtotal')); ?></th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr v-for="item in (order?order.items:[])">
                                <td>{{ item.name+" "+item.pivot.variant_name+" "+(item.pivot.extras.replace('["',"").replace('"]',"").replace('","',"  ").replace('","',"  ").replace('","',"  ").replace("[]","")) }}</td>
                                <td>{{ item.pivot.qty }}</td>
                                <td>{{ formatPrice(item.pivot.qty*item.pivot.variant_price) }}</td>
                            </tr>
                            <tr>
                              <th></th>
                              <th><?php echo e(__('Tax inc.')); ?></th>
                              <td>{{ order?formatPrice(order.vatvalue.toFixed(2)):"" }}</td>
                            </tr>
                            <tr v-if="order&&order.delivery_method==1" class="blockDelivery">
                                <th></th>
                                <th><?php echo e(__('Delivery')); ?></th>
                                <td>{{ order? formatPrice(order.delivery_price.toFixed(2)):"" }}</td>
                            </tr>
                            <tr v-if="order&&order.discount>0" class="blockDelivery">
                                <th></th>
                                <th><?php echo e(__('Discount')); ?></th>
                                <td>{{ order? formatPrice(order.discount.toFixed(2)):"" }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="totalInModal" class="mt-2 w-100">
                        <tbody>
                            <tr>
                                <th class="p-1 w-70"><?php echo e(__('Total')); ?></th>
                                <th class="p-1 w-30">{{ order?formatPrice((order.order_price_with_discount+order.delivery_price).toFixed(2)):"" }}</th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center" v-if="order&&order.payment_link">
                        <br />
                        <p><?php echo e(__('Scan to pay')); ?></p>
                        
                        <a :href="order.payment_link" target="_blank">
                            <img :src=" 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='+order.payment_link" class="image mr-3" alt=""/>
                        </a>
                        <br /><br />
                    </div>
                    
                    </div>    
                </div>


                <div class="modal-footer">
                    <button data-bs-dismiss="modal" class="btn bg-gradient-default"><?php echo e(__('Close')); ?></button>
                    <button id="printPos" class="btn bg-gradient-primary"><?php echo e(__('Print')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End POS invoice Modal -->
<?php /**PATH C:\xampp\htdocs\restaurant\modules\Poscloud\Providers/../Resources/views/pos/modals.blade.php ENDPATH**/ ?>