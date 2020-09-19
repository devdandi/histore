

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <!-- <a href="<?php echo e(route('sellers.create')); ?>" class="btn btn-info pull-right"><?php echo e(translate('add_new')); ?></a> -->
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(translate('Customers')); ?></h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_customers" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type email or name & Enter')); ?>">
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
                    <th><?php echo e(translate('Name')); ?></th>
                    <th><?php echo e(translate('Email Address')); ?></th>
                    <th><?php echo e(translate('Phone')); ?></th>
                    <th><?php echo e(translate('Package')); ?></th>
                    <th><?php echo e(translate('Wallet Balance')); ?></th>
                    <th width="10%"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($customer->user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($customers->currentPage() - 1)*$customers->perPage()); ?></td>
                            <td><?php echo e($customer->user->name); ?></td>
                            <td><?php echo e($customer->user->email); ?></td>
                            <td><?php echo e($customer->user->phone); ?></td>
                            <td>
                                <?php if($customer->user->customer_package != null): ?>
                                    <?php echo e($customer->user->customer_package->name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e(single_price($customer->user->balance)); ?></td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(translate('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo e(route('customers.login', encrypt($customer->id))); ?>"><?php echo e(translate('Log in as this Customer')); ?></a></li>
                                        <li><a onclick="confirm_modal('<?php echo e(route('customers.destroy', $customer->id)); ?>');"><?php echo e(translate('Delete')); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($customers->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function sort_customers(el){
            $('#sort_customers').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/customers/index.blade.php ENDPATH**/ ?>