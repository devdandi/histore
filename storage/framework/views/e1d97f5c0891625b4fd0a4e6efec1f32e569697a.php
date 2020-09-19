<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title"><?php echo e(translate('Add Product Unit')); ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo e(route('unit.add')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="radio mar-btm">
                    <label for="">Insert One By One</label>
                        <input   class="form-control" type="text" name="unit">
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit"><?php echo e(translate('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title"><?php echo e(translate('Bulk upload')); ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo e(route('unit.add.bulk')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="radio mar-btm">
                    <label for="">Add excel file</label>
                        <input class="form-control" type="file" name="unit">
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit"><?php echo e(translate('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel-body ">
    <table class="bg-white table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Name')); ?></th>
                    <th><?php echo e(translate('Status')); ?></th>
                    <th><?php echo e(translate('Date')); ?></th>
                    <th><?php echo e(translate('Action')); ?></th>
                </tr>
                </thead>
                <tbody>
                
                    <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($unit->firstItem() + $num); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <?php if($data->status == 1): ?>
                                <td>Active</td>
                            <?php else: ?>
                                <td>Inactive</td>
                            <?php endif; ?>
                            <td><?php echo e($data->created_at); ?></td>
                            <td><a href="#"><?php echo e(translate('Delete')); ?></a> / <a href="#">Edit</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($unit->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/product_settings/addunit.blade.php ENDPATH**/ ?>