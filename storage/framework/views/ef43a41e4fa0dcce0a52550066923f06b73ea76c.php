

<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center px-35 pt-5">
                                <h1 class="heading heading-4 strong-500">
                                    <?php echo e(translate('Create an account.')); ?>

                                </h1>
                            </div>
                            <div class="px-5 py-3 py-lg-4">
                                <div class="">
                                    <form id="reg-form" class="form-default" role="form" action="<?php echo e(route('register')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="text" class="h-auto form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(translate('Name')); ?>" name="name">
                                                <?php if($errors->has('name')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated): ?>
                                            <div class="form-group phone-form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="tel" id="phone-code" class="border-right-0 h-auto w-100 form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(translate('Mobile Number')); ?>" name="phone">
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <input type="hidden" name="country_code" value="">

                                            <div class="form-group email-form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="email" class="h-auto form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email">
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-link p-0" type="button" onclick="toggleEmailPhone(this)"><?php echo e(translate('Use Email Instead')); ?></button>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="email" class="h-auto form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email">
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <!-- <label><?php echo e(translate('password')); ?></label> -->
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="h-auto form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(translate('Password')); ?>" name="password">
                                                <?php if($errors->has('password')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!-- <label><?php echo e(translate('confirm_password')); ?></label> -->
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="h-auto form-control" placeholder="<?php echo e(translate('Confirm Password')); ?>" name="password_confirmation">
                                            </div>
                                        </div>

                                        <?php if(\App\BusinessSetting::where('type', 'google_recaptcha')->first()->value == 1): ?>
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="checkbox text-left">
                                            <input class="magic-checkbox" type="checkbox" name="checkbox_example_1" id="checkboxExample_1a" required>
                                            <label for="checkboxExample_1a" class="text-sm"><?php echo e(translate('By signing up you agree to our terms and conditions.')); ?></label>
                                        </div>

                                        <div class="text-right mt-3">
                                            <button type="submit" class="btn btn-styled btn-base-1 w-100 btn-md"><?php echo e(translate('Create Account')); ?></button>
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
                                    <?php echo e(translate('Already have an account?')); ?><a href="<?php echo e(route('user.login')); ?>" class="strong-600"><?php echo e(translate('Log In')); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">

        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            // alert('helloman');
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });

        var isPhoneShown = true;

        var input = document.querySelector("#phone-code");
        var iti = intlTelInput(input, {
            separateDialCode: true,
            preferredCountries: <?php echo json_encode(\App\Country::where('status', 1)->pluck('code')->toArray()) ?>
        });

        var countryCode = iti.getSelectedCountryData();


        input.addEventListener("countrychange", function() {
            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);
        });

        $(document).ready(function(){
            $('.email-form-group').hide();
        });

        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').hide();
                $('.email-form-group').show();
                isPhoneShown = false;
                $(el).html('Use Phone Instead');
            }
            else{
                $('.phone-form-group').show();
                $('.email-form-group').hide();
                isPhoneShown = true;
                $(el).html('Use Email Instead');
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/user_registration.blade.php ENDPATH**/ ?>