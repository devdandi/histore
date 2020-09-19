<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                    <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                    <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                    <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                    <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        

                        <!--Menu list item-->
                        <li class="<?php echo e(areActiveRoutes(['admin.dashboard'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="fa fa-home"></i>
                                <span class="menu-title"><?php echo e(translate('Dashboard')); ?></span>
                            </a>
                        </li>

                        <?php if(\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated): ?>

                            <li>
                                <a href="#">
                                    <i class="fa fa-print"></i>
                                    <span class="menu-title"><?php echo e(translate('POS Manager')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['poin-of-sales.index', 'poin-of-sales.create'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('poin-of-sales.index')); ?>"><?php echo e(translate('POS Manager')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['poin-of-sales.activation'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('poin-of-sales.activation')); ?>"><?php echo e(translate('POS Configuration')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <!-- Product Menu -->
                        <?php if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions))): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="menu-title"><?php echo e(translate('Products')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                              
                                <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('product.unit')); ?>"><?php echo e(translate('Product Unit')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('brands.index')); ?>"><?php echo e(translate('Brand')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('categories.index')); ?>"><?php echo e(translate('Category')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['subcategories.index', 'subcategories.create', 'subcategories.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('subcategories.index')); ?>"><?php echo e(translate('Subcategory')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['subsubcategories.index', 'subsubcategories.create', 'subsubcategories.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('subsubcategories.index')); ?>"><?php echo e(translate('Sub Subcategory')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('products.admin')); ?>"><?php echo e(translate('In House Products')); ?></a>
                                    </li>
                                    <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                                        <li class="<?php echo e(areActiveRoutes(['products.seller', 'products.seller.edit'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('products.seller')); ?>"><?php echo e(translate('Seller Products')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1): ?>
                                        <li class="<?php echo e(areActiveRoutes(['classified_products'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('classified_products')); ?>"><?php echo e(translate('Classified Products')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="<?php echo e(areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('digitalproducts.index')); ?>"><?php echo e(translate('Digital Products')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['product_bulk_upload.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('product_bulk_upload.index')); ?>"><?php echo e(translate('Bulk Import')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['product_bulk_export.export'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('product_bulk_export.index')); ?>"><?php echo e(translate('Bulk Export')); ?></a>
                                    </li>
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
                                    <li class="<?php echo e(areActiveRoutes(['reviews.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('reviews.index')); ?>"><?php echo e(translate('Product Reviews')); ?><?php if($review_count > 0): ?><span class="pull-right badge badge-info"><?php echo e($review_count); ?></span><?php endif; ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li class="<?php echo e(areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('flash_deals.index')); ?>">
                                <i class="fa fa-bolt"></i>
                                <span class="menu-title"><?php echo e(translate('Flash Deal')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions))): ?>
                            <?php
                                $orders = DB::table('orders')
                                            ->orderBy('code', 'desc')
                                            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                                            ->where('order_details.seller_id', \App\User::where('user_type', 'admin')->first()->id)
                                            ->where('orders.viewed', 0)
                                            ->select('orders.id')
                                            ->distinct()
                                            ->count();
                            ?>
                        <li class="<?php echo e(areActiveRoutes(['orders.index.admin', 'orders.show'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('orders.index.admin')); ?>">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="menu-title"><?php echo e(translate('Inhouse orders')); ?> <?php if($orders > 0): ?><span class="pull-right badge badge-info"><?php echo e($orders); ?></span><?php endif; ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li class="<?php echo e(areActiveRoutes(['pick_up_point.order_index','pick_up_point.order_show'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('pick_up_point.order_index')); ?>">
                                <i class="fa fa-money"></i>
                                <span class="menu-title"><?php echo e(translate('Pick-up Point Order')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li class="<?php echo e(areActiveRoutes(['sales.index', 'sales.show'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('sales.index')); ?>">
                                <i class="fa fa-money"></i>
                                <span class="menu-title"><?php echo e(translate('Total sales')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(\App\Addon::where('unique_identifier', 'refund_request')->first() != null): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-refresh"></i>
                                    <span class="menu-title"><?php echo e(translate('Refund Request')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['refund_requests_all', 'reason_show'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('refund_requests_all')); ?>"><?php echo e(translate('Refund Requests')); ?>

                                            <?php if(count(\App\RefundRequest::where('admin_seen',0)->get()) > 0): ?><span class="pull-right badge badge-info"><?php echo e(count(\App\RefundRequest::where('admin_seen',0)->get())); ?></span><?php endif; ?>
                                        </a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['paid_refund'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('paid_refund')); ?>"><?php echo e(translate('Approved Refund')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['refund_time_config'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('refund_time_config')); ?>"><?php echo e(translate('Refund Configuration')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if((Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions))) && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-user-plus"></i>
                                <span class="menu-title"><?php echo e(translate('Sellers')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history','sellers.approved','sellers.profile_modal'])); ?>">
                                    <?php
                                        $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                                        //$withdraw_req = \App\SellerWithdrawRequest::where('viewed', '0')->get();
                                    ?>
                                    <a class="nav-link" href="<?php echo e(route('sellers.index')); ?>"><?php echo e(translate('Seller List')); ?> <?php if($sellers > 0): ?><span class="pull-right badge badge-info"><?php echo e($sellers); ?></span> <?php endif; ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['withdraw_requests_all'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('withdraw_requests_all')); ?>"><?php echo e(translate('Seller Withdraw Requests')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['sellers.payment_histories'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('sellers.payment_histories')); ?>"><?php echo e(translate('Seller Payments')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['business_settings.vendor_commission'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('business_settings.vendor_commission')); ?>"><?php echo e(translate('Seller Commission')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['seller_verification_form.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('seller_verification_form.index')); ?>"><?php echo e(translate('Seller Verification Form')); ?></a>
                                </li>
                                <?php if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated): ?>
                                    <li class="<?php echo e(areActiveRoutes(['seller_packages.index', 'seller_packages.create', 'seller_packages.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('seller_packages.index')); ?>"><?php echo e(translate('Seller Packages')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-user-plus"></i>
                                <span class="menu-title"><?php echo e(translate('Customers')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['customers.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('customers.index')); ?>"><?php echo e(translate('Customer list')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['customer_packages.index', 'customer_packages.create', 'customer_packages.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('customer_packages.index')); ?>"><?php echo e(translate('Classified Packages')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php
                            $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                        ?>
                        <li class="<?php echo e(areActiveRoutes(['conversations.admin_index', 'conversations.admin_show'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('conversations.admin_index')); ?>">
                                <i class="fa fa-comment"></i>
                                <span class="menu-title"><?php echo e(translate('Conversations')); ?></span>
                                <?php if(count($conversation) > 0): ?>
                                    <span class="pull-right badge badge-info"><?php echo e(count($conversation)); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span class="menu-title"><?php echo e(translate('Reports')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['stock_report.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('stock_report.index')); ?>"><?php echo e(translate('Stock Report')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['in_house_sale_report.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('in_house_sale_report.index')); ?>"><?php echo e(translate('In House Sale Report')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['seller_report.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('seller_report.index')); ?>"><?php echo e(translate('Seller Report')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['seller_sale_report.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('seller_sale_report.index')); ?>"><?php echo e(translate('Seller Based Selling Report')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['wish_report.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('wish_report.index')); ?>"><?php echo e(translate('Product Wish Report')); ?></a>
                                </li>
                            </ul>
                        </li>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-title"><?php echo e(translate('Messaging')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['newsletters.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('newsletters.index')); ?>"><?php echo e(translate('Newsletters')); ?></a>
                                </li>

                                <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null): ?>
                                    <li class="<?php echo e(areActiveRoutes(['sms.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('sms.index')); ?>"><?php echo e(translate('SMS')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="menu-title"><?php echo e(translate('Business Settings')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['activation.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('activation.index')); ?>"><?php echo e(translate('Activation')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['payment_method.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('payment_method.index')); ?>"><?php echo e(translate('Payment method')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['smtp_settings.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('smtp_settings.index')); ?>"><?php echo e(translate('SMTP Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['google_analytics.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('google_analytics.index')); ?>"><?php echo e(translate('Google Analytics')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['google_recaptcha.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('google_recaptcha.index')); ?>"><?php echo e(translate('Google reCAPTCHA')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['facebook_chat.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('facebook_chat.index')); ?>"><?php echo e(translate('Facebook Chat & Pixel')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['social_login.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('social_login.index')); ?>"><?php echo e(translate('Social Media Login')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['currency.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('currency.index')); ?>"><?php echo e(translate('Currency')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['languages.index', 'languages.create', 'languages.store', 'languages.show', 'languages.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('languages.index')); ?>"><?php echo e(translate('Languages')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i>
                                <span class="menu-title"><?php echo e(translate('Frontend Settings')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['home_settings.index', 'home_banners.index', 'sliders.index', 'home_categories.index', 'home_banners.create', 'home_categories.create', 'home_categories.edit', 'sliders.create'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('home_settings.index')); ?>"><?php echo e(translate('Home')); ?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="menu-title"><?php echo e(translate('Policy Pages')); ?></span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">

                                        <li class="<?php echo e(areActiveRoutes(['sellerpolicy.index'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('sellerpolicy.index', 'seller_policy')); ?>"><?php echo e(translate('Seller Policy')); ?></a>
                                        </li>
                                        <li class="<?php echo e(areActiveRoutes(['returnpolicy.index'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('returnpolicy.index', 'return_policy')); ?>"><?php echo e(translate('Return Policy')); ?></a>
                                        </li>
                                        <li class="<?php echo e(areActiveRoutes(['supportpolicy.index'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('supportpolicy.index', 'support_policy')); ?>"><?php echo e(translate('Support Policy')); ?></a>
                                        </li>
                                        <li class="<?php echo e(areActiveRoutes(['terms.index'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('terms.index', 'terms')); ?>"><?php echo e(translate('Terms & Conditions')); ?></a>
                                        </li>
                                        <li class="<?php echo e(areActiveRoutes(['privacypolicy.index'])); ?>">
                                            <a class="nav-link" href="<?php echo e(route('privacypolicy.index', 'privacy_policy')); ?>"><?php echo e(translate('Privacy Policy')); ?></a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="<?php echo e(areActiveRoutes(['pages.index', 'pages.create', 'pages.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('pages.index')); ?>"><?php echo e(translate('Custom Pages')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['links.index', 'links.create', 'links.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('links.index')); ?>"><?php echo e(translate('Useful Link')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['generalsettings.index'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('generalsettings.index')); ?>"><?php echo e(translate('General Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['generalsettings.logo'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('generalsettings.logo')); ?>"><?php echo e(translate('Logo Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['generalsettings.color'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('generalsettings.color')); ?>"><?php echo e(translate('Color Settings')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-gear"></i>
                                <span class="menu-title"><?php echo e(translate('E-commerce Setup')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('attributes.index')); ?>"><?php echo e(translate('Attribute')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('coupon.index')); ?>"><?php echo e(translate('Coupon')); ?></a>
                                </li>
                                <li>
                                    <li class="<?php echo e(areActiveRoutes(['pick_up_points.index','pick_up_points.create','pick_up_points.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('pick_up_points.index')); ?>"><?php echo e(translate('Pickup Point')); ?></a>
                                    </li>
                                </li>
                                <li>
                                    <li class="<?php echo e(areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('shipping_configuration.index')); ?>"><?php echo e(translate('Shipping Configuration')); ?></a>
                                    </li>
                                </li>
                                <li>
                                    <li class="<?php echo e(areActiveRoutes(['countries.index','countries.edit','countries.update'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('countries.index')); ?>"><?php echo e(translate('Shipping Countries')); ?></a>
                                    </li>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if(\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-link"></i>
                                    <span class="menu-title"><?php echo e(translate('Affiliate System')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['affiliate.configs'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('affiliate.configs')); ?>"><?php echo e(translate('Affiliate Configurations')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['affiliate.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('affiliate.index')); ?>"><?php echo e(translate('Affiliate Options')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['affiliate.users', 'affiliate_users.show_verification_request', 'affiliate_user.payment_history'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('affiliate.users')); ?>"><?php echo e(translate('Affiliate Users')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['refferals.users'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('refferals.users')); ?>"><?php echo e(translate('Refferal Users')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(\App\Addon::where('unique_identifier', 'offline_payment')->first() != null): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-bank"></i>
                                    <span class="menu-title"><?php echo e(translate('Offline Payment System')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['manual_payment_methods.index', 'manual_payment_methods.create', 'manual_payment_methods.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('manual_payment_methods.index')); ?>"><?php echo e(translate('Manual Payment Methods')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['offline_wallet_recharge_request.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('offline_wallet_recharge_request.index')); ?>"><?php echo e(translate('Offline Wallet Rechage')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(\App\Addon::where('unique_identifier', 'paytm')->first() != null): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-mobile"></i>
                                    <span class="menu-title"><?php echo e(translate('Paytm Payment Gateway')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['paytm.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('paytm.index')); ?>"><?php echo e(translate('Set Paytm Credentials')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-btc"></i>
                                    <span class="menu-title"><?php echo e(translate('Club Point System')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['club_points.configs'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('club_points.configs')); ?>"><?php echo e(translate('Club Point Configurations')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['set_product_points', 'product_club_point.edit'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('set_product_points')); ?>"><?php echo e(translate('Set Product Point')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['club_points.index', 'club_point.details'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('club_points.index')); ?>"><?php echo e(translate('User Points')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null): ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-mobile"></i>
                                    <span class="menu-title"><?php echo e(translate('OTP System')); ?></span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="<?php echo e(areActiveRoutes(['otp.configconfiguration'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('otp.configconfiguration')); ?>"><?php echo e(translate('OTP Configurations')); ?></a>
                                    </li>
                                    <li class="<?php echo e(areActiveRoutes(['otp_credentials.index'])); ?>">
                                        <a class="nav-link" href="<?php echo e(route('otp_credentials.index')); ?>"><?php echo e(translate('Set OTP Credentials')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions))): ?>
                            <?php
                                $support_ticket = DB::table('tickets')
                                            ->where('viewed', 0)
                                            ->select('id')
                                            ->count();
                            ?>
                        <li class="<?php echo e(areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('support_ticket.admin_index')); ?>">
                                <i class="fa fa-support"></i>
                                <span class="menu-title"><?php echo e(translate('Support Ticket')); ?> <?php if($support_ticket > 0): ?><span class="pull-right badge badge-info"><?php echo e($support_ticket); ?></span><?php endif; ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li class="<?php echo e(areActiveRoutes(['seosetting.index'])); ?>">
                            <a class="nav-link" href="<?php echo e(route('seosetting.index')); ?>">
                                <i class="fa fa-search"></i>
                                <span class="menu-title"><?php echo e(translate('SEO Setting')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title"><?php echo e(translate('Staffs')); ?></span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="<?php echo e(areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('staffs.index')); ?>"><?php echo e(translate('All staffs')); ?></a>
                                </li>
                                <li class="<?php echo e(areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])); ?>">
                                    <a class="nav-link" href="<?php echo e(route('roles.index')); ?>"><?php echo e(translate('Staff permissions')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions))): ?>
                            <li class="<?php echo e(areActiveRoutes(['addons.index', 'addons.create'])); ?>">
                                <a class="nav-link" href="<?php echo e(route('addons.index')); ?>">
                                    <i class="fa fa-wrench"></i>
                                    <span class="menu-title"><?php echo e(translate('Addon Manager')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\updatehs\resources\views/inc/admin_sidenav.blade.php ENDPATH**/ ?>