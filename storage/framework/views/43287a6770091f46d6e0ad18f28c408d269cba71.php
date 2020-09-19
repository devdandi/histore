

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <a href="<?php echo e(route('flash_deals.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(translate('Add New Flash Deal Products')); ?></a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(translate('Flash Deals')); ?></h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_flash_deals" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name & Enter')); ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table res-table table-responsive mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Title')); ?></th>
                    <th><?php echo e(translate('Banner')); ?></th>
                    <th><?php echo e(translate('Start Date')); ?></th>
                    <th><?php echo e(translate('End Date')); ?></th>
                    <th><?php echo e(translate('Status')); ?></th>
                    <th><?php echo e(translate('Featured')); ?></th>
                    <th><?php echo e(translate('Page Link')); ?></th>
                    <th width="10%"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $flash_deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($flash_deals->currentPage() - 1)*$flash_deals->perPage()); ?></td>
                        <td><?php echo e($flash_deal->title); ?></td>
                        <td><img class="img-md" src="<?php echo e(my_asset($flash_deal->banner)); ?>" alt="banner"></td>
                        <td><?php echo e(date('d-m-Y', $flash_deal->start_date)); ?></td>
                        <td><?php echo e(date('d-m-Y', $flash_deal->end_date)); ?></td>
                        <td><label class="switch">
                            <input onchange="update_flash_deal_status(this)" value="<?php echo e($flash_deal->id); ?>" type="checkbox" <?php if($flash_deal->status == 1) echo "checked";?> >
                            <span class="slider round"></span></label></td>
                        <td><label class="switch">
                            <input onchange="update_flash_deal_feature(this)" value="<?php echo e($flash_deal->id); ?>" type="checkbox" <?php if($flash_deal->featured == 1) echo "checked";?> >
                            <span class="slider round"></span></label></td>
                        <td><?php echo e(url('flash-deal/'.$flash_deal->slug)); ?></td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(translate('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo e(route('flash_deals.edit', encrypt($flash_deal->id))); ?>"><?php echo e(translate('Edit')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('flash_deals.destroy', $flash_deal->id)); ?>');"><?php echo e(translate('Delete')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($flash_deals->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_flash_deal_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('flash_deals.update_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    location.reload();
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
        function update_flash_deal_feature(el){
            if(el.checked){
                var featured = 1;
            }
            else{
                var featured = 0;
            }
            $.post('<?php echo e(route('flash_deals.update_featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, featured:featured}, function(data){
                if(data == 1){
                    location.reload();
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/flash_deals/index.blade.php ENDPATH**/ ?>