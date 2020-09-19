<?php $__env->startSection('content'); ?>
<?php if(env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null): ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-danger pad-all text-center mar-btm">
                <h4 class="text-light mar-btm"><?php echo e(translate('Please Configure SMTP Setting to work all email sending funtionality')); ?>.</h4>
                <a class="btn btn-info btn-rounded" href="<?php echo e(route('smtp_settings.index')); ?>">Configure Now</a>
            </div>
        </div>
    </div>
<?php endif; ?>




<?php if(Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))): ?>
    <div class="row">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body text-center dash-widget pad-no">
                <div class="pad-ver mar-top text-main">
                    <i class="demo-pli-data-settings icon-4x"></i>
                </div>
                <br>
                <p class="text-3x text-main bg-primary pad-ver"><?php echo e(translate('Frontend')); ?> <strong><?php echo e(translate('Setting')); ?></strong></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            <?php echo e(translate('Home page')); ?> <br>
                            <?php echo e(translate('setting')); ?>

                        </p>
                        <br>
                        <a href="<?php echo e(route('home_settings.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            <?php echo e(translate('Policy page')); ?> <br>
                            <?php echo e(translate('setting')); ?>

                        </p>
                        <br>
                        <a href="<?php echo e(route('privacypolicy.index', 'privacy_policy')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            <?php echo e(translate('General')); ?> <br>
                            <?php echo e(translate('setting')); ?>

                        </p>
                        <br>
                        <a href="<?php echo e(route('generalsettings.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
                    </div>
                </div>
                <div class="panel">
                    <div class="pad-top text-center dash-widget">
                        <p class="text-semibold text-lg text-main mar-ver">
                            <?php echo e(translate('Useful link')); ?> <br>
                            <?php echo e(translate('setting')); ?>

                        </p>
                        <br>
                        <a href="<?php echo e(route('links.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions))): ?>
    <div class="flex-row">
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Activation')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('activation.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('SMTP')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('smtp_settings.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Payment method')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('payment_method.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Social media')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('social_login.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-12 flex-col-12">
        <div class="panel">
            <div class="panel-body text-center dash-widget bg-primary">
                <br>
                <br>
                <i class="demo-pli-gear icon-5x"></i>
                <br>
                <br>
                <br>
                <br>
                <p class="text-semibold text-2x text-light mar-ver">
                    <?php echo e(translate('Business')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Currency')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('currency.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no "><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Seller verification')); ?> <br>
                    <?php echo e(translate('form setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('seller_verification_form.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
    </div>
    <div class="flex-col-xl flex-col-lg-6 flex-col-12">
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Language')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('languages.index')); ?>" class="btn btn-primary mar-top btn-block top-border-radius-no"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
        <div class="panel">
            <div class="pad-top text-center dash-widget">
                <p class="text-semibold text-lg text-main mar-ver">
                    <?php echo e(translate('Seller commission')); ?> <br>
                    <?php echo e(translate('setting')); ?>

                </p>
                <br>
                <a href="<?php echo e(route('business_settings.vendor_commission')); ?>" class="btn btn-primary mar-top btn-block"><?php echo e(translate('Click Here')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/dashboard.blade.php ENDPATH**/ ?>