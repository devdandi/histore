

<?php $__env->startSection('content'); ?>
<?php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
?>
<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(translate('Orders')); ?></h3>

        <div class="pull-right clearfix">
            <form class="" id="sort_orders" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order code & hit Enter')); ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Order Code')); ?></th>
                    <th><?php echo e(translate('Num. of Products')); ?></th>
                    <th><?php echo e(translate('Customer')); ?></th>
                    <th><?php echo e(translate('Amount')); ?></th>
                    <th><?php echo e(translate('Delivery Status')); ?></th>
                    <th><?php echo e(translate('Payment Status')); ?></th>
                    <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                        <th><?php echo e(translate('Refund')); ?></th>
                    <?php endif; ?>
                    <th width="10%"><?php echo e(translate('options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e(($key+1) + ($orders->currentPage() - 1)*$orders->perPage()); ?>

                        </td>
                        <td>
                            <?php echo e($order->code); ?>

                        </td>
                        <td>
                            <?php echo e(count($order->orderDetails)); ?>

                        </td>
                        <td>
                            <?php if($order->user != null): ?>
                                <?php echo e($order->user->name); ?>

                            <?php else: ?>
                                Guest (<?php echo e($order->guest_id); ?>)
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e(single_price($order->grand_total)); ?>

                        </td>
                        <td>
                            <?php
                                $status = 'Delivered';
                                foreach ($order->orderDetails as $key => $orderDetail) {
                                    if($orderDetail->delivery_status != 'delivered'){
                                        $status = 'Pending';
                                    }
                                }
                            ?>
                            <?php echo e($status); ?>

                        </td>
                        <td>
                            <span class="badge badge--2 mr-4">
                                <?php if($order->payment_status == 'paid'): ?>
                                    <i class="bg-green"></i> <?php echo e(translate('Paid')); ?>

                                <?php else: ?>
                                    <i class="bg-red"></i> <?php echo e(translate('Unpaid')); ?>

                                <?php endif; ?>
                            </span>
                        </td>
                        <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                            <td>
                                <?php if(count($order->refund_requests) > 0): ?>
                                    <?php echo e(count($order->refund_requests)); ?> <?php echo e(translate('Refund')); ?>

                                <?php else: ?>
                                    <?php echo e(translate('No Refund')); ?>

                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(translate('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo e(route('sales.show', encrypt($order->id))); ?>"><?php echo e(translate('View')); ?></a></li>
                                    <li><a href="<?php echo e(route('customer.invoice.download', $order->id)); ?>"><?php echo e(translate('Download Invoice')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('orders.destroy', $order->id)); ?>');"><?php echo e(translate('Delete')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($orders->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/sales/index.blade.php ENDPATH**/ ?>