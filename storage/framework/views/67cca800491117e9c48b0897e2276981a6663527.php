

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
                                        <?php echo e(translate('Bulk Products upload')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('Dashboard')); ?></a></li>
                                            <li><a href="#"><?php echo e(translate('Bulk Products upload')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-content p-3">
                                    <table class="table mb-0 table-bordered" style="font-size:14px;background-color: #cce5ff;border-color: #b8daff">
                                        <tr>
                                            <td><?php echo e(translate('1. Download the skeleton file and fill it with data.')); ?>:</td>
                                        </tr>
                                        <tr >
                                            <td><?php echo e(translate('2. You can download the example file to understand how the data must be filled.')); ?>:</td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(translate('3. Once you have downloaded and filled the skeleton file, upload it in the form below and submit.')); ?>:</td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(translate('4. After uploading products you need to edit them and set products images and choices.')); ?></td>
                                        </tr>
                                    </table>
                                    <a href="<?php echo e(my_asset('download/product_bulk_demo.xlsx')); ?>" download><button class="btn btn-styled btn-base-1 mt-2"><?php echo e(translate('Download CSV')); ?></button></a>
                                </div>
                            </div>

                            <div class="form-box bg-white mt-4">
                                <div class="form-box-content p-3">
                                    <table class="table mb-0 table-bordered" style="font-size:14px;background-color: #cce5ff;border-color: #b8daff">
                                        <tr>
                                            <td><?php echo e(translate('1. Category,Sub category,Sub Sub category and Brand should be in numerical ids.')); ?>:</td>
                                        </tr>
                                        <tr >
                                            <td><?php echo e(translate('2. You can download the pdf to get Category,Sub category,Sub Sub category and Brand id.')); ?>:</td>
                                        </tr>
                                    </table>
                                    <a href="<?php echo e(route('pdf.download_category')); ?>"><button class="btn btn-styled btn-base-1 mt-2"><?php echo e(translate('Download Category')); ?></button></a>
                                    <a href="<?php echo e(route('pdf.download_sub_category')); ?>"><button class="btn btn-styled btn-base-1 mt-2"><?php echo e(translate('Download Sub category')); ?></button></a>
                                    <a href="<?php echo e(route('pdf.download_sub_sub_category')); ?>"><button class="btn btn-styled btn-base-1 mt-2"><?php echo e(translate('Download Sub Sub category')); ?></button></a>
                                    <a href="<?php echo e(route('pdf.download_brand')); ?>"><button class="btn btn-styled btn-base-1 mt-2"><?php echo e(translate('Download Brand')); ?></button></a>
                                </div>
                            </div>

                            <form class="form-horizontal" action="<?php echo e(route('bulk_product_upload')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2">
                                        <?php echo e(translate('Upload CSV File')); ?>

                                    </div>
                                    <div class="form-box-content p-3">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label><?php echo e(translate('CSV')); ?></label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" name="bulk_file" id="file-6" class="custom-input-file custom-input-file--4"/>
                                                <label for="file-6" class="mw-100 mb-3">
                                                    <span></span>
                                                    <strong>
                                                        <i class="fa fa-upload"></i>
                                                        <?php echo e(translate('Choose CSV File')); ?>

                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-box mt-4 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(translate('Upload')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/frontend/seller/product_bulk_upload/index.blade.php ENDPATH**/ ?>