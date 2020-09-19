

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 d-flex align-items-center">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('Recieved Refund Request')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('vendor_refund_request')); ?>"><?php echo e(__('Refund Request')); ?></a></li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card no-border mt-5">
                            <div class="card-header py-3">
                                <h4 class="mb-0 h6">Refund Request</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-responsive-md mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Order id')); ?></th>
                                            <th><?php echo e(__('Product')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Reason')); ?></th>
                                            <th><?php echo e(__('Approval')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($refunds) > 0): ?>
                                            <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e(date('d-m-Y', strtotime($refund->created_at))); ?></td>
                                                    <td>
                                                        <?php if($refund->order != null): ?>
                                                            <?php echo e($refund->order->code); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($refund->orderDetail != null && $refund->orderDetail->product != null): ?>
                                                            <?php echo e($refund->orderDetail->product->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($refund->orderDetail != null): ?>
                                                            <?php echo e(single_price($refund->orderDetail->price)); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($refund->refund_status == 1): ?>
                                                            <span class="ml-2" style="color:green"><strong><?php echo e(__('Approved')); ?></strong></span>
                                                        <?php else: ?>
                                                            <span class="ml-2" style="color:red"><strong><?php echo e(__('PENDING')); ?></strong></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('reason_show', $refund->id)); ?>"><span class="ml-2" style="color:green"><strong><?php echo e(__('Show')); ?></strong></span></a>
                                                    </td>
                                                    <td>
                                                        <?php if($refund->seller_approval == 1): ?>
                                                            <label class="switch">
                                                                <input type="checkbox" <?php if($refund->seller_approval == 1): ?> checked <?php endif; ?>>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        <?php else: ?>
                                                            <label class="switch">
                                                                <input onchange="update_refund_approval('<?php echo e($refund->id); ?>')" type="checkbox" <?php if($refund->seller_approval == 1): ?> checked <?php endif; ?>>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td class="text-center pt-5 h4" colspan="100%">
                                                    <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                                <span class="d-block"><?php echo e(__('No history found.')); ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($refunds->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function update_refund_approval(el){
            $.post('<?php echo e(route('vendor_refund_approval')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', el:el}, function(data){
                if (data == 1) {
                    showFrontendAlert('success', 'Approval has been done successfully');
                }
                else {
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/refund_request/frontend/recieved_refund_request/index.blade.php ENDPATH**/ ?>