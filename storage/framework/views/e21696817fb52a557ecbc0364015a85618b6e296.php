<?php $__env->startSection('meta_title'); ?><?php echo e($shop->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($shop->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($shop->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($shop->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(my_asset($shop->logo)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($shop->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($shop->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(my_asset($shop->meta_img)); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($shop->meta_title); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(route('shop.visit', $shop->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(my_asset($shop->logo)); ?>" />
    <meta property="og:description" content="<?php echo e($shop->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e($shop->name); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- <section>
        <img loading="lazy"  src="https://via.placeholder.com/2000x300.jpg" alt="" class="img-fluid">
    </section> -->

    <?php
        $total = 0;
        $rating = 0;
        foreach ($shop->user->products as $key => $seller_product) {
            $total += $seller_product->reviews->count();
            $rating += $seller_product->reviews->sum('rating');
        }
    ?>

    <section class="gry-bg pt-4 ">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col-md-6">
                    <div class="d-flex">
                        <img
                            height="70"
                            class="lazyload"
                            src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>"
                            data-src="<?php if($shop->logo !== null): ?> <?php echo e(my_asset($shop->logo)); ?> <?php else: ?> <?php echo e(my_asset('frontend/images/placeholder.jpg')); ?> <?php endif; ?>"
                            alt="<?php echo e($shop->name); ?>"
                        >
                        <div class="pl-4">
                            <h3 class="strong-700 heading-4 mb-0"><?php echo e($shop->name); ?>

                                <?php if($shop->user->seller->verification_status == 1): ?>
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                <?php else: ?>
                                    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                                <?php endif; ?>
                            </h3>
                            <div class="star-rating star-rating-sm mb-1">
                                <?php if($total > 0): ?>
                                    <?php echo e(renderStarRating($rating/$total)); ?>

                                <?php else: ?>
                                    <?php echo e(renderStarRating(0)); ?>

                                <?php endif; ?>
                            </div>
                            <div class="location alpha-6"><?php echo e($shop->address); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="text-md-right mt-4 mt-md-0 social-nav model-2">
                        <?php if($shop->facebook != null): ?>
                            <li>
                                <a href="<?php echo e($shop->facebook); ?>" class="facebook social_a" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($shop->twitter != null): ?>
                            <li>
                                <a href="<?php echo e($shop->twitter); ?>" class="twitter social_a" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($shop->google != null): ?>
                            <li>
                                <a href="<?php echo e($shop->google); ?>" class="google-plus social_a" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($shop->youtube != null): ?>
                            <li>
                                <a href="<?php echo e($shop->youtube); ?>" class="youtube social_a" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row sticky-top mt-4">
                <div class="col">
                    <div class="seller-shop-menu">
                        <ul class="inline-links">
                            <li <?php if(!isset($type)): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('shop.visit', $shop->slug)); ?>"><?php echo e(translate('Store Home')); ?></a></li>
                            <li <?php if(isset($type) && $type == 'top_selling'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'top_selling'])); ?>"><?php echo e(translate('Top Selling')); ?></a></li>
                            <li <?php if(isset($type) && $type == 'all_products'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'all_products'])); ?>"><?php echo e(translate('All Products')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(!isset($type)): ?>
        <section class="py-4">
            <div class="container">
                <div class="home-slide">
                    <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true">
                        <?php if($shop->sliders != null): ?>
                            <?php $__currentLoopData = json_decode($shop->sliders); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="">
                                    <img class="d-block w-100 lazyload" src="<?php echo e(my_asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(my_asset($slide)); ?>" alt="<?php echo e($key); ?> slide" style="max-height:300px;">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="sct-color-1 pt-5 pb-4">
            <div class="container">
                <div class="section-title section-title--style-1 text-center mb-4">
                    <h3 class="section-title-inner heading-3 strong-600">
                        <?php echo e(translate('Featured Products')); ?>

                    </h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="caorusel-box arrow-round gutters-15">
                            <div class="slick-carousel center-mode" data-slick-items="5" data-slick-lg-items="3"  data-slick-md-items="3" data-slick-sm-items="1" data-slick-xs-items="1">
                                <?php $__currentLoopData = $shop->user->products->where('published', 1)->where('featured', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="caorusel-card my-5">
                                        <div class="product-card-2 card card-product shop-cards shop-tech">
                                            <div class="card-body p-0">

                                                <div class="card-image">
                                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                                        <img  class="mx-auto img-fit lazyload" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($product->thumbnail_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                                    </a>
                                                </div>

                                                <div class="p-3">
                                                    <div class="price-box">
                                                        <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                    </div>
                                                    <div class="star-rating star-rating-sm mt-1">
                                                        <?php echo e(renderStarRating($product->rating)); ?>

                                                    </div>
                                                    <h2 class="product-title p-0 text-truncate-2">
                                                        <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
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
            </div>
        </section>
    <?php endif; ?>


    <section class="<?php if(!isset($type)): ?> gry-bg <?php endif; ?> pt-5">
        <div class="container">
            <h4 class="heading-5 strong-600 border-bottom pb-3 mb-4">
                <?php if(!isset($type)): ?>
                    <?php echo e(translate('New Arrival Products')); ?>

                <?php elseif($type == 'top_selling'): ?>
                    <?php echo e(translate('Top Selling')); ?>

                <?php elseif($type == 'all_products'): ?>
                    <?php echo e(translate('All Products')); ?>

                <?php endif; ?>
            </h4>
            <div class="product-list row gutters-5 sm-no-gutters">
                <?php
                    if (!isset($type)){
                        $products = \App\Product::where('user_id', $shop->user->id)->where('published', 1)->orderBy('created_at', 'desc')->paginate(24);
                    }
                    elseif ($type == 'top_selling'){
                        $products = \App\Product::where('user_id', $shop->user->id)->where('published', 1)->orderBy('num_of_sale', 'desc')->paginate(24);
                    }
                    elseif ($type == 'all_products'){
                        $products = \App\Product::where('user_id', $shop->user->id)->where('published', 1)->paginate(24);
                    }
                ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6">
                        <div class="card product-box-1 mb-3">
                            <div class="card-image">
                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block text-center">
                                    <img class="img-fit lazyload" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($product->thumbnail_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <div class="px-3 py-2">
                                     <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                        <div class="club-point mb-2 bg-soft-base-1 border-light-base-1 border">
                                            <?php echo e(translate('Club Point')); ?>:
                                            <span class="strong-700 float-right"><?php echo e($product->earn_point); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <h2 class="title text-truncate-2 mb-0">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
                                    </h2>
                                </div>
                                <div class="price-bar row no-gutters">
                                    <div class="price col-md-7">
                                        <?php if(home_price($product->id) != home_discounted_price($product->id)): ?>
                                            <del class="old-product-price strong-600"><?php echo e(home_base_price($product->id)); ?></del>
                                            <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                        <?php else: ?>
                                            <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="star-rating star-rating-sm float-md-right">
                                            <?php echo e(renderStarRating($product->rating)); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="cart-add d-flex">
                                    <button class="btn add-wishlist border-right" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)">
                                        <i class="la la-heart-o"></i>
                                    </button>
                                    <button class="btn add-compare border-right" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)">
                                        <i class="la la-refresh"></i>
                                    </button>
                                    <button type="button" class="btn btn-block btn-icon-left" onclick="showAddToCartModal(<?php echo e($product->id); ?>)">
                                        <span class="d-none d-sm-inline-block"><?php echo e(translate('Add to cart')); ?></span><i class="la la-shopping-cart ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row">
                <div class="col">
                    <div class="products-pagination my-5">
                        <nav aria-label="Center aligned pagination">
                            <ul class="pagination justify-content-center">
                                <?php echo e($products->links()); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/seller_shop.blade.php ENDPATH**/ ?>