

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
                                        <?php echo e(translate('Product Reviews')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('reviews.seller')); ?>"><?php echo e(translate('Product Reviews')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Order history table -->
                        <div class="card no-border mt-4">
                            <div>
                                <table class="table table-sm table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo e(translate('Product')); ?></th>
                                            <th><?php echo e(translate('Customer')); ?></th>
                                            <th><?php echo e(translate('Rating')); ?></th>
                                            <th><?php echo e(translate('Comment')); ?></th>
                                            <th><?php echo e(translate('Published')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($reviews) > 0): ?>
                                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $review = \App\Review::find($value->id);
                                                ?>
                                                <?php if($review != null && $review->product != null && $review->user != null): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e($key+1); ?>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('product', $review->product->slug)); ?>" target="_blank"><?php echo e(translate($review->product->name)); ?></a>
                                                        </td>
                                                        <td><?php echo e($review->user->name); ?> (<?php echo e($review->user->email); ?>)</td>
                                                        <td>
                                                            <div class="star-rating star-rating-sm mt-1">
                                                                <?php for($i=0; $i < floor($review->rating); $i++): ?>
                                                                    <i class="fa fa-star active"></i>
                                                                <?php endfor; ?>
                                                                <?php for($i=0; $i < ceil(5-$review->rating); $i++): ?>
                                                                    <i class="fa fa-star
                                                                        <?php if($i==0 && ($review->rating - floor($review->rating)) > 0 && ($review->rating - floor($review->rating)) <= 0.5): ?>
                                                                            half
                                                                        <?php elseif($i==0 && (ceil($review->rating) - $review->rating) > 0 && (ceil($review->rating) - $review->rating) <= 0.5): ?>
                                                                            active
                                                                        <?php endif; ?>">
                                                                    </i>
                                                                <?php endfor; ?>
                                                            </div>
                                                        </td>
                                                        <td><?php echo e($review->comment); ?></td>
                                                        <td>
                                                            <?php if($review->status == 1): ?>
                                                                <span class="badge badge-success"><?php echo e(translate('Published')); ?></span>
                                                            <?php else: ?>
                                                                <span class="badge badge-danger"><?php echo e(translate('Unpublished')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td class="text-center pt-5 h4" colspan="100%">
                                                    <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                                    <span class="d-block"><?php echo e(translate('No review found.')); ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($reviews->links()); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/seller/reviews.blade.php ENDPATH**/ ?>