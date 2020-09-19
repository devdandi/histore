
<section class="slice-sm footer-top-bar bg-white">
    <div class="container sct-inner">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('sellerpolicy')); ?>">
                        <i class="la la-file-text"></i>
                        <h4 class="heading-5"><?php echo e(translate('Seller Policy')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('returnpolicy')); ?>">
                        <i class="la la-mail-reply"></i>
                        <h4 class="heading-5"><?php echo e(translate('Return Policy')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('supportpolicy')); ?>">
                        <i class="la la-support"></i>
                        <h4 class="heading-5"><?php echo e(translate('Support Policy')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('profile')); ?>">
                        <i class="la la-dashboard"></i>
                        <h4 class="heading-5"><?php echo e(translate('My Profile')); ?></h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- FOOTER -->
<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <?php
                    $generalsetting = \App\GeneralSetting::first();
                ?>
                <div class="col-lg-5 col-xl-4 text-center text-md-left">
                    <div class="col">
                        <a href="<?php echo e(route('home')); ?>" class="d-block">
                            <?php if($generalsetting->logo != null): ?>
                                <img loading="lazy"  src="<?php echo e(my_asset($generalsetting->logo)); ?>" alt="<?php echo e(env('APP_NAME')); ?>" height="44">
                            <?php else: ?>
                                <img loading="lazy"  src="<?php echo e(my_asset('frontend/images/logo/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" height="44">
                            <?php endif; ?>
                        </a>
                        <p class="mt-3"><?php echo e($generalsetting->description); ?></p>
                        <div class="d-inline-block d-md-block">
                            <form class="form-inline" method="POST" action="<?php echo e(route('subscribers.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="<?php echo e(translate('Your Email Address')); ?>" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-base-1 btn-icon-left">
                                    <?php echo e(translate('Subscribe')); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-xl-1 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            <?php echo e(translate('Contact Info')); ?>

                        </h4>
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-5"><?php echo e(translate('Address')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->address); ?></span>
                            </li>
                            <li>
                               <span class="d-block opacity-5"><?php echo e(translate('Phone')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->phone); ?></span>
                            </li>
                            <li>
                               <span class="d-block opacity-5"><?php echo e(translate('Email')); ?>:</span>
                               <span class="d-block">
                                   <a href="mailto:<?php echo e($generalsetting->email); ?>"><?php echo e($generalsetting->email); ?></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            <?php echo e(translate('Useful Link')); ?>

                        </h4>
                        <ul class="footer-links">
                            <?php $__currentLoopData = \App\Link::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($link->url); ?>" title="">
                                        <?php echo e($link->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="col text-center text-md-left">
                       <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                          <?php echo e(translate('My Account')); ?>

                       </h4>

                       <ul class="footer-links">
                            <?php if(Auth::check()): ?>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>" title="Logout">
                                        <?php echo e(translate('Logout')); ?>

                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(route('user.login')); ?>" title="Login">
                                        <?php echo e(translate('Login')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('purchase_history.index')); ?>" title="Order History">
                                    <?php echo e(translate('Order History')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('wishlists.index')); ?>" title="My Wishlist">
                                    <?php echo e(translate('My Wishlist')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('orders.track')); ?>" title="Track Order">
                                    <?php echo e(translate('Track Order')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                        <div class="col text-center text-md-left">
                            <div class="mt-4">
                                <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                    <?php echo e(translate('Be a Seller')); ?>

                                </h4>
                                <a href="<?php echo e(route('shops.create')); ?>" class="btn btn-base-1 btn-icon-left">
                                    <?php echo e(translate('Apply Now')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3 sct-color-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="copyright text-center text-md-left">
                        <ul class="copy-links no-margin">
                            <li>
                                © <?php echo e(date('Y')); ?> <?php echo e($generalsetting->site_name); ?>

                            </li>
                            <li>
                                <a href="<?php echo e(route('terms')); ?>"><?php echo e(translate('Terms')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('privacypolicy')); ?>"><?php echo e(translate('Privacy policy')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="text-center my-3 my-md-0 social-nav model-2">
                        <?php if($generalsetting->facebook != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->facebook); ?>" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->instagram != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->instagram); ?>" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->twitter != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->twitter); ?>" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->youtube != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->youtube); ?>" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->google_plus != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->google_plus); ?>" class="google-plus" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="text-center text-md-right">
                        <ul class="inline-links">
                            <?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="paypal" src="<?php echo e(my_asset('frontend/images/icons/cards/paypal.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="stripe" src="<?php echo e(my_asset('frontend/images/icons/cards/stripe.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="sslcommerz" src="<?php echo e(my_asset('frontend/images/icons/cards/sslcommerz-foo.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="instamojo" src="<?php echo e(my_asset('frontend/images/icons/cards/instamojo.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="razorpay" src="<?php echo e(my_asset('frontend/images/icons/cards/rozarpay.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="voguepay" src="<?php echo e(my_asset('frontend/images/icons/cards/voguepay.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="paystack" src="<?php echo e(my_asset('frontend/images/icons/cards/paystack.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="payhere" src="<?php echo e(my_asset('frontend/images/icons/cards/payhere.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy" alt="cash on delivery" src="<?php echo e(my_asset('frontend/images/icons/cards/cod.png')); ?>" height="30">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated): ?>
                                <?php $__currentLoopData = \App\ManualPaymentMethod::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li>
                                    <img loading="lazy" alt="<?php echo e($method->heading); ?>" src="<?php echo e(my_asset($method->photo)); ?>" height="30">
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/inc/footer.blade.php ENDPATH**/ ?>