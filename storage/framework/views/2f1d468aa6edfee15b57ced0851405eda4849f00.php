<?php $__env->startSection('content'); ?>

    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e(translate('Profile')); ?></h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
            	<?php echo csrf_field(); ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name"><?php echo e(translate('Name')); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="<?php echo e(translate('Name')); ?>" name="name" value="<?php echo e(Auth::user()->name); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name"><?php echo e(translate('Email')); ?></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="<?php echo e(translate('Email')); ?>" name="email" value="<?php echo e(Auth::user()->email); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="new_password"><?php echo e(translate('New Password')); ?></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="<?php echo e(translate('New Password')); ?>" name="new_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="confirm_password"><?php echo e(translate('Confirm Password')); ?></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="<?php echo e(translate('Confirm Password')); ?>" name="confirm_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="avatar"><?php echo e(translate('Avatar')); ?> <small>(120x80)</small></label>
                        <div class="col-sm-10">
                            <input type="file" id="avatar" name="avatar" class="form-control">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/partials/admin_profile.blade.php ENDPATH**/ ?>