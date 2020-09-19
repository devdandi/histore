<section class="mb-4">
    <div class="container">
        <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
            <div class="section-title-1 clearfix">
                <h3 class="heading-5 strong-700 mb-0 float-left">
                    <span class="mr-4"><?php echo e(translate('Featured Products')); ?></span>
                </h3>
            </div>
            <div class="caorusel-box arrow-round gutters-5">
                <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                    <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="caorusel-card">
                        <div class="product-card-2 card card-product shop-cards shop-tech">
                            <div class="card-body p-0">

                                <div class="card-image">
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                        <img class="img-fit lazyload mx-auto" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($product->thumbnail_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                    </a>
                                </div>

                                <div class="p-md-3 p-2">
                                    <div class="price-box">
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                    </div>
                                    <div class="star-rating star-rating-sm mt-1">
                                        <?php echo e(renderStarRating($product->rating)); ?>

                                    </div>
                                    <h2 class="product-title p-0">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="text-truncate"><?php echo e(__($product->name)); ?></a>
                                    </h2>

                                    <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                        <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                            <?php echo e(translate('Club Point')); ?>:
                                            <span class="strong-700 float-right"><?php echo e($product->earn_point); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/partials/featured_products_section.blade.php ENDPATH**/ ?>