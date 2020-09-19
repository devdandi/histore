

<?php $__env->startSection('content'); ?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(translate('Flash Deal Information')); ?></h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('flash_deals.store')); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(translate('Title')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(translate('Title')); ?>" id="name" name="title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="background_color"><?php echo e(translate('Background Color')); ?> <small>(Hexa-code)</small></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(translate('#FFFFFF')); ?>" id="background_color" name="background_color" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label" for="name"><?php echo e(translate('Text Color')); ?></label>
                    <div class="col-lg-9">
                        <select name="text_color" id="text_color" class="form-control demo-select2" required>
                            <option value=""><?php echo e(translate('Select One')); ?></option>
                            <option value="white"><?php echo e(translate('White')); ?></option>
                            <option value="dark"><?php echo e(translate('Dark')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="banner"><?php echo e(translate('Banner')); ?> <small>(1920x500)</small></label>
                    <div class="col-sm-9">
                        <input type="file" id="banner" name="banner" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="start_date"><?php echo e(translate('Date')); ?></label>
                    <div class="col-sm-9">
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="form-control" name="start_date">
                                <span class="input-group-addon"><?php echo e(translate('to')); ?></span>
                                <input type="text" class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="col-sm-3 control-label" for="products"><?php echo e(translate('Products')); ?></label>
                    <div class="col-sm-9">
                        <select name="products[]" id="products" class="form-control demo-select2" multiple required data-placeholder="<?php echo e(translate('Choose Products')); ?>">
                            <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e(__($product->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group" id="discount_table">

                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit"><?php echo e(translate('Save')); ?></button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#products').on('change', function(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('<?php echo e(route('flash_deals.product_discount')); ?>', {_token:'<?php echo e(csrf_token()); ?>', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                        $('.demo-select2').select2();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/flash_deals/create.blade.php ENDPATH**/ ?>