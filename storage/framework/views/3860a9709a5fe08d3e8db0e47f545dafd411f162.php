

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
                    <th><?php echo e(__('Refund Status')); ?></th>
                    <th width="10%"><?php echo e(__('Options')); ?></th>
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
                            <?php if($refund->orderDetail->product != null && $refund->orderDetail->product->added_by == 'admin'): ?>
                                <div class="label label-mint">
                                    <?php echo e(__('Own Product')); ?>

                                </div>
                            <?php else: ?>
                                <?php if($refund->seller_approval == 1): ?>
                                    <div class="label label-info">
                                        <?php echo e(__('Approved')); ?>

                                    </div>
                                <?php else: ?>
                                    <div class="label label-warning">
                                        <?php echo e(__('Pending')); ?>

                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->refund_status == 1): ?>
                                <div class="label label-secondary">
                                    <?php echo e(__('Paid')); ?>

                                </div>
                            <?php else: ?>
                                <div class="label label-warning">
                                    <?php echo e(__('Non-Paid')); ?>

                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a onclick="refund_request_money('<?php echo e($refund->id); ?>')"><?php echo e(__('Refund Now')); ?></a></li>
                                    <li><a href="<?php echo e(route('reason_show', $refund->id)); ?>" target="_blank"><?php echo e(__('View Reason')); ?></a></li>
                                </ul>
                            </div>
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
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_refund_approval(el){
            $.post('<?php echo e(route('vendor_refund_approval')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', el:el}, function(data){
                if (data == 1) {
                    showAlert('success', 'Approval has been done successfully');
                }
                else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function refund_request_money(el){
            $.post('<?php echo e(route('refund_request_money_by_admin')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', el:el}, function(data){
                if (data == 1) {
                    location.reload();
                    showAlert('success', 'Refund has been sent successfully');
                }
                else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/refund_request/index.blade.php ENDPATH**/ ?>