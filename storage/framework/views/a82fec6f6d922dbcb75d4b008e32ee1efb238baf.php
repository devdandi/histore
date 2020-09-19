<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(translate('Home Categories')); ?></h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="<?php echo e(route('home_categories.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="panel-body">
            <div class="form-group" id="category">
                <label class="col-lg-2 control-label"><?php echo e(translate('Category')); ?></label>
                <div class="col-lg-7">
                    <select class="form-control demo-select2-placeholder" name="category_id" id="category_id" required>
                        <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\App\HomeCategory::where('category_id', $category->id)->first() == null): ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e(__($category->name)); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-purple" type="submit"><?php echo e(translate('Save')); ?></button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Horizontal Form-->

</div>
<?php /**PATH /home/u9037400/public_html/hs/resources/views/home_categories/create.blade.php ENDPATH**/ ?>