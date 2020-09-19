

<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-5">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center px-35 pt-5">
                                <h1 class="heading heading-4 strong-500">
                                    <?php echo e(translate('Login to your account.')); ?>

                                </h1>
                            </div>
                            <div class="px-5 py-3 py-lg-4">
                                <div class="">
                                    <form class="form-default" role="form" action="<?php echo e(route('login')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated): ?>
                                            <span><?php echo e(translate('Use country code before number')); ?></span>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated): ?>
                                                    <input type="text" class="form-control form-control-sm <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email Or Phone')); ?>" name="email" id="email">
                                                <?php else: ?>
                                                    <input type="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(translate('Password')); ?>" name="password" id="password">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="checkbox pad-btm text-left">
                                                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                        <label for="demo-form-checkbox" class="text-sm">
                                                            <?php echo e(translate('Remember Me')); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="<?php echo e(route('password.request')); ?>" class="link link-xs link--style-3"><?php echo e(translate('Forgot password?')); ?></a>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100"><?php echo e(translate('Login')); ?></button>
                                        </div>
                                    </form>
                                    <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1): ?>
                                        <div class="or or--1 mt-3 text-center">
                                            <span>or</span>
                                        </div>
                                        <div>
                                        <?php if(\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1): ?>
                                            <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-facebook"></i> <?php echo e(translate('Login with Facebook')); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1): ?>
                                            <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-google"></i> <?php echo e(translate('Login with Google')); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1): ?>
                                            <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4">
                                                <i class="icon fa fa-twitter"></i> <?php echo e(translate('Login with Twitter')); ?>

                                            </a>
                                        <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    <?php echo e(translate('Need an account?')); ?> <a href="<?php echo e(route('user.registration')); ?>" class="strong-600"><?php echo e(translate('Register Now')); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php if(env("DEMO_MODE") == "On"): ?>
                        <div class="bg-white p-4 mx-auto mt-4">
                            <div class="">
                                <table class="table table-responsive table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td><?php echo e(translate('Seller Account')); ?></td>
                                            <td><button class="btn btn-info" onclick="autoFillSeller()"><?php echo e(translate('Copy credentials')); ?></button></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(translate('Customer Account')); ?></td>
                                            <td><button class="btn btn-info" onclick="autoFillCustomer()"><?php echo e(translate('Copy credentials')); ?></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/user_login.blade.php ENDPATH**/ ?>