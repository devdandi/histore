

<?php $__env->startSection('content'); ?>

    <?php if($flash_deal->status == 1 && strtotime(date('d-m-Y')) <= $flash_deal->end_date): ?>
    <div style="background-color:<?php echo e($flash_deal->background_color); ?>">
        <section class="text-center">
            <img src="<?php echo e(my_asset($flash_deal->banner)); ?>" alt="<?php echo e($flash_deal->title); ?>" class="img-fit w-100">
        </section>
        <section class="pb-4">
            <div class="container">
                <div class="text-center my-4 text-<?php echo e($flash_deal->text_color); ?>">
                    <h1 class="h3"><?php echo e($flash_deal->title); ?></h1>
                    <div class="countdown countdown-sm countdown--style-1" data-countdown-date="<?php echo e(date('m/d/Y', $flash_deal->end_date)); ?>" data-countdown-label="show"></div>
                </div>
                <div class="gutters-5 row">
                    <?php $__currentLoopData = $flash_deal->flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        ?>
                        <?php if($product->published != 0): ?>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="product-card-2 card card-product shop-cards shop-tech mb-2">
                                    <div class="card-body p-0">

                                        <div class="card-image">
                                            <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block text-center" >
                                                <img class="img-fit lazyload" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($product->thumbnail_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                            </a>
                                        </div>

                                        <div class="p-3">
                                            <div class="price-box">
                                                <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                    <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                                <?php endif; ?>
                                                <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                            </div>
                                            <h2 class="product-title p-0 mt-2">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="text-truncate"><?php echo e(__($product->name)); ?></a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    </div>
    <?php else: ?>
        <div style="background-color:<?php echo e($flash_deal->background_color); ?>">
            <section class="text-center pt-3">
                <div class="container ">
                    <img src="<?php echo e(my_asset($flash_deal->banner)); ?>" alt="<?php echo e($flash_deal->title); ?>" class="img-fit">
                </div>
            </section>
            <section class="pb-4">
                <div class="container">
                    <div class="text-center text-<?php echo e($flash_deal->text_color); ?>">
                        <h1 class="h3 my-4"><?php echo e($flash_deal->title); ?></h1>
                        <p class="h4"><?php echo e(translate('This offer has been expired.')); ?></p>
                    </div>
                </div>
            </section>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/flash_deal_details.blade.php ENDPATH**/ ?>