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
                                        <?php echo e(translate('Products')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(translate('Dashboard')); ?></a></li>
                                            <li><a href="<?php echo e(route('seller.products')); ?>"><?php echo e(translate('Products')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <?php if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated): ?>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                                    <i class="la la-dropbox"></i>
                                    <span class="d-block title heading-3 strong-400"><?php echo e(max(0, Auth::user()->seller->remaining_uploads)); ?></span>
                                    <span class="d-block sub-title"><?php echo e(translate('Remaining Uploads')); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-md-4 mx-auto">
                                <a class="dashboard-widget text-center plus-widget mt-4 d-block" href="<?php echo e(route('seller.products.upload')); ?>">
                                    <i class="la la-plus"></i>
                                    <span class="d-block title heading-6 strong-400 c-base-1"><?php echo e(translate('Add New Product')); ?></span>
                                </a>
                            </div>
                            <?php if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated): ?>
                            <?php
                                $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                            ?>
                            <div class="col-md-4">
                                <a href="<?php echo e(route('seller_packages_list')); ?>" class="dashboard-widget text-center red-widget text-white mt-4 d-block">
                                    <?php if($seller_package != null): ?>
                                    <img src="<?php echo e(my_asset($seller_package->logo)); ?>" height="44" class="img-fit mw-100 mx-auto mb-1">
                                    <span class="d-block sub-title mb-2"><?php echo e(translate('Current Package')); ?>: <?php echo e($seller_package->name); ?></span>
                                    <?php else: ?>
                                        <i class="la la-frown-o mb-1"></i>
                                        <div class="d-block sub-title mb-2"><?php echo e(translate('No Package Found')); ?></div>
                                    <?php endif; ?>
                                    <div class="btn btn-styled btn-white btn-outline py-1"><?php echo e(translate('Upgrade Package')); ?></div>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="card no-border mt-4">
                            <div class="card-header py-2">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-xl-3">
                                        <h6 class="mb-0">All Products</h6>
                                    </div>
                                    <div class="col-md-6 col-xl-3 ml-auto">
                                        <form class="" action="" method="GET">
                                            <input type="text" class="form-control" id="search" name="search" <?php if(isset($search)): ?> value="<?php echo e($search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Search product')); ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-hover table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo e(translate('Name')); ?></th>
                                            <th><?php echo e(translate('Sub Subcategory')); ?></th>
                                            <th><?php echo e(translate('Current Qty')); ?></th>
                                            <th><?php echo e(translate('Base Price')); ?></th>
                                            <th><?php echo e(translate('Published')); ?></th>
                                            <th><?php echo e(translate('Featured')); ?></th>
                                            <th><?php echo e(translate('Options')); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(($key+1) + ($products->currentPage() - 1)*$products->perPage()); ?></td>
                                                <td><a href="<?php echo e(route('product', $product->slug)); ?>" target="_blank"><?php echo e(__($product->name)); ?></a></td>
                                                <td>
                                                    <?php if($product->subsubcategory != null): ?>
                                                        <?php echo e($product->subsubcategory->name); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
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
                                                        echo $qty;
                                                    ?>
                                                </td>
                                                <td><?php echo e($product->unit_price); ?></td>
                                                <td><label class="switch">
                                                    <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                                    <span class="slider round"></span></label>
                                                </td>
                                                <td><label class="switch">
                                                    <input onchange="update_featured(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                                    <span class="slider round"></span></label>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenuButton-<?php echo e($key); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-<?php echo e($key); ?>">
                                                            <a href="<?php echo e(route('seller.products.edit', encrypt($product->id))); ?>" class="dropdown-item"><?php echo e(translate('Edit')); ?></a>
        					                                <button onclick="confirm_modal('<?php echo e(route('products.destroy', $product->id)); ?>')" class="dropdown-item"><?php echo e(translate('Delete')); ?></button>
                                                            <a href="<?php echo e(route('products.duplicate', $product->id)); ?>" class="dropdown-item"><?php echo e(translate('Duplicate')); ?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                <?php echo e($products->links()); ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Featured products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Published products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/frontend/seller/products.blade.php ENDPATH**/ ?>