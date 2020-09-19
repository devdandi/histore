<?php $__env->startSection('content'); ?>

<div class="all-category-wrap py-4 gry-bg">
    <div class="sticky-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bg-white all-category-menu">
                        <ul class="clearfix no-scrollbar">
                            <?php if(count($categories) > 12): ?>
                                <?php for($i = 0; $i < 11; $i++): ?>
                                    <li class="<?php if($i == 0) echo 'active' ?>">
                                        <a href="#<?php echo e($i); ?>" class="row no-gutters align-items-center">
                                            <div class="col-md-3">
                                                <img loading="lazy"  class="cat-image" src="<?php echo e(my_asset($categories[$i]->icon)); ?>">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="cat-name"><?php echo e($categories[$i]->name); ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                <li class="">
                                    <a href="#more" class="row no-gutters align-items-center">
                                        <div class="col-md-3">
                                            <i class="fa fa-ellipsis-h cat-icon"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="cat-name"><?php echo e(translate('More Categories')); ?></div>
                                        </div>
                                    </a>
                                </li>
                            <?php else: ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php if($key == 0) echo 'active' ?>">
                                        <a href="#<?php echo e($key); ?>" class="row no-gutters align-items-center">
                                            <div class="col-md-3">
                                                <img loading="lazy"  class="cat-image" src="<?php echo e(my_asset($category->icon)); ?>">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="cat-name"><?php echo e(__($category->name)); ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="container">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($categories)>12 && $key == 11): ?>
                <div class="mb-3 bg-white">
                    <div class="sub-category-menu active" id="more">
                        <h3 class="category-name border-bottom pb-2"><a href="<?php echo e(route('products.category', $category->slug)); ?>"><?php echo e(__($category->name)); ?></a></h3>
                        <div class="row">
                            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-6">
                                <h6 class="mb-3"><a href="<?php echo e(route('products.subcategory', $subcategory->slug)); ?>"><?php echo e(__($subcategory->name)); ?></a></h6>
                                <ul class="mb-3">
                                    <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="w-100"><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->slug)); ?>" ><?php echo e(__($subsubcategory->name)); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="mb-3 bg-white">
                    <div class="sub-category-menu <?php if($key < 12) echo 'active'; ?>" id="<?php echo e($key); ?>">
                        <h3 class="category-name border-bottom pb-2"><a href="<?php echo e(route('products.category', $category->slug)); ?>" ><?php echo e(__($category->name)); ?></a></h3>
                        <div class="row">
                            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-6">
                                <h6 class="mb-3"><a href="<?php echo e(route('products.subcategory', $subcategory->slug)); ?>"><?php echo e(__($subcategory->name)); ?></a></h6>
                                <ul class="mb-3">
                                    <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="w-100"><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->slug)); ?>" ><?php echo e(__($subsubcategory->name)); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/all_category.blade.php ENDPATH**/ ?>