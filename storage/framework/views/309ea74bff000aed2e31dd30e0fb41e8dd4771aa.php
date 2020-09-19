<?php $__env->startSection('content'); ?>
    <?php
        $status = $order->orderDetails->first()->delivery_status;
    ?>
    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited justify-content-center">
                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-shopping-cart"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. <?php echo e(translate('My Cart')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-map-o"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. <?php echo e(translate('Shipping info')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-truck"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. <?php echo e(translate('Delivery info')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-credit-card"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. <?php echo e(translate('Payment')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
                                <i class="la la-check-circle"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">5. <?php echo e(translate('Confirmation')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center py-4 border-bottom mb-4">
                                    <i class="la la-check-circle la-3x text-success mb-3"></i>
                                    <h1 class="h3 mb-3"><?php echo e(translate('Thank You for Your Order!')); ?></h1>
                                    <h2 class="h5 strong-700"><?php echo e(translate('Order Code:')); ?> <?php echo e($order->code); ?></h2>
                                    <p class="text-muted text-italic"><?php echo e(translate('A copy or your order summary has been sent to')); ?> <?php echo e(json_decode($order->shipping_address)->email); ?></p>
                                </div>
                                <div class="mb-4">
                                    <h5 class="strong-600 mb-3 border-bottom pb-2"><?php echo e(translate('Order Summary')); ?></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="details-table table">
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Order Code')); ?>:</td>
                                                    <td><?php echo e($order->code); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Name')); ?>:</td>
                                                    <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Email')); ?>:</td>
                                                    <td><?php echo e(json_decode($order->shipping_address)->email); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Shipping address')); ?>:</td>
                                                    <td><?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="details-table table">
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Order date')); ?>:</td>
                                                    <td><?php echo e(date('d-m-Y H:i A', $order->date)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Order status')); ?>:</td>
                                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Total order amount')); ?>:</td>
                                                    <td><?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(translate('Payment method')); ?>:</td>
                                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="strong-600 mb-3 border-bottom pb-2"><?php echo e(translate('Order Details')); ?></h5>
                                    <div>
                                        <table class="details-table table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="30%"><?php echo e(translate('Product')); ?></th>
                                                    <th><?php echo e(translate('Variation')); ?></th>
                                                    <th><?php echo e(translate('Quantity')); ?></th>
                                                    <th><?php echo e(translate('Courier')); ?></th>
                                                    <th><?php echo e(translate('Service')); ?></th>
                                                    <th><?php echo e(translate('Shipping Cost')); ?></th>
                                                    <th class="text-right"><?php echo e(translate('Price')); ?></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td>
                                                            <?php if($orderDetail->product != null): ?>
                                                                <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank">
                                                                    <?php echo e($orderDetail->product->name); ?>

                                                                </a>
                                                            <?php else: ?>
                                                                <strong><?php echo e(translate('Product Unavailable')); ?></strong>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($orderDetail->variation); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($orderDetail->quantity); ?>

                                                        </td>
                                                        <td><?php echo e(strtoupper($orderDetail->logistics)); ?></td>
                                                        <td><?php echo e(strtoupper($orderDetail->service)); ?></td>
                                                        <td><?php echo e(strtoupper($orderDetail->shipping_cost)); ?></td>
                                                        <td class="text-right"><?php echo e(single_price($orderDetail->price)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-5 col-md-6 ml-auto">
                                            <table class="table details-table">
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo e(translate('Total')); ?></th>
                                                        <td class="text-right">
                                                            <span class="strong-600"><?php echo e(single_price($order->orderDetails->sum('price'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(translate('Shipping')); ?></th>
                                                        <td class="text-right">
                                                            <span class="text-italic"><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(translate('Tax')); ?></th>
                                                        <td class="text-right">
                                                            <span class="text-italic"><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(translate('Coupon Discount')); ?></th>
                                                        <td class="text-right">
                                                            <span class="text-italic"><?php echo e(single_price($order->coupon_discount)); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="strong-600"><?php echo e(translate('Subtotal')); ?></span></th>
                                                        <td class="text-right">
                                                            <strong><span><?php echo e(single_price($order->grand_total)); ?></span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/order_confirmed.blade.php ENDPATH**/ ?>