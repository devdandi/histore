<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0">
        <div class="widget-profile-box text-center p-3">
            <?php if(Auth::user()->avatar_original != null): ?>
                <div class="image" style="background-image:url('<?php echo e(my_asset(Auth::user()->avatar_original)); ?>')"></div>
            <?php else: ?>
                <img src="<?php echo e(my_asset('frontend/images/user.png')); ?>" class="image rounded-circle">
            <?php endif; ?>
            <div class="name"><?php echo e(Auth::user()->name); ?></div>
        </div>
        <div class="sidebar-widget-title py-3">
            <span><?php echo e(translate('Menu')); ?></span>
        </div>
        <div class="widget-profile-menu py-3">
            <ul class="categories categories--style-3">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(areActiveRoutesHome(['dashboard'])); ?>">
                        <i class="la la-dashboard"></i>
                        <span class="category-name">
                            <?php echo e(translate('Dashboard')); ?>

                        </span>
                    </a>
                </li>

                <?php if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1): ?>
                <li>
                    <a href="<?php echo e(route('customer_products.index')); ?>" class="<?php echo e(areActiveRoutesHome(['customer_products.index', 'customer_products.create', 'customer_products.edit'])); ?>">
                        <i class="la la-diamond"></i>
                        <span class="category-name">
                            <?php echo e(translate('Classified Products')); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <?php
                    $delivery_viewed = App\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                    $payment_status_viewed = App\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                    $club_point_addon = \App\Addon::where('unique_identifier', 'club_point')->first();
                ?>
                <li>
                    <a href="<?php echo e(route('purchase_history.index')); ?>" class="<?php echo e(areActiveRoutesHome(['purchase_history.index'])); ?>">
                        <i class="la la-file-text"></i>
                        <span class="category-name">
                            <?php echo e(translate('Purchase History')); ?> <?php if($delivery_viewed > 0 || $payment_status_viewed > 0): ?><span class="ml-2" style="color:green"><strong>(<?php echo e(translate('New Notifications')); ?>)</strong></span><?php endif; ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('digital_purchase_history.index')); ?>" class="<?php echo e(areActiveRoutesHome(['digital_purchase_history.index'])); ?>">
                        <i class="la la-download"></i>
                        <span class="category-name">
                            <?php echo e(translate('Downloads')); ?>

                        </span>
                    </a>
                </li>

                <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                    <li>
                        <a href="<?php echo e(route('customer_refund_request')); ?>" class="<?php echo e(areActiveRoutesHome(['customer_refund_request'])); ?>">
                            <i class="la la-file-text"></i>
                            <span class="category-name">
                                <?php echo e(translate('Sent Refund Request')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?php echo e(route('wishlists.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wishlists.index'])); ?>">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            <?php echo e(translate('Wishlist')); ?>

                        </span>
                    </a>
                </li>
                <?php if(\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1): ?>
                    <?php
                        $conversation = \App\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', 0)->get();
                    ?>
                    <li>
                        <a href="<?php echo e(route('conversations.index')); ?>" class="<?php echo e(areActiveRoutesHome(['conversations.index', 'conversations.show'])); ?>">
                            <i class="la la-comment"></i>
                            <span class="category-name">
                                <?php echo e(translate('Conversations')); ?>

                                <?php if(count($conversation) > 0): ?>
                                    <span class="ml-2" style="color:green"><strong>(<?php echo e(count($conversation)); ?>)</strong></span>
                                <?php endif; ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('profile')); ?>" class="<?php echo e(areActiveRoutesHome(['profile'])); ?>">
                        <i class="la la-user"></i>
                        <span class="category-name">
                            <?php echo e(translate('Manage Profile')); ?>

                        </span>
                    </a>
                </li>
                <?php if(\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1): ?>
                    <li>
                        <a href="<?php echo e(route('wallet.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wallet.index'])); ?>">
                            <i class="la la-dollar"></i>
                            <span class="category-name">
                                <?php echo e(translate('My Wallet')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($club_point_addon != null && $club_point_addon->activated == 1): ?>
                    <li>
                        <a href="<?php echo e(route('earnng_point_for_user')); ?>" class="<?php echo e(areActiveRoutesHome(['earnng_point_for_user'])); ?>">
                            <i class="la la-dollar"></i>
                            <span class="category-name">
                                <?php echo e(translate('Earning Points')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status): ?>
                    <li>
                        <a href="<?php echo e(route('affiliate.user.index')); ?>" class="<?php echo e(areActiveRoutesHome(['affiliate.user.index', 'affiliate.payment_settings'])); ?>">
                            <i class="la la-dollar"></i>
                            <span class="category-name">
                                <?php echo e(translate('Affiliate System')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                    $support_ticket = DB::table('tickets')
                                ->where('client_viewed', 0)
                                ->where('user_id', Auth::user()->id)
                                ->count();
                ?>
                <li>
                    <a href="<?php echo e(route('support_ticket.index')); ?>" class="<?php echo e(areActiveRoutesHome(['support_ticket.index'])); ?>">
                        <i class="la la-support"></i>
                        <span class="category-name">
                            <?php echo e(translate('Support Ticket')); ?> <?php if($support_ticket > 0): ?><span class="ml-2" style="color:green"><strong>(<?php echo e($support_ticket); ?> <?php echo e(translate('New')); ?>)</strong></span></span><?php endif; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
            <div class="widget-seller-btn pt-4">
                <a href="<?php echo e(route('shops.create')); ?>" class="btn btn-anim-primary w-100"><?php echo e(translate('Be A Seller')); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/inc/customer_side_nav.blade.php ENDPATH**/ ?>