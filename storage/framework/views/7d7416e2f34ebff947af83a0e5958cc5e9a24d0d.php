

<?php $__env->startSection('content'); ?>

<?php
    $generalsetting = \App\GeneralSetting::first();
?>

<div class="flex-row">
    <div class="flex-col-xl-6 blank-index d-flex align-items-center justify-content-center"
    <?php if($generalsetting->admin_login_sidebar != null): ?>
        style="background-image:url('<?php echo e(my_asset($generalsetting->admin_login_sidebar)); ?>');"
    <?php else: ?>
        style="background-image:url('<?php echo e(my_asset('img/bg-img/login-box.jpg')); ?>');"
    <?php endif; ?>>

    </div>
    <div class="flex-col-xl-6">
        <div class="pad-all">
        <div class="text-center">
            <br>
			<?php if($generalsetting->logo != null): ?>
                <img loading="lazy"  src="<?php echo e(my_asset($generalsetting->logo)); ?>" class="" height="44">
            <?php else: ?>
                <img loading="lazy"  src="<?php echo e(my_asset('frontend/images/logo/logo.png')); ?>" class="" height="44">
            <?php endif; ?>

            <br>
            <br>
            <br>

        </div>
            <form class="pad-hor" method="POST" role="form" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="<?php echo e(translate('Email')); ?>">
                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="<?php echo e(translate('Password')); ?>">
                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox pad-btm text-left">
                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label for="demo-form-checkbox">
                                <?php echo e(translate('Remember Me')); ?>

                            </label>
                        </div>
                    </div>
                    <?php if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null): ?>
                        <div class="col-sm-6">
                            <div class="checkbox pad-btm text-right">
                                <a href="<?php echo e(route('password.request')); ?>" class="btn-link"><?php echo e(translate('Forgot password')); ?> ?</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <?php echo e(translate('Login')); ?>

                </button>
            </form>
            <?php if(env("DEMO_MODE") == "On"): ?>
                <div class="col-sm-6">
                    <div class="cls-content-sm panel" style="width: 100% !important;">
                        <div class="pad-all">
                            <table class="table table-responsive table-bordered">
                                <tbody>
                                    <tr>
                                        <td>admin@example.com</td>
                                        <td>123456</td>
                                        <td><button class="btn btn-info btn-xs" onclick="autoFill()">copy</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function autoFill(){
            $('#email').val('admin@example.com');
            $('#password').val('123456');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/auth/login.blade.php ENDPATH**/ ?>