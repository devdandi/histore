<?php $__env->startSection('content'); ?>
<div class="text-center">
    <h1 class="error-code text-danger"><?php echo e(translate('404')); ?></h1>
    <p class="h4 text-uppercase text-bold"><?php echo e(translate('Page Not Found!')); ?></p>
    <div class="pad-btm">
        <?php echo e(translate('Sorry, but the page you are looking for has not been found on our server.')); ?>

    </div>
    <hr class="new-section-sm bord-no">
    <div class="pad-top"><a class="btn btn-primary" href="<?php echo e(env('APP_URL')); ?>"><?php echo e(translate('Return Home')); ?></a></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\updatehs\resources\views/errors/404.blade.php ENDPATH**/ ?>