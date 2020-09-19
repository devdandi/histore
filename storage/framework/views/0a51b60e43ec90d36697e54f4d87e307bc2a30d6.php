<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0">
        <div class="widget-profile-box text-center p-3">
            <?php if(Auth::user()->avatar_original != null): ?>
                <div class="image" style="background-image:url('<?php echo e(my_asset(Auth::user()->avatar_original)); ?>')"></div>
            <?php else: ?>
                <img src="<?php echo e(my_asset('frontend/images/user.png')); ?>" class="image rounded-circle">
            <?php endif; ?>
            <?php if(Auth::user()->seller->verification_status == 1): ?>
                <div class="name mb-0"><?php echo e(Auth::user()->name); ?> <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div>
            <?php else: ?>
                <div class="name mb-0"><?php echo e(Auth::user()->name); ?> <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span></div>
            <?php endif; ?>
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
                            <?php echo e(translate('Purchase History')); ?> <?php if($delivery_viewed > 0 || $payment_status_viewed > 0): ?><span class="ml-2" style="color:green"><strong>(<?php echo e(translate(' New Notifications')); ?>)</strong></span><?php endif; ?>
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
                <li>
                    <a href="<?php echo e(route('wishlists.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wishlists.index'])); ?>">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            <?php echo e(translate('Wishlist')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('seller.products')); ?>" class="<?php echo e(areActiveRoutesHome(['seller.products', 'seller.products.upload', 'seller.products.edit'])); ?>">
                        <i class="la la-diamond"></i>
                        <span class="category-name">
                            <?php echo e(translate('Products')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('seller.digitalproducts')); ?>" class="<?php echo e(areActiveRoutesHome(['seller.digitalproducts', 'seller.digitalproducts.upload', 'seller.digitalproducts.edit'])); ?>">
                        <i class="la la-diamond"></i>
                        <span class="category-name">
                            <?php echo e(translate('Digital Products')); ?>

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
                <?php if(\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated): ?>
                    <?php if(\App\BusinessSetting::where('type', 'pos_activation_for_seller')->first() != null && \App\BusinessSetting::where('type', 'pos_activation_for_seller')->first()->value != 0): ?>
                        <li>
                            <a href="<?php echo e(route('poin-of-sales.seller_index')); ?>" class="<?php echo e(areActiveRoutesHome(['poin-of-sales.seller_index'])); ?>">
                                <i class="la la-fax"></i>
                                <span class="category-name">
                                    <?php echo e(translate('POS Manager')); ?>

                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('product_bulk_upload.index')); ?>" class="<?php echo e(areActiveRoutesHome(['product_bulk_upload.index'])); ?>">
                        <i class="la la-upload"></i>
                        <span class="category-name">
                            <?php echo e(translate('Product Bulk Upload')); ?>

                        </span>
                    </a>
                </li>
                <?php
                    $orders = DB::table('orders')
                                ->orderBy('code', 'desc')
                                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                                ->where('order_details.seller_id', Auth::user()->id)
                                ->where('orders.viewed', 0)
                                ->select('orders.id')
                                ->distinct()
                                ->count();
                ?>
                <li>
                    <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(areActiveRoutesHome(['orders.index'])); ?>">
                        <i class="la la-file-text"></i>
                        <span class="category-name">
                            <?php echo e(translate('Orders')); ?> <?php if($orders > 0): ?><span class="ml-2" style="color:green"><strong>(<?php echo e($orders); ?> <?php echo e(translate('New')); ?>)</strong></span></span><?php endif; ?>
                        </span>
                    </a>
                </li>

                <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                    <li>
                        <a href="<?php echo e(route('vendor_refund_request')); ?>" class="<?php echo e(areActiveRoutesHome(['vendor_refund_request'])); ?>">
                            <i class="la la-file-text"></i>
                            <span class="category-name">
                                <?php echo e(translate('Recieved Refund Request')); ?>

                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('customer_refund_request')); ?>" class="<?php echo e(areActiveRoutesHome(['customer_refund_request'])); ?>">
                            <i class="la la-file-text"></i>
                            <span class="category-name">
                                <?php echo e(translate('Sent Refund Request')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                    $review_count = DB::table('reviews')
                                ->orderBy('code', 'desc')
                                ->join('products', 'products.id', '=', 'reviews.product_id')
                                ->where('products.user_id', Auth::user()->id)
                                ->where('reviews.viewed', 0)
                                ->select('reviews.id')
                                ->distinct()
                                ->count();
                ?>
                <li>
                    <a href="<?php echo e(route('reviews.seller')); ?>" class="<?php echo e(areActiveRoutesHome(['reviews.seller'])); ?>">
                        <i class="la la-star-o"></i>
                        <span class="category-name">
                            <?php echo e(translate('Product Reviews')); ?><?php if($review_count > 0): ?><span class="ml-2" style="color:green"><strong>(<?php echo e($review_count); ?> <?php echo e(translate('New')); ?>)</strong></span><?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php if(\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1): ?>
                    <?php
                        $conversation_sent = \App\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', 0)->get();
                        $conversation_recieved = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', 0)->get();
                    ?>
                    <li>
                        <a href="<?php echo e(route('conversations.index')); ?>" class="<?php echo e(areActiveRoutesHome(['conversations.index', 'conversations.show'])); ?>">
                            <i class="la la-comment"></i>
                            <span class="category-name">
                                <?php echo e(translate('Conversations')); ?>

                                <?php if(count($conversation_sent)+count($conversation_recieved) > 0): ?>
                                    <span class="ml-2" style="color:green"><strong>(<?php echo e(count($conversation_sent)+count($conversation_recieved)); ?>)</strong></span>
                                <?php endif; ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('shops.index')); ?>" class="<?php echo e(areActiveRoutesHome(['shops.index'])); ?>">
                        <i class="la la-cog"></i>
                        <span class="category-name">
                            <?php echo e(translate('Shop Setting')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('payments.index')); ?>" class="<?php echo e(areActiveRoutesHome(['payments.index'])); ?>">
                        <i class="la la-cc-mastercard"></i>
                        <span class="category-name">
                            <?php echo e(translate('Payment History')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('profile')); ?>" class="<?php echo e(areActiveRoutesHome(['profile'])); ?>">
                        <i class="la la-user"></i>
                        <span class="category-name">
                            <?php echo e(translate('Manage Profile')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('withdraw_requests.index')); ?>" class="<?php echo e(areActiveRoutesHome(['withdraw_requests.index'])); ?>">
                        <i class="la la-money"></i>
                        <span class="category-name">
                            <?php echo e(translate('Money Withdraw')); ?>

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
                <?php
                    $support_ticket = DB::table('tickets')
                                ->where('client_viewed', 0)
                                ->where('user_id', Auth::user()->id)
                                ->count();
                ?>
                <li>
                    <a href="<?php echo e(route('support_ticket.index')); ?>" class="<?php echo e(areActiveRoutesHome(['support_ticket.index', 'support_ticket.show'])); ?>">
                        <i class="la la-support"></i>
                        <span class="category-name">
                            <?php echo e(translate('Support Ticket')); ?> <?php if($support_ticket > 0): ?><span class="ml-2" style="color:green"><strong>(<?php echo e($support_ticket); ?> <?php echo e(translate('New')); ?>)</strong></span></span><?php endif; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-widget-title py-3">
            <span><?php echo e(translate('Sold Amount')); ?></span>
        </div>
        <div class="widget-balance pb-3 pt-1">
            <div class="text-center">
                <div class="heading-4 strong-700 mb-4">
                    <?php
                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                        $total = 0;
                        foreach ($orderDetails as $key => $orderDetail) {
                            if($orderDetail->delivery_status == 'delivered'){
                                $total += $orderDetail->price;
                            }
                        }
                    ?>
                    <small class="d-block text-sm alpha-5 mb-2"><?php echo e(translate('Your sold amount (current month)')); ?></small>
                    <span class="p-2 bg-base-1 rounded"><?php echo e(single_price($total)); ?></span>
                </div>
                <table class="text-left mb-0 table w-75 m-auto">
                    <tr>
                        <?php
                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                            $total = 0;
                            foreach ($orderDetails as $key => $orderDetail) {
                                if($orderDetail->delivery_status == 'delivered'){
                                    $total += $orderDetail->price;
                                }
                            }
                        ?>
                        <td class="p-1 text-sm">
                            <?php echo e(translate('Total Sold')); ?>:
                        </td>
                        <td class="p-1">
                            <?php echo e(single_price($total)); ?>

                        </td>
                    </tr>
                    <tr>
                        <?php
                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                            $total = 0;
                            foreach ($orderDetails as $key => $orderDetail) {
                                if($orderDetail->delivery_status == 'delivered'){
                                    $total += $orderDetail->price;
                                }
                            }
                        ?>
                        <td class="p-1 text-sm">
                            <?php echo e(translate('Last Month Sold')); ?>:
                        </td>
                        <td class="p-1">
                            <?php echo e(single_price($total)); ?>

                        </td>
                    </tr>
                </table>
            </div>
            <table>

            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/inc/seller_side_nav.blade.php ENDPATH**/ ?>