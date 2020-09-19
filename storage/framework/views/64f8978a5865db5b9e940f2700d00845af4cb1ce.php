

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Reason For Refund Request')); ?></h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo e(__('Reason')); ?></label>
                    <div class="col-lg-8">
                        <p class="bord-all pad-all"><?php echo e($refund->reason); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/refund_request/reason.blade.php ENDPATH**/ ?>