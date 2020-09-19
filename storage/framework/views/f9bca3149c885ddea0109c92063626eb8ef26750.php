

<?php $__env->startSection('content'); ?>

<?php
    $refund_time_config = \App\BusinessSetting::where('type', 'refund_request_time')->first();
?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Set Refund Time')); ?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo e(route('refund_request_time_config')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="hidden" name="type" value="refund_request_time">
                        <label class="col-lg-3 control-label"><?php echo e(__('Set Time for sending Refund Request')); ?></label>
                        <div class="col-lg-5">
                            <input type="number" min="0" step="1" <?php if($refund_time_config != null): ?> value="<?php echo e($refund_time_config->value); ?>" <?php endif; ?> placeholder="" name="value" class="form-control">
                        </div>
                        <div class="col-lg-2">
                            <option class="form-control">days</option>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Set Refund Sticker')); ?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo e(route('refund_sticker_config')); ?>" method="POST" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="hidden" name="type" value="refund_sticker">
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="logo"><?php echo e(__('Sticker')); ?></label>
                            <div class="col-lg-5">
                                <input type="file" id="logo" name="logo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/refund_request/config.blade.php ENDPATH**/ ?>