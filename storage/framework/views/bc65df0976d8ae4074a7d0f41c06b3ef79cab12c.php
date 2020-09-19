<div class="modal-body p-4">
    <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
        <div class="col-lg-6">
            <div class="product-gal sticky-top d-flex flex-row-reverse">
                <?php if(is_array(json_decode($product->photos)) && count(json_decode($product->photos)) > 0): ?>
                    <div class="product-gal-img">
                        <img src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" class="xzoom img-fluid lazyload"
                             src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>"
                             data-src="<?php echo e(my_asset(json_decode($product->photos)[0])); ?>"
                             xoriginal="<?php echo e(my_asset(json_decode($product->photos)[0])); ?>"/>
                    </div>
                    <div class="product-gal-thumb">
                        <div class="xzoom-thumbs">
                            <?php $__currentLoopData = json_decode($product->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(my_asset($photo)); ?>">
                                    <img src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>"
                                         class="xzoom-gallery lazyload"
                                         src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" width="80"
                                         data-src="<?php echo e(my_asset($photo)); ?>"
                                         <?php if($key == 0): ?> xpreview="<?php echo e(my_asset($photo)); ?>" <?php endif; ?>>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Product description -->
            <div class="product-description-wrapper">
                <!-- Product title -->
                <h2 class="product-title">
                    <?php echo e(__($product->name)); ?>

                </h2>

                <?php if(home_price($product->id) != home_discounted_price($product->id)): ?>

                    <div class="row no-gutters mt-4">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(translate('Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price-old">
                                <del>
                                    <?php echo e(home_price($product->id)); ?>

                                    <span>/<?php echo e($product->unit); ?></span>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="product-description-label mt-1"><?php echo e(translate('Discount Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong>
                                    <?php echo e(home_discounted_price($product->id)); ?>

                                </strong>
                                <span class="piece">/<?php echo e($product->unit); ?></span>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(translate('Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong>
                                    <?php echo e(home_discounted_price($product->id)); ?>

                                </strong>
                                <span class="piece">/<?php echo e($product->unit); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated && $product->earn_point > 0): ?>
                    <div class="row no-gutters mt-4">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(translate('Club Point')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="d-inline-block club-point bg-soft-base-1 border-light-base-1 border">
                                <span class="strong-700"><?php echo e($product->earn_point); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <hr>

                <?php
                    $qty = 0;
                    if($product->variant_product){
                        foreach ($product->stocks as $key => $stock) {
                            $qty += $stock->qty;
                        }
                    }
                    else{
                        $qty = $product->current_stock;
                    }
                ?>

                <form id="option-choice-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">

                    <!-- Quantity + Add to cart -->
                    <?php if($product->digital !=1): ?>
                        <?php if($product->choice_options != null): ?>
                            <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div
                                            class="product-description-label mt-2 "><?php echo e(\App\Attribute::find($choice->attribute_id)->name); ?>

                                            :
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                            <?php $__currentLoopData = $choice->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <input type="radio" id="<?php echo e($choice->attribute_id); ?>-<?php echo e($value); ?>"
                                                           name="attribute_id_<?php echo e($choice->attribute_id); ?>"
                                                           value="<?php echo e($value); ?>" <?php if($key == 0): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="<?php echo e($choice->attribute_id); ?>-<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if(count(json_decode($product->colors)) > 0): ?>
                            <div class="row no-gutters">
                                <div class="col-2">
                                    <div class="product-description-label mt-2"><?php echo e(translate('Color')); ?>:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="list-inline checkbox-color mb-1">
                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <input type="radio" id="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                       name="color" value="<?php echo e($color); ?>" <?php if($key == 0): ?> checked <?php endif; ?>>
                                                <label style="background: <?php echo e($color); ?>;"
                                                       for="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                       data-toggle="tooltip"></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                        <?php endif; ?>

                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="product-description-label mt-2"><?php echo e(translate('Quantity')); ?>:</div>
                            </div>
                            <div class="col-10">
                                <div class="product-quantity d-flex align-items-center">
                                    <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number" type="button" data-type="minus"
                                                    data-field="quantity" disabled="disabled">
                                                <i class="la la-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity" class="form-control input-number text-center"
                                               placeholder="1" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number" type="button" data-type="plus"
                                                    data-field="quantity">
                                                <i class="la la-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="avialable-amount">(<span
                                            id="available-quantity"><?php echo e($qty); ?></span> <?php echo e(translate('available')); ?>)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                    <?php endif; ?>

                    <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(translate('Total Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price">

                                </strong>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="d-table width-100 mt-3">
                    <div class="d-table-cell">
                        <!-- Add to cart button -->
                        <?php if($product->digital == 1): ?>
                            <button type="button"
                                    class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart"
                                    onclick="addToCart()">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> <?php echo e(translate('Add to cart')); ?></span>
                            </button>
                        <?php elseif($qty > 0): ?>
                            <button type="button"
                                    class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart"
                                    onclick="addToCart()">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> <?php echo e(translate('Add to cart')); ?></span>
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-styled btn-base-3 btn-icon-left strong-700" disabled>
                                <i class="la la-cart-arrow-down"></i> <?php echo e(translate('Out of Stock')); ?>

                            </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
    $('#option-choice-form input').on('change', function () {
        getVariantPrice();
    });
</script>
<?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/partials/addToCart.blade.php ENDPATH**/ ?>