

<?php $__env->startSection('content'); ?>

<?php if($type != 'Seller'): ?>
    <div class="row">
        <div class="col-lg-12 pull-right">
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(translate('Add New Product')); ?></a>
        </div>
    </div>
<?php endif; ?>

<br>

<div class="panel">
    <!--Panel heading-->
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(translate($type.' Products')); ?></h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_products" action="" method="GET">
                <?php if($type == 'Seller'): ?>
                    <div class="box-inline pad-rgt pull-left">
                        <div class="select" style="min-width: 200px;">
                            <select class="form-control demo-select2" id="user_id" name="user_id" onchange="sort_products()">
                                <option value="">All Sellers</option>
                                <?php $__currentLoopData = App\Seller::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($seller->user != null && $seller->user->shop != null): ?>
                                        <option value="<?php echo e($seller->user->id); ?>" <?php if($seller->user->id == $seller_id): ?> selected <?php endif; ?>><?php echo e($seller->user->shop->name); ?> (<?php echo e($seller->user->name); ?>)</option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 200px;">
                        <select class="form-control demo-select2" name="type" id="type" onchange="sort_products()">
                            <option value="">Sort by</option>
                            <option value="rating,desc" <?php if(isset($col_name , $query)): ?> <?php if($col_name == 'rating' && $query == 'desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Rating (High > Low)')); ?></option>
                            <option value="rating,asc" <?php if(isset($col_name , $query)): ?> <?php if($col_name == 'rating' && $query == 'asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Rating (Low > High)')); ?></option>
                            <option value="num_of_sale,desc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'num_of_sale' && $query == 'desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Num of Sale (High > Low)')); ?></option>
                            <option value="num_of_sale,asc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'num_of_sale' && $query == 'asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Num of Sale (Low > High)')); ?></option>
                            <option value="unit_price,desc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'unit_price' && $query == 'desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Base Price (High > Low)')); ?></option>
                            <option value="unit_price,asc"<?php if(isset($col_name , $query)): ?> <?php if($col_name == 'unit_price' && $query == 'asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Base Price (Low > High)')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type & Enter')); ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="20%"><?php echo e(translate('Name')); ?></th>
                    <?php if($type == 'Seller'): ?>
                        <th><?php echo e(translate('Seller Name')); ?></th>
                    <?php endif; ?>
                    <th><?php echo e(translate('Num of Sale')); ?></th>
                    <th><?php echo e(translate('Total Stock')); ?></th>
                    <th><?php echo e(translate('Base Price')); ?></th>
                    <th><?php echo e(translate('Todays Deal')); ?></th>
                    <th><?php echo e(translate('Rating')); ?></th>
                    <th><?php echo e(translate('Published')); ?></th>
                    <th><?php echo e(translate('Featured')); ?></th>
                    <th><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($products->currentPage() - 1)*$products->perPage()); ?></td>
                        <td>
                            <a href="<?php echo e(route('product', $product->slug)); ?>" target="_blank" class="media-block">
                                <div class="media-left">
                                    <img loading="lazy"  class="img-md" src="<?php echo e(my_asset($product->thumbnail_img)); ?>" alt="Image">
                                </div>
                                <div class="media-body"><?php echo e(__($product->name)); ?></div>
                            </a>
                        </td>
                        <?php if($type == 'Seller'): ?>
                            <td><?php echo e($product->user->name); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($product->num_of_sale); ?> <?php echo e(translate('times')); ?></td>
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
                        <td><?php echo e(number_format($product->unit_price,2)); ?></td>
                        <td><label class="switch">
                                <input onchange="update_todays_deal(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->todays_deal == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td><?php echo e($product->rating); ?></td>
                        <td><label class="switch">
                                <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td><label class="switch">
                                <input onchange="update_featured(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(translate('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php if($type == 'Seller'): ?>
                                        <li><a href="<?php echo e(route('products.seller.edit', encrypt($product->id))); ?>"><?php echo e(translate('Edit')); ?></a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(route('products.admin.edit', encrypt($product->id))); ?>"><?php echo e(translate('Edit')); ?></a></li>
                                    <?php endif; ?>
                                    <li><a onclick="confirm_modal('<?php echo e(route('products.destroy', $product->id)); ?>');"><?php echo e(translate('Delete')); ?></a></li>
                                    <li><a href="<?php echo e(route('products.duplicate', $product->id)); ?>"><?php echo e(translate('Duplicate')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($products->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.todays_deal')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Todays Deal updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
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
                    showAlert('success', 'Published products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function sort_products(el){
            $('#sort_products').submit();
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/products/index.blade.php ENDPATH**/ ?>