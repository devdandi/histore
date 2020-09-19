
<div class="card sticky-top">
    <div class="card-title py-3">
        <div class="row align-items-center">
            <div class="col-6">
                <h3 class="heading heading-3 strong-400 mb-0">
                    <span><?php echo e(translate('Summary')); ?></span>
                </h3>
            </div>

            <div class="col-6 text-right">
                <span class="badge badge-md badge-success"><?php echo e(count(Session::get('cart'))); ?> <?php echo e(translate('Items')); ?></span>
            </div>
        </div>
    </div>

    <div class="card-body">
        <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
            <?php
                $total_point = 0;
            ?>
            <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $product = \App\Product::find($cartItem['id']);
                    $total_point += $product->earn_point*$cartItem['quantity'];
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="club-point mb-3 bg-soft-base-1 border-light-base-1 border">
                <?php echo e(translate("Total Club point")); ?>:
                <span class="strong-700 float-right"><?php echo e($total_point); ?></span>
            </div>
        <?php endif; ?>
        <table class="table-cart table-cart-review">
            <thead>
                <tr>
                    <th class="product-name"><?php echo e(translate('Product')); ?></th>
                    <th class="product-total text-right"><?php echo e(translate('Total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $subtotal = 0;
                    $tax = 0;
                    $shipping = 0;
                ?>
                <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = \App\Product::find($cartItem['id']);
                        $subtotal += $cartItem['price']*$cartItem['quantity'];
                        $tax += $cartItem['tax']*$cartItem['quantity'];
                        $shipping += $cartItem['shipping'];

                        $product_name_with_choice = $product->name;
                        if ($cartItem['variant'] != null) {
                            $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                        }
                    ?>
                    
                    <tr class="cart_item">
                        <td class="product-name">
                            <?php echo e($product_name_with_choice); ?>

                            <strong class="product-quantity">× <?php echo e($cartItem['quantity']); ?></strong>
                        </td>
                        <td class="product-total text-right">
                            <span class="pl-4"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

        <?php if(session()->get('cart_new') !== null): ?>
            <?php $__currentLoopData = session()->get('cart_new'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $shipping += $cac['shipping_costs']; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <table class="table-cart table-cart-review">

            <tfoot>
                <tr class="cart-subtotal">
                    <th><?php echo e(translate('Subtotal')); ?></th>
                    <td class="text-right">
                        <span class="strong-600"><?php echo e(single_price($subtotal)); ?></span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th><?php echo e(translate('Tax')); ?></th>
                    <td class="text-right">
                        <span class="text-italic"><?php echo e(single_price($tax)); ?></span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th><?php echo e(translate('Total Shipping')); ?></th>
                    <td class="text-right">
                        <span class="text-italic"><?php echo e(single_price($shipping)); ?></span>
                    </td>
                </tr>

                <?php if(Session::has('coupon_discount')): ?>
                    <tr class="cart-shipping">
                        <th><?php echo e(translate('Coupon Discount')); ?></th>
                        <td class="text-right">
                            <span class="text-italic"><?php echo e(single_price(Session::get('coupon_discount'))); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php
                    $total = $subtotal+$tax+$shipping;
                    if(Session::has('coupon_discount')){
                        $total -= Session::get('coupon_discount');
                    }
                ?>

                <tr class="cart-total">
                    <th><span class="strong-600"><?php echo e(translate('Total')); ?></span></th>
                    <td class="text-right">
                        <strong><span><?php echo e(single_price($total)); ?></span></strong>
                    </td>
                </tr>
            </tfoot>
        </table>

        <?php if(Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1): ?>
            <?php if(Session::has('coupon_discount')): ?>
                <div class="mt-3">
                    <form class="form-inline" action="<?php echo e(route('checkout.remove_coupon_code')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group flex-grow-1">
                            <div class="form-control bg-gray w-100"><?php echo e(\App\Coupon::find(Session::get('coupon_id'))->code); ?></div>
                        </div>
                        <button type="submit" class="btn btn-base-1"><?php echo e(translate('Change Coupon')); ?></button>
                    </form>
                </div>
            <?php else: ?>
                <div class="mt-3">
                    <form class="form-inline" action="<?php echo e(route('checkout.apply_coupon_code')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group flex-grow-1">
                            <input type="text" class="form-control w-100" name="code" placeholder="<?php echo e(translate('Have coupon code? Enter here')); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-base-1"><?php echo e(translate('Apply')); ?></button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/partials/cart_summary.blade.php ENDPATH**/ ?>