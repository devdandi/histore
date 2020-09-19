<?php $__env->startSection('content'); ?>
    <section class="home-banner-area mb-4">
        <div class="container">
            <div class="row no-gutters position-relative">
                <div class="col-lg-3 position-static order-2 order-lg-0">
                    <div class="category-sidebar">
                        <div class="all-category d-none d-lg-block">
                            <span ><?php echo e(translate('Categories')); ?></span>
                            <a href="<?php echo e(route('categories.all')); ?>">
                                <span class="d-none d-lg-inline-block"><?php echo e(translate('See All')); ?> ></span>
                            </a>
                        </div>
                        <ul class="categories no-scrollbar">
                            <li class="d-lg-none">
                                <a href="<?php echo e(route('categories.all')); ?>">
                                    <img class="cat-image lazyload" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset('frontend/images/icons/list.png')); ?>" width="30" alt="<?php echo e(translate('All Category')); ?>">
                                    <span class="cat-name"><?php echo e(translate('All')); ?> <br> <?php echo e(translate('Categories')); ?></span>
                                </a>
                            </li>
                            <?php $__currentLoopData = \App\Category::all()->take(11); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $brands = array();
                                ?>
                                <li class="category-nav-element" data-id="<?php echo e($category->id); ?>">
                                    <a href="<?php echo e(route('products.category', $category->slug)); ?>">
                                        <img class="cat-image lazyload" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($category->icon)); ?>" width="30" alt="<?php echo e(__($category->name)); ?>">
                                        <span class="cat-name"><?php echo e(__($category->name)); ?></span>
                                    </a>
                                    <?php if(count($category->subcategories)>0): ?>
                                        <div class="sub-cat-menu c-scrollbar">
                                            <div class="c-preloader">
                                                <i class="fa fa-spin fa-spinner"></i>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <?php
                    $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 ))->get());
                    $featured_categories = \App\Category::where('featured', 1)->get();
                ?>

                <div class="<?php if($num_todays_deal > 0): ?> col-lg-7 <?php else: ?> col-lg-9 <?php endif; ?> order-1 order-lg-0 <?php if(count($featured_categories) == 0): ?> home-slider-full <?php endif; ?>">
                    <div class="home-slide">
                        <div class="home-slide">
                            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                                <?php $__currentLoopData = \App\Slider::where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="" style="height:180px;">
                                        <a href="<?php echo e($slider->link); ?>" target="_blank">
                                        <img class="d-block w-100 h-100 lazyload" src="<?php echo e(my_asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(my_asset($slider->photo)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo">
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php if(count($featured_categories) > 0): ?>
                        <div class="trending-category  d-none d-lg-block">
                            <ul>
                                <?php $__currentLoopData = $featured_categories->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li <?php if($key == 0): ?> class="active" <?php endif; ?>>
                                        <div class="trend-category-single">
                                            <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="d-block">
                                                <div class="name"><?php echo e(__($category->name)); ?></div>
                                                <div class="img">
                                                    <img src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($category->banner)); ?>" alt="<?php echo e(__($category->name)); ?>" class="lazyload img-fit">
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="all-category d-none d-lg-block">
									<span ><?php echo e(translate('Categories')); ?></span>
										<a href="<?php echo e(route('categories.all')); ?>">
									<span class="d-none d-lg-inline-block"><?php echo e(translate('See All')); ?> ></span>
										</a>
								</div>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($num_todays_deal > 0): ?>
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="flash-deal-box bg-white h-100">
                        <div class="title text-center p-2 gry-bg">
                            <h3 class="heading-6 mb-0">
                                <?php echo e(translate('Todays Deal')); ?>

                                <span class="badge badge-danger"><?php echo e(translate('Hot')); ?></span>
                            </h3>
                        </div>
                        <div class="flash-content c-scrollbar c-height">
                            <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product != null): ?>
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block flash-deal-item">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="img">
                                                    <img class="lazyload img-fit" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($product->thumbnail_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="price">
                                                    <span class="d-block"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                    <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                        <del class="d-block"><?php echo e(home_base_price($product->id)); ?></del>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <?php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
    ?>
    <?php if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date): ?>
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                <div class="section-title-1 clearfix ">
                    <h3 class="heading-5 strong-700 mb-0 float-left">
                        <?php echo e(translate('Flash Sale')); ?>

                    </h3>
                    <div class="flash-deal-box float-left">
                        <div class="countdown countdown--style-1 countdown--style-1-v1 " data-countdown-date="<?php echo e(date('m/d/Y', $flash_deal->end_date)); ?>" data-countdown-label="show"></div>
                    </div>
                    <ul class="inline-links float-right">
                        <li><a href="<?php echo e(route('flash-deal-details', $flash_deal->slug)); ?>" class="active"><?php echo e(translate('View More')); ?></a></li>
                    </ul>
                </div>
                <div class="caorusel-box arrow-round gutters-5">
                    <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                    <?php $__currentLoopData = $flash_deal->flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        ?>
                        <?php if($product != null && $product->published != 0): ?>
                            <div class="caorusel-card">
                                <div class="product-card-2 card card-product shop-cards">
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
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class=" text-truncate"><?php echo e(__($product->name)); ?></a>
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
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <?php $__currentLoopData = \App\Banner::where('position', 1)->where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-<?php echo e(12/count(\App\Banner::where('position', 1)->where('published', 1)->get())); ?>">
                        <div class="media-banner mb-3 mb-lg-0">
                            <a href="<?php echo e($banner->url); ?>" target="_blank" class="banner-container">
                                <img src="<?php echo e(my_asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(my_asset($banner->photo)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div id="section_featured">

    </div>

    <div id="section_best_selling">

    </div>

    <div id="section_home_categories">

    </div>

    <?php if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1): ?>
        <?php
            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        ?>
       <?php if(count($customer_products) > 0): ?>
           <section class="mb-4">
               <div class="container">
                   <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                       <div class="section-title-1 clearfix">
                           <h3 class="heading-5 strong-700 mb-0 float-left">
                               <span class="mr-4"><?php echo e(translate('Classified Ads')); ?></span>
                           </h3>
                           <ul class="inline-links float-right">
                               <li><a href="<?php echo e(route('customer.products')); ?>" class="active"><?php echo e(translate('View More')); ?></a></li>
                           </ul>
                       </div>
                       <div class="caorusel-box arrow-round">
                           <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                               <?php $__currentLoopData = $customer_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="product-card-2 card card-product my-2 mx-1 mx-sm-2 shop-cards shop-tech">
                                       <div class="card-body p-0">
                                           <div class="card-image">
                                               <a href="<?php echo e(route('customer.product', $customer_product->slug)); ?>" class="d-block">
                                                   <img class="img-fit lazyload mx-auto" src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($customer_product->thumbnail_img)); ?>" alt="<?php echo e(__($customer_product->name)); ?>">
                                               </a>
                                           </div>

                                           <div class="p-sm-3 p-2">
                                               <div class="price-box">
                                                   <span class="product-price strong-600"><?php echo e(single_price($customer_product->unit_price)); ?></span>
                                               </div>
                                               <h2 class="product-title p-0 text-truncate-1">
                                                   <a href="<?php echo e(route('customer.product', $customer_product->slug)); ?>"><?php echo e(__($customer_product->name)); ?></a>
                                               </h2>
                                               <div>
                                                   <?php if($customer_product->conditon == 'new'): ?>
                                                       <span class="product-label label-hot"><?php echo e(translate('new')); ?></span>
                                                   <?php elseif($customer_product->conditon == 'used'): ?>
                                                       <span class="product-label label-hot"><?php echo e(translate('Used')); ?></span>
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
       <?php endif; ?>
   <?php endif; ?>

    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <?php $__currentLoopData = \App\Banner::where('position', 2)->where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-<?php echo e(12/count(\App\Banner::where('position', 2)->where('published', 1)->get())); ?>">
                        <div class="media-banner mb-3 mb-lg-0">
                            <a href="<?php echo e($banner->url); ?>" target="_blank" class="banner-container">
                                <img src="<?php echo e(my_asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(my_asset($banner->photo)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div id="section_best_sellers">

    </div>

    <section class="mb-3">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(translate('Top 10 Catogories')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('categories.all')); ?>" class="active"><?php echo e(translate('View All Catogories')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        <?php $__currentLoopData = \App\Category::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($category->banner)); ?>" alt="<?php echo e(__($category->name)); ?>" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($category->name)); ?></div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(translate('Top 10 Brands')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('brands.all')); ?>" class="active"><?php echo e(translate('View All Brands')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        <?php $__currentLoopData = \App\Brand::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="<?php echo e(my_asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(my_asset($brand->logo)); ?>" alt="<?php echo e(__($brand->name)); ?>" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($brand->name)); ?></div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.post('<?php echo e(route('home.section.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_featured').html(data);
                slickInit();
            });

            $.post('<?php echo e(route('home.section.best_selling')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_selling').html(data);
                slickInit();
            });

            $.post('<?php echo e(route('home.section.home_categories')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_home_categories').html(data);
                slickInit();
            });

            $.post('<?php echo e(route('home.section.best_sellers')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_sellers').html(data);
                slickInit();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/index.blade.php ENDPATH**/ ?>