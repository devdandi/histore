

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e($language->name); ?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo e(route('languages.key_value_store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($language->id); ?>">
                <div class="panel-body">
                    <table class="table table-striped table-bordered" id="tranlation-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(translate('Key')); ?></th>
                                <th><?php echo e(translate('Value')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = openJSONFile('en'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td class="key"><?php echo e($key); ?></td>
                                    <td>
                                        <input type="text" class="form-control value" style="width:100%" name="key[<?php echo e($key); ?>]" <?php if(isset(openJSONFile($language->code)[$key])): ?>
                                            value="<?php echo e(openJSONFile($language->code)[$key]); ?>"
                                        <?php endif; ?>>
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer text-right">
                    <button type="button" class="btn btn-purple" onclick="copyTranslation()"><?php echo e(translate('Copy Translations')); ?></button>
    				<button type="submit" class="btn btn-purple"><?php echo e(translate('Save')); ?></button>
    			</div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        //translate in one click
        function copyTranslation() {
            $('#tranlation-table > tbody  > tr').each(function (index, tr) {
                $(tr).find('.value').val($(tr).find('.key').text());
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u9037400/public_html/hs/resources/views/business_settings/languages/language_view.blade.php ENDPATH**/ ?>