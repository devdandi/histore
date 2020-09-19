

<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php if(Auth::user()->user_type == 'seller'): ?>
                        <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(Auth::user()->user_type == 'customer'): ?>
                        <?php echo $__env->make('frontend.inc.customer_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12 d-flex align-items-center">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(translate('My Wallet')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('wallet.index')); ?>"><?php echo e(translate('My Wallet')); ?></a></li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                                    <i class="fa fa-dollar"></i>
                                    <span class="d-block title heading-3 strong-400"><?php echo e(single_price(Auth::user()->balance)); ?></span>
                                    <span class="d-block sub-title"><?php echo e(translate('Wallet Balance')); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center plus-widget mt-4 c-pointer" onclick="show_wallet_modal()">
                                    <i class="la la-plus"></i>
                                    <span class="d-block title heading-6 strong-400 c-base-1"><?php echo e(translate('Online Recharge Wallet')); ?></span>
                                </div>
                            </div>

                            <?php if(\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated): ?>
                                <div class="col-md-4">
                                    <div class="dashboard-widget text-center plus-widget mt-4 c-pointer" onclick="show_make_wallet_recharge_modal()">
                                        <i class="la la-plus"></i>
                                        <span class="d-block title heading-6 strong-400 c-base-1"><?php echo e(translate('Offline Recharge Wallet')); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="card no-border mt-5">
                            <div class="card-header py-3">
                                <h4 class="mb-0 h6"><?php echo e(translate('Wallet recharge history')); ?></h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-responsive-md mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo e(translate('Date')); ?></th>
                                            <th><?php echo e(translate('Amount')); ?></th>
                                            <th><?php echo e(translate('Payment Method')); ?></th>
                                            <th><?php echo e(translate('Approval')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($wallets) > 0): ?>
                                            <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e(date('d-m-Y', strtotime($wallet->created_at))); ?></td>
                                                    <td><?php echo e(single_price($wallet->amount)); ?></td>
                                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $wallet ->payment_method))); ?></td>
                                                    <td>
                                                        <?php if($wallet->offline_payment): ?>
                                                            <?php if($wallet->approval): ?>
                                                                <?php echo e(translate('Approved')); ?>

                                                            <?php else: ?>
                                                                <?php echo e(translate('Pending')); ?>

                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            N/A
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td class="text-center pt-5 h4" colspan="100%">
                                                    <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                                <span class="d-block"><?php echo e(translate('No history found.')); ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($wallets->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5"><?php echo e(translate('Recharge Wallet')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="<?php echo e(route('wallet.recharge')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Amount')); ?> <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" class="form-control mb-3" name="amount" placeholder="<?php echo e(translate('Amount')); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Payment Method')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="payment_option">
                                        <?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1): ?>
                                            <option value="paypal"><?php echo e(translate('Paypal')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1): ?>
                                            <option value="stripe"><?php echo e(translate('Stripe')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
                                            <option value="sslcommerz"><?php echo e(translate('SSLCommerz')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1): ?>
                                            <option value="instamojo"><?php echo e(translate('Instamojo')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1): ?>
                                            <option value="paystack"><?php echo e(translate('Paystack')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1): ?>
                                            <option value="voguepay"><?php echo e(translate('VoguePay')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1): ?>
                                            <option value="payhere"><?php echo e(translate('Payhere')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1): ?>
                                            <option value="razorpay"><?php echo e(translate('Razorpay')); ?></option>
                                        <?php endif; ?>
                                        <?php if(\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated): ?>
                                            <option value="paytm"><?php echo e(translate('Paytm')); ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-base-1"><?php echo e(translate('Confirm')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="offline_wallet_recharge_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5"><?php echo e(translate('Offline Recharge Wallet')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="offline_wallet_recharge_modal_body"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function show_wallet_modal(){
            $('#wallet_modal').modal('show');
        }

        function show_make_wallet_recharge_modal(){
            $.post('<?php echo e(route('offline_wallet_recharge_modal')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#offline_wallet_recharge_modal_body').html(data);
                $('#offline_wallet_recharge_modal').modal('show');
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/wallet.blade.php ENDPATH**/ ?>