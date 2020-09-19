<div class="modal-header">
    <h5 class="modal-title strong-600 heading-5"><?php echo e(translate('Order id')); ?>: <?php echo e($order->code); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php
    $status = $order->orderDetails->where('seller_id', Auth::user()->id)->first()->delivery_status;
    $payment_status = $order->orderDetails->where('seller_id', Auth::user()->id)->first()->payment_status;
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
?>

<div class="modal-body gry-bg px-3 pt-0">
    <div class="pt-4">
        <ul class="process-steps clearfix">
            <li <?php if($status == 'pending'): ?> class="active" <?php else: ?> class="done" <?php endif; ?>>
                <div class="icon"></div>
				<div class="title"><img src="<?php echo e(('public/uploads/icon/orderaccept.png')); ?>" ></div>                
            </li>
            <li <?php if($status == 'on_review'): ?> class="active" <?php elseif($status == 'on_delivery' || $status == 'delivered'): ?> class="done" <?php endif; ?>>
                <div class="icon"></div>
                <div class="title"><img src="<?php echo e(('public/uploads/icon/packing.png')); ?>" ></div>
            </li>
            <li <?php if($status == 'on_delivery'): ?> class="active" <?php elseif($status == 'delivered'): ?> class="done" <?php endif; ?>>
                <div class="icon"></div>
                <div class="title"><img src="<?php echo e(('public/uploads/icon/ondelivery.png')); ?>" ></div>
            </li>
            <li <?php if($status == 'delivered'): ?> class="done" <?php endif; ?>>
                <div class="icon"></div>
                <div class="title"><img src="<?php echo e(('public/uploads/icon/itemrecieved.png')); ?>" ></div>
            </li>
        </ul>
    </div>
    <div class="row mt-5">
        <div class="offset-lg-4 col-lg-4 col-sm-6">
            <div class="form-inline">
                <select class="form-control selectpicker form-control-sm"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                    <option value="pending" <?php if($status == 'pending'): ?> selected <?php endif; ?>><?php echo e(translate('Order Accepted')); ?></option>
                    <option value="on_review" <?php if($status == 'on_review'): ?> selected <?php endif; ?>><?php echo e(translate('Packing')); ?></option>
                    <option value="on_delivery" <?php if($status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(translate('On Delivery')); ?></option>
                </select>
                <label class="my-2" ><?php echo e(translate('Order Status')); ?></label>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header py-2 px-3 ">
        <div class="heading-6 strong-600"><?php echo e(translate('Order Summary')); ?></div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-lg-6">
                    <table class="details-table table">
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Order Code')); ?>:</td>
                            <td><?php echo e($order->code); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Customer')); ?>:</td>
                            <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Email')); ?>:</td>
                            <?php if($order->user_id != null): ?>
                                <td><?php echo e($order->user->email); ?></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Shipping address')); ?>:</td>
                            <td><?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->postal_code); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="details-table table">
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Order date')); ?>:</td>
                            <td><?php echo e(date('d-m-Y H:i A', $order->date)); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Order amount')); ?>:</td>
                            <td><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax'))); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Contact buyer')); ?>:</td>
                            <td><?php echo e(json_decode($order->shipping_address)->phone); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 strong-600"><?php echo e(translate('Payment method')); ?>:</td>
                            <td><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card mt-4">
                <div class="card-header py-2 px-3 heading-6 strong-600"><?php echo e(translate('Order Details')); ?></div>
                <div class="card-body pb-0">
                    <table class="details-table table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="40%"><?php echo e(translate('Product')); ?></th>
                                <th><?php echo e(translate('Variation')); ?></th>
                                <th><?php echo e(translate('Quantity')); ?></th>
                                <th><?php echo e(translate('Courier')); ?></th>
                                <th><?php echo e(translate('Service')); ?></th>

                                <th><?php echo e(translate('Price')); ?></th>
                                <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                                    <th><?php echo e(translate('Refund')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->orderDetails->where('seller_id', Auth::user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php if($orderDetail->product != null): ?>
                                            <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank"><?php echo e($orderDetail->product->name); ?></a>
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
                                    <td> <?php echo e($orderDetail->logistics); ?></td>
                                    <td> <?php echo e($orderDetail->service); ?></td>
                    
                                    <td><?php echo e(single_price($orderDetail->price)); ?></td>
                                    <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                                        <td>
                                            <?php if($orderDetail->product != null && $orderDetail->product->refundable != 0 && $orderDetail->refund_request == null): ?>
                                                <button type="submit" class="btn btn-styled btn-sm btn-base-1" onclick="send_refund_request('<?php echo e($orderDetail->id); ?>')"><?php echo e(translate('Send')); ?></button>
                                            <?php elseif($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 0): ?>
                                                <span class="strong-600"><?php echo e(translate('Pending')); ?></span>
                                            <?php elseif($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 1): ?>
                                                <span class="strong-600"><?php echo e(translate('Paid')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mt-4">
                <div class="card-header py-2 px-3 heading-6 strong-600"><?php echo e(translate('Order Ammount')); ?></div>
                <div class="card-body pb-0">
                    <table class="table details-table">
                        <tbody>
                            <tr>
                                <th><?php echo e(translate('Subtotal')); ?></th>
                                <td class="text-right">
                                    <span class="strong-600"><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo e(translate('Shipping')); ?></th>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('shipping_cost'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo e(translate('Tax')); ?></th>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><span class="strong-600"><?php echo e(translate('Total')); ?></span></th>
                                <td class="text-right">
                                    <strong>
                                        <span><?php echo e(single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('tax') + $order->orderDetails->where('seller_id', Auth::user()->id)->sum('shipping_cost'))); ?>

                                        </span>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#update_delivery_status').on('change', function(){
        var order_id = <?php echo e($order->id); ?>;
        var status = $('#update_delivery_status').val();
        $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
            $('#order_details').modal('hide');
            showFrontendAlert('success', 'Order status has been updated');
            location.reload().setTimeOut(500);
        });
    });

    $('#update_payment_status').on('change', function(){
        var order_id = <?php echo e($order->id); ?>;
        var status = $('#update_payment_status').val();
        $.post('<?php echo e(route('orders.update_payment_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
            $('#order_details').modal('hide');
            //console.log(data);
            showFrontendAlert('success', 'Payment status has been updated');
            location.reload().setTimeOut(500);
        });
    });
</script>
<?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/partials/order_details_seller.blade.php ENDPATH**/ ?>