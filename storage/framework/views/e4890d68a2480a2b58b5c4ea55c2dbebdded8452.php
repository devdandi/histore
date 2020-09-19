

<?php $__env->startSection('content'); ?>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(__('Refund Request All')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Order Id')); ?></th>
                    <th><?php echo e(__('Seller Name')); ?></th>
                    <th><?php echo e(__('Product')); ?></th>
                    <th><?php echo e(__('Price')); ?></th>
                    <th><?php echo e(__('Seller Approval')); ?></th>
                    <th><?php echo e(__('Admin Approval')); ?></th>
                    <th><?php echo e(__('Refund Status')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($refunds->currentPage() - 1)*$refunds->perPage()); ?></td>
                        <td><?php echo e($refund->order->code); ?></td>
                        <td>
                            <?php if($refund->seller != null): ?>
                                <?php echo e($refund->seller->name); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->orderDetail != null && $refund->orderDetail->product != null): ?>
                                <a href="<?php echo e(route('product', $refund->orderDetail->product->slug)); ?>" target="_blank" class="media-block">
                                    <div class="media-left">
                                        <img loading="lazy"  class="img-md" src="<?php echo e(asset($refund->orderDetail->product->thumbnail_img)); ?>" alt="Image">
                                    </div>
                                    <div class="media-body"><?php echo e(__($refund->orderDetail->product->name)); ?></div>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->orderDetail != null): ?>
                                <?php echo e(single_price($refund->orderDetail->price)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->seller_approval == 1): ?>
                                <div class="label label-table label-success">
                                    <?php echo e(__('Approved')); ?>

                                </div>
                            <?php else: ?>
                                <div class="label label-table label-warning">
                                    <?php echo e(__('Pending')); ?>

                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->admin_approval == 1): ?>
                                <div class="label label-table label-success">
                                    <?php echo e(__('Approved')); ?>

                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->refund_status == 1): ?>
                                <div class="label label-table label-success">
                                    <?php echo e(__('Paid')); ?>

                                </div>
                            <?php else: ?>
                                <div class="label label-table label-warning">
                                    <?php echo e(__('Non-Paid')); ?>

                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($refunds->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/refund_request/paid_refund.blade.php ENDPATH**/ ?>