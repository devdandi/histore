<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(translate('Shop Verification')); ?>

                                        <a href="<?php echo e(route('shop.visit', $shop->slug)); ?>" class="btn btn-link btn-sm" target="_blank">(<?php echo e(translate('Visit Shop')); ?> <i class="la la-external-link"></i>)</a>
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('shops.index')); ?>"><?php echo e(translate('Shop Settings')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="" action="<?php echo e(route('shop.verify.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(translate('Verification info')); ?>

                                </div>
                                <?php
                                    $verification_form = \App\BusinessSetting::where('type', 'verification_form')->first()->value;
                                ?>
                                <div class="form-box-content p-3">
                                    <?php $__currentLoopData = json_decode($verification_form); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($element->type == 'text'): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?> <span class="required-star">*</span></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="<?php echo e($element->type); ?>" class="form-control mb-3" placeholder="<?php echo e(translate($element->label)); ?>" name="element_<?php echo e($key); ?>" required>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'file'): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="<?php echo e($element->type); ?>" name="element_<?php echo e($key); ?>" id="file-<?php echo e($key); ?>" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" required/>
                                                    <label for="file-<?php echo e($key); ?>" class="mw-100 mb-3">
                                                        <span></span>
                                                        <strong>
                                                            <i class="fa fa-upload"></i>
                                                            <?php echo e(translate('Choose file')); ?>

                                                        </strong>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'select' && is_array(json_decode($element->options))): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_<?php echo e($key); ?>" required>
                                                            <?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'multi_select' && is_array(json_decode($element->options))): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_<?php echo e($key); ?>[]" multiple required>
                                                            <?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'radio'): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" name="element_<?php echo e($key); ?>" value="<?php echo e($value); ?>" id="<?php echo e($value); ?>" required>
                                                                <label for="<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(translate('Apply')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/seller/verify_form.blade.php ENDPATH**/ ?>