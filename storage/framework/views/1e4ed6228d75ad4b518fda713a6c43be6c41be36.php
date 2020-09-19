

<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                        <li class="active"><a href="<?php echo e(route('compare')); ?>"><?php echo e(translate('Compare')); ?></a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="text-right">
                        <a href="<?php echo e(route('compare.reset')); ?>" style="text-decoration: none;" class="btn btn-link btn-base-5 btn-sm"><?php echo e(translate('Reset Compare List')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header text-center p-2">
                            <div class="heading-5"><?php echo e(translate('Comparison')); ?></div>
                        </div>
                        <?php if(Session::has('compare')): ?>
                            <?php if(count(Session::get('compare')) > 0): ?>
                                <div class="card-body">
                                    <table class="table table-bordered compare-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:16%" class="font-weight-bold">
                                                    <?php echo e(translate('Name')); ?>

                                                </th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th scope="col" style="width:28%" class="font-weight-bold">
                                                        <a href="<?php echo e(route('product', \App\Product::find($item)->slug)); ?>"><?php echo e(\App\Product::find($item)->name); ?></a>
                                                    </th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo e(translate('Image')); ?></th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <img loading="lazy"  src="<?php echo e(my_asset(\App\Product::find($item)->thumbnail_img)); ?>" alt="Product Image" class="img-fluid py-4">
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(translate('Price')); ?></th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td><?php echo e(single_price(\App\Product::find($item)->unit_price)); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(translate('Brand')); ?></th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <?php if(\App\Product::find($item)->brand != null): ?>
                                                            <?php echo e(\App\Product::find($item)->brand->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(translate('Sub Sub Category')); ?></th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <?php if(\App\Product::find($item)->subsubcategory != null): ?>
                                                            <?php echo e(\App\Product::find($item)->subsubcategory->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(translate('Description')); ?></th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td><?php echo \App\Product::find($item)->description; ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td class="text-center py-4">
                                                        <button type="button" class="btn btn-base-1 btn-circle btn-icon-left" onclick="showAddToCartModal(<?php echo e($item); ?>)">
                                                            <i class="icon ion-android-cart"></i><?php echo e(translate('Add to cart')); ?>

                                                        </button>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="card-body">
                                <p><?php echo e(translate('Your comparison list is empty')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/view_compare.blade.php ENDPATH**/ ?>