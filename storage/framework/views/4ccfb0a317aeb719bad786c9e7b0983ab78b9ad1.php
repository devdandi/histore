<?php $__env->startSection('content'); ?>
<?php 
$shipping_cost = 0;
$subtotal = 0;
$shipping_info = '';
?>

<div class="container">
    <div class="d-flex bd-highlight mb-3">
        <div class="mr-auto p-2 bd-highlight"><h5><?php echo e(translate('Order')); ?> : #<?php echo e($orders); ?></h5></div>
        <div class="p-2 bd-highlight"><?php echo e(translate('Order date')); ?>: #<?php echo e($order[0]->created_at); ?></div>
    </div>

    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $shipping_info = \App\Order::where('id', $data->order_id)->first()->shipping_address; ?>
    <div class="card mb-2">
        <div class="card-body">
            <p><b><?php echo e(translate('Package')); ?> #<?php echo e($num+1); ?></b></p>
            <?php $__currentLoopData = \App\User::where('id', $data->seller_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><b><?php echo e(translate('Sell by')); ?>:  <a href="#"><?php echo e($c->name); ?></a></b></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <hr>
                <div class="pt-4">
                    <ul style="background-color: #F7F7F7" class="process-steps  clearfix">
                    <li <?php if($data->delivery_status == 'pending'): ?> class="active" <?php else: ?> class="done" <?php endif; ?>>
                        <div class="icon"></div>
                        <div class="title"><img src="<?php echo e(my_asset('uploads/icon/orderaccept.png')); ?>" ></div>                
                    </li>
                    <li <?php if($data->delivery_status == 'on_review'): ?> class="active" <?php elseif($data->delivery_status == 'on_delivery' || $data->delivery_status == 'delivered'): ?> class="done" <?php endif; ?>>
                        <div class="icon"></div>
                        <div class="title"><img src="<?php echo e(my_asset('uploads/icon/packing.png')); ?>" ></div>
                    </li>
                    <li <?php if($data->delivery_status == 'on_delivery'): ?> class="active" <?php elseif($data->delivery_status == 'delivered'): ?> class="done" <?php endif; ?>>
                        <div class="icon"></div>
                        <div class="title"><img src="<?php echo e(my_asset('uploads/icon/ondelivery.png')); ?>" ></div>
                    </li>
                    <li <?php if($data->delivery_status == 'delivered'): ?> class="done" <?php endif; ?>>
                        <div class="icon"></div>
                        <div class="title"><img src="<?php echo e(my_asset('uploads/icon/itemrecieved.png')); ?>" ></div>
                    </li>
                </ul>
            </div>

            <!-- <div class="d-flex justify-content-center mt-2">

                <button class="btn bg-orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Status Order
                </button>
                
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <p><?php echo e($data->created_at); ?> <b><?php echo e(translate('Order confirmed')); ?></b></p>
                </div>
                </div>
            </div> -->

            <div class="d-flex justify-content-between mt-5">
                <div class="mt-2">
                    <?php $__currentLoopData = \App\Product::where('id', $data->product_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media">
                <img width="100" src="<?php echo e(my_asset($pro->thumbnail_img)); ?>" class="align-self-start mr-3" alt="...">
                <div class="media-body">
                    <p class="mt-0"><b><?php echo e($pro->name); ?></b></p>
                </div>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </div>
                <div class="mt-2">
                    <p><b><?php echo e(translate('Price')); ?></b> <?php echo e(single_price($data->price)); ?></p>
                </div>
                <div class="mt-2">
                    <p><b><?php echo e(translate('Quantity')); ?></b> <?php echo e($data->quantity); ?></p>
                </div>
                <div class="mt-2">
                <a  href="<?php echo e(route('refund_request_send_page', $data->id)); ?>"><?php echo e(translate('Refund')); ?></a>
                </div>
            </div>

            <div class="float-right">
                <p><b><?php echo e(translate('Courier')); ?>:<?php echo e(strtoupper($data->logistics)); ?> <?php echo e($data->service); ?></b></p>
                <p><b><?php echo e(translate('Shipping Cost')); ?> <?php echo e(single_price($data->shipping_cost)); ?></b></p>
                <p><b><?php echo e(translate('Receipt')); ?> <?php echo e($data->receipt); ?></b></p>

                <?php $shipping_cost+=$data->shipping_cost; 
                    $subtotal+= $data->price;
                ?>

            </div>
            

        </div>
        
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo e(translate('Shipping info')); ?></h5>
                    <hr>
                    <?php 
                    $json = json_decode($shipping_info);?>
                    <p><?php echo e(translate('Name')); ?>: <?php echo e($json->name); ?></p>
                    <p><?php echo e(translate('Address')); ?> <?php echo e($json->address); ?></p>


                <button id="btnss" class="btn bg-orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <?php echo e(translate('More detail')); ?>

                </button>
                <button id="btnssa" hidden class="btn bg-orange" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <?php echo e(translate('More detail')); ?>

                </button>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                <p><?php echo e(translate('Country')); ?> <?php echo e($json->country); ?></p>
                    <p><?php echo e(translate('Province')); ?> <?php echo e($json->province); ?></p>
                    <p><?php echo e(translate('City')); ?> <?php echo e($json->type); ?> <?php echo e($json->city); ?></p>
                    <p><?php echo e(translate('District')); ?> <?php echo e($json->district); ?></p>
                    <p><?php echo e(translate('Postal Code')); ?> <?php echo e($json->postal_code); ?></p>
                    <p><?php echo e(translate('Phone')); ?> <?php echo e($json->phone); ?></p>
                </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo e(translate('Order Summary')); ?></h5>
                    <hr>
                    <p><?php echo e(translate('Shipping Cost')); ?> : <?php echo e(single_price($shipping_cost)); ?></p>
                    <p><?php echo e(translate('Order Ammount')); ?> : <?php echo e(single_price($subtotal)); ?></p>
                    
                    <p><?php echo e(translate('Subtotal')); ?> : <?php echo e(single_price($subtotal+$shipping_cost)); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/order/index_customer.blade.php ENDPATH**/ ?>