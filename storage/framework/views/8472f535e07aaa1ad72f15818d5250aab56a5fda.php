

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <!--Horizontal Form-->
                <form class="form-horizontal" action="<?php echo e(route('business_settings.vendor_commission.update')); ?>" method="POST" enctype="multipart/form-data">
                	<?php echo csrf_field(); ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="hidden" name="type" value="<?php echo e($business_settings->type); ?>">
                            <label class="col-lg-3 control-label"><?php echo e(translate('Seller Commission')); ?></label>
                            <div class="col-lg-7">
                                <input type="number" min="0" step="0.01" value="<?php echo e($business_settings->value); ?>" placeholder="<?php echo e(translate('Seller Commission')); ?>" name="value" class="form-control">
                            </div>
                            <div class="col-lg-1">
                                <option class="form-control">%</option>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-purple" type="submit"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
                <!--===================================================-->
                <!--End Horizontal Form-->

            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading bord-btm">
                    <h3 class="panel-title"><?php echo e(translate('Note')); ?></h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            1. <?php echo e($business_settings->value); ?>% <?php echo e(translate('of seller product price will be deducted from seller earnings')); ?>.
                        </li>
                        <li class="list-group-item">
                            1. <?php echo e(translate('This commission only works when Category Based Commission is turned off from Business Settings')); ?>.
                        </li>
                        <li class="list-group-item">
                            1. <?php echo e(translate('Commission doesn\'t work if seller package system add-on is activated')); ?>.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/business_settings/vendor_commission.blade.php ENDPATH**/ ?>